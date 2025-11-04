<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class EnabledModulesTable extends Table
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
        $this->setTable('enabled_modules');
        // associations
        $this->hasOne('Project')
            ->setClassName('Projects')
            ->setBindingKey('project_id');
    }

    /**
     * @param int $projectUid uid of Project
     * @return array
     */
    public function getAvailableModules(int $projectUid): array
    {
        $ret = [];
        $query = $this->find()->where(['project_id' => $projectUid]);
        if ($query->count() > 0)
        {
            foreach ($query->all() as $entity)
            {
                $ret[] = $entity->get('name');
            }
        }

        return $ret;
    }
}
