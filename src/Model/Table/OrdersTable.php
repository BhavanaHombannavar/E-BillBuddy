<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\OrderStatusesTable|\Cake\ORM\Association\BelongsTo $OrderStatuses
 * @property \App\Model\Table\PaymentStatusesTable|\Cake\ORM\Association\BelongsTo $PaymentStatuses
 * @property \App\Model\Table\OrderItemsTable|\Cake\ORM\Association\HasMany $OrderItems
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\HasMany $Payments
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrdersTable extends Table
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

        $this->setTable('orders');
        $this->setDisplayField('order_number');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OrderStatuses', [
            'foreignKey' => 'order_status_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PaymentStatuses', [
            'foreignKey' => 'payment_status_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('OrderItems', [
            'foreignKey' => 'order_id'
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'order_id'
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
            ->date('order_date')
            ->requirePresence('order_date', 'create')
            ->notEmpty('order_date');

        $validator
            ->date('shipped_date')
            ->allowEmpty('shipped_date');

        $validator
            ->date('delievery_date')
            ->allowEmpty('delievery_date');

        $validator
            ->decimal('shipping_cost')
            ->allowEmpty('shipping_cost');

        $validator
            ->decimal('total_amount')
            ->notEmpty('total_amount');

        $validator
            ->date('due_date')
            ->requirePresence('due_date', 'create')
            ->notEmpty('due_date');

        $validator
            ->scalar('order_number')
            ->maxLength('order_number', 50)
            ->requirePresence('order_number', 'create')
            ->notEmpty('order_number');

        $validator
            ->scalar('notes')
            ->allowEmpty('notes');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['order_status_id'], 'OrderStatuses'));
        $rules->add($rules->existsIn(['payment_status_id'], 'PaymentStatuses'));

        return $rules;
    }
}
