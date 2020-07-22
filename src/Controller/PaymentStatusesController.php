<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PaymentStatuses Controller
 *
 * @property \App\Model\Table\PaymentStatusesTable $PaymentStatuses
 *
 * @method \App\Model\Entity\PaymentStatus[] paginate($object = null, array $settings = [])
 */
class PaymentStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     
    public function index()
    {
        $paymentStatuses = $this->paginate($this->PaymentStatuses);

        $this->set(compact('paymentStatuses'));
        $this->set('_serialize', ['paymentStatuses']);
    }*/

    /**
     * View method
     *
     * @param string|null $id Payment Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentStatus = $this->PaymentStatuses->get($id, [
            'contain' => ['Orders']
        ]);

        $this->set('paymentStatus', $paymentStatus);
        $this->set('_serialize', ['paymentStatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentStatus = $this->PaymentStatuses->newEntity();
        if ($this->request->is('post')) {
            $paymentStatus = $this->PaymentStatuses->patchEntity($paymentStatus, $this->request->getData());
            if ($this->PaymentStatuses->save($paymentStatus)) {
                $this->Flash->success(__('The payment status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment status could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentStatus'));
        $this->set('_serialize', ['paymentStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentStatus = $this->PaymentStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentStatus = $this->PaymentStatuses->patchEntity($paymentStatus, $this->request->getData());
            if ($this->PaymentStatuses->save($paymentStatus)) {
                $this->Flash->success(__('The payment status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment status could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentStatus'));
        $this->set('_serialize', ['paymentStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentStatus = $this->PaymentStatuses->get($id);
        if ($this->PaymentStatuses->delete($paymentStatus)) {
            $this->Flash->success(__('The payment status has been deleted.'));
        } else {
            $this->Flash->error(__('The payment status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
