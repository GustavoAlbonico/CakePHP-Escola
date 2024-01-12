<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Teachers Controller
 *
 * @property \App\Model\Table\TeachersTable $Teachers
 * @method \App\Model\Entity\Teacher[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TeachersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users','Subjects'],
        ];
        $teachers = $this->paginate($this->Teachers);
       

        $this->set(compact('teachers'));
    }

    /**
     * View method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teacher = $this->Teachers->get($id, [
            'contain' => ['Users','Subjects'],
        ]);

        $this->set(compact('teacher'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $teacher = $this->Teachers->newEmptyEntity();
        if ($this->request->is('post')) {
            $teacher = $this->Teachers->patchEntity($teacher, $this->request->getData());
            $teacher->users_id = $this->Auth->user('id');

            
            
            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('O {0} foi salvo com sucesso!.', 'Professor'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não foi salvo. Por favor, tente novamente.', 'Professor'));
        }
        $users = $this->Teachers->Users->find('list', ['limit' => 200]);
        $subjects = $this->Teachers->Subjects->find()
                                             ->where(['status' => 1])
                                             ->order('Subjects.nome');                            

     
        $this->set(compact('teacher', 'users','subjects'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teacher = $this->Teachers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teacher = $this->Teachers->patchEntity($teacher, $this->request->getData());
            $teacher->modified_by = $this->Auth->user('id');
            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('O {0} foi alterado com sucesso!', 'Professor'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não foi alterado. Por favor , tente denovo.', 'Professor'));
        }
        $users = $this->Teachers->Users->find('list', ['limit' => 200]);
        $subjects = $this->Teachers->Subjects->find('list', ['limit' => 200])
                                             ->where(['status' => 1])
                                             ->order('Subjects.nome');

        $this->set(compact('teacher', 'users','subjects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $teacher = $this->Teachers->get($id);
    //     if ($this->Teachers->delete($teacher)) {
    //         $this->Flash->success(__('O {0} foi deletado com sucesso!', 'Professor'));
    //     } else {
    //         $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Professor'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }

    public function desativar($id = null)
    {
        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');

        $teacher = $this->Teachers->get($id, [
            'contain' => []
        ]);

    
        if ($teacher->status == 1) {
            $teacher->status = 0;
            $mensagem = 'Status do(a) professor(a) desativado com sucesso!';
        } else {
            $teacher->status = 1;
            $mensagem = 'Status do(a) professor(a) ativado com sucesso!';
        }


        $teacher->modified_by = $this->Auth->user('id');
        $this->Teachers->save($teacher);


        $this->Flash->success(__($mensagem));

        return $this->redirect($this->referer());
    }
}
