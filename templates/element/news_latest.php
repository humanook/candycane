<?php
/**
 *
 * @var array $newsEntities
 * @var \App\View\AppView $this
 * @var string $projectId
 */
?>
<?php if (empty($newsEntities) === false): ?>
    <div class="news box">
        <h3 ><?php echo __('label_news_latest') ?></h3>
        <?php foreach ($newsEntities as $entity) : ?>
            <p>
                <?php
                /**
                 * @var \App\Model\Entity\News $entity
                 */
                if (empty($projectId) === true)
                {
                    echo $this->Html->link($entity->getProjectName(), [
                        'controller' => 'Projects',
                        'action' => 'show',
                        'id' => $entity->getProjectId(),
                    ]);
                    echo ': ';
                }
                echo $this->Html->link($entity->get('title'), [
                    'controller' => 'News',
                    'action' => 'show',
                    'id' => $entity->get('id'),
                ]);
                $summary = $entity->get('summary');
                ?>
                <br>
                <?php if (empty($summary) === false) : ?>
                    <span class="summary">
                        <?= $summary ?>
                    </span>
                    <br>
                <?php endif; ?>
                <span class="author">
                         <?php //echo $this->Candy->authoring($item['News']['created_on'],$item['Author'])
                         $authorLink = $this->Html->link($entity->getAuthorFullName(), [
                             'controller' => 'Account',
                             'action' => 'show',
                             'id' => $entity->get('author_id'),
                         ]);
                         $created = $entity->get('created_on');
                         $age = '';
                         $age .= '<abbr title="' . \App\Utility\DateTimeUtility::getDateTimeAsString($created) . '">';
                         $age .= \App\Utility\DateTimeUtility::diffTimeStampAsString(time(), $created->getTimestamp());
                         $age .= '</abbr>';
                         $format = __('label_added_time_by');
                         echo \App\Utility\StringUtility::getFormatAsString($format, [
                             'author' => $authorLink,
                             'age' => $age,
                         ]);
                         ?>
                     </span>
            </p>
        <?php endforeach; ?>
        <?= empty($projectId) === true ? $this->Html->link(__('label_news_view_all'), ['controller' => 'News', 'action'=>'index']) :
            $this->Html->link(__('label_news_view_all'), ['controller' => 'News', 'action'=>'show', 'id'=>$projectId])?>
    </div>
<?php endif; ?>
