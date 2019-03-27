<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Pokemon Reborn</h3>
        </div>

        <ul class="list-unstyled components">
            <p><?php echo $txt_titulo_menu_geral; ?></p>
            <li <?php if($this->uri->segment(1) == 'home'){?> class="active" <?php } ?>>
                <a href="/home"><?php echo $txt_home; ?></a>
            </li>
            <li <?php if($this->uri->segment(1) == 'bag'){?> class="active" <?php } ?>>
                <a href="/bag"><?=$txt_mochila;?></a>
            </li>
            <li <?php if($this->uri->segment(1) == 'my-team'){?> class="active" <?php } ?>>
                <a href="/my-team"><?=$txt_meu_time;?></a>
            </li>
            <li <?php if($this->uri->segment(1) == 'my-pokes'){?> class="active" <?php } ?>>
                <a href="/my-pokes"><?=$txt_meus_pokes;?></a>
            </li>
            
        </ul>
        <center>
       		<a type="button" class="btn btn-danger" href="/logout"><?php echo $txt_sair; ?></a>
   		</center>
    </nav>