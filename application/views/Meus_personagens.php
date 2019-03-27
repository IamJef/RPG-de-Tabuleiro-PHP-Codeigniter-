        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Pokemon Reborn</h3>
                </div>

                <ul class="list-unstyled components">
                    <p><?=$meus_personagens?></p>
                    <li <?php if($this->uri->segment(1) == 'my-characters'){?> class="active" <?php } ?>>
                        <a href="/my-characters"><?=$meus_personagens?></a>
                    </li>
                    <li>
                        <a href="/create-character"><?=$criar_personagem?></a>
                    </li>
                </ul>
                <center>
               		<a type="button" class="btn btn-danger" href="/logout"><?=$sair?></a>
           		</center>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span><?=$menu_lateral?></span>
                            </button>
                        </div>
                    </div>
                </nav>
				
				<div class="col-lg-12">
                    <center>
	                <h2><?=$meus_personagens?></h2>
                    <em><?=$mensagem?></em>
                    <br>
                    <?php
                    
                    foreach($personagens as $dados):
                    	if($dados->conta_id == $this->session->userdata('conta_id')){
                    ?>
                        <div class="card text-center col-lg-3 float-left ml-1">
                                <div class="card-header">
                                    <strong><?=$dados->nome; ?></strong> - <?=$dados->rank; ?>
                                </div>
                                <div class="card-body">
                                    <p><small>Nível : <?=$dados->nivel; ?></small><br>
                                    <small>Região : <?=$dados->regiao; ?></small></p>
                                    <img src="<?php site_url(); ?>assets/imgs/treinadores/mini/<?=$dados->personagem; ?>.png" class="rounded" alt="<?=$dados->nome; ?>">
                                </div>
                                <div class="card-footer text-muted">
                                    <button onclick="location.href = '/do-login/<?=$dados->id;?>';" class="btn btn-info"><?=$jogar?></button>
                                    <button class="btn btn-outline-danger"><?=$deletar?></button>
                                </div>
                        </div>
                    <?php
                }
                    endforeach;
                    ?>
                    </center>              
            	</div>

                <div class="line"></div>
            </div>
        </div>