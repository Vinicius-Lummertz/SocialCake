<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $comment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Comments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Comment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="comments view content">
            <h3><?= h($comment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Post') ?></th>
                    <td><?= $comment->hasValue('post') ? $this->Html->link($comment->post->visibility, ['controller' => 'Posts', 'action' => 'view', $comment->post->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $comment->hasValue('user') ? $this->Html->link($comment->user->name, ['controller' => 'Users', 'action' => 'view', $comment->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Parent Comment') ?></th>
                    <td><?= $comment->hasValue('parent_comment') ? $this->Html->link($comment->parent_comment->id, ['controller' => 'Comments', 'action' => 'view', $comment->parent_comment->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($comment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($comment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($comment->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($comment->content)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Comments') ?></h4>
                <?php if (!empty($comment->child_comments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Post Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Content') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($comment->child_comments as $childComment) : ?>
                        <tr>
                            <td><?= h($childComment->id) ?></td>
                            <td><?= h($childComment->post_id) ?></td>
                            <td><?= h($childComment->user_id) ?></td>
                            <td><?= h($childComment->content) ?></td>
                            <td><?= h($childComment->created) ?></td>
                            <td><?= h($childComment->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $childComment->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $childComment->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Comments', 'action' => 'delete', $childComment->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $childComment->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Notifications') ?></h4>
                <?php if (!empty($comment->notifications)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Actor Id') ?></th>
                            <th><?= __('Post Id') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Message') ?></th>
                            <th><?= __('Is Read') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($comment->notifications as $notification) : ?>
                        <tr>
                            <td><?= h($notification->id) ?></td>
                            <td><?= h($notification->user_id) ?></td>
                            <td><?= h($notification->actor_id) ?></td>
                            <td><?= h($notification->post_id) ?></td>
                            <td><?= h($notification->type) ?></td>
                            <td><?= h($notification->message) ?></td>
                            <td><?= h($notification->is_read) ?></td>
                            <td><?= h($notification->created) ?></td>
                            <td><?= h($notification->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Notifications', 'action' => 'view', $notification->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Notifications', 'action' => 'edit', $notification->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Notifications', 'action' => 'delete', $notification->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $notification->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>