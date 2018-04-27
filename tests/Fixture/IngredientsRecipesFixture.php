<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IngredientsRecipesFixture
 *
 */
class IngredientsRecipesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'ingredient_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'recipe_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'recipe_id' => ['type' => 'index', 'columns' => ['recipe_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'unique_recipe_ingredient' => ['type' => 'unique', 'columns' => ['ingredient_id', 'recipe_id'], 'length' => []],
            'ingredients_recipes_ibfk_1' => ['type' => 'foreign', 'columns' => ['recipe_id'], 'references' => ['recipes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'ingredients_recipes_ibfk_2' => ['type' => 'foreign', 'columns' => ['ingredient_id'], 'references' => ['ingredients', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'ingredient_id' => 1,
                'recipe_id' => 1,
                'quantity' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
