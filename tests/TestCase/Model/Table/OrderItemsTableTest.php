<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderItemsTable Test Case
 */
class OrderItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderItemsTable
     */
    public $OrderItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.order_items',
        'app.orders',
        'app.customers',
        'app.customer_types',
        'app.addresses',
        'app.states',
        'app.users',
        'app.order_statuses',
        'app.payment_statuses',
        'app.payments',
        'app.payment_methods',
        'app.products',
        'app.tax_groups',
        'app.tax_rules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OrderItems') ? [] : ['className' => OrderItemsTable::class];
        $this->OrderItems = TableRegistry::get('OrderItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrderItems);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
