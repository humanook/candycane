<?php
declare(strict_types=1);
use Cake\Core\Configure;

/**
 *
 *  app/views/layouts/base.html.erb
 *
 * @var \App\View\AppView $this
 * @var string $current_language language of HTML Content
 * @var string $title_for_layout title of Page
 */

$appTitle = Configure::read('CandyCane.app_title');
?>
<!DOCTYPE html>
<html lang="<?= Configure::read('CandyCane.default_language') ?>">
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
    echo $this->Html->css(['tribute','application','responsive']);
    echo $this->element('ui_theme');
    echo $this->Html->script(['prototype','effects','dragdrop','controls','application']);
    //echo $this->Html->script('https://raw.github.com/cognitom/StaffRoll.net-Libraries-and-Themes/master/include.staffroll.net/github/script/1.0/load.js?theme=underground');
    echo $this->Html->css('jstoolbar');
    if (isset($header_tags)) {
        echo $header_tags;
    }
    echo $this->fetch('css');
    ?>
<?php echo $this->fetch('script'); ?>
</head>
<body>
<div id="wrapper">
    <div class="flyout-menu js-flyout-menu">
    </div>

    <div id="top-menu">
        <?= $this->element('top_menu'); ?>
    </div>

    <div id="header">
        <a href="#" class="mobile-toggle-button js-flyout-menu-toggle-button"></a>
        <div id="quick-search">
            <?php
            $options = [
                'action' => ['controller' => 'search','action' => 'index'],
                'type' => 'get',
                'id' => 'searchForm',
            ];
            echo $this->Form->create(null, $options);
            echo $this->Html->link(__('Search') . ':', '/search/index', ['accesskey' => 4]);
            echo $this->Form->text('q', [
                'size' => 20,
                'class' => 'small',
                'accesskey' => 'f',
                'label' => false,
            ]);
            echo $this->Form->end();
            ?>
            <?php if ($this->CandyUser->hasMemberships()) : ?>
                <?php echo $this->element('project_selector'); ?>
            <?php endif; ?>
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
    <div id="main" class="<?= isset($Sidebar) ? '' : 'nosidebar' ?>">
        <div id="sidebar">
            <?php if (isset($Sidebar)) {
                echo $this->element('sidebar', ['Sidebar' => $Sidebar]);
            }?>
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
