<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;


/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string|null $bio
 * @property string|null $avatar_url
 * @property \Cake\I18n\Date|null $birthdate
 * @property bool $is_active
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Profile $profile
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Like[] $likes
 * @property \App\Model\Entity\Notification[] $notifications
 * @property \App\Model\Entity\Post[] $posts
 */
class User extends Entity
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
        'name' => true,
        'username' => true,
        'email' => true,
        'password' => true,
        'bio' => true,
        'avatar_url' => true,
        'birthdate' => true,
        'is_active' => true,
        'created' => true,
        'modified' => true,
        'profile' => true,
        'comments' => true,
        'likes' => true,
        'notifications' => true,
        'posts' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected array $_hidden = [
        'password',
    ];

    protected function _setPassword(?string $password): ?string
    {
        if (strlen((string)$password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }

        return $password;
    }
}
