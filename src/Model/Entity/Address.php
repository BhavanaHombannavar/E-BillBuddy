<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property string $name
 * @property string $address_line_1
 * @property string $address_line_2
 * @property int $state_id
 * @property string $city
 * @property string $pincode
 * @property string $phone
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\State $state
 */
class Address extends Entity
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
        'name' => true,
        'address_line_1' => true,
        'address_line_2' => true,
        'state_id' => true,
        'city' => true,
        'pincode' => true,
        'phone' => true,
        'created' => true,
        'modified' => true,
        'customer' => true,
        'state' => true
    ];
}
