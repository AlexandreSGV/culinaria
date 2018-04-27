<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IngredientsRecipesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IngredientsRecipesTable Test Case
 */
class IngredientsRecipesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IngredientsRecipesTable
     */
    public $IngredientsRecipes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ingredients_recipes',
        'app.ingredients',
        'app.recipes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('IngredientsRecipes') ? [] : ['className' => IngredientsRecipesTable::class];
        $this->IngredientsRecipes = TableRegistry::get('IngredientsRecipes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IngredientsRecipes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
