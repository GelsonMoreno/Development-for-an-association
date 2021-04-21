<?php
?>


<?= $form->field($model, 'title', ['inputOptions'=> ['class'=>'label_indx']])->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'type', ['inputOptions'=> ['class'=>'label_indx1', 'disabled' => true]]) ?>

<?= $form->field($model, 'date', ['inputOptions'=> ['class'=>'label_indx1']]) ?>

<?= $form->field($model, 'description', ['inputOptions'=> ['class'=>'description']])->textarea() ?>

<?= $form->field($model, 'file', ['inputOptions' => ['id' => 'text_input_field']])->fileInput() ?>


<script>
  const input_field = document.querySelector('#text_input_field');
  const input_type_field = document.querySelector('#documents-type');

  input_field.onchange = function(){
      if(!this.value) return;
      const file_type = this.value.split('.')[1];

      if(!['pdf','xlsx'].includes(file_type.toLowerCase())){
          this.value = '';
          return;
      }

      input_type_field.value = file_type;
  };

  document.querySelectorAll('#document_new, document_edit').forEach(function(form){
    form.onsubmit = function() {
        console.log({form});
        input_type_field.disabled = false;
    };
  });
</script>