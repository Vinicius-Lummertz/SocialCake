<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notification $notification
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $actors
 * @var string[]|\Cake\Collection\CollectionInterface $posts
 * @var string[]|\Cake\Collection\CollectionInterface $comments
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $notification->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $notification->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Notifications'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="notifications form content">
            <?= $this->Form->create($notification) ?>
            <fieldset>
                <legend><?= __('Edit Notification') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('actor_id', ['options' => $actors, 'empty' => true]);
                    echo $this->Form->control('post_id', ['options' => $posts, 'empty' => true]);
                    echo $this->Form->control('comment_id', ['options' => $comments, 'empty' => true]);
                    echo $this->Form->control('type');
                    echo $this->Form->control('message');
                    echo $this->Form->control('is_read');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
