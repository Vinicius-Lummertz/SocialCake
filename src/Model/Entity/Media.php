<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Media Entity
 *
 * @property int $id
 * @property int $post_id
 * @property string $file_url
 * @property string $file_type
 * @property int $position
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Post $post
 */
class Media extends Entity
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
        'file_url' => true,
        'file_type' => true,
        'position' => true,
        'created' => true,
        'modified' => true,
        'post' => true,
    ];
}
