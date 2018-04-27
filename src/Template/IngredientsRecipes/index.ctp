<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IngredientsRecipe[]|\Cake\Collection\CollectionInterface $ingredientsRecipes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ingredients Recipe'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ingredients'), ['controller' => 'Ingredients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ingredient'), ['controller' => 'Ingredients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recipes'), ['controller' => 'Recipes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ingredientsRecipes index large-9 medium-8 columns content">
    <h3><?= __('Ingredients Recipes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ingredient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recipe_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ingredientsRecipes as $ingredientsRecipe): ?>
            <tr>
                <td><?= $this->Number->format($ingredientsRecipe->id) ?></td>
                <td><?= $ingredientsRecipe->has('ingredient') ? $this->Html->link($ingredientsRecipe->ingredient->name, ['controller' => 'Ingredients', 'action' => 'view', $ingredientsRecipe->ingredient->id]) : '' ?></td>
                <td><?= $ingredientsRecipe->has('recipe') ? $this->Html->link($ingredientsRecipe->recipe->name, ['controller' => 'Recipes', 'action' => 'view', $ingredientsRecipe->recipe->id]) : '' ?></td>
                <td><?= h($ingredientsRecipe->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ingredientsRecipe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ingredientsRecipe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ingredientsRecipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingredientsRecipe->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
