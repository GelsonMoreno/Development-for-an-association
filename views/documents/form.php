<?php
use \app\models\User_types;
?>


<?= $form->field($model, 'title', ['inputOptions'=> ['class'=>'label_indx']])->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'type', ['inputOptions'=> ['class'=>'label_indx1', 'disabled' => true]]) ?>

<?= $form->field($model, 'description', ['inputOptions'=> ['class'=>'description']])->textarea() ?>

<?= $form->field($model, 'file')->fileInput() ?>

<?= $form->field($model, 'public')->checkboxList(User_types::document_select_public(),[
    'item' => function($index, $label, $name, $checked, $value) use ($model) {
        $checked = in_array($value, explode (',', $model->public)) ? 'checked' : '';
        return "<div class='checkbox'><label><input type='checkbox' {$checked} name='{$name}' value='{$value}'>{$label}</label></div>";
    }
])?>

<script>
  const input_field = document.querySelector('#documents-file');
  const input_type_field = document.querySelector('#documents-type');

  input_field.onchange = function(){
      $("#error_file_input").remove();
      if(!this.value) return;
      const file_type = this.value.split('.')[1];

      if(!['pdf','xlsx'].includes(file_type.toLowerCase())){
          this.value = '';
          const error_input = $("<p id='error_file_input' style='color:#a94442;' class='help-block help-block-error'>Ficherio must be pdf or xlsx</p>");
          input_field.parentElement.append(error_input[0]);
          return;
      }
      input_type_field.value = file_type;
  };

  document.querySelectorAll('#document_new, document_edit').forEach(function(form){
    form.onsubmit = function() {
        $("#error_file_input").remove();
        if(input_field.value === ''){
            const error_input = $("<p id='error_file_input' style='color:#a94442;' class='help-block help-block-error'>Ficheiro cannot be blank.</p>");
            input_field.parentElement.append(error_input[0]);
            return false;
        }
        input_type_field.disabled = false;
    };
  });
</script>