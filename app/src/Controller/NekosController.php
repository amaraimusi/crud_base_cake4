<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Nekos Controller
 *
 * @property \App\Model\Table\NekosTable $Nekos
 * @method \App\Model\Entity\Neko[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NekosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $ent = ['id'=>2, 'neko_name'=>'ポメラニアン'];
        $ent = $this->Nekos->newEntity($ent);
        debug($ent);//■■■□□□■■■□□□)
        $this->Nekos->save($ent);
        

        $this->paginate = [
            'contain' => ['EnSps'],
        ];
        $nekos = $this->paginate($this->Nekos);

        $this->set(compact('nekos'));
    }

    /**
     * View method
     *
     * @param string|null $id Neko id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $neko = $this->Nekos->get($id, [
            'contain' => ['EnSps'],
        ]);

        $this->set(compact('neko'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $neko = $this->Nekos->newEmptyEntity();
        if ($this->request->is('post')) {
            $neko = $this->Nekos->patchEntity($neko, $this->request->getData());
            if ($this->Nekos->save($neko)) {
                $this->Flash->success(__('The neko has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The neko could not be saved. Please, try again.'));
        }
        $enSps = $this->Nekos->EnSps->find('list', ['limit' => 200])->all();
        $this->set(compact('neko', 'enSps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Neko id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $neko = $this->Nekos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $neko = $this->Nekos->patchEntity($neko, $this->request->getData());
            if ($this->Nekos->save($neko)) {
                $this->Flash->success(__('The neko has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The neko could not be saved. Please, try again.'));
        }
        $enSps = $this->Nekos->EnSps->find('list', ['limit' => 200])->all();
        $this->set(compact('neko', 'enSps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Neko id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $neko = $this->Nekos->get($id);
        if ($this->Nekos->delete($neko)) {
            $this->Flash->success(__('The neko has been deleted.'));
        } else {
            $this->Flash->error(__('The neko could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
