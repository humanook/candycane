<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Project extends Entity
{
    /**
     * Status Active
     */
    public const PROJECT_STATUS_ACTIVE = 1;

    /**
     * Status Archived
     */
    public const PROJECT_STATUS_ARCHIVED = 9;
}
