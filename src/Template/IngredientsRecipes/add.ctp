<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IngredientsRecipe $ingredientsRecipe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ingredients Recipes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ingredients'), ['controller' => 'Ingredients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ingredient'), ['controller' => 'Ingredients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recipes'), ['controller' => 'Recipes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ingredientsRecipes form large-9 medium-8 columns content">
    <?= $this->Form->create($ingredientsRecipe) ?>
    <fieldset>
        <legend><?= __('Add Ingredients Recipe') ?></legend>
        <?php
            echo $this->Form->control('ingredient_id', ['options' => $ingredients]);
            echo $this->Form->control('recipe_id', ['options' => $recipes]);
            echo $this->Form->control('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
