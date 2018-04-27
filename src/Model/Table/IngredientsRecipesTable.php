<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IngredientsRecipes Model
 *
 * @property \App\Model\Table\IngredientsTable|\Cake\ORM\Association\BelongsTo $Ingredients
 * @property \App\Model\Table\RecipesTable|\Cake\ORM\Association\BelongsTo $Recipes
 *
 * @method \App\Model\Entity\IngredientsRecipe get($primaryKey, $options = [])
 * @method \App\Model\Entity\IngredientsRecipe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\IngredientsRecipe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IngredientsRecipe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IngredientsRecipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IngredientsRecipe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\IngredientsRecipe findOrCreate($search, callable $callback = null, $options = [])
 */
class IngredientsRecipesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('ingredients_recipes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Ingredients', [
            'foreignKey' => 'ingredient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Recipes', [
            'foreignKey' => 'recipe_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('quantity')
            ->maxLength('quantity', 50)
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['ingredient_id'], 'Ingredients'));
        $rules->add($rules->existsIn(['recipe_id'], 'Recipes'));

        return $rules;
    }
}
