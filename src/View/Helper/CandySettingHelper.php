<?php

namespace App\View\Helper;

use App\View\Helper\AppHelper;
use Cake\Core\Configure;

class CandySettingHelper extends AppHelper
{
    /**
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public function getAppConfig(string $key, mixed $default = null): mixed
    {
        return Configure::read("CandyCaneSettings.$key", $default);
    }

    /**
     * UI テーマ名 を取得する
     *
     * @return string
     */
    public function getThemeUI():string
    {
        return $this->getAppConfig('ui_theme', 'default');
    }

    public function getSelfRegistration():string
    {
        return Configure::read('CandyCaneSettings.self_registration');
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
