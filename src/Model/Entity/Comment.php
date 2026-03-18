<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comment Entity
 *
 * @property int $id
 * @property int $post_id
 * @property int $user_id
 * @property int|null $parent_id
 * @property string $content
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Post $post
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ParentComment $parent_comment
 * @property \App\Model\Entity\ChildComment[] $child_comments
 * @property \App\Model\Entity\Notification[] $notifications
 */
class Comment extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'post_id' => true,
        'user_id' => true,
        'parent_id' => true,
        'content' => true,
        'created' => true,
        'modified' => true,
        'post' => true,
        'user' => true,
        'parent_comment' => true,
        'child_comments' => true,
        'notifications' => true,
    ];
}
