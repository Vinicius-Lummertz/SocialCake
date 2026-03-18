<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property int $sender_id
 * @property int $receiver_id
 * @property string $content
 * @property bool $is_read
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\User $sender
 * @property \App\Model\Entity\User $receiver
 */
class Message extends Entity
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
        'sender_id' => true,
        'receiver_id' => true,
        'content' => true,
        'is_read' => true,
        'created' => true,
        'modified' => true,
        'sender' => true,
        'receiver' => true,
    ];
}
