<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;

/**
 * Walkers Controller
 *
 * @property \App\Model\Table\WalkersTable $Walkers
 */

class WalkersController extends AppController
{
    public $components = array('Auth');

    public function beforeFilter(Event $event = null) {
        // if the admin session hasn't been set
        if (!($this->Auth->user()['admin'] > 0)) {
            // set flash message and redirect
            $this->Flash->set('You must be an admin to access this page.', ['element' => 'error']);
            return $this->redirect('/');
        }
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('walkers', $this->paginate($this->Walkers));
        $this->set('_serialize', ['walkers']);
    }

    /**
     * View method
     *
     * @param string|null $id Walker id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $walker = $this->Walkers->get($id, [
            'contain' => []
        ]);
        $this->set('walker', $walker);
        $this->set('_serialize', ['walker']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $walker = $this->Walkers->newEntity();
        if ($this->request->is('post')) {
            $walker = $this->Walkers->patchEntity($walker, $this->request->data);
            if ($this->Walkers->save($walker)) {
                $this->Flash->success(__('The walker has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The walker could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('walker'));
        $this->set('_serialize', ['walker']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Walker id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $walker = $this->Walkers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $walker = $this->Walkers->patchEntity($walker, $this->request->data);
            if ($this->Walkers->save($walker)) {
                $this->Flash->success(__('The walker has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The walker could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('walker'));
        $this->set('_serialize', ['walker']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Walker id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $walker = $this->Walkers->get($id);
        if ($this->Walkers->delete($walker)) {
            $this->Flash->success(__('The walker has been deleted.'));
        } else {
            $this->Flash->error(__('The walker could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
