<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patient Entity
 *
 * @property int $id
 * @property string $prenom
 * @property string $nom
 * @property string $cin
 * @property string $email
 * @property string $telephone
 * @property \Cake\I18n\FrozenDate $date_naissance
 *
 * @property \App\Model\Entity\Rendezvous[] $rendezvous
 */
class Patient extends Entity
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
        'prenom' => true,
        'nom' => true,
        'cin' => true,
        'email' => true,
        'telephone' => true,
        'date_naissance' => true,
        'rendezvous' => true,
    ];

    protected function _getLabel()
    {
        return sprintf('%s, %s (%s)', $this->_fields['prenom'], $this->_fields['nom'], $this->_fields['cin']);
    }
}
