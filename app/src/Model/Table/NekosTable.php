<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nekos Model
 *
 * @property \App\Model\Table\EnSpsTable&\Cake\ORM\Association\BelongsTo $EnSps
 *
 * @method \App\Model\Entity\Neko newEmptyEntity()
 * @method \App\Model\Entity\Neko newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Neko[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Neko get($primaryKey, $options = [])
 * @method \App\Model\Entity\Neko findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Neko patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Neko[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Neko|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Neko saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Neko[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Neko[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Neko[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Neko[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NekosTable extends Table
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

        $this->setTable('nekos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('EnSps', [
            'foreignKey' => 'en_sp_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('neko_val')
            ->allowEmptyString('neko_val');

        $validator
            ->scalar('neko_name')
            ->maxLength('neko_name', 255)
            ->allowEmptyString('neko_name');

        $validator
            ->date('neko_date')
            ->allowEmptyDate('neko_date');

        $validator
            ->integer('neko_group')
            ->allowEmptyString('neko_group');

        $validator
            ->dateTime('neko_dt')
            ->allowEmptyDateTime('neko_dt');

        $validator
            ->allowEmptyString('neko_flg');

        $validator
            ->scalar('img_fn')
            ->maxLength('img_fn', 256)
            ->allowEmptyString('img_fn');

        $validator
            ->scalar('note')
            ->allowEmptyString('note');

        $validator
            ->integer('sort_no')
            ->allowEmptyString('sort_no');

        $validator
            ->boolean('delete_flg')
            ->allowEmptyString('delete_flg');

        $validator
            ->scalar('update_user')
            ->maxLength('update_user', 50)
            ->allowEmptyString('update_user');

        $validator
            ->scalar('ip_addr')
            ->maxLength('ip_addr', 40)
            ->allowEmptyString('ip_addr');

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
        $rules->add($rules->existsIn('en_sp_id', 'EnSps'), ['errorField' => 'en_sp_id']);

        return $rules;
    }
}
