<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rendezvous Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property \Cake\I18n\FrozenTime $date_heure
 * @property int $duree
 * @property string $remarque
 *
 * @property \App\Model\Entity\Patient $patient
 */
class Rendezvous extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'patient_id' => true,
        'date_heure' => true,
        'duree' => true,
        'remarque' => true,
        'patient' => true,
    ];
}
