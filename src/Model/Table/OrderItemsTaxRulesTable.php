<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderItemsTaxRules Model
 *
 * @property \App\Model\Table\OrderItemsTable|\Cake\ORM\Association\BelongsTo $OrderItems
 * @property \App\Model\Table\TaxRulesTable|\Cake\ORM\Association\BelongsTo $TaxRules
 *
 * @method \App\Model\Entity\OrderItemsTaxRule get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrderItemsTaxRule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrderItemsTaxRule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrderItemsTaxRule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrderItemsTaxRule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrderItemsTaxRule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrderItemsTaxRule findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrderItemsTaxRulesTable extends Table
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

        $this->setTable('order_items_tax_rules');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('OrderItems', [
            'foreignKey' => 'order_item_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TaxRules', [
            'foreignKey' => 'tax_rule_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['order_item_id'], 'OrderItems'));
        $rules->add($rules->existsIn(['tax_rule_id'], 'TaxRules'));

        return $rules;
    }
}
