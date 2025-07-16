<?php

namespace App\Controller\Authentication;

use Authentication\Identity;

class CandyCaneIdentity extends Identity
{
    /**
     * login username
     * @return string
     */
    public function getLoginName(): string
    {
        return isset($this->getOriginalData()['login']) === true ? $this->getOriginalData()['login'] : '';
    }
}
