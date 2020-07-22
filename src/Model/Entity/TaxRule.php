<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TaxRule Entity
 *
 * @property int $id
 * @property int $tax_group_id
 * @property string $name
 * @property int $percentage
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\TaxGroup $tax_group
 * @property \App\Model\Entity\OrderItem[] $order_items
 */
class TaxRule extends Entity
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
        'tax_group_id' => true,
        'name' => true,
        'percentage' => true,
        'created' => true,
        'modified' => true,
        'tax_group' => true,
        'order_items' => true
    ];
}
