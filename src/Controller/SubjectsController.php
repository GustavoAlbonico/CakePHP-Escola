<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Subjects Controller
 *
 * @property \App\Model\Table\SubjectsTable $Subjects
 * @method \App\Model\Entity\Subject[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubjectsController extends AppController
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
        $subjects = $this->paginate($this->Subjects);

        $this->set(compact('subjects'));
    }

    /**
     * View method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subject = $this->Subjects->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('subject'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subject = $this->Subjects->newEmptyEntity();
        if ($this->request->is('post')) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->getData());
            $subject->users_id = $this->Auth->user('id');

            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('A {0} foi salva com sucesso!.', 'Disciplina'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A {0} não foi salva. Por favor, tente novamente.', 'Disciplina'));
        }
                
        $users = $this->Subjects->Users->find('list', ['limit' => 200]);
        $this->set(compact('subject', 'users'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subject = $this->Subjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->getData());
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('A {0} foi editada com sucesso!', 'Disciplina'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A {0} não foi editada. Por favor, tente novamente', 'Disciplina'));
        };
        
        $users = $this->Subjects->Users->find('list', ['limit' => 200]);
        $this->set(compact('subject', 'users'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $subject = $this->Subjects->get($id);
    //     if ($this->Subjects->delete($subject)) {
    //         $this->Flash->success(__('The {0} has been deleted.', 'Disciplina'));
    //     } else {
    //         $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Disciplina'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }

    public function desativar($id = null)
    {

        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');

        $subject = $this->Subjects->get($id, [
            'contain' => []
        ]);

        if ($subject->status == 1) {
            $subject->status = 0;
            $mensagem = 'Status da disciplina desativado com sucesso!';
        } else {
            $subject->status = 1;
            $mensagem = 'Status da disciplina ativado com sucesso!';
        }
        $this->Subjects->save($subject);

        $this->Flash->success(__($mensagem));

        return $this->redirect($this->referer());
    }
}
