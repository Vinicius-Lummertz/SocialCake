<?php
declare(strict_types=1);

namespace App\Controller;
use Authentication\PasswordHasher\DefaultPasswordHasher;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    public function register()
    {
        $this->viewBuilder()->setLayout('auth');

        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')){
            $data = $this->request->getData();

            $existingEmail = $this->Users->find()
            ->where(['email' => $data['email'] ?? ''])
            ->first();

            if ($existingEmail){
                $this->Flash->error('Esse email já está cadastrado');
                $this->set(compact('user'));
                return;
            }

            $existingUsername = $this->Users->find()
            ->where(['username' => $data['username'] ?? ''])
            ->first();

            if ($existingUsername){
                $this->Flash->error('Esse username já está cadastrado');
                $this->set(compact('user'));
                return;
            }

            $user = $this->Users->patchEntity($user, $data);

            if($this->Users->save($user)){
                $this->Flash->success('Cadastro realizado com sucesso');
                return $this->redirect(['action' => 'login']);
            }

            $this->Flash->error('Não foi possivel relizar o cadastro');
 
        }
        $this->set(compact('user'));
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('auth');

        if ($this->request->is('post')){

            $data = $this->request->getData();
            
            $identifier = trim((string)($data['identifier'] ?? ''));
            $password = (string)($data['password'] ??'');

            $user = $this->Users->find()
            ->where(['OR' => ['email' => $identifier, 'username' => $identifier]])
            ->first();

            if($user && (new DefaultPasswordHasher())->check($password, $user->password)){
                $session = $this->request->getSession();

                $session->write('Auth', [
                    'id' => $user->id,
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,

                ]);

                $this->Flash->success('Login realizado com sucesso!');
                return $this->redirect(['controller'=> 'Posts', 'action' => 'index']);
            }
            
            $this->Flash->error('Usuario ou senha inválidos');

        }
    }

    public function logout()
    {
        $this->request->getSession()->delete('Auth');
        $this->Flash->success('Voce saiu da conta');
        return $this->redirect(['action' => 'login']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: ['Profiles', 'Comments', 'Likes', 'Notifications', 'Posts']);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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
    }
}
