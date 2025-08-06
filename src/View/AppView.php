<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/5/en/views.html#the-app-view
 * @property \App\View\Helper\CandyTopMenuHelper $CandyTopMenu
 * @property \App\View\Helper\CandySettingHelper $CandySetting
 * @property \App\View\Helper\CandyUserHelper $CandyUser
 * @property \App\View\Helper\CandyViewHelper $CandyView
 * @property \App\View\Helper\CandyHelper $Candy
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like adding helpers.
     *
     * e.g. `$this->addHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        $currentUser = $this->get('currentUser', null);
        $this->CandyTopMenu = $this->loadHelper('CandyTopMenu');
        $this->CandySetting = $this->loadHelper('CandySetting');
        $this->CandyView = $this->loadHelper('CandyView');
        $this->CandyUser = $this->loadHelper('CandyUser', ['currentUser' => $currentUser]);
    }

//    function element($name, $data = array(), $options = false) {
//
//        $element = parent::element($name, $data, $options);
//
//        $hookContainer = ClassRegistry::getObject('HookContainer');
//        $before = "";
//        if ($hookContainer->getElementHook($name,true)) {
//            $before = $this->element($hookContainer->getElementHook($name,true), $data, $options);
//        }
//        $after = "";
//        if ($hookContainer->getElementHook($name)) {
//            $after = $this->element($hookContainer->getElementHook($name), $data, $options);
//        }
//        return $before.$element.$after;
//    }
}
