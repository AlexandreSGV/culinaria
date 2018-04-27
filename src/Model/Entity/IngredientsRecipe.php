<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IngredientsRecipe Entity
 *
 * @property int $id
 * @property int $ingredient_id
 * @property int $recipe_id
 * @property string $quantity
 *
 * @property \App\Model\Entity\Ingredient $ingredient
 * @property \App\Model\Entity\Recipe $recipe
 */
class IngredientsRecipe extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'ingredient_id' => true,
        'recipe_id' => true,
        'quantity' => true,
        'ingredient' => true,
        'recipe' => true
    ];
}
