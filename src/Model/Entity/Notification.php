<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notification Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $actor_id
 * @property int|null $post_id
 * @property int|null $comment_id
 * @property string $type
 * @property string|null $message
 * @property bool $is_read
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\User $actor
 * @property \App\Model\Entity\Post $post
 * @property \App\Model\Entity\Comment $comment
 */
class Notification extends Entity
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
        'user_id' => true,
        'actor_id' => true,
        'post_id' => true,
        'comment_id' => true,
        'type' => true,
        'message' => true,
        'is_read' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'actor' => true,
        'post' => true,
        'comment' => true,
    ];
}
