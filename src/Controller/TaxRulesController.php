<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TaxRules Controller
 *
 * @property \App\Model\Table\TaxRulesTable $TaxRules
 *
 * @method \App\Model\Entity\TaxRule[] paginate($object = null, array $settings = [])
 */
class TaxRulesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TaxGroups']
        ];
        $taxRules = $this->paginate($this->TaxRules);

        $this->set(compact('taxRules'));
        $this->set('_serialize', ['taxRules']);
    }

    /**
     * View method
     *
     * @param string|null $id Tax Rule id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $taxRule = $this->TaxRules->get($id, [
            'contain' => ['TaxGroups', 'OrderItems']
        ]);

        $this->set('taxRule', $taxRule);
        $this->set('_serialize', ['taxRule']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $taxRule = $this->TaxRules->newEntity();
        if ($this->request->is('post')) {
            $taxRule = $this->TaxRules->patchEntity($taxRule, $this->request->getData());
            if ($this->TaxRules->save($taxRule)) {
                $this->Flash->success(__('The tax rule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tax rule could not be saved. Please, try again.'));
        }
        $taxGroups = $this->TaxRules->TaxGroups->find('list', ['limit' => 200]);
        $orderItems = $this->TaxRules->OrderItems->find('list', ['limit' => 200]);
        $this->set(compact('taxRule', 'taxGroups', 'orderItems'));
        $this->set('_serialize', ['taxRule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tax Rule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    /*public function edit($id = null)
    {
        $taxRule = $this->TaxRules->get($id, [
            'contain' => ['OrderItems']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $taxRule = $this->TaxRules->patchEntity($taxRule, $this->request->getData());
            if ($this->TaxRules->save($taxRule)) {
                $this->Flash->success(__('The tax rule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tax rule could not be saved. Please, try again.'));
        }
        $taxGroups = $this->TaxRules->TaxGroups->find('list', ['limit' => 200]);
        $orderItems = $this->TaxRules->OrderItems->find('list', ['limit' => 200]);
        $this->set(compact('taxRule', 'taxGroups', 'orderItems'));
        $this->set('_serialize', ['taxRule']);
    }
*/
    /**
     * Delete method
     *
     * @param string|null $id Tax Rule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $taxRule = $this->TaxRules->get($id);
        if ($this->TaxRules->delete($taxRule)) {
            $this->Flash->success(__('The tax rule has been deleted.'));
        } else {
            $this->Flash->error(__('The tax rule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
