<?php
/**
 * Welcome Content
 *
 * @var \App\View\AppView $this
 * @var array $newsEntities
 * @var array $projectEntities
 */
?>
<h2><?php echo $this->Candy->html_title(__('label_home')) ?></h2>

<div class="splitcontent">
    <div class="splitcontentleft">
        <div class="wiki">
            <?= $this->CandyView->textilizable($this->CandySetting->getWelcomeMessage()); ?>
        </div>
    </div>
    <div class="splitcontentright">
        <?= $this->element('news_latest', ['newsEntities' => $newsEntities, 'projectId' => '']) ?>
    </div>
</div>
