<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomersTable Test Case
 */
class CustomersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomersTable
     */
    public $Customers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customers',
        'app.customer_types',
        'app.addresses',
        'app.states',
        'app.orders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Customers') ? [] : ['className' => CustomersTable::class];
        $this->Customers = TableRegistry::get('Customers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Customers);

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
