<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Posts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Post'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="posts view content">
            <h3><?= h($post->visibility) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $post->hasValue('user') ? $this->Html->link($post->user->name, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Image Url') ?></th>
                    <td><?= h($post->image_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Visibility') ?></th>
                    <td><?= h($post->visibility) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($post->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Likes Count') ?></th>
                    <td><?= $this->Number->format($post->likes_count) ?></td>
                </tr>
                <tr>
                    <th><?= __('Comments Count') ?></th>
                    <td><?= $this->Number->format($post->comments_count) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($post->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($post->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($post->content)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Tags') ?></h4>
                <?php if (!empty($post->tags)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($post->tags as $tag) : ?>
                        <tr>
                            <td><?= h($tag->id) ?></td>
                            <td><?= h($tag->name) ?></td>
                            <td><?= h($tag->slug) ?></td>
                            <td><?= h($tag->created) ?></td>
                            <td><?= h($tag->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tag->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tag->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Tags', 'action' => 'delete', $tag->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $tag->id),
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
                <h4><?= __('Related Comments') ?></h4>
                <?php if (!empty($post->comments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Parent Id') ?></th>
                            <th><?= __('Content') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($post->comments as $comment) : ?>
                        <tr>
                            <td><?= h($comment->id) ?></td>
                            <td><?= h($comment->user_id) ?></td>
                            <td><?= h($comment->parent_id) ?></td>
                            <td><?= h($comment->content) ?></td>
                            <td><?= h($comment->created) ?></td>
                            <td><?= h($comment->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comment->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comment->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Comments', 'action' => 'delete', $comment->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $comment->id),
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
                <h4><?= __('Related Likes') ?></h4>
                <?php if (!empty($post->likes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($post->likes as $like) : ?>
                        <tr>
                            <td><?= h($like->id) ?></td>
                            <td><?= h($like->user_id) ?></td>
                            <td><?= h($like->created) ?></td>
                            <td><?= h($like->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Likes', 'action' => 'view', $like->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Likes', 'action' => 'edit', $like->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Likes', 'action' => 'delete', $like->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $like->id),
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
                <h4><?= __('Related Media') ?></h4>
                <?php if (!empty($post->media)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('File Url') ?></th>
                            <th><?= __('File Type') ?></th>
                            <th><?= __('Position') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($post->media as $media) : ?>
                        <tr>
                            <td><?= h($media->id) ?></td>
                            <td><?= h($media->file_url) ?></td>
                            <td><?= h($media->file_type) ?></td>
                            <td><?= h($media->position) ?></td>
                            <td><?= h($media->created) ?></td>
                            <td><?= h($media->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Media', 'action' => 'view', $media->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Media', 'action' => 'edit', $media->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Media', 'action' => 'delete', $media->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $media->id),
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
                <?php if (!empty($post->notifications)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Actor Id') ?></th>
                            <th><?= __('Comment Id') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Message') ?></th>
                            <th><?= __('Is Read') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($post->notifications as $notification) : ?>
                        <tr>
                            <td><?= h($notification->id) ?></td>
                            <td><?= h($notification->user_id) ?></td>
                            <td><?= h($notification->actor_id) ?></td>
                            <td><?= h($notification->comment_id) ?></td>
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