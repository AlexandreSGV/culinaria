<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 */
?>
<?= $this->Html->script('jquery3.3.1.min.js'); ?>
<?= $this->Html->script('underscore-min.js'); ?>
<script>
$(document).ready(function() {
    var
        ingredientTable = $('#ingredient-table'),
        ingredientBody = ingredientTable.find('tbody'),
        ingredientTemplate = _.template($('#ingredient-template').remove().text()),
        numberRows = ingredientTable.find('tbody > tr').length;

    ingredientTable
        .on('click', 'a.add', function(e) {
            e.preventDefault();

            $(ingredientTemplate({key: numberRows++}))
                .hide()
                .appendTo(ingredientBody)
                .fadeIn('fast');
        })
        .on('click', 'a.remove', function(e) {
                e.preventDefault();

            $(this)
                .closest('tr')
                .fadeOut('fast', function() {
                    $(this).remove();
                });
        });

        if (numberRows === 0) {
            ingredientTable.find('a.add').click();
        }
});
</script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Recipes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ingredients'), ['controller' => 'Ingredients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ingredient'), ['controller' => 'Ingredients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recipes form large-9 medium-8 columns content">
    <?= $this->Form->create($recipe) ?>
    <fieldset>
        <legend><?= __('Add Recipe') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <fieldset>
        <legend><?php echo __('Ingredients');?></legend>
        <table id="ingredient-table">
            <thead>
                <tr>
                    <th>Nome Ingrediente</th>
                    <th>Quantidade</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td class="actions">
                        <a href="#" class="add">Add ingredient</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </fieldset>
    <script id="ingredient-template" type="text/x-underscore-template">
        <?php echo $this->element('ingredients');?>
    </script>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

    <!-- <div class="input_fields_wrap">
    <button class="add_field_button">Add More Fields</button>
    <div>
        <input type="text" name="mytext[]">
        <?php
            echo $this->Form->control('mytext[]', ['label'=>'', 'options' => $ingredients]);
        ?>
    </div>
    </div> -->
</div>
