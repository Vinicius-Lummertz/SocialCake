<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Follow $follow
 * @var \Cake\Collection\CollectionInterface|string[] $followers
 * @var \Cake\Collection\CollectionInterface|string[] $followeds
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Follows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="follows form content">
            <?= $this->Form->create($follow) ?>
            <fieldset>
                <legend><?= __('Add Follow') ?></legend>
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
