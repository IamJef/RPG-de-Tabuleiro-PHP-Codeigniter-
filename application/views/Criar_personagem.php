<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Pokemon Reborn</h3>
        </div>

        <ul class="list-unstyled components">
            <p><?=$menu_principal?></p>
            <li>
                <a href="/my-characters"><?=$meus_personagens?></a>
            </li>
            <li class="active">
                <a href="/create-character"><?=$criar_personagem?></a>
            </li>
        </ul>
        <center>
       		<button type="button" class="btn btn-danger" onclick="location.href='/logout';"><?=$sair?></button>
   		</center>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                        <span><i class="fa fa-bars" aria-hidden="true"></i></span>
                    </button>
                </div>
            </div>
        </nav>
		<div class="col-lg-12">
            <center>
                <h2>
                    <?=$criar_personagem?>
                </h2>
                <?php 
                    $atributo = array('class' => 'form-signin');

                    echo form_open('create-character-done', $atributo);
                ?>
                    <div class="erros">
                      <?php echo validation_errors(); ?>
                    </div>
                    <label for="inputNick"><?=$nome?></label>
                    <input type="text" id="inputNick" name="nome" class="form-control inputCriarPerso" placeholder="<?=$nome?>" required autofocus>
                    <small><?=$min_e_max_carac?></small>
                    <br>
                    <br>
                    <label for="personagem"><?=$personagens?></label>
                    <div class="personagens"> 
                        <strong class="nomePerso">Ash</strong>
                        <div class="personagens-img">
                            <input type="hidden" value="1" name="personagem" id="imgPersoReg">
                            <i class="fa fa-arrow-left text-muted setaEsq" style="cursor: pointer;" onclick="regChangePerso(0)" aria-hidden="true"></i>
                                <img src="<?php echo URL_IMAGENS ?>/treinadores/1.png" id="imgPersoSelect" width="150" height="200" />
                            <i class="fa fa-arrow-right setaDir" style="cursor: pointer;" onclick="regChangePerso(1)" aria-hidden="true"></i>
                        </div>
                    </div>
                    <br>
                    <label for="regiao"><?=$regiao?></label>
                    <br>
                    <button type="button" onclick="regChangeReg('Kanto')" class="btnKanto btn btn-primary active mt-2">Kanto</button>
                    <button type="button" onclick="regChangeReg('Johto')" class="btnJohto btn btn-primary mt-2">Johto</button>
                    <button type="button" onclick="regChangeReg('Hoenn')" class="btnHoenn btn btn-primary mt-2">Hoenn</button>
                    <button type="button" onclick="regChangeReg('Sinnoh')" class="btnSinnoh btn btn-primary mt-2">Sinnoh</button>
                    <button type="button" onclick="regChangeReg('Unova')" class="btnUnova btn btn-primary mt-2">Unova</button>
                    <button type="button" onclick="regChangeReg('Kalos')" class="btnKalos btn btn-primary mt-2">Kalos</button>
                    <button type="button" onclick="regChangeReg('Alola')" class="btnKalos btn btn-primary mt-2">Alola</button>
                    <br>
                    <br>
                    <div class="iniciais-da-regiao">
                        <b><?=$iniciais_regiao?></b><br>
                        <small class="d-none d-lg-block d-xl-block"><?=$clique_iniciais?></small>
                        <small class="d-block d-sm-none"><?=$toque_iniciais?></small>
                        <br>
                        <div class="iniciaisKanto iniciais">
                            <label>
                                <input type="radio" name="pokemonInicial" value="1" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/1.gif" />
                            </label>
                            <label>
                                <input type="radio" name="pokemonInicial" value="4" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/4.gif" />
                            </label>
                            <label>
                                <input type="radio" name="pokemonInicial" value="7" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/7.gif" />
                            </label>
                        </div>
                        <div class="iniciaisJohto iniciais" style="display: none;">
                            <label>
                                <input type="radio" name="pokemonInicial" value="152" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/152.gif" />
                            </label>
                            <label>
                                <input type="radio" name="pokemonInicial" value="155" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/155.gif" />
                            </label>
                            <label>
                                <input type="radio" name="pokemonInicial" value="158" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/158.gif" />
                            </label>
                        </div>
                        <div class="iniciaisHoenn iniciais" style="display: none;">
                            <label>
                                <input type="radio" name="pokemonInicial" value="252" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/252.gif" />
                            </label>
                            <label>
                                <input type="radio" name="pokemonInicial" value="255" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/255.gif" />
                            </label>
                            <label>
                                <input type="radio" name="pokemonInicial" value="258" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/258.gif" />
                            </label>
                        </div>
                        <div class="iniciaisSinnoh iniciais" style="display: none;">
                            <label>
                                <input type="radio" name="pokemonInicial" value="387" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/387.gif" />
                            </label>
                            <label>
                                <input type="radio" name="pokemonInicial" value="390" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/390.gif" />
                            </label>
                            <label>
                                <input type="radio" name="pokemonInicial" value="393" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/393.gif" />
                            </label>
                        </div>
                        <div class="iniciaisUnova iniciais" style="display: none;">
                            <label>
                                <input type="radio" name="pokemonInicial" value="495" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/495.gif" />
                            </label>
                            <label>
                                <input type="radio" name="pokemonInicial" value="498" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/498.gif" />
                            </label>
                            <label>
                                <input type="radio" name="pokemonInicial" value="501" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/501.gif" />
                            </label>
                        </div>
                        <div class="iniciaisKalos iniciais" style="display: none;">
                            <label>
                                <input type="radio" name="pokemonInicial" value="650" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/650.gif" />
                            </label>
                            <label>
                                <input type="radio" name="pokemonInicial" value="653" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/653.gif" />
                            </label>
                            <label>
                                <input type="radio" name="pokemonInicial" value="656" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/656.gif" />
                            </label>
                        </div>
                        <div class="iniciaisAlola iniciais" style="display: none;">
                            <label>
                                <input type="radio" name="pokemonInicial" value="722" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/722.gif" />
                            </label>
                            <label>
                                <input type="radio" name="pokemonInicial" value="725" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/725.gif" />
                            </label>
                            <label>
                                <input type="radio" name="pokemonInicial" value="728" />
                                <img src="<?php echo URL_IMAGENS ?>/pokemons/728.gif" />
                            </label>
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-info" value="<?=$criar?>" />
                </form>
            </center>
    	</div>

        <div class="line"></div>
    </div>
</div>