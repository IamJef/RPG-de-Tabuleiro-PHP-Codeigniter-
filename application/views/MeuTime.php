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

    <h2 class="text-center"><?=$txt_meu_personagem?></h2>
	<div class="jumbotron jumbotron-fluid">
		<div class="container">   
			<center>        
	            <!-- Card da bag -->
	            <div class="card badges-home col-lg-10 col-md-12">
	                <div class="card-header">
	                    <i class="fa fa-gamepad" aria-hidden="true"></i> <?=$txt_organizar_time?>
	                </div>
	                <div class="card-body">
	                	<strong><?=$txt_time_atual?></strong><br>
	                	<span class="sucesso-alter-order" style="color:green;display: none;"><strong><i class="fa fa-check" aria-hidden="true"></i><?=$txt_att_sucesso_ordem?></strong></span>
	                	<!-- Alterar time PC -->
<!-- 	                	<div class="trocar-ordem-desk d-none d-lg-block d-xl-block">
		                	<ul class="my-team-list" style="list-style-type: none;">
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
									
									<li data="<?php echo $time->id; ?>">
										
										<img data-toggle="tooltip"  data-html="true" data-placement="right" title="
										<?php echo $apelido; ?> (<?=$time->nivel?>)<br>
										<?=$txt_podertotal?>: <?=$poderTotal?>
										" class="fundo-bg-my-team-order" src="<?php echo URL_IMAGENS ?>/pokemons/icon/<?=$time->poke_id; ?>.gif">
									</li>

									<?php
								
										endforeach;
									}
								?>
							</ul>
							<Br>
							<br><br>
							<small class="d-none d-lg-block d-xl-block" style="font-weight: bold">Arraste os icones para organizar a sequencia</small>	 -->					</div>
                        	<div class="carregaAquiDentroOMOBNew">
		                	<?php
		                			//Verifica o resultado
									if($timeMob == false)
									{
										echo "<strong>".$txt_error_n_possui_eqpd."</strong>";
									}else{
										$s = 1;
										//Foreach com o time
										foreach($timeMob as $timeMob):
										//Apelido
										if($timeMob->apelido == '')
										{
											$apelidoMob = $timeMob->nome;
										}else{
											$apelidoMob = $timeMob->apelido;
										}

										//Titulo
										$titulo = "<center>".$timeMob->nome." [".$timeMob->nivel."]</center>";
										//Poder total
										$poderTotal = $timeMob->ataque + $timeMob->defesa + $timeMob->velocidade + $timeMob->spc_ataque + $timeMob->spc_defesa;
									?>
										<div class="pokemon-li-mobile <?php echo $s; ?>">
											<div class="fundo-bg-my-team-order-mob pokemonid<?php echo $timeMob->id; ?>">
											<img style="float:left;"  src="<?php echo URL_IMAGENS ?>/pokemons/<?php if($timeMob->shiny == 1){ echo "shiny/"; } ?>icon/<?=$timeMob->poke_id; ?>.gif">
											<STRONG style="float: left;color: white"><?=$apelidoMob?>(<?=$timeMob->nivel?>)</STRONG>
											
											<div class="alter-options text-right">
												<strong class="position-atual" style="color:white;"><?php echo $timeMob->hand_position; ?></strong>
												<i class="fa fa-arrow-circle-up" onclick="mudarOrdemTime('cima',<?php echo $timeMob->id; ?>)"  style="cursor:pointer;color:yellow" aria-hidden="true"></i>

												<i class="fa fa-arrow-circle-down" onclick="mudarOrdemTime('baixo',<?php echo $timeMob->id; ?>)"   style="cursor:pointer;color:yellow" aria-hidden="true"></i>
												
											</div>
										</div>
										</div>

									<?php
									$s++;
										endforeach;
									}
								?>
							
							<small><Strong><?=$txt_use_setas_time?></Strong></small>

                        	</div>
	                </div>
	            </div>
            </center>
		</div>
	</div>
</div>