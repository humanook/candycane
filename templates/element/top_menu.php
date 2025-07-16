<?php
/**
 *
 * @var \App\View\AppView $this
 * @var array $currentuser
 */

?>
<div id="account">
    <?php if ($this->CandyUser->isLoggedIn()) : ?>
        <ul>
            <li><?= $this->Html->link(__('My account'), ['controller'=>'My','action'=>'account'], ['class' => 'my-account']); ?></li>
            <li><?= $this->Html->link(__('Sign out'), ['controller'=>'Account','action'=>'logout'], ['class' => 'logout']); ?></li>
        </ul>
    <?php else : ?>
        <ul>
            <li><?= $this->Html->link(__('Sign in'), ['controller'=>'Account','action'=>'login'], ['class' => 'login']); ?></li>
            <li><?= $this->Html->link(__('Register'), ['controller'=>'Account','action'=>'register'], ['class' => 'register']); ?></li>
        </ul>
    <?php endif; ?>
</div>
<?php if ($this->CandyUser->isLoggedIn()) : ?>
    <div id="loggedas">
        <?= __('Logged in as') ?>
        <?= $this->CandyUser->getProfileLink() ?>
    </div>
<?php endif; ?>
<ul>
    <?php if ($this->CandyUser->isLoggedIn()) : ?>
        <?php foreach ($this->TopMenu->getTopMenu() as $item) : ?>
            <li><?= $this->Html->link(__($item['caption']), $item['url'], ['class' => $item['class']]) ?></li>
        <?php endforeach; ?>
    <?php else : ?>
        <li></li>
    <?php endif; ?>
</ul>
