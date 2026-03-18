<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Follow Entity
 *
 * @property int $id
 * @property int $follower_id
 * @property int $followed_id
 * @property string $status
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\User $follower
 * @property \App\Model\Entity\User $followed
 */
class Follow extends Entity
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
        'follower_id' => true,
        'followed_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'follower' => true,
        'followed' => true,
    ];
}
