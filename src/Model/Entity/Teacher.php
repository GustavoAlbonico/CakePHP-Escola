<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Teacher Entity
 *
 * @property int $id
 * @property string $name
 * @property string $disciplina
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int|null $modified_by
 * @property int $users_id
 *
 * @property \App\Model\Entity\User $user
 */
class Teacher extends Entity
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
    protected $_accessible = [
        'name' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'modified_by' => true,
        'subjects_id' => true,
        'subject' => true,
        'user' => true,
    ];
}
