<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ingredients Controller
 *
 * @property \App\Model\Table\IngredientsTable $Ingredients
 *
 * @method \App\Model\Entity\Ingredient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IngredientsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $ingredients = $this->paginate($this->Ingredients);

        $this->set(compact('ingredients'));
    }

    /**
     * View method
     *
     * @param string|null $id Ingredient id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ingredient = $this->Ingredients->get($id, [
            'contain' => ['Recipes']
        ]);

        $this->set('ingredient', $ingredient);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ingredient = $this->Ingredients->newEntity();
        if ($this->request->is('post')) {
            $ingredient = $this->Ingredients->patchEntity($ingredient, $this->request->getData());
            if ($this->Ingredients->save($ingredient)) {
                $this->Flash->success(__('The ingredient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingredient could not be saved. Please, try again.'));
        }
        $recipes = $this->Ingredients->Recipes->find('list', ['limit' => 200]);
        $this->set(compact('ingredient', 'recipes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ingredient id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ingredient = $this->Ingredients->get($id, [
            'contain' => ['Recipes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ingredient = $this->Ingredients->patchEntity($ingredient, $this->request->getData());
            if ($this->Ingredients->save($ingredient)) {
                $this->Flash->success(__('The ingredient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingredient could not be saved. Please, try again.'));
        }
        $recipes = $this->Ingredients->Recipes->find('list', ['limit' => 200]);
        $this->set(compact('ingredient', 'recipes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ingredient id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ingredient = $this->Ingredients->get($id);
        if ($this->Ingredients->delete($ingredient)) {
            $this->Flash->success(__('The ingredient has been deleted.'));
        } else {
            $this->Flash->error(__('The ingredient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
