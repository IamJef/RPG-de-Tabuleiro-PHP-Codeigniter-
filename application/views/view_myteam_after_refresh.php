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
			<img style="float:left;"  src="<?php echo URL_IMAGENS ?>/pokemons/icon/<?=$timeMob->poke_id; ?>.gif">
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
