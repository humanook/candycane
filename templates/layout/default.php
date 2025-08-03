<?php
declare(strict_types=1);
use Cake\Core\Configure;

/**
 * default layout
 *
 * @var \App\View\AppView $this
 */
$appTitle = $this->CandySetting->getConfig('app_title',"");
?>
<!DOCTYPE html>
<html lang="<?= $this->CandySetting->getConfig('default_language') ?>">
<head>
    <?= $this->Html->charset() ?>
    <title><?php echo $this->fetch('title_for_layout', $appTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $appTitle ?>" />
    <meta name="keywords" content="issue,bug,tracker" />
    <?php
    echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken'));
    echo $this->Html->meta('icon');
    echo $this->fetch('meta');
    echo $this->Html->css(['jquery/jquery-ui-1.13.2','tribute-5.1.3','application','responsive'],['timestamp'=>true]);
    $uiTheme = $this->CandySetting->getThemeUI();
    if ( !empty( $uiTheme ) )
    {
        $css = '../themed/' . $uiTheme . '/css/application.css';
        echo $this->Html->css( $css ,['fullBase'=>true]);
    }
    echo $this->Html->script(['jquery-3.6.1-ui-1.13.2-ujs-6.1.7','tribute-5.1.3.min','tablesort-5.2.1.min','tablesort-5.2.1.number.min','application','responsive']);
    echo $this->Html->css('jstoolbar');
    echo $this->fetch('headers');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<div id="wrapper">
    <div class="flyout-menu js-flyout-menu">
        <div class="flyout-menu__search">
            <?php
            $options = [
                'action' => ['controller' => 'Search','action' => 'index'],
                'type' => 'get',
            ];
            echo $this->Form->create(null, $options);
            echo '<label class="search-magnifier search-magnifier--flyout" for="flyout-search">&#9906;';
            echo '</label>';
            echo $this->Form->text('q', [
                'id' => 'flyout-search',
                'class' => 'small js-search-input',
                'placeholder' => __('label_search'),
                'label' => false,
            ]);
            echo $this->Form->end();
            ?>
        </div>
        <h3><?= __('label_general') ?></h3>
        <span class="js-general-menu"></span>
        <span class="js-sidebar flyout-menu__sidebar"></span>
        <h4><?= __('label_profile') ?></h4>
        <span class="js-profile-menu"></span>
    </div>

    <div id="top-menu">
        <?= $this->element('top_menu'); ?>
    </div>

    <div id="header">
        <a href="#" class="mobile-toggle-button js-flyout-menu-toggle-button"></a>
        <div id="quick-search">
            <?php
            $options = [
                'action' => ['controller' => 'Search','action' => 'index'],
                'type' => 'get',
            ];
            echo $this->Form->create(null, $options);
            echo '<label for="q">';
            echo $this->Html->link(__('label_search') , ['controller' => 'Search','action' => 'index'], ['accesskey' => 4]);
            echo ': </label>';
            echo $this->Form->text('q', [
                'id' => 'q',
                'size' => 20,
                'class' => 'small',
                'data-auto-complete' => 'true',
                'data-tribute' => 'true',
                'accesskey' => 'f',
                'label' => false,
            ]);
            echo $this->Form->end();
            ?>
            <div id="project-jump" class="drdn">
                <span class="drdn-trigger"><?= __('label_jump_to_a_project') ?></span>
                <div class="drdn-content">
                    <div class="quick-search">
                        <?php
                        echo $this->Form->text('q', [
                            'id' => 'projects-quick-search',
                            'value' => '',
                            'class' => 'autocomplete',
                            'autocomplete' => 'off',
                            'data-value-was' => '',
                            'label' => false,
                        ])
                        ?>
                    </div>
                    <div class="drdn-items projects selection">
                        <?php if ($this->CandyUser->hasMemberships()) : ?>
                            <?php echo $this->element('project_selector'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="drdn-items all-projects selection">
                        <?= __('label_project_all') ?>
                    </div>
                </div>

            </div>
        </div>
        <h1><?= $this->fetch('title_for_layout', $appTitle);?></h1>

        <?php if (!empty($main_menu)) :?>
            <div id="main-menu">
                <ul>
                    <?php foreach ($main_menu as $item) : ?>
                        <?php
                        $url = $item;
                        unset($url['class']);
                        unset($url['caption']);
                        $option = ['class' => $item['class']];
                        ?>
                        <li><?php echo $this->Html->link(__($item['caption']), $url, $option); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
    <?php $sideBarContent = $this->fetch('sidebar',''); ?>
    <div id="main" class="<?= $this->exists('sidebar') ? '' : 'nosidebar' ?>">
        <div id="sidebar">
            <?= $this->fetch('sidebar','') ?>
        </div>
        <div id="content">
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>

    </div>

    <div id="ajax-indicator" style="display:none;"><span><?php echo __('Loading...'); ?></span></div>

    <div id="footer">
        <?php echo sprintf(
            'Powered by %s &copy 2025 - %s',
            $this->Html->link('CandyCane', 'https://github.com/yandod/candycane'),
            date('Y'),
        ); ?><br/>

        <?php echo $this->Html->link(__('Report Bug'), 'http://my.candycane.jp/'); ?> -
        <?php echo $this->Html->link(
            __('Contributors'),
            'https://github.com/yandod/candycane/contributors',
            ['class' => 'staffroll'],
        ); ?> -
        <?php echo $this->Html->link(__('Discussion'), 'https://groups.google.com/group/candycane-users'); ?><br/>

        <?php
        echo $this->Html->link(
            $this->Html->image(
                'cake.power.gif',
                [
                    'alt' => __('CakePHP: the rapid development php framework'),
                    'border' => '0',
                ],
            ),
            'http://www.cakephp.org/',
            [
                'target' => '_blank',
                'escape' => false,
            ],
        );
        ?>
    </div>

</div>
</body>
</html>
