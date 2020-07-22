<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\Core\Configure;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 *
 * @method \App\Model\Entity\Order[] paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Users');

        $order = $this->Orders->get($id, [
            'contain' => ['Customers.Addresses.States', 'OrderStatuses', 'PaymentStatuses', 'OrderItems.Products', 'OrderItems.TaxRules.TaxGroups', 'Payments.PaymentMethods']
        ]);

        $user = $this->Users->get($this->Auth->user('id'));
        $state = $this->Users->States->get($this->Auth->user('state_id'));
         // pr($order);die();

        $this->viewBuilder()->options([
            'pdfConfig' => [
                'engine' => 'CakePdf.Mpdf',
                'orientation' => 'portrait',
                'filename' => 'Invoice_' . $order->order_number . '.pdf'
            ]
        ]);

        $this->set(compact('order', 'user', 'state'));
        $this->set('_serialize', ['order']);
    }

    public function newPayment($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Customers.Addresses.States', 'Payments']
        ]);
        // pr($order);die();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        
        $paymentMethods = $this->Orders->Payments->PaymentMethods->find('list', ['limit' => 200]);
        $paymentStatuses = $this->Orders->PaymentStatuses->find('list', ['limit' => 200]);
        $this->set(compact('order', 'paymentStatuses', 'paymentMethods'));
        $this->set('_serialize', ['order']);
    }

    public function quickOrder()
    {
        $order = $this->Orders->newEntity();

        if ($this->request->is('post')) {
            $this->loadModel('Settings');

            $curOrdNum = (int)Configure::read('order_num_current');
            $ordNumPadding = (int)Configure::read('order_num_padding');
            $orderNum = str_pad($curOrdNum, $ordNumPadding, "0", STR_PAD_LEFT);

            $data = $this->request->getData();
            $data['order_number'] = $orderNum;
            $data['order_date'] = (new Date($data['order_date']))->format('Y-m-d');
            $data['due_date'] = (new Date($data['due_date']))->format('Y-m-d');
            $data['payments'][0]['payment_date'] = (new Date())->format('Y-m-d');

            if ($data['customer_id']) {
                unset($data['customer']);
            } else {
                unset($data['customer_id']);
            }

            if ($data['payments'][0]['amount'] == 0) {
                unset($data['payments']);
            }

            // pr($data);
            $order = $this->Orders->patchEntity($order, $data, ['associated' => ['Payments', 'OrderItems.TaxRules', 'Customers.Addresses']]);
            // pr($order);die();

            if ($this->Orders->save($order)) {
                $curOrdNum += 1;
                Configure::write('order_num_current', $curOrdNum);
                $setting = $this->Settings->find('all', ['conditions' => ['name' => 'order_num_current']])->first();
                $setting->value = $curOrdNum;
                $this->Settings->save($setting);

                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }

        $date = new Date();
        $duedate = new Date();
        $duedate->modify('+30 days');

        $order->order_date = $date->format('m/d/Y');
        $order->due_date = $duedate->format('m/d/Y');

        $orderStatuses = $this->Orders->OrderStatuses->find('list', ['limit' => 200]);
        $paymentStatuses = $this->Orders->PaymentStatuses->find('list', ['limit' => 200]);
        $customerTypes = $this->Orders->Customers->CustomerTypes->find('list', ['limit' => 200]);
        $paymentMethods = $this->Orders->Payments->PaymentMethods->find('list', ['limit' => 200]);
        $states = $this->Orders->Customers->Addresses->States->find('list', ['limit' => 200]);
        $this->set(compact('order', 'customers', 'customerTypes', 'states', 'orderStatuses', 'paymentStatuses', 'paymentMethods'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'OrderStatuses', 'PaymentStatuses']
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        // pr($customerTypes);die();
        $customers = $this->Orders->Customers->find('list', ['limit' => 200]);
        $orderStatuses = $this->Orders->OrderStatuses->find('list', ['limit' => 200]);
        $paymentStatuses = $this->Orders->PaymentStatuses->find('list', ['limit' => 200]);
        $this->set(compact('order', 'customers', 'orderStatuses', 'paymentStatuses'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
   /* public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $customers = $this->Orders->Customers->find('list', ['limit' => 200]);
        $orderStatuses = $this->Orders->OrderStatuses->find('list', ['limit' => 200]);
        $paymentStatuses = $this->Orders->PaymentStatuses->find('list', ['limit' => 200]);
        $this->set(compact('order', 'customers', 'orderStatuses', 'paymentStatuses'));
        $this->set('_serialize', ['order']);
    }*/

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
