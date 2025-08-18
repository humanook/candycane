<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Authentication\CandyCaneIdentity;
use App\Model\Entity\News;
use App\Model\Entity\Project;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class NewsTable extends Table
{
    /**
     * initialize
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('news');
        // associations
        $this->hasOne('Project')
            ->setClassName('Projects')
            ->setForeignKey('id')
            ->setBindingKey('project_id');
        $this->hasOne('Author')
            ->setClassName('Users')
            ->setForeignKey('id')
            ->setBindingKey('author_id');
        $this->hasMany('Comments')
            ->setClassName('Comments')
            ->setForeignKey('commented_id')
            ->setConditions(['Comments.commented_type' => 'News'])
            ->setDependent(true);
    }

    /**
     * @param \Cake\Validation\Validator $validator
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        // title
        $validator
            ->requirePresence('title')
            ->notEmptyString('title')
            ->maxLength('title', 60);
        // summary
        $validator
            ->maxLength('summary', 255);
        // description
        $validator
            ->requirePresence('description')
            ->notEmptyString('description');

        return $validator;
    }

    public $actsAs = [
        'ActivityProvider' => [
            'find_options' => ['include' => ['Project', 'Author']],
            'author_key' => 'author_id',
        ],
        'Event' => ['url' => ['Proc' => '_event_url']],
        'Searchable' => [],
    ];
    public $filterArgs = [
        ['name' => 'description', 'type' => 'like'],
        ['name' => 'title', 'type' => 'like'],
    ];

    /**
     * @param $data
     * @return array
     * @deprecated
     */
    public function _event_url($data): array
    {
        return [
            'controller' => 'news',
            'action' => 'show',
            'id' => $data['News']['id'],
            'project_id' => $data['Project']['id'],
        ];
    }

    /**
     * @param int $id
     * @return News|null
     */
    public function getRecord(int $id): News| null
    {
        $ret = null;
        $query = $this->find('all')->contain([
            'Project','Author',
            'Comments' => [
                'sort' => ['Comments.updated_on' => 'desc','Comments.created_on' => 'desc'],
            ],
            'Comments.Author']);
        $query->where([
            $this->getAlias() . '.id' => $id,
            'Project.status' => Project::PROJECT_STATUS_ACTIVE,
            ]);
        if( $query->count() > 0 )
        {
            $ret = $query->first();
        }
        return $ret;
    }

    /**
     * @param CandyCaneIdentity $identity
     * @param int $count
     * @return array
     */
    public function getLatest(CandyCaneIdentity $identity, int $count = 5): array
    {
        $ret = [];
        $alias = $this->getAlias();
        $query = $this->find('all')->contain(['Project','Author']);
        $query->where(['Project.status' => Project::PROJECT_STATUS_ACTIVE]);
        if ($identity->isAdminUser() === false) {
        }
        $query->orderBy([$alias . '.created_on' => 'DESC'])->limit($count);
        if ($query->count() > 0) {
            $ret = $query->all()->toArray();
        }

        return $ret;
//        $param = array(
//            'order' => 'News.created_on DESC',
//            'conditions' => $this->Project->allowed_to_condition($user, 'view_news'),
//            'limit' => $count
//        );
//        return $this->find('all', $param);
    }

    /**
     *
     * @param int $projectUid
     * @param bool $hasSubProject
     * @param int $count
     * @return array
     */
    public function getLatestInProject(int $projectUid, bool $hasSubProject = false, int $count = 5): array
    {
        $ret = [];
        $alias = $this->getAlias();
        $query = $this->find('all')->contain(['Project','Author']);
        $conditions = [];
        $conditions[] = ['Project.status' => Project::PROJECT_STATUS_ACTIVE];
        if ($hasSubProject === false)
        {
            $conditions[] = ['Project.id' => $projectUid];
        }
        else
        {
            $conditions[] = ['or' => [
                'Project.id' => $projectUid,
                'Project.parent_id' => $projectUid,
            ]];
        }
        $query->where($conditions);
        $query->orderBy([$alias . '.created_on' => 'DESC'])->limit($count);
        if ($query->count() > 0)
        {
            $ret = $query->all()->toArray();
        }
        return $ret;
    }
}
