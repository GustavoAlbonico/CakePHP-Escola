<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Teacherscrews Controller
 *
 * @property \App\Model\Table\TeacherscrewsTable $Teacherscrews
 * @method \App\Model\Entity\Teacherscrew[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TeacherscrewsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teachers', 'Crews', 'Users'],
        ];
        $teacherscrews = $this->paginate($this->Teacherscrews);

        $this->set(compact('teacherscrews'));
    }

    /**
     * View method
     *
     * @param string|null $id Teacherscrew id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teacherscrew = $this->Teacherscrews->get($id, [
            'contain' => ['Teachers', 'Crews', 'Users'],
        ]);

        $this->set(compact('teacherscrew'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    //Turmas -> Professores & Turmas
    // Ele recebe o id que esta sendo informado na URL, se não receber nada ele é null.
    public function add($id = null)
    {
        $teacherscrew = $this->Teacherscrews->newEmptyEntity();
        if ($this->request->is('post')) {
            $teacherscrew = $this->Teacherscrews->patchEntity($teacherscrew, $this->request->getData());

            $teacherscrew->users_id = $this->Auth->user('id');

            if ($this->Teacherscrews->save($teacherscrew)) {
                $this->Flash->success(__('O {0} foi salvo com sucesso!.', 'Professor & Turma'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não foi salvo. Por favor, tente novamente.', 'Professor & Turma'));
        }

        //Turmas -> Professores & Turmas
        //Verifica se está mandando paramentro para setar a turma no add com base no ID recebido
        if (isset($id)){
            
            $crews = $this->Teacherscrews->Crews->get($id, [
                    'contain' => []
                ]);
    
            $teacherscrew->crews_id = $crews->id;
    
            }

        $teachers = $this->Teacherscrews->Teachers->find()
            ->where(['status' => 1])
            ->order('Teachers.name');

        $crews = $this->Teacherscrews->Crews->find('list', ['limit' => 200])
            ->where(['status' => 1])
            ->order('Crews.name');

        $users = $this->Teacherscrews->Users->find('list', ['limit' => 200]);

        $this->set(compact('teacherscrew', 'teachers', 'crews', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Teacherscrew id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teacherscrew = $this->Teacherscrews->get($id, [
            'contain' => []
        ]);

        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teacherscrew = $this->Teacherscrews->patchEntity($teacherscrew, $this->request->getData());
            if ($this->Teacherscrews->save($teacherscrew)) {
                $this->Flash->success(__('O {0} foi alterado com sucesso!', 'Professor & Turma'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não foi alterado. Por favor , tente denovo.', 'Professor & Turma'));
        }

        $teachers = $this->Teacherscrews->Teachers->find()
            ->where(['status' => 1])
            ->order('Teachers.name');

        $crews = $this->Teacherscrews->Crews->find('list', ['limit' => 200])
            ->where(['status' => 1])
            ->order('Crews.name'); 


        $users = $this->Teacherscrews->Users->find('list', ['limit' => 200]);

        $this->set(compact('teacherscrew', 'teachers', 'crews', 'users'));
    }

    public function desativar($id = null)
    {

        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');

        $teacherscrew = $this->Teacherscrews->get($id, [
            'contain' => []
        ]);

        if ($teacherscrew->status == 1) {
            $teacherscrew->status = 0;
            $mensagem = 'Status de professor & turma desativado com sucesso!';
        } else {
            $teacherscrew->status = 1;
            $mensagem = 'Status de professor & turma ativado com sucesso!';
        }
        $this->Teacherscrews->save($teacherscrew);

        $this->Flash->success(__($mensagem));

        return $this->redirect($this->referer());
    }
 
}
