<?php


?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'settings']); ?>

    <section class="content">
      <div class="dados">
        <h3>alterar dados</h3>
        <form class="modelo" method="POST">
          <input class="field1" name="Password">
          <input class="field2" name="Nova Password">
          <input class="field3" name="Confirmar Password">
          <input class="field4" name="Editar endereço">
          <input type="submit" value="Guardar">
        </form>

      </div>
    </section>