<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Student;
use App\Model\Entity\Subject;
use DebugKit\DebugInclude;

/**
 * Crews Controller
 *
 * @property \App\Model\Table\CrewsTable $Crews
 * @method \App\Model\Entity\Crew[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CrewsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $crews = $this->paginate($this->Crews);
        
        $this->set(compact('crews'));
    }
    /**
     * View method
     *
     * @param string|null $id Crew id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $crew = $this->Crews->get($id, [
            'contain' => ['Users'],
        ]);
        
        $this->loadModel('Students');

        //Lista dos alunos de uma determinada turma
        $students = $this->Students->find()
        ->where(['Students.crews_id' => $id])
        ->toArray();

        
        //Filtro
        if(count($_GET)){

            if (isset($_GET['periodo']) && $_GET['periodo'] != "") {
                $periodo = $_GET['periodo'];
                $and[] = ['Students.periodo' => $periodo];
            }

            if (isset($_GET['students_id']) && $_GET['students_id'] != "") {
                $students_id = $_GET['students_id'];
                $and[] = ['Students.id' => $students_id]; 

            }

                $students = $this->Students->find()
                ->where(['Students.crews_id' => $id , 'AND' => $and])
                ->order(['Students.name'])
                ->toArray();
        }

        $this->set(compact('crew','students'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $crew = $this->Crews->newEmptyEntity();
        if ($this->request->is('post')) {
            $crew = $this->Crews->patchEntity($crew, $this->request->getData());
            $crew->users_id = $this->Auth->user('id');

            
            

            if ($this->Crews->save($crew)) {
                $this->Flash->success(__('A {0} foi salva com sucesso!', 'Turma'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não foi salvo. Por favor, tente novamente.', 'Turma'));
        }
        $users = $this->Crews->Users->find('list', ['limit' => 200]);
        

        $this->set(compact('crew', 'users'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Crew id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $crew = $this->Crews->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $crew = $this->Crews->patchEntity($crew, $this->request->getData());
            $crew->modified_by = $this->Auth->user('id');
            
            if ($this->Crews->save($crew)) {
                $this->Flash->success(__('A {0} foi alterado com sucesso!', 'Turma'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A {0} não foi alterada. Por favor , tente denovo.', 'Turma'));
        }
        $users = $this->Crews->Users->find('list', ['limit' => 200]);

        
        $this->set(compact('crew', 'users'));
    }

    public function desativar($id = null)
    {

        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');

        $crew = $this->Crews->get($id, [
            'contain' => []
        ]);

        if ($crew->status == 1) {
            $crew->status = 0;
            $mensagem = 'Status da desativado com sucesso!';
        } else {
            $crew->status = 1;
            $mensagem = 'Status da turma ativado com sucesso!';
        }
        $this->Crews->save($crew);

        $this->Flash->success(__($mensagem));

        return $this->redirect($this->referer());
    }


    /**
     * Delete method
     *
     * @param string|null $id Crew id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $crew = $this->Crews->get($id);
    //     if ($this->Crews->delete($crew)) {
    //         $this->Flash->success(__('A {0} foi deletada com sucesso!', 'Turma'));
    //     } else {
    //         $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Turma'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
