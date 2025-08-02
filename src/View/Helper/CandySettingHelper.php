<?php

namespace App\View\Helper;

use App\View\Helper\AppHelper;
use Cake\Core\Configure;

class CandySettingHelper extends AppHelper
{
    /**
     * UI テーマ名 を取得する
     *
     * @return string
     */
    public function getThemeUI():string
    {
        $ret = '';
        return $ret;
    }

    public function getSelfRegistration():string
    {
        return Configure::read('CandyCane.self_registration');
    }

    /**
     * @return bool
     */
    public function isSelfRegistration():bool
    {
        $ret = false;
        $value = $this->getSelfRegistration();
        if( $value != 0 ) {
            $ret = true;
        }
        return $ret;
    }
}
