<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomerTypes Controller
 *
 * @property \App\Model\Table\CustomerTypesTable $CustomerTypes
 *
 * @method \App\Model\Entity\CustomerType[] paginate($object = null, array $settings = [])
 */
class CustomerTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     
    public function index()
    {
        $customerTypes = $this->paginate($this->CustomerTypes);

        $this->set(compact('customerTypes'));
        $this->set('_serialize', ['customerTypes']);
    }*/

    /**
     * View method
     *
     * @param string|null $id Customer Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customerType = $this->CustomerTypes->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('customerType', $customerType);
        $this->set('_serialize', ['customerType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customerType = $this->CustomerTypes->newEntity();
        if ($this->request->is('post')) {
            $customerType = $this->CustomerTypes->patchEntity($customerType, $this->request->getData());
            if ($this->CustomerTypes->save($customerType)) {
                $this->Flash->success(__('The customer type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer type could not be saved. Please, try again.'));
        }
        $this->set(compact('customerType'));
        $this->set('_serialize', ['customerType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customerType = $this->CustomerTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customerType = $this->CustomerTypes->patchEntity($customerType, $this->request->getData());
            if ($this->CustomerTypes->save($customerType)) {
                $this->Flash->success(__('The customer type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer type could not be saved. Please, try again.'));
        }
        $this->set(compact('customerType'));
        $this->set('_serialize', ['customerType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customerType = $this->CustomerTypes->get($id);
        if ($this->CustomerTypes->delete($customerType)) {
            $this->Flash->success(__('The customer type has been deleted.'));
        } else {
            $this->Flash->error(__('The customer type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
