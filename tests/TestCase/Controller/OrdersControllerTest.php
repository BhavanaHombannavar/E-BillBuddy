<?php
namespace App\Test\TestCase\Controller;

use App\Controller\OrdersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\OrdersController Test Case
 */
class OrdersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.orders',
        'app.customers',
        'app.customer_types',
        'app.addresses',
        'app.states',
        'app.order_statuses',
        'app.payment_statuses',
        'app.order_items',
        'app.prouducts'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
