<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }

    public function changePassword($id = null)
    {
        if ($this->request->is('post')) {
            $data = $this->request->data();

            if ($data['new_password'] !== $data['confirm_password']) {
                $this->Flash->error(__('Password does not match'));
            } else {
                $user = $this->Users->get($this->Auth->user('id'));
                $verify = (new DefaultPasswordHasher)->check($data['current_password'], $user->password);

                if ($verify) {
                    $user = $this->Users->patchEntity($user, ['password' => $data['new_password']]);

                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('The password is successfully changed. Please login again.'));
                        return $this->redirect($this->Auth->logout());
                    } else {
                        $this->Flash->error(__('There was an error during the save!'));
                    }
                } else {
                    $this->Flash->error(__('Current password is wrong')); 
                }
            }
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    } 
    
    public function login()
    {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }

        $this->viewBuilder()->layout('login');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    
    public function dashboard()
    {
        $this->loadModel('Orders');
        $orders = $this->Orders->find('all', [
            'contain' => ['Customers', 'OrderStatuses', 'PaymentStatuses', 'Payments'],
            'limit' => 5,
            'order' => 'Orders.created DESC'
        ]);

        $this->loadModel('Payments');
        $payments = $this->Payments->find('all', [
            'contain' => ['Orders'],
            'limit' => 5,
            'order' => 'payments.created DESC'
        ]);
        // pr($payments);die();
        $this->set(compact('orders', 'payments'));
        $this->set('_serialize', ['orders', 'payments']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['States']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['States']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $states = $this->Users->States->find('list', ['limit' => 200]);
        $this->set(compact('user', 'states'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'edit', $id]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $states = $this->Users->States->find('list', ['limit' => 200]);
        $this->set(compact('user', 'states'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
