<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IngredientsRecipe $ingredientsRecipe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ingredients Recipe'), ['action' => 'edit', $ingredientsRecipe->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ingredients Recipe'), ['action' => 'delete', $ingredientsRecipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingredientsRecipe->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ingredients Recipes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ingredients Recipe'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ingredients'), ['controller' => 'Ingredients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ingredient'), ['controller' => 'Ingredients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recipes'), ['controller' => 'Recipes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ingredientsRecipes view large-9 medium-8 columns content">
    <h3><?= h($ingredientsRecipe->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ingredient') ?></th>
            <td><?= $ingredientsRecipe->has('ingredient') ? $this->Html->link($ingredientsRecipe->ingredient->name, ['controller' => 'Ingredients', 'action' => 'view', $ingredientsRecipe->ingredient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Recipe') ?></th>
            <td><?= $ingredientsRecipe->has('recipe') ? $this->Html->link($ingredientsRecipe->recipe->name, ['controller' => 'Recipes', 'action' => 'view', $ingredientsRecipe->recipe->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= h($ingredientsRecipe->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ingredientsRecipe->id) ?></td>
        </tr>
    </table>
</div>
