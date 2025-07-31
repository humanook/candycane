<?php
/**
 *
 * @var \App\View\AppView $this
 * @var array $currentuser
 */
$topMenus = [
    [
        'title'=>__('label_home'),
        'url'=>['controller'=>'Welcome','action'=>'index'],
        'class'=>'home',
        'scope'=>'public',
    ],
    [
        'title'=>__('label_my_page'),
        'url'=>['controller'=>'My','action'=>'page'],
        'class'=>'my-page',
        'scope'=>'private',
    ],
    [
        'title'=>__('label_project'),
        'url'=>['controller'=>'Projects','action'=>'index'],
        'class'=>'projects',
        'scope'=>'private',
    ],
    [
        'title'=>__('label_administration'),
        'url'=>['controller'=>'Admin','action'=>'index'],
        'class'=>'administration',
        'scope'=>'admin',
    ],
    [
        'title'=>__('label_help'),
        'url'=>'https://www.redmine.org/guide',
        'class'=>'help',
        'scope'=>'external',
    ],
];
?>
<div id="account">
    <?php if ($this->CandyUser->isLoggedIn()) : ?>
        <ul>
            <li><?= $this->Html->link(__('label_my_account'), ['controller'=>'My','action'=>'account'], ['class' => 'my-account']); ?></li>
            <li><?= $this->Html->link(__('label_logout'), ['controller'=>'Account','action'=>'logout'], ['class' => 'logout']); ?></li>
        </ul>
    <?php else : ?>
        <ul>
            <li><?= $this->Html->link(__('label_login'), ['controller'=>'Account','action'=>'login'], ['class' => 'login']); ?></li>
            <li><?= $this->Html->link(__('label_register'), ['controller'=>'Account','action'=>'register'], ['class' => 'register']); ?></li>
        </ul>
    <?php endif; ?>
</div>
<?php if ($this->CandyUser->isLoggedIn()) : ?>
    <div id="loggedas">
        <?= __('label_logged_as') ?>
        <?= $this->CandyUser->getProfileLink() ?>
    </div>
<?php endif; ?>
<ul>
    <?php foreach ($topMenus as $item) : ?>
        <?php if ($item['scope'] === 'public' || ( $item['scope'] === 'private' && $this->CandyUser->isLoggedIn())) : ?>
        <li><?= $this->Html->link(__($item['title']), $item['url'], ['class' => $item['class']]) ?></li>
        <?php endif; ?>
        <?php if ($item['scope'] === 'admin' && $this->CandyUser->isLoggedIn() ) : ?>
            <li><?= $this->Html->link(__($item['title']), $item['url'], ['class' => $item['class']]) ?></li>
        <?php endif; ?>
        <?php if ($item['scope'] === 'external') : ?>
            <li><?= $this->Html->link(__($item['title']), $item['url'], ['class' => $item['class'],'rel'=>'noopener','target'=>'_blank']) ?></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
