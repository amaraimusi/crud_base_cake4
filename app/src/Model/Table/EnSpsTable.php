<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EnSps Model
 *
 * @property \App\Model\Table\BioClsTable&\Cake\ORM\Association\BelongsTo $BioCls
 * @property \App\Model\Table\EnCtgsTable&\Cake\ORM\Association\BelongsTo $EnCtgs
 * @property \App\Model\Table\NekosTable&\Cake\ORM\Association\HasMany $Nekos
 *
 * @method \App\Model\Entity\EnSp newEmptyEntity()
 * @method \App\Model\Entity\EnSp newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EnSp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EnSp get($primaryKey, $options = [])
 * @method \App\Model\Entity\EnSp findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EnSp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EnSp[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EnSp|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EnSp saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EnSp[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EnSp[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EnSp[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EnSp[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EnSpsTable extends Table
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

        $this->setTable('en_sps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('BioCls', [
            'foreignKey' => 'bio_cls_id',
        ]);
        $this->belongsTo('EnCtgs', [
            'foreignKey' => 'en_ctg_id',
        ]);
        $this->hasMany('Nekos', [
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
            ->scalar('family_name')
            ->maxLength('family_name', 255)
            ->allowEmptyString('family_name');

        $validator
            ->scalar('wamei')
            ->maxLength('wamei', 255)
            ->allowEmptyString('wamei');

        $validator
            ->scalar('scien_name')
            ->maxLength('scien_name', 225)
            ->allowEmptyString('scien_name');

        $validator
            ->allowEmptyString('endemic_sp_flg');

        $validator
            ->scalar('note')
            ->requirePresence('note', 'create')
            ->notEmptyString('note');

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
        $rules->add($rules->existsIn('bio_cls_id', 'BioCls'), ['errorField' => 'bio_cls_id']);
        $rules->add($rules->existsIn('en_ctg_id', 'EnCtgs'), ['errorField' => 'en_ctg_id']);

        return $rules;
    }
}
