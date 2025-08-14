<?php
/**
 *
 * @var \App\View\AppView $this
 * @reference app/views/account/login.html.erb
 */
?>
<div id="login-form">
    <?= $this->Form->create(null); ?>
    <label for="username"><?= __('field_login') ?></label>
    <?= $this->Form->text('username', ['tabindex' => 1,'autocomplete' => 'username','autofocus' => 'autofocus']) ?>
    <label for="password">
        <?= __('field_password') ?>
        <?php if ($this->CandySetting->isLostPasswordRequired() === true): ?>
        <?= $this->Html->link(__('label_password_lost'), ['action' => 'lost_password'], ['class' => 'lost_password']) ?>
        <?php endif; ?>
    </label>
    <?= $this->Form->password('password', ['tabindex' => 2,'autocomplete' => 'current-password']); ?>

    <?php if ($this->CandySetting->isAutoLoginRequired() === true): ?>
        <label for="autologin">
            <?= $this->Form->checkbox('autologin', ['tabindex' => 4,'value' => '1','hiddenField' => false]); ?>
        </label>
    <?php endif; ?>

    <input type="submit" name="login" value="<?= __('button_login') ?>" tabindex="5" id="login-submit" />

    <?= $this->Form->end() ?>

    <?php //echo $this->element('accounts/middlebox', array()); ?>
    <?php //echo $this->Html->scriptBlock("Form.Element.focus('username');") ?>
</div>
