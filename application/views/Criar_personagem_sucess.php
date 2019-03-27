<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Pokemon Reborn</h3>
        </div>

        <ul class="list-unstyled components">
            <p>{menu_principal}</p>
            <li>
                <a href="/my-characters">{meus_personagens}</a>
            </li>
            <li class="active">
                <a href="/create-character">{criar_personagem}</a>
            </li>
        </ul>
        <center>
       		<button type="button" class="btn btn-danger" onclick="location.href='/logout';">{sair}</button>
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
                    {criar_personagem}
                </h2>
                <div class="alert alert-success" role="alert">
                    {mensagem_personagem_sucesso}
                    
                    <button class="btn btn-info" onclick="location.href='/my-characters';">
                        {meus_personagem_botao}
                    </button>
                </div>
            </center>
    	</div>

        <div class="line"></div>
    </div>
</div>