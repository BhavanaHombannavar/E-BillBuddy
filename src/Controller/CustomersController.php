<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 *
 * @method \App\Model\Entity\Customer[] paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CustomerTypes', 'Addresses', 'Addresses.States']
        ];
        $customers = $this->paginate($this->Customers);

        $this->set(compact('customers'));
        $this->set('_serialize', ['customers']);
    }

    public function getActiveCustomers()
    {
        $this->paginate = [
            'contain' => ['CustomerTypes', 'Addresses', 'Addresses.States'],
            'conditions' => ['active' => 1]
        ];
        $customers = $this->paginate($this->Customers);

        $this->set(compact('customers'));
        $this->set('_serialize', ['customers']);
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['CustomerTypes', 'Orders.OrderStatuses', 'Orders.PaymentStatuses']
        ]);

        $this->set('customer', $customer);
        $this->set('_serialize', ['customer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            // pr($this->request->getData());die();
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $states = $this->Customers->Addresses->States->find('list', ['limit' => 200]);
        $customerTypes = $this->Customers->CustomerTypes->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'customerTypes', 'states'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Addresses']
        ]);
        // pr($customer); die();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $customer = $this->Customers->patchEntity($customer, $data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                if (isset($data['update'])) {
                    return $this->redirect(['action' => 'index']);
                } else {
                    return $this->redirect(['action' => 'edit', $id]);
                }
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $states = $this->Customers->Addresses->States->find('list', ['limit' => 200]);
        $customerTypes = $this->Customers->CustomerTypes->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'customerTypes', 'states'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
