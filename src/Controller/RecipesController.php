<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Recipes Controller
 *
 * @property \App\Model\Table\RecipesTable $Recipes
 *
 * @method \App\Model\Entity\Recipe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecipesController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->loadModel('IngredientsRecipes');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $recipes = $this->paginate($this->Recipes);

        $this->set(compact('recipes'));
    }

    /**
     * View method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recipe = $this->Recipes->get($id, [
            'contain' => ['Ingredients']
        ]);

        $this->set('recipe', $recipe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recipe = $this->Recipes->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $ingredientes = $data['lista_ingredientes'];
            $recipe = $this->Recipes->patchEntity($recipe, $data);
   
            if ($this->Recipes->save($recipe)) {
                
                foreach ($ingredientes as $ing) {
                    $ingredient = $this->IngredientsRecipes->newEntity();                    
                    $ingredient = $this->IngredientsRecipes->patchEntity($ingredient,$ing);
                    $ingredient->recipe_id = $recipe->id;
                    $this->IngredientsRecipes->save($ingredient);
                }
                
                
                $this->Flash->success(__('The recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
        }
        $ingredients = $this->Recipes->Ingredients->find('list');
        $this->set(compact('recipe', 'ingredients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recipe = $this->Recipes->get($id, [
            'contain' => ['Ingredients']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipe = $this->Recipes->patchEntity($recipe, $this->request->getData());
            if ($this->Recipes->save($recipe)) {
                $this->Flash->success(__('The recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
        }
        $ingredients = $this->Recipes->Ingredients->find('list', ['limit' => 200]);
        $this->set(compact('recipe', 'ingredients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recipe = $this->Recipes->get($id);
        if ($this->Recipes->delete($recipe)) {
            $this->Flash->success(__('The recipe has been deleted.'));
        } else {
            $this->Flash->error(__('The recipe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
