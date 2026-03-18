<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $content
 * @property string|null $image_url
 * @property string $visibility
 * @property int $likes_count
 * @property int $comments_count
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Like[] $likes
 * @property \App\Model\Entity\Media[] $media
 * @property \App\Model\Entity\Notification[] $notifications
 * @property \App\Model\Entity\Tag[] $tags
 */
class Post extends Entity
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
        'content' => true,
        'image_url' => true,
        'visibility' => true,
        'likes_count' => true,
        'comments_count' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'comments' => true,
        'likes' => true,
        'media' => true,
        'notifications' => true,
        'tags' => true,
    ];
}
