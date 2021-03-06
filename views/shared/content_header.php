<?php
if(!isSet($new_url)){
  $new_url = "#";
}

if(!isSet($showNewButton)){
  $showNewButton = true;
}

if(!isSet($newButtonLabel)){
  $newButtonLabel = 'Carregar';
}

if(!isSet($export_url)){
  $export_url = "#";
}

if(!isSet($exportButton)){
  $exportButton = false;
}

if(!isSet($exportButtonLabel)){
  $exportButtonLabel = 'ExportarXLS';
}

?>

<div class="content_header">
    <input id="input_search_text" class="search_header" type="text" name="search_field" placeholder="Pesquisar...">
      <?php if($exportButton): ?>
              <a href="<?= $export_url ?>" class="export_button" ><?= $exportButtonLabel ?></a>
        <?php endif; ?>
        <?php if($showNewButton): ?>
            <a href="<?= $new_url ?>" class="upload_button" ><?= $newButtonLabel ?></a>
        <?php endif; ?>

</div>

<script>
    document.querySelector('#input_search_text').onchange = function(){
        let url = new URL(window.location.href);
        url.searchParams.set('search_field', this.value);
        window.location.href = url;
    }
    window.addEventListener('load', function(){
        let url = new URL(window.location.href);
        document.querySelector('#input_search_text').value = url.searchParams.get("search_field");
    });
</script>