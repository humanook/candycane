<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Core\Configure;
use Cake\ORM\Entity;

class User extends Entity
{

    /**
     * @return string
     */
    public function getFullName(): string
    {
        $firstName = $this->get('firstname');
        $lastName = $this->get('lastname');
        $ret = Configure::read('CandyCaneSettings.user_format', 'firstname_lastname');
        $ret = str_replace('firstname', $firstName, $ret);
        $ret = str_replace('lastname', $lastName, $ret);
        $ret = str_replace('comma', ',', $ret);
        $ret = str_replace('firstinitial', substr($firstName, 0, 1), $ret);
        $ret = str_replace('lastinitial', substr($lastName, 0, 1), $ret);
        return $ret;
    }

    /**
     * @return string
     */
    public function getLanguageCode(): string
    {
        $value = $this->get('language');
        $ret = '';
        switch ($value) {
            case 'ja':
                $ret = 'ja_JP';
                break;
            case 'en':
                $ret = 'en_US';
                break;
            default:
                break;
        }
        return $ret;
    }
}
