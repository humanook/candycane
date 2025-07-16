<?php
declare(strict_types=1);

namespace App\Model\Table;

#class Member < ActiveRecord::Base
#
#  validates_presence_of :role, :user, :project
#  validates_uniqueness_of :user_id, :scope => :project_id
#
#  def validate
#    errors.add :role_id, :activerecord_error_invalid if role && !role.member?
#  end
#
#  def name
#    self.user.name
#  end
#
#  def <=>(member)
#    role == member.role ? (user <=> member.user) : (role <=> member.role)
#  end
#
#  def before_destroy
#    # remove category based auto assignments for this member
#    IssueCategory.update_all "assigned_to_id = NULL", ["project_id = ? AND assigned_to_id = ?", project.id, user.id]
#  end
#end
use App\Controller\Authentication\CandyCaneIdentity;
use Cake\ORM\Table;

class MembersTable extends Table
{
    //var $belongsTo = array('Project', 'Role', 'User');
    /**
     * initialize
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('members');
        // associations
        $this->hasOne('Project',[
            'foreignKey' => 'id',
            'bindingKey' => 'project_id',
        ]);
        $this->hasOne('User',[
            'foreignKey' => 'id',
            'bindingKey' => 'user_id',
        ]);
    }

    public function getProjects(CandyCaneIdentity $identity): array
    {
        $ret = [];
        if( $identity !== null )
        {
            $userId = $identity->getIdentifier();
        }
        return $ret;
    }
}
