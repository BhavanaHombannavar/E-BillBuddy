<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrderStatuses Controller
 *
 * @property \App\Model\Table\OrderStatusesTable $OrderStatuses
 *
 * @method \App\Model\Entity\OrderStatus[] paginate($object = null, array $settings = [])
 */
class OrderStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     
    public function index()
    {
        $orderStatuses = $this->paginate($this->OrderStatuses);

        $this->set(compact('orderStatuses'));
        $this->set('_serialize', ['orderStatuses']);
    }*/

    /**
     * View method
     *
     * @param string|null $id Order Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderStatus = $this->OrderStatuses->get($id, [
            'contain' => ['Orders']
        ]);

        $this->set('orderStatus', $orderStatus);
        $this->set('_serialize', ['orderStatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderStatus = $this->OrderStatuses->newEntity();
        if ($this->request->is('post')) {
            $orderStatus = $this->OrderStatuses->patchEntity($orderStatus, $this->request->getData());
            if ($this->OrderStatuses->save($orderStatus)) {
                $this->Flash->success(__('The order status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order status could not be saved. Please, try again.'));
        }
        $this->set(compact('orderStatus'));
        $this->set('_serialize', ['orderStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderStatus = $this->OrderStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderStatus = $this->OrderStatuses->patchEntity($orderStatus, $this->request->getData());
            if ($this->OrderStatuses->save($orderStatus)) {
                $this->Flash->success(__('The order status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order status could not be saved. Please, try again.'));
        }
        $this->set(compact('orderStatus'));
        $this->set('_serialize', ['orderStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderStatus = $this->OrderStatuses->get($id);
        if ($this->OrderStatuses->delete($orderStatus)) {
            $this->Flash->success(__('The order status has been deleted.'));
        } else {
            $this->Flash->error(__('The order status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
