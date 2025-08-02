<?php
declare(strict_types=1);

namespace App\View\Helper;

use App\Authentication\CandyCaneIdentity;
use Authentication\Identity;
use Cake\View\Helper;

/**
 * @property \Cake\View\Helper\UrlHelper $Url
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class CandyUserHelper extends Helper
{
    /**
     * @var array
     */
    protected array $helpers = ['Html','Url'];

    /**
     * @var CandyCaneIdentity
     */
    private CandyCaneIdentity|null $currentUser = null;

    /**
     * initialize
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
        if (isset($config['currentUser']) === true)
        {
            $this->currentUser = $config['currentUser'];
        }
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return $this->currentUser !== null;
    }

    public function hasMemberships(): bool
    {
        return false;
    }

    public function getMemberships(): array
    {
        return [];
    }

    public function debug(): void
    {
        var_dump($this->currentUser);
    }

    /**
     * @return string
     */
    public function getLoginName(): string
    {
        return $this->currentUser != null ? $this->currentUser->getLoginName() : '';
    }

    public function getCreatedOn(): string
    {
        return $this->currentUser != null ? $this->currentUser->getCreatedOn() : '';
    }

    public function getUserData($key): string
    {
        $ret = '';
        if( $this->currentUser !== null )
        {
            if (isset($this->currentUser->getOriginalData()[$key]) === true)
            {
                $ret = $this->currentUser->getOriginalData()[$key];
            }
        }
        return $ret;
    }

    public function getProfileLink(): string
    {
        $ret = '';
        if ($this->currentUser !== null) {
            $username = $this->getLoginName();
            $userId = $this->currentUser->getIdentifier();
            $ret = $this->Html->link($username, ['controller' => 'Account', 'action' => 'show',$userId]);
        }

        return $ret;
    }
}
