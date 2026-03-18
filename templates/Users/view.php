<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Avatar Url') ?></th>
                    <td><?= h($user->avatar_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Profile') ?></th>
                    <td><?= $user->hasValue('profile') ? $this->Html->link($user->profile->id, ['controller' => 'Profiles', 'action' => 'view', $user->profile->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Birthdate') ?></th>
                    <td><?= h($user->birthdate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $user->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Bio') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->bio)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Comments') ?></h4>
                <?php if (!empty($user->comments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Post Id') ?></th>
                            <th><?= __('Parent Id') ?></th>
                            <th><?= __('Content') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->comments as $comment) : ?>
                        <tr>
                            <td><?= h($comment->id) ?></td>
                            <td><?= h($comment->post_id) ?></td>
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
                <?php if (!empty($user->likes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Post Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->likes as $like) : ?>
                        <tr>
                            <td><?= h($like->id) ?></td>
                            <td><?= h($like->post_id) ?></td>
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
                <h4><?= __('Related Notifications') ?></h4>
                <?php if (!empty($user->notifications)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Actor Id') ?></th>
                            <th><?= __('Post Id') ?></th>
                            <th><?= __('Comment Id') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Message') ?></th>
                            <th><?= __('Is Read') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->notifications as $notification) : ?>
                        <tr>
                            <td><?= h($notification->id) ?></td>
                            <td><?= h($notification->actor_id) ?></td>
                            <td><?= h($notification->post_id) ?></td>
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
            <div class="related">
                <h4><?= __('Related Posts') ?></h4>
                <?php if (!empty($user->posts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Content') ?></th>
                            <th><?= __('Image Url') ?></th>
                            <th><?= __('Visibility') ?></th>
                            <th><?= __('Likes Count') ?></th>
                            <th><?= __('Comments Count') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->posts as $post) : ?>
                        <tr>
                            <td><?= h($post->id) ?></td>
                            <td><?= h($post->content) ?></td>
                            <td><?= h($post->image_url) ?></td>
                            <td><?= h($post->visibility) ?></td>
                            <td><?= h($post->likes_count) ?></td>
                            <td><?= h($post->comments_count) ?></td>
                            <td><?= h($post->created) ?></td>
                            <td><?= h($post->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $post->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $post->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Posts', 'action' => 'delete', $post->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $post->id),
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