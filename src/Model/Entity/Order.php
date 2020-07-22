<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $order_status_id
 * @property int $payment_status_id
 * @property \Cake\I18n\FrozenDate $order_date
 * @property \Cake\I18n\FrozenDate $shipped_date
 * @property \Cake\I18n\FrozenDate $delievery_date
 * @property float $shipping_cost
 * @property float $total_amount
 * @property \Cake\I18n\FrozenDate $due_date
 * @property string $order_number
 * @property string $notes
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\OrderStatus $order_status
 * @property \App\Model\Entity\PaymentStatus $payment_status
 * @property \App\Model\Entity\OrderItem[] $order_items
 * @property \App\Model\Entity\Payment[] $payments
 */
class Order extends Entity
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
        'customer_id' => true,
        'order_status_id' => true,
        'payment_status_id' => true,
        'order_date' => true,
        'shipped_date' => true,
        'delievery_date' => true,
        'shipping_cost' => true,
        'total_amount' => true,
        'due_date' => true,
        'order_number' => true,
        'notes' => true,
        'created' => true,
        'modified' => true,
        'customer' => true,
        'order_status' => true,
        'payment_status' => true,
        'order_items' => true,
        'payments' => true
    ];
}
