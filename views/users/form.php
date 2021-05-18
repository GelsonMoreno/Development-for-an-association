<?php

use app\models\User_types;
use \yii\helpers\ArrayHelper;
?>


<?= $form->field($model, 'name', ['inputOptions'=> ['class'=>'label_indx']])->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'email', ['inputOptions'=> ['class'=>'label_indx']]) ?>

<?= $form->field($model, 'address', ['inputOptions'=> ['class'=>'label_indx']]) ?>

<?= $form->field($model, 'User_types_id', ['inputOptions'=> ['class'=>'label_indx1']])->dropDownList(ArrayHelper::map($users_types, 'id', 'designation'), ['prompt' => 'Selecione o tipo de utlizador']) ?>

<?= $form->field($model, 'number', ['inputOptions'=> ['class'=>'label_indx1']]) ?>

<?= $form->field($model, 'nif', ['inputOptions'=> ['class'=>'label_indx1']]) ?>


<div id="notAssociated" style="display: <?= $model->isAssociated() ? 'none' : ''?>;">

  <?= $form->field($model, 'birth_date', ['inputOptions'=> ['class'=>'label_indx1 datepicker', 'autocomplete' => 'off']]) ?>

  <?= $form->field($model, 'sex', ['inputOptions'=> ['class'=>'label_indx1']]) ?>
</div>

<?= $form->field($model, 'password', ['inputOptions'=> ['class'=>'label_indx1']])->passwordInput() ?>

<?= $form->field($model, 'image')->fileInput() ?>

<script>
    const input_field = document.querySelector('#user-image');

    input_field.onchange = function(){
        $("#error_file_input").remove();
        if(!this.value) return;
        const file_type = this.value.split('.')[1];

        if(!['png','jpeg', 'jpg'].includes(file_type.toLowerCase())){
            this.value = '';
            const error_input = $("<p id='error_file_input' style='color:#a94442;' class='help-block help-block-error'>Ficherio must be pdf or xlsx</p>");
            input_field.parentElement.append(error_input[0]);
            return;
        }
    };

    document.querySelector('#user-user_types_id').onchange = function(){
      const associated_id = "<?= User_types::associated_group()->id ?>";
      if (associated_id === this.value){
          document.querySelector('#notAssociated').style.display = "none";
          return;
      }
      document.querySelector('#notAssociated').style.display = "";
      return;
    };


    window.addEventListener("load", function(){
        $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });


</script>


