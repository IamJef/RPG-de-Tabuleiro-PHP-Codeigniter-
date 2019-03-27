<?php 
switch ($dados['bag']) {
    case 'default': $sTotal = 84; break;
    case 'yellow': $sTotal = 117; break;
    case 'blue': $sTotal = 143; break;
    case 'red': $sTotal = 169; break;
    case 'super': $sTotal = 208; break;
}
?>
<!-- Conteudo da pagina -->
<div id="content">

	<!-- Barra com o icone do menu lateral -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    <span><?=$txt_menu_lateral?></span>
                </button>
            </div>
        </div>
    </nav>
    <h2 class="text-center"><?=$txt_minha_mochila?></h2>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <center>           
            <!-- Card da bag -->
            <div class="card badges-home col-lg-10 col-md-12">
                <div class="card-header">
                    <i class="fa fa-inbox" aria-hidden="true"></i> <?=$txt_minha_mochila?>
                </div>
                <div class="card-body">
                    
                        <spam><?=$txt_bag_atual?><Strong><?=$dados['bag']; ?> (<img src="<?php echo URL_IMAGENS ?>/items/box/<?=$dados['bag']?>.png">)</Strong></spam><br>
                        <?php 
                        if($dados['bag'] != 'super'){ ?>

                        <button class="btn btn-info shadow">
                            <?=$txt_aumentar_bag?>
                        </button>
                        <br>
                        <?php
                        }
                        ?>
                        <br>
                        <?php if($qtdItensBag >= $sTotal){ ?>
                            <strong style="color: red"><?=$qtdItensBag?> / <?=$sTotal?></strong>
                        <?php }else{ ?>
                            <strong><?=$qtdItensBag?> / <?=$sTotal?></strong>
                        <?php } ?>
                        <br>
                        <?php 
                        //Loop com os itens
                        foreach($dadosItem as $item):
                        ?>
                        <div class="bag-empty shadow float-left ml-1 mt-2" style="cursor: pointer" onclick="showInfoItem(<?php echo $item->id; ?>)">
                            <img src="<?php echo URL_IMAGENS ?>/items/<?=$item->tipo; ?>/<?=$item->nome; ?>.png">
                            <br>
                            <strong><?=$item->qtd; ?>x</strong>
                        </div>
                        <?php
                        endforeach;
                        ?>

                        <div class="slots">
                           <!--  <?php
                            //Slots do personagem
                            $sPersonagem = $dados['bag_slots'];
                            //Quantos slots estão vazios
                            $sVazio = $sTotal - $qtdItensBag;
                            //Quantos slots estão bloqueados
                            //$sBlock = $sTotal - $sPersonagem;
                            
                            //Variavel inicial do loop
                            $f = 0;
                            //Exibino slots da bag
                            while($f < $sVazio){
                            ?>
                                <div class="bag-empty shadow float-left ml-1 mt-2">
                                </div>
                            <?php $f++; } ?> -->
                            
                            <!-- <?php
                            $b = 0;
                            //Exibino slots da bag
                            while($b < 10){
                            ?>
                            <div class="bag-empty shadow float-left ml-1 mt-2">
                                <i class="fa fa-lock fa-2x" style="line-height:50px;" aria-hidden="true"></i>
                           </div>
                           <?php $b++; } ?> -->
                       </div>
                </div>
            </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?=$txt_titulo_modal?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body conteudoModalItem">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $txt_fechar; ?></button>
      </div>
    </div>
  </div>
</div>
            </center>
        </div>
    </div>
</div>