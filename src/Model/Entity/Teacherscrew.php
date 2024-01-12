<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Teacherscrew Entity
 *
 * @property int $teachers_id
 * @property int $crews_id
 * @property int $users_id
 *
 * @property \App\Model\Entity\Teacher $teacher
 * @property \App\Model\Entity\Crew $crew
 * @property \App\Model\Entity\User $user
 */
class Teacherscrew extends Entity
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
        'teacher' => true,
        'teachers_id' => true,
        'crew' => true,
        'crews_id' => true,
        'user' => true,
        'status' => true,
    ];
}
