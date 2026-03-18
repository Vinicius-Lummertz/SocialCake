<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PostsTag> $postsTags
 */
?>
<div class="postsTags index content">
    <?= $this->Html->link(__('New Posts Tag'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Posts Tags') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('post_id') ?></th>
                    <th><?= $this->Paginator->sort('tag_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($postsTags as $postsTag): ?>
                <tr>
                    <td><?= $this->Number->format($postsTag->id) ?></td>
                    <td><?= $postsTag->hasValue('post') ? $this->Html->link($postsTag->post->visibility, ['controller' => 'Posts', 'action' => 'view', $postsTag->post->id]) : '' ?></td>
                    <td><?= $postsTag->hasValue('tag') ? $this->Html->link($postsTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $postsTag->tag->id]) : '' ?></td>
                    <td><?= h($postsTag->created) ?></td>
                    <td><?= h($postsTag->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $postsTag->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $postsTag->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $postsTag->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $postsTag->id),
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