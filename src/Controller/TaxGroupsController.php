<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TaxGroups Controller
 *
 * @property \App\Model\Table\TaxGroupsTable $TaxGroups
 *
 * @method \App\Model\Entity\TaxGroup[] paginate($object = null, array $settings = [])
 */
class TaxGroupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $taxGroups = $this->paginate($this->TaxGroups);

        $this->set(compact('taxGroups'));
        $this->set('_serialize', ['taxGroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Tax Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $taxGroup = $this->TaxGroups->get($id, [
            'contain' => ['Products', 'TaxRules']
        ]);

        $this->set('taxGroup', $taxGroup);
        $this->set('_serialize', ['taxGroup']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $taxGroup = $this->TaxGroups->newEntity();
        if ($this->request->is('post')) {
            $taxGroup = $this->TaxGroups->patchEntity($taxGroup, $this->request->getData());
            if ($this->TaxGroups->save($taxGroup)) {
                $this->Flash->success(__('The tax group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tax group could not be saved. Please, try again.'));
        }
        $this->set(compact('taxGroup'));
        $this->set('_serialize', ['taxGroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tax Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    /*public function edit($id = null)
    {
        $taxGroup = $this->TaxGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $taxGroup = $this->TaxGroups->patchEntity($taxGroup, $this->request->getData());
            if ($this->TaxGroups->save($taxGroup)) {
                $this->Flash->success(__('The tax group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tax group could not be saved. Please, try again.'));
        }
        $this->set(compact('taxGroup'));
        $this->set('_serialize', ['taxGroup']);
    }*/

    /**
     * Delete method
     *
     * @param string|null $id Tax Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $taxGroup = $this->TaxGroups->get($id);
        if ($this->TaxGroups->delete($taxGroup)) {
            $this->Flash->success(__('The tax group has been deleted.'));
        } else {
            $this->Flash->error(__('The tax group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */
}
