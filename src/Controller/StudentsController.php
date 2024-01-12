<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users','Crews'],
        ];
        $students = $this->paginate($this->Students);
        $studentsAtivos = $this->paginate($this->Students->find()
                                    ->where(['Students.status <>' => 0]));

        $this->set(compact('students','studentsAtivos'));
    }

    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => ['Users','Crews'],
        ]);

        $this->set(compact('student'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $student = $this->Students->newEmptyEntity();
        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $this->request->getData());
            $student->users_id = $this->Auth->user('id');
            
            var_dump($student);
            die();
            if ($this->Students->save($student)) {
                $this->Flash->success(__('O {0} foi salvo com sucesso!', 'Aluno'));
                if($id == null){
                return $this->redirect(['action' => 'index']);
                }else{
                return $this->redirect(['controller' => 'Crews','action' => 'view',$student->crews_id]);  
                }
            }
            $this->Flash->error(__('O {0} não foi salvo. Por favor, tente novamente.', 'Aluno'));
        }

        if (isset($id)){
            
            $crews = $this->Students->Crews->get($id, [
                    'contain' => []
                ]);
    
            $student->crews_id = $crews->id;

        }

        $users = $this->Students->Users->find('list', ['limit' => 200]);

        $crews = $this->Students->Crews->find('list', ['limit' => 200])
                                       ->where(['status' => 1]);
                                     
        $this->set(compact('student', 'users','crews'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->getData());
            $student->modified_by = $this->Auth->user('id');
            
            if ($this->Students->save($student)) {
                $this->Flash->success(__('O {0} foi alterado com sucesso!', 'Aluno'));
                
                if($id == null){
                    return $this->redirect(['action' => 'index']);
                    }else{
                    return $this->redirect(['controller' => 'Crews','action' => 'view',$student->crews_id]);  
                    }
            }
            $this->Flash->error(__('O {0} não foi alterado. Por favor , tente denovo.', 'Aluno'));
        }
        $users = $this->Students->Users->find('list', ['limit' => 200]);
        $crews = $this->Students->Crews->find('list', ['limit' => 200])
                                       ->where(['status' => 1]);
                        
        $this->set(compact('student', 'users','crews'));
    }

    public function desativar($id = null)
    {

        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');

        $student = $this->Students->get($id, [
            'contain' => []
        ]);

        if ($student->status == 1) {
            $student->status = 0;
            $mensagem = 'Status do estudante desativado com sucesso!';
        } else {
            $student->status = 1;
            $mensagem = 'Status do estudante ativado com sucesso!';
        }
        $this->Students->save($student);

        $this->Flash->success(__($mensagem));

        return $this->redirect($this->referer());
    }


    /**
     * Delete method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $student = $this->Students->get($id);
    //     if ($this->Students->delete($student)) {
    //         $this->Flash->success(__('O {0} foi deletado com sucesso!', 'Aluno'));
    //     } else {
    //         $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Aluno'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
