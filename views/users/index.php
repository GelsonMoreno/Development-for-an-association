<?php
use \app\models\User_types;
?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'users']);?>
  </div>
  <div class="col-lg">
    <?= $this->render('../shared/content_header',['new_url'=>'index.php?r=users/new', 'newButtonLabel'=> 'Criar']);?>
      <div class="content_header_users">
          <div class="w3-show-inline-block">
              <div class="w3-bar">
                  <button id="all_users_button" class="type_user" data-user_type="">Todos</button>
                  <?php foreach(User_types::find()->all() as $user_type): ?>
                      <button class="type_user" data-user_type=<?= $user_type->id ?>><?= $user_type->designation ?></button>
                  <?php endforeach;?>
                  <script>
                      // Isto é usado para colocar a class active no botão correto quando a página é carregada
                      document.addEventListener('DOMContentLoaded', function(){
                          let url = new URL(window.location.href);
                          if(url.searchParams.get('filter_users')){
                              document.querySelector(`button[data-user_type="${url.searchParams.get('filter_users')}"`).classList.add('button_active');
                          } else {
                              document.querySelector('#all_users_button').classList.add('button_active');
                          }
                      });
                      // Selecionar todos os botões de search e adicionar o event onclick
                      document.querySelectorAll('button[data-user_type]').forEach(function(button){
                          button.onclick = function(){
                              let url = new URL(window.location.href);
                              if(this.dataset.user_type) {
                                  url.searchParams.set('filter_users', this.dataset.user_type);
                              } else {
                                  url.searchParams.delete('filter_users');
                              }
                              window.location.href = url;
                          };
                      });
                  </script>
              </div>
          </div>
      </div>
      <table id="t01">
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>NIF</th>
              <th>Telefone</th>
              <th></th>
          </tr>
        <?php foreach ($users as $users_data): ?>
            <tr>
                <td><?= $users_data->id ?></td>
                <td><?= $users_data->name ?></td>
                <td><?= $users_data->email ?></td>
                <td><?= $users_data->nif ?></td>
                <td><?= $users_data->number ?></td>
                <td class="td_button">
                    <a href="/index.php?r=users/show&users_id=<?= $users_data->id ?>"><i class="bi bi-person-fill"></i></i></a>
                    <a href="/index.php?r=users/update&users_id=<?= $users_data->id ?>"><i class="bi bi-pen-fill"></i></a>
                    <a href="/index.php?r=users/delete&users_id=<?= $users_data->id ?>" data-confirm="Tens a certeza que pretendes eliminar este registro?"> <i class="bi bi-trash-fill"></i></a>
                </td>
            </tr>
        <?php endforeach;?>
      </table>
  </div>
</div>
