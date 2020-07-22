<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaymentStatusesTable Test Case
 */
class PaymentStatusesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PaymentStatusesTable
     */
    public $PaymentStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.payment_statuses',
        'app.orders',
        'app.customers',
        'app.customer_types',
        'app.addresses',
        'app.states',
        'app.order_statuses',
        'app.order_items',
        'app.prouducts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PaymentStatuses') ? [] : ['className' => PaymentStatusesTable::class];
        $this->PaymentStatuses = TableRegistry::get('PaymentStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PaymentStatuses);

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
