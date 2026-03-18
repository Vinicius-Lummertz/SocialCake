<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Like $like
 * @var \Cake\Collection\CollectionInterface|string[] $posts
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Likes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="likes form content">
            <?= $this->Form->create($like) ?>
            <fieldset>
                <legend><?= __('Add Like') ?></legend>
                <?php
                    echo $this->Form->control('post_id', ['options' => $posts]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
