<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Media> $media
 */
?>
<div class="media index content">
    <?= $this->Html->link(__('New Media'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Media') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('post_id') ?></th>
                    <th><?= $this->Paginator->sort('file_url') ?></th>
                    <th><?= $this->Paginator->sort('file_type') ?></th>
                    <th><?= $this->Paginator->sort('position') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($media as $media): ?>
                <tr>
                    <td><?= $this->Number->format($media->id) ?></td>
                    <td><?= $media->hasValue('post') ? $this->Html->link($media->post->visibility, ['controller' => 'Posts', 'action' => 'view', $media->post->id]) : '' ?></td>
                    <td><?= h($media->file_url) ?></td>
                    <td><?= h($media->file_type) ?></td>
                    <td><?= $this->Number->format($media->position) ?></td>
                    <td><?= h($media->created) ?></td>
                    <td><?= h($media->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $media->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $media->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $media->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $media->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>