<?php 

	foreach($dados as $item):


	$raridade = $item->raridade;

	$i = 0;
?>
	<!-- Estilo da bag -->
	<div class="bg-item-detail-on-bag">
 	
 		<img src="<?php echo URL_IMAGENS ?>/items/<?php echo $item->tipo; ?>/<?php echo $item->nome; ?>.png" style="padding-top: 15px" />

 	</div>
 	<div class="g-detail-text-on-bag">
 		<!-- Nome do item -->
 		<?php echo $txt_nome.": <Strong>".$item->nome."</strong>"; ?><br>

 		<!-- Raridade do item -->
 		<?php echo $txt_raridade ?>:
 		<?php
 		while($i < $raridade){
 		?>
 		<i class="fa fa-star" style="color: #DAA520"></i>
 		<?php $i++; } ?>
 		<?php
 		while($i < 5){
 		?>
 		<i class="fa fa-star-o"></i>
 		<?php $i++; } ?><br>

 		<!-- Preço do item -->
 		<?php echo $txt_preco_de_venda; ?>:
 		<?php 
 		if($item->silver > 0){ 
 			echo "<img src='".site_url()."assets/imgs/icons/silver.png'>".$item->silver/2;
 		}else {
 			echo "";
 		}
 		if($item->gold > 0){
 			echo "<img src='".site_url()."assets/imgs/icons/gold.png'>".$item->gold/2;
 		}else { 
 			echo "";
 		}
 		?>
 		<br>
 		<br>
 		Descrição
 		<br>
 		<small><strong><?php echo $this->lang->line('desc_'.$item->tipo.'_'.$item->id.'') ?></strong></small>
 		<br>
 		<?php if($item->usavel == 1){ ?>
 			<button class="btn btn-primary">Usar</button>
 		<?php } ?>
 		<br>

 		<small><strong>(<?php echo $txt_para_vender; ?>)</strong></small>

 	</div>
<?php

	endforeach;

?>
