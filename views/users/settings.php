<?php

use yii\helpers\Html;

?>
<div class='row'>
  <div class="col-sm">
    <?= $this->render('../shared/left_column', ['active' => 'settings']); ?>
  </div>
    <div class="col-lg">
       <div class="content_settings"  > <?= Html::img('img/settings.png') ;?> Definições </div>
         <div class="settings_head">
            <ul class="settings_ul">
                <li><a  href="/index.php?r=users/password"><button class="settings">Alterar Dados</button> </a></li>

                <div class="settings">Politica de Privacidade</div>

            </ul>
         </div>
        <div class="settings_privacity">
            A sua privacidade é importante para nós. É política do site respeitar a sua privacidade em relação a qualquer informação sua que possamos coletar no site , e outros sites que possuímos e operamos.<p>

            Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um serviço. Fazemo-lo por meios justos e legais, com o seu conhecimento e consentimento. Também informamos por que estamos coletando e como será usado.<p>

            Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado. Quando armazenamos dados, protegemos dentro de meios comercialmente aceitáveis para evitar perdas e roubos, bem como acesso, divulgação, cópia, uso ou modificação não autorizados.

            Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto quando exigido por lei.<p>

            O uso continuado de nosso site será considerado como aceitação de nossas práticas em torno de privacidade e informações pessoais. Se você tiver alguma dúvida sobre como lidamos com dados do usuário e informações pessoais, entre em contacto connosco.
        </div>
    </div>
</div>

