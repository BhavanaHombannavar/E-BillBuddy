<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaxRulesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaxRulesTable Test Case
 */
class TaxRulesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TaxRulesTable
     */
    public $TaxRules;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tax_rules',
        'app.tax_groups',
        'app.products',
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
        'app.order_items_tax_rules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TaxRules') ? [] : ['className' => TaxRulesTable::class];
        $this->TaxRules = TableRegistry::get('TaxRules', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TaxRules);

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
