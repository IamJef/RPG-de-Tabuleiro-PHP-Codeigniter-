<?php 
	//Somando a porcentagem para o tamanho das barras
	function porcentagem($min, $max)
	{

		$porcentagem = floor($min / $max * 100);

		return $porcentagem;
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

    <h2 class="text-center"><?=$txt_meu_personagem?></h2>
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<center>
				<!-- Card com as infos do personagem -->
				<div class="card badges-home col-lg-10">
					<div class="card-header">
						<i class="fa fa-user" aria-hidden="true"></i> <?=$txt_meu_personagem?>
					</div>
					<div class="card-body">
						<div class="character float-left">
							<img src="<?php echo URL_IMAGENS ?>/treinadores/mini/<?=$dados['personagem']; ?>.png" class="rounded" alt="<?=$dados['nome']; ?>">
						</div>
						<div class="dados-personagem">
							<?=$txt_nome;?> : <strong><?=$dados['nome']?></strong><br>
							<?=$txt_nivel;?> : <strong><?=$dados['nivel']?></strong><br>
							<?=$txt_rank;?> : <strong><?=$dados['rank']?></strong><br>
							<?=$txt_regiao;?> : <strong><?=$dados['regiao']?></strong><br>
						</div>
					</div>
				</div>
				<br>
				<!-- Card com o time do personagem -->
				<div class="card badges-home col-lg-10">
					<div class="card-header">
						<i class="fa fa-info-circle" aria-hidden="true"></i> <?=$txt_meu_time;?> <br>
						<small><a href="#" style="text-decoration: underline;color:var(--blue);"><?=$txt_info_detalhada?></a></small>
					</div>
					<div class="card-body">
						<div class="time-equipado">
						<center>
							<i class="fa fa-hand-paper-o" aria-hidden="true"></i>
							<strong><?=$txt_pokes_in_hand?> <?=$qtd_inhand?> / 6</strong><br>
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
									<div tabindex="0" class="poke-bg shadow mt-2 tipo-<?=$time->tipo1?>" data-toggle="popover" data-trigger="focus" title="<?=$titulo?>" 
										data-content="
								<center><Strong><?=$txt_info_pokemon?></strong></center>
								<br>
								<table class='tabela-popover text-center'>
									<tr>
										<th>ID</th>
										<th><Strong><?=$time->id?>(<?=$time->poke_id?>)</strong></th>
									</tr>
									<tr>
										<th><?=$txt_nivel?></th>
										<th><strong><?=$time->nivel?></strong></th>
									</tr>
									<tr>
										<th><?=$txt_apelido?></th>
										<th><strong><?=$apelido?></strong></th>
									</tr>
									<tr>
									<th><?=$txt_humor?></th>
										<th><strong><?=$time->nature?></strong></th>
									</tr>
									<tr>
									<th><?=$txt_podertotal?></th>
										<th><strong><?=$poderTotal?></strong></th>
									</tr>
									<tr>
									<th><?=$txt_capturadopor?></th>
										<th>
											<strong><?=$time->capturado_por;?></strong>
										</th>
									</tr>
									<tr>
									<th><?=$txt_capturadocom?></th>
										<th>
											<img src='<?php echo URL_IMAGENS ?>/items/ball/<?=$time->capturado_com?>.png' alt='<?=$time->capturado_com?>'>
										</th>
									</tr>
									</table>
									<BR>
									<table class='tabela-popover text-center'>
										<center><strong><?=$txt_estatisticas?></strong></center>
									<tr>
										<th>
										<i class='fa fa-hand-rock-o' aria-hidden='true'></i><?=$txt_ataque?>
										</th>
										<th>
										<strong><?=$time->ataque?>[<?=$time->ataque_ev?>]</strong>
										</th>
									</tr>
									<tr>
										<th>
										<i class='fa fa-shield' aria-hidden='true'></i><?=$txt_defesa?>
										</th>
										<th>
										<strong><?=$time->defesa?>[<?=$time->defesa_ev?>]</strong>
										</th>
									</tr>
									<tr>
										<th>
										*<i class='fa fa-hand-rock-o' aria-hidden='true'></i><?=$txt_espataque?>
										</th>
										<th>
										<strong><?=$time->spc_ataque?>[<?=$time->spc_ataque_ev?>]</strong>
										</th>
									</tr>
									<tr>
										<th>
											*<i class='fa fa-shield' aria-hidden='true'></i><?=$txt_espdefesa?>
										</th>
										<th>
											<strong><?=$time->spc_defesa?>[<?=$time->spc_defesa_ev?>]</strong>
										</th>
									</tr>
									</table>
									<BR>
									<table class='tabela-popover text-center'>
										<center><strong><?=$txt_vitaminas?></strong></center>
									<tr>
										<th>
										<img src='<?php echo URL_IMAGENS ?>/items/protein/Protein.png'><?=$txt_proteina?>
										</th>
										<th>
										<strong><?=($time->ataque_up / 3)?></strong>
										</th>
									</tr>
									<tr>
										<th>
										<img src='<?php echo URL_IMAGENS ?>/items/protein/Iron.png'><?=$txt_ferro?>
										</th>
										<th>
										<strong><?=($time->defesa_up / 3)?></strong>
										</th>
									</tr>
									<tr>
										<th>
										<img src='<?php echo URL_IMAGENS ?>/items/protein/Carbos.png'><?=$txt_carbo?>
										</th>
										<th>
										<strong><?=($time->velocidade_up / 3)?></strong>
										</th>
									</tr>
									<tr>
										<th>
										<img src='<?php echo URL_IMAGENS ?>/items/protein/HP up.png'><?=$txt_hp?>
										</th>
										<th>
										<strong><?=($time->hp_up / 3)?></strong>
										</th>
									</tr>
									<tr>
										<th>
										<img src='<?php echo URL_IMAGENS ?>/items/protein/Calcium.png'><?=$txt_calcio?>
										</th>
										<th>
										<strong><?=($time->spc_up / 3)?></strong>
										</th>
									</tr>
									</table>
									<BR>
									<table class='tabela-popover text-center'>
										<center><strong><?=$txt_ataques?></strong></center>
									<tr>
										<th>
										<?=$time->mataque_1?>	
										</th>
										<th>
										<?=$time->mataque_2?>	
										</th>
									</tr>
									<tr>
										<th>
										<?=$time->mataque_3?>	
										</th>
										<th>
										<?=$time->mataque_4?>	
										</th>
									</tr>
									</table>
										" >
										<strong class="text-white"><?=$time->nome?><br>(<?=$time->nivel?>) </strong><br>
										<?php if($time->shiny == 0){ ?>
										<img class="img-poke-in-bg" src="<?php site_url(); ?>assets/imgs/pokemons/<?=$time->poke_id; ?>.gif">
										<?php }else{ ?>
										<img class="img-poke-in-bg" src="<?php site_url(); ?>assets/imgs/pokemons/shiny/<?=$time->poke_id; ?>.gif">
										<?php } ?>
										<br>
										<img src="<?php site_url(); ?>assets/imgs/items/ball/<?=$time->capturado_com; ?>.png">
										<br>
										<?=$txt_tipo?>
										<div class="bg-tipo-<?=$time->tipo1;?> shadow">
											<?=$time->tipo1;?>
										</div>
										<div class="bg-tipo-<?=$time->tipo2;?> shadow mt-1">
											<?=$time->tipo2;?>
										</div>
										<br>
										Vida
										<div class="progress">
											<div class="progress-bar barra_hp progress-bar-animated progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo porcentagem($time->hp, $time->hp_max)?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
												<?=$time->hp;?> / <?=$time->hp_max;?>
											</div>
										</div>
										Exp
										<div class="progress">
											<div class="progress-bar barra_xp progress-bar-animated progress-bar-striped bg-success" role="progressbar" style="width: <?php echo porcentagem($time->exp, $time->max_exp)?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
												<?=$time->exp;?> / <?=$time->max_exp;?>
											</div>
										</div>
										<br>
									</div>
								<?php
									endforeach;
								}
							?>
							<small class="d-none d-lg-block d-xl-block"><?=$txt_clique_info?></small>
                        	<small class="d-block d-sm-none"><?=$txt_toque_info?></small>
						</center>
						</div>
					</div>
				</div>
					<!-- Fim do card time -->
					<br>
					<!-- Card com as insignias -->
					<div class="card badges-home col-lg-10">
							<div class="card-header">
								<i class="fa fa-star" aria-hidden="true"></i>
							 	<?=$txt_minhas_insignias?>
						</div>
						<div class="card-body">
							<?php 
							if($insignias == false){
								echo "<strong>".$txt_error_n_possui_insi."</strong>";
							}else{
								foreach($insignias as $dados): ?>
								<div class="insignia shadow mt-2">
									<img src="<?php site_url(); ?>assets/imgs/insignias/<?=$dados->nome; ?>.png">
									<br>
									<strong><?=$dados->nome; ?></strong>
								</div>
							<?php 
								endforeach;
							} ?>
						</div>
					</div>
				</div>
			</center>
		</div>
	</div>
</div>