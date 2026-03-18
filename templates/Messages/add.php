<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 * @var \Cake\Collection\CollectionInterface|string[] $senders
 * @var \Cake\Collection\CollectionInterface|string[] $receivers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Messages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="messages form content">
            <?= $this->Form->create($message) ?>
            <fieldset>
                <legend><?= __('Add Message') ?></legend>
                <?php
                    echo $this->Form->control('sender_id', ['options' => $senders]);
                    echo $this->Form->control('receiver_id', ['options' => $receivers]);
                    echo $this->Form->control('content');
                    echo $this->Form->control('is_read');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
