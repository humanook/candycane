<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\IdentityInterface;
use Cake\ORM\Entity;

class User extends Entity implements IdentityInterface
{
    /**
     * Authentication\IdentityInterface method
     */
    public function getIdentifier(): string
    {
        return $this->id;
    }

    /**
     * Authentication\IdentityInterface method
     */
    public function getOriginalData(): Entity
    {
        return $this;
    }
}
