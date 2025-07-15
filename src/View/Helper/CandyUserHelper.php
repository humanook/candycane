<?php

namespace App\View\Helper;

use App\View\Helper\AppHelper;

class CandyUserHelper extends AppHelper
{
    private $currentUser;
    public function initialize(array $config): void
    {
        parent::initialize($config);
        if( isset($config['currentUser']) === true )
        {
            $this->currentUser = $config['currentUser'];
        }
    }

    public function isLoggedIn(): bool
    {
        return false;
    }

    public function hasMemberships(): bool
    {
        return false;
    }

    public function getMemberships(): array
    {
        return [];
    }
}
