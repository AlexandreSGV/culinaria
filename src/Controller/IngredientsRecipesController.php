<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IngredientsRecipes Controller
 *
 * @property \App\Model\Table\IngredientsRecipesTable $IngredientsRecipes
 *
 * @method \App\Model\Entity\IngredientsRecipe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IngredientsRecipesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ingredients', 'Recipes']
        ];
        $ingredientsRecipes = $this->paginate($this->IngredientsRecipes);

        $this->set(compact('ingredientsRecipes'));
    }

    /**
     * View method
     *
     * @param string|null $id Ingredients Recipe id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ingredientsRecipe = $this->IngredientsRecipes->get($id, [
            'contain' => ['Ingredients', 'Recipes']
        ]);

        $this->set('ingredientsRecipe', $ingredientsRecipe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ingredientsRecipe = $this->IngredientsRecipes->newEntity();
        if ($this->request->is('post')) {
            $ingredientsRecipe = $this->IngredientsRecipes->patchEntity($ingredientsRecipe, $this->request->getData());
            if ($this->IngredientsRecipes->save($ingredientsRecipe)) {
                $this->Flash->success(__('The ingredients recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingredients recipe could not be saved. Please, try again.'));
        }
        $ingredients = $this->IngredientsRecipes->Ingredients->find('list', ['limit' => 200]);
        $recipes = $this->IngredientsRecipes->Recipes->find('list', ['limit' => 200]);
        $this->set(compact('ingredientsRecipe', 'ingredients', 'recipes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ingredients Recipe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ingredientsRecipe = $this->IngredientsRecipes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ingredientsRecipe = $this->IngredientsRecipes->patchEntity($ingredientsRecipe, $this->request->getData());
            if ($this->IngredientsRecipes->save($ingredientsRecipe)) {
                $this->Flash->success(__('The ingredients recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingredients recipe could not be saved. Please, try again.'));
        }
        $ingredients = $this->IngredientsRecipes->Ingredients->find('list', ['limit' => 200]);
        $recipes = $this->IngredientsRecipes->Recipes->find('list', ['limit' => 200]);
        $this->set(compact('ingredientsRecipe', 'ingredients', 'recipes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ingredients Recipe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ingredientsRecipe = $this->IngredientsRecipes->get($id);
        if ($this->IngredientsRecipes->delete($ingredientsRecipe)) {
            $this->Flash->success(__('The ingredients recipe has been deleted.'));
        } else {
            $this->Flash->error(__('The ingredients recipe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
