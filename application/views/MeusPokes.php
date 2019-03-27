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

    <h2 class="text-center"><?=$txt_meus_pokes?></h2>
	<div class="jumbotron jumbotron-fluid">
		<div class="container">   
			<center>    
                <button type="button" class="btn btn-primary">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    Pokemons na mão
                </button>
                <button type="button" class="btn btn-outline-primary">
                    <i class="fa fa-th" aria-hidden="true"></i>
                    Meus Pokemons
                </button>
                <br>
                <br>
                <div id="Pokes-in-hand-more-info">
                    <?php
                            //Verifica o resultado
                                if($time == false)
                                {
                                    echo "<strong>".$txt_error_n_possui_eqpd."</strong>";
                                }else{
                                    //Foreach com o time
                                    foreach($time as $time):

                                    //Apelido
                                    if($time->apelido == '')
                                    {
                                        $apelido = $time->nome;
                                    }else{
                                        $apelido = $time->apelido;
                                    }
                                    //Titulo
                                    $titulo = "<center>".$time->nome." [".$time->nivel."]</center>";
                                    //Poder total
                                    $poderTotal = $time->ataque + $time->defesa + $time->velocidade + $time->spc_ataque + $time->spc_defesa;
                                ?>
                    <div class="bg-more-info-in-hand col-md-12 col-sm-12 col-lg-4 col-xl-4">
                        <br>
                        <ul class="list-group">
                            <li class="list-group-item align-items-center text-truncate">
                                <STRONG>
                                    <?=$time->nome?> [<?=$time->nivel?>]
                                    <?php 
                                    if($time->apelido != ''){
                                        echo "(".$time->apelido.")";
                                    }
                                    ?>
                                </STRONG>
                            </li>
                        </ul>
                        <br>
                        <li class="align-items-center button-action-my-poke-in-card" style="list-style: none">
                            <button class="btn btn-success btn-sm">
                                <i class="fa fa-arrows-h" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-dark btn-sm">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                             <button class="btn 
                             <?php if($time->favorito == 0){ 
                                echo "btn-outline-warning";
                            }else{ 
                                echo "btn-warning"; 
                             } ?> float-right">
                                <i class="estrela-favorito-in-card fa fa-star estrela<?=$time->hand_position;?>" style="color:#fff" aria-hidden="true"></i>
                            </button>
                            <?php if($time->inicial){ ?>
                                <i class="estrela-favorito-in-card fa fa-heart fa-2x float-left" style="color:var(--red)" aria-hidden="true"></i>
                            <?php } ?>
                        </li>
                        <Br>
                        <div class="img-in-card-more-info">
                            <img src="
                            <?php echo URL_IMAGENS ?>/pokemons/<?php if($time->shiny == 1){ echo "shiny/"; } ?><?php echo $time->poke_id;?>.gif">
                            <br>
                            <br>
                        </div>
                        <div class="progress" style="height: 15px;width: 100px;">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 5%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                            <small style="font-weight: bold; color: #fff">100/10</small>
                        <br>
                        <strong style="color:white"><?=$txt_podertotal?>: <i style="text-decoration: underline"><?=$poderTotal?></i></strong>
                        <br>
                        <br>
                        <div class="type-my-poke-in-card">
                            <?=$txt_tipo?>
                            <div class="bg-tipo-<?=$time->tipo1?> shadow">
                               <?=$time->tipo1?>
                            </div>
                            <?php if($time->tipo2 != ''){ ?>
                                <div class="bg-tipo-<?=$time->tipo2; ?> shadow mt-1">
                                 <?=$time->tipo2; ?>
                            </div>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="table-in-card-more-info">
                            <Strong class="text-white"><?=$txt_estatisticas?></Strong>
                            <ul class="list-group">
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                Ataque
                                <strong>
                                    <?=$time->ataque?>[<?=$time->ataque_ev?>]
                                </strong>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                Defesa
                                <strong>
                                    <?=$time->defesa?>[<?=$time->defesa_ev?>]
                                </strong>
                              </li>
                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                Esp. Ataque
                                <strong>
                                    <?=$time->spc_ataque?>[<?=$time->spc_ataque_ev?>]
                                </strong> 
                              </li>
                               <li class="list-group-item d-flex justify-content-between align-items-center">
                                Esp. Defesa
                                <strong>
                                    <?=$time->spc_defesa?>[<?=$time->spc_defesa_ev?>]
                                </strong> 
                              </li>
                               <li class="list-group-item d-flex justify-content-between align-items-center">
                                Humor
                                <strong>
                                    <?php echo ucfirst($time->nature); ?>
                                </strong> 
                              </li>
                            </ul>
                            <br>
                        </div>
                    </div>
                    <?php
                endforeach;
            }
                ?>
                </div> 
            </center>
        </div> 
    </div>
</div>

