<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PaymentMethods Controller
 *
 * @property \App\Model\Table\PaymentMethodsTable $PaymentMethods
 *
 * @method \App\Model\Entity\PaymentMethod[] paginate($object = null, array $settings = [])
 */
class PaymentMethodsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     
    public function index()
    {
        $paymentMethods = $this->paginate($this->PaymentMethods);

        $this->set(compact('paymentMethods'));
        $this->set('_serialize', ['paymentMethods']);
    }*/

    /**
     * View method
     *
     * @param string|null $id Payment Method id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentMethod = $this->PaymentMethods->get($id, [
            'contain' => []
        ]);

        $this->set('paymentMethod', $paymentMethod);
        $this->set('_serialize', ['paymentMethod']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentMethod = $this->PaymentMethods->newEntity();
        if ($this->request->is('post')) {
            $paymentMethod = $this->PaymentMethods->patchEntity($paymentMethod, $this->request->getData());
            if ($this->PaymentMethods->save($paymentMethod)) {
                $this->Flash->success(__('The payment method has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment method could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentMethod'));
        $this->set('_serialize', ['paymentMethod']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment Method id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentMethod = $this->PaymentMethods->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentMethod = $this->PaymentMethods->patchEntity($paymentMethod, $this->request->getData());
            if ($this->PaymentMethods->save($paymentMethod)) {
                $this->Flash->success(__('The payment method has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment method could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentMethod'));
        $this->set('_serialize', ['paymentMethod']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment Method id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentMethod = $this->PaymentMethods->get($id);
        if ($this->PaymentMethods->delete($paymentMethod)) {
            $this->Flash->success(__('The payment method has been deleted.'));
        } else {
            $this->Flash->error(__('The payment method could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
