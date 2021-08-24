<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Patients Model
 *
 * @property \App\Model\Table\RendezvousTable&\Cake\ORM\Association\HasMany $Rendezvous
 *
 * @method \App\Model\Entity\Patient newEmptyEntity()
 * @method \App\Model\Entity\Patient newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Patient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Patient get($primaryKey, $options = [])
 * @method \App\Model\Entity\Patient findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Patient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Patient[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Patient|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PatientsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('patients');
        $this->setDisplayField('label');
        $this->setPrimaryKey('id');

        $this->hasMany('Rendezvous', [
            'foreignKey' => 'patient_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('prenom')
            ->maxLength('prenom', 50)
            ->requirePresence('prenom', 'create')
            ->notEmptyString('prenom', 'Obligatoire');

        $validator
            ->scalar('nom')
            ->maxLength('nom', 50)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom', 'Obligatoire');

        $validator
            ->scalar('cin')
            ->regex('cin', '/^[A-Z]{1,2}[0-9]{1,8}$/', 'CIN valide')
            ->requirePresence('cin', 'create')
            ->notEmptyString('cin', 'Obligatoire');

        $validator
            ->email('email', false, 'E-mail valide')
            ->allowEmptyString('email');

        $validator
            ->scalar('telephone')
            ->numeric('telephone', 'Numérique')
            ->allowEmptyString('telephone')
            ->maxLength('telephone', 10);

        $validator
            ->date('date_naissance', ['ymd'], 'Date valide')
            ->allowEmptyString('date_naissance');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(
            ['prenom', 'nom', 'cin'],
            'Cette combinaison prénom, nom & CIN a déjà été utilisée'
        ));

        return $rules;
    }

    /**
     * @param $event
     * @param $query
     * @param $options
     * @param $primary
     */
    public function beforeFind($event, $query, $options, $primary)
    {
        // Ordre par defaut :
        $order = $query->clause('order');
        if ($order === null || !count($order)) {
            $query->order([$this->_alias . '.nom' => 'asc']);
        }
    }
}
