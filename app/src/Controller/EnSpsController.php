<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EnSps Controller
 *
 * @property \App\Model\Table\EnSpsTable $EnSps
 * @method \App\Model\Entity\EnSp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnSpsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['BioCls', 'EnCtgs'],
        ];
        $enSps = $this->paginate($this->EnSps);

        $this->set(compact('enSps'));
    }

    /**
     * View method
     *
     * @param string|null $id En Sp id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enSp = $this->EnSps->get($id, [
            'contain' => ['BioCls', 'EnCtgs', 'Nekos'],
        ]);

        $this->set(compact('enSp'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $enSp = $this->EnSps->newEmptyEntity();
        if ($this->request->is('post')) {
            $enSp = $this->EnSps->patchEntity($enSp, $this->request->getData());
            if ($this->EnSps->save($enSp)) {
                $this->Flash->success(__('The en sp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The en sp could not be saved. Please, try again.'));
        }
        $bioCls = $this->EnSps->BioCls->find('list', ['limit' => 200])->all();
        $enCtgs = $this->EnSps->EnCtgs->find('list', ['limit' => 200])->all();
        $this->set(compact('enSp', 'bioCls', 'enCtgs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id En Sp id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enSp = $this->EnSps->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enSp = $this->EnSps->patchEntity($enSp, $this->request->getData());
            if ($this->EnSps->save($enSp)) {
                $this->Flash->success(__('The en sp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The en sp could not be saved. Please, try again.'));
        }
        $bioCls = $this->EnSps->BioCls->find('list', ['limit' => 200])->all();
        $enCtgs = $this->EnSps->EnCtgs->find('list', ['limit' => 200])->all();
        $this->set(compact('enSp', 'bioCls', 'enCtgs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id En Sp id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enSp = $this->EnSps->get($id);
        if ($this->EnSps->delete($enSp)) {
            $this->Flash->success(__('The en sp has been deleted.'));
        } else {
            $this->Flash->error(__('The en sp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
