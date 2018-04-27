<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>  
    <td>
        <?php 
        echo $this->Form->select("lista_ingredientes.{$key}.ingredient_id", $ingredients, array(
            'empty' => '-- Select ingredient --'
        )); ?>
    </td>
    <td>
        <?php echo $this->Form->text("lista_ingredientes.{$key}.quantity"); ?>
    </td>
    <td class="actions">
        <a href="#" class="remove">Remove ingredient</a>
    </td>
</tr>