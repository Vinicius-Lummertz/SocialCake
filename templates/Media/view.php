<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Media $media
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Media'), ['action' => 'edit', $media->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Media'), ['action' => 'delete', $media->id], ['confirm' => __('Are you sure you want to delete # {0}?', $media->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Media'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Media'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="media view content">
            <h3><?= h($media->file_url) ?></h3>
            <table>
                <tr>
                    <th><?= __('Post') ?></th>
                    <td><?= $media->hasValue('post') ? $this->Html->link($media->post->visibility, ['controller' => 'Posts', 'action' => 'view', $media->post->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('File Url') ?></th>
                    <td><?= h($media->file_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('File Type') ?></th>
                    <td><?= h($media->file_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($media->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Position') ?></th>
                    <td><?= $this->Number->format($media->position) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($media->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($media->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>