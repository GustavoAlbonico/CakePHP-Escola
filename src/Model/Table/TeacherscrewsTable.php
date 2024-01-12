<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Teacherscrews Model
 *
 * @property \App\Model\Table\TeachersTable&\Cake\ORM\Association\BelongsTo $Teachers
 * @property \App\Model\Table\CrewsTable&\Cake\ORM\Association\BelongsTo $Crews
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Teacherscrew newEmptyEntity()
 * @method \App\Model\Entity\Teacherscrew newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Teacherscrew[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Teacherscrew get($primaryKey, $options = [])
 * @method \App\Model\Entity\Teacherscrew findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Teacherscrew patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Teacherscrew[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Teacherscrew|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Teacherscrew saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Teacherscrew[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Teacherscrew[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Teacherscrew[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Teacherscrew[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TeacherscrewsTable extends Table
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

        $this->setTable('teacherscrews');
        // $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Teachers', [
            'foreignKey' => 'teachers_id',
        ]);
        $this->belongsTo('Crews', [
            'foreignKey' => 'crews_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',

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
            ->integer('status')
            ->notEmptyString('status');

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
        $rules->add($rules->existsIn('teachers_id', 'Teachers'), ['errorField' => 'teachers_id']);
        $rules->add($rules->existsIn('crews_id', 'Crews'), ['errorField' => 'crews_id']);
        $rules->add($rules->existsIn('users_id', 'Users'), ['errorField' => 'users_id']);

        return $rules;
    }
}
