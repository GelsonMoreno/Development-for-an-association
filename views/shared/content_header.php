<?php
if(!isSet($new_url)){
  $new_url = "#";
}

?>

<div class="content_header">
        <input class="search_header" type="text" name="search" placeholder="Pesquisar...">
        <a href="<?= $new_url ?>" class="upload_button" >Carregar</a>
</div>
