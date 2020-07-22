<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderItemsTaxRulesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderItemsTaxRulesTable Test Case
 */
class OrderItemsTaxRulesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderItemsTaxRulesTable
     */
    public $OrderItemsTaxRules;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.order_items_tax_rules',
        'app.order_items',
        'app.orders',
        'app.customers',
        'app.customer_types',
        'app.addresses',
        'app.states',
        'app.users',
        'app.order_statuses',
        'app.payment_statuses',
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
        $config = TableRegistry::exists('OrderItemsTaxRules') ? [] : ['className' => OrderItemsTaxRulesTable::class];
        $this->OrderItemsTaxRules = TableRegistry::get('OrderItemsTaxRules', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrderItemsTaxRules);

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
