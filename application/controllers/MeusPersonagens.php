<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MeusPersonagens extends CI_Controller {

	//Construindo a pagina
	public function __construct()
	{
		parent::__construct();
		
		//Verificando o dioma
        if($this->utilitarios_model->isIdioma() == false)
        {
        	redirect('/change-language');
        }
		//Form validation
		$this->load->library('form_validation');

		//Model de criando personagem
		$this->load->model("personagens_model");

		//Arquivo de linguagem
		$this->lang->load('meus_personagens', $this->session->userdata('idioma'));
		
		//Idioma dos erros
        $this->config->set_item('language', $this->session->userdata('idioma')); 
		
		//Fundo de erro do bootstrap
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
		
		//Verificando se o usuario está online
		if($this->session->userdata('conta_id') == null)
		{
			redirect('/login');
		}

		if($this->session->userdata('personagem_id') != null)
		{
			redirect('/home');
		}
	}

	//Pagina principal
	public function index()
	{
		//Verificando se o usuario possui personagens
		$personagens = $this->personagens_model->getAllPersonagens($this->session->userdata('conta_id'));

		$textoH['titulo'] = $this->lang->line('titulo_pagina_meus');
		$textos = array(
			'sair'				=> $this->lang->line('txt_sair'),
			'meus_personagens' 	=> $this->lang->line('titulo_menu_lateral'),
			'criar_personagem'  => $this->lang->line('titulo_criar_personagem'),
			'menu_lateral'		=> $this->lang->line('titulo_menu_lateral_txt'),
			'jogar'				=> $this->lang->line('txt_jogar'),
			'deletar'			=> $this->lang->line('txt_deletar')
		);
		if($personagens == false){
			$textos['mensagem'] = $this->lang->line('txt_n_tem_perso');
			$textos['personagens'] = false;
		}else{
			$textos['mensagem'] = '';
			$textos['personagens'] = $personagens;
		}
		//Caso contrario vai exibir uma frase de abaixo estão os personagens
		$this->load->view('layout/header_with_login', $textoH);
		$this->load->view('Meus_personagens', $textos);
		$this->load->view('layout/footer_with_login');
	}
	//Pagina de criar conta
	public function criarPagina()
	{
		$txtHeader = array(
			'titulo' 			=> $this->lang->line('titulo_pagina_criar'),
			'sair'				=> $this->lang->line('txt_sair'),
			'meus_personagens' 	=> $this->lang->line('titulo_menu_lateral'),
			'criar_personagem'  => $this->lang->line('titulo_criar_personagem'),
			'menu_lateral'		=> $this->lang->line('titulo_menu_lateral_txt'),
			'nome'				=> $this->lang->line('txt_nome'),
			'personagens'		=> $this->lang->line('txt_personagens'),
			'regiao'			=> $this->lang->line('txt_regiao'),
			'iniciais_regiao'	=> $this->lang->line('txt_iniciais_regiao'),
			'clique_iniciais'	=> $this->lang->line('txt_clique_iniciais_reg'),
			'toque_iniciais'	=> $this->lang->line('txt_toque_iniciais_reg'),
			'criar'				=> $this->lang->line('txt_criar'),
			'min_e_max_carac'	=> $this->lang->line('txt_maxemincarac'),
			'menu_principal'	=> $this->lang->line('txt_menu_principal')
		);
		$this->parser->parse('layout/header_with_login', $txtHeader);
		$this->parser->parse('criar_personagem', $txtHeader);
		$this->load->view('layout/footer_with_login');
	}

	//Função de criar conta
	public function criar()
	{
		//Tratando o formulario de registro
        $this->form_validation->set_rules(
        	'nome',
        	'lang:nome',
        	'required|min_length[3]|max_length[12]|is_unique[user_personagem.nome]'
        );
        $this->form_validation->set_rules(
        	'personagem',
        	'lang:personagem',
        	'se_existe[personagens_para_criar.id]'
        );
        $this->form_validation->set_rules(
        	'pokemonInicial',
        	'lang:pokeInicial',
        	'required|se_existe[pokemons_iniciais.poke_id]'
        );

        if ($this->form_validation->run() == FALSE)
        {
			$txtHeader = array(
				'titulo' 			=> $this->lang->line('titulo_pagina_criar'),
				'sair'				=> $this->lang->line('txt_sair'),
				'meus_personagens' 	=> $this->lang->line('titulo_menu_lateral'),
				'criar_personagem'  => $this->lang->line('titulo_criar_personagem'),
				'menu_lateral'		=> $this->lang->line('titulo_menu_lateral_txt'),
				'nome'				=> $this->lang->line('txt_nome'),
				'personagens'		=> $this->lang->line('txt_personagens'),
				'regiao'			=> $this->lang->line('txt_regiao'),
				'iniciais_regiao'	=> $this->lang->line('txt_iniciais_regiao'),
				'clique_iniciais'	=> $this->lang->line('txt_clique_iniciais_reg'),
				'toque_iniciais'	=> $this->lang->line('txt_toque_iniciais_reg'),
				'criar'				=> $this->lang->line('txt_criar'),
				'min_e_max_carac'	=> $this->lang->line('txt_maxemincarac'),
				'menu_principal'	=> $this->lang->line('txt_menu_principal')
			);
			$this->parser->parse('layout/header_with_login', $txtHeader);
			$this->parser->parse('criar_personagem', $txtHeader);
			$this->load->view('layout/footer_with_login');
        }
        else
        {
        	//Dados vindo do formulario
        	$nome 			= $this->input->post("nome");
        	$personagem 	= $this->input->post("personagem");
        	$pokemonInicial = $this->input->post("pokemonInicial");
        	
        	//textos
        	$textos = array(
        		'titulo' 						=> $this->lang->line('titulo_pagina_criar'),
        		'mensagem_personagem_sucesso'	=> $this->lang->line('mensagem_personagem_sucesso'),
        		'meus_personagem_botao'			=> $this->lang->line('mensagem_botao_sucesso'),
        		'menu_principal'				=> $this->lang->line('txt_menu_principal'),
        		'meus_personagens' 				=> $this->lang->line('titulo_menu_lateral'),
				'criar_personagem' 			 	=> $this->lang->line('titulo_criar_personagem'),
				'titulo' 						=> $this->lang->line('titulo_pagina_criar'),
				'sair'							=> $this->lang->line('txt_sair')
        	);

        	//Array com os dados
        	$data = array(
				'nome' 				=> $nome,
				'personagem'  		=> $personagem,
				'pokemonInicial'	=> $pokemonInicial,
				'conta_id'			=> $this->session->userdata('conta_id')
			);
			
			//Chamando a função
			$this->personagens_model->criarPersonagem($data);

			$this->parser->parse('layout/header_with_login', $textos);
        	$this->parser->parse('Criar_personagem_sucess', $textos);
        	$this->load->view('layout/footer_with_login');
        }
	}
	//Função de fazer login
	public function doLogin($id)
	{

		//ID da conta
		$conta_id = $this->session->userdata('conta_id');
		
		//Verificando se eu sou dono da ID recebida pelo get
		$dados = $this->personagens_model->getInfoPersonagem($id, $conta_id);

		//Não existe esse personagem
		if($dados == false){
			redirect('/my-characters');
		}else{
			//Verificando se a pessoa é dona da conta(OBVIAMENTE NÉ BRO, FAZ O SOL AE)
			if($dados['conta_id'] != $conta_id){
				redirect('/'.$dados['conta_id']);
			}
		}

		//Array com a sessão que será criada
		$sessions = array(
			'personagem_id' => $dados['id']
		);
		//Criando a sessao do personagem
		$this->session->set_userdata($sessions);

		//redirecionando para o inicio
		redirect('/home');
	}
	//Pagina de logout
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/login');
	}
}