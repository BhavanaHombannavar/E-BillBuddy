<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaxGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaxGroupsTable Test Case
 */
class TaxGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TaxGroupsTable
     */
    public $TaxGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tax_groups',
        'app.products',
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
        $config = TableRegistry::exists('TaxGroups') ? [] : ['className' => TaxGroupsTable::class];
        $this->TaxGroups = TableRegistry::get('TaxGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TaxGroups);

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
