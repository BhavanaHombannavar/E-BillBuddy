<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomerTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomerTypesTable Test Case
 */
class CustomerTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomerTypesTable
     */
    public $CustomerTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customer_types',
        'app.customers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CustomerTypes') ? [] : ['className' => CustomerTypesTable::class];
        $this->CustomerTypes = TableRegistry::get('CustomerTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomerTypes);

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
}
