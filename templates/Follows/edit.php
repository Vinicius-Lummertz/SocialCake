<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Follow $follow
 * @var string[]|\Cake\Collection\CollectionInterface $followers
 * @var string[]|\Cake\Collection\CollectionInterface $followeds
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $follow->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $follow->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Follows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="follows form content">
            <?= $this->Form->create($follow) ?>
            <fieldset>
                <legend><?= __('Edit Follow') ?></legend>
                <?php
                    echo $this->Form->control('follower_id', ['options' => $followers]);
                    echo $this->Form->control('followed_id', ['options' => $followeds]);
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
