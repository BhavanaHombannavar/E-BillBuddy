<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TaxRules Model
 *
 * @property \App\Model\Table\TaxGroupsTable|\Cake\ORM\Association\BelongsTo $TaxGroups
 * @property \App\Model\Table\OrderItemsTable|\Cake\ORM\Association\BelongsToMany $OrderItems
 *
 * @method \App\Model\Entity\TaxRule get($primaryKey, $options = [])
 * @method \App\Model\Entity\TaxRule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TaxRule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TaxRule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TaxRule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TaxRule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TaxRule findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TaxRulesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('tax_rules');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TaxGroups', [
            'foreignKey' => 'tax_group_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('OrderItems', [
            'foreignKey' => 'tax_rule_id',
            'targetForeignKey' => 'order_item_id',
            'joinTable' => 'order_items_tax_rules'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('percentage')
            ->requirePresence('percentage', 'create')
            ->notEmpty('percentage');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['tax_group_id'], 'TaxGroups'));

        return $rules;
    }
}
