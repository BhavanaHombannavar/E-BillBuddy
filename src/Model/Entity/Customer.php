<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property int $customer_type_id
 * @property string $name
 * @property string $email
 * @property string $gstin
 * @property bool $active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\CustomerType $customer_type
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\Order[] $orders
 */
class Customer extends Entity
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
        'customer_type_id' => true,
        'name' => true,
        'email' => true,
        'gstin' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'customer_type' => true,
        'addresses' => true,
        'orders' => true
    ];
}
