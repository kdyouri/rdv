<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Rendezvous;
use Cake\Database\Expression\QueryExpression;
use Cake\Error\Debugger;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Rendezvous Model
 *
 * @property \App\Model\Table\PatientsTable&\Cake\ORM\Association\BelongsTo $Patients
 *
 * @method \App\Model\Entity\Rendezvous newEmptyEntity()
 * @method \App\Model\Entity\Rendezvous newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Rendezvous[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rendezvous get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rendezvous findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Rendezvous patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rendezvous[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rendezvous|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rendezvous saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rendezvous[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rendezvous[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rendezvous[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rendezvous[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RendezvousTable extends Table
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

        $this->setTable('rendezvous');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER',
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
            ->nonNegativeInteger('patient_id')
            ->requirePresence('patient_id', 'create')
            ->notEmptyString('patient_id', 'Obligatoire');

        $validator
            ->dateTime('date_heure', ['ymd'], 'Date & heure valide')
            ->requirePresence('date_heure', 'create')
            ->notEmptyDateTime('date_heure', 'Obligatoire');

        $validator
            ->range('duree', [30, 480], 'De 30 à 480')
            ->notEmptyString('duree', 'Obligatoire');

        $validator
            ->scalar('remarque')
            ->allowEmptyString('remarque');

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
        $rules->add($rules->existsIn(['patient_id'], 'Patients'), ['errorField' => 'patient_id']);

        $rules->add([$this, 'neDoitPasChevaucher'], 'neDoitPasChevaucher', [
            'errorField' => 'date_heure',
            'message' => 'Ne doit pas chevaucher un autre rendez-vous'
        ]);

        return $rules;
    }

    /**
     * Règle pour que ça ne chevauche pas avec les autres rendez-vous
     *
     * @param $entity
     * @param $options
     * @return bool
     */
    public function neDoitPasChevaucher(Rendezvous $entity, $options): bool
    {
        // Requête des rendez-vous qui chevauchent :
        $query = $this->find()
            ->where(function (QueryExpression $exp) use ($entity) {
                // Obtenir l'heure de début et l'heure de fin du nouveau rendez-vous :
                $start = $entity->date_heure->toDateTimeString();
                $end = $entity->date_heure->addMinutes($entity->duree)->toDateTimeString();

                // Formuler la condition de ne pas chevaucher :
                $or = $exp->or(['date_heure >=' => $end])
                    ->lte('DATE_ADD(date_heure, INTERVAL duree MINUTE)', $start);

                // Inverser la condition :
                $conditions = $exp->not($or);

                // Exclure ce rendez-vous en cas de modification :
                if (!$entity->isNew()) {
                    $conditions = $conditions->notEq('id', $entity->id);
                }

                return $conditions;
            });
        return ($query->count() == 0);
    }
}
