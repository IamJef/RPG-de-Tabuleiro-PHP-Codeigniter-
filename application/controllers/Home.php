<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//Dados do usuario
	public $dados;
	public $time;
	public $insignias;

	//Construindo a pagina
	public function __construct()
	{
		parent::__construct();
		
		//Verificando o dioma
        if($this->utilitarios_model->isIdioma() == false)
        {
        	redirect('/change-language');
        }
		
		//Verificando se usuario está logado
		$logado = $this->utilitarios_model->isLogged();

        if($logado == false){
        	redirect('/my-characters');
        }
		//Arquivo de linguagem
		$this->lang->load('general_lang', $this->session->userdata('idioma'));
		
		//Idioma dos erros
        $this->config->set_item('language', $this->session->userdata('idioma')); 

        //Dados do personagem
        $this->dados = $this->utilitarios_model->dadosPersonagem($this->session->userdata('personagem_id'));

        //Time atual
        $this->time = $this->utilitarios_model->getMyTeam($this->session->userdata('personagem_id'), '');

        //Insignias do personagem
        $this->insignias = $this->utilitarios_model->getInsignias($this->session->userdata('personagem_id'));
	}
	//Pagian index
	public function index()
	{
		$titulo['titulo'] = 'Pokemon Reborn - '.$this->lang->line('title-home');
		
		$links = $this->utilitarios_model->menuLateralLinks();
		//Textos do menu lateral
		$txtMenuLateral = $links;

		//Textos para o conteudo da home
		$txtHome = array(
			'txt_meu_personagem'	=> $this->lang->line('txt_meu_personagem'),
			'dados'					=> $this->dados,
			'insignias'				=> $this->insignias,
			'time'					=> $this->time,
		'txt_error_n_possui_eqpd'   => $this->lang->line('txt_error_n_possui_eqpd'),
		'txt_error_n_possui_insi'	=> $this->lang->line('txt_error_n_possui_insi'),
			'qtd_inhand'			=> $this->utilitarios_model->getQtdEqp($this->session->userdata('personagem_id')),
			'txt_nome'				=> $this->lang->line('txt_nome'),
			'txt_nivel'				=> $this->lang->line('txt_nivel'),
			'txt_rank'				=> $this->lang->line('txt_rank'),
			'txt_regiao'			=> $this->lang->line('txt_regiao'),
			'txt_meu_time'			=> $this->lang->line('txt_meu_time'),
			'txt_clique_info'		=> $this->lang->line('txt_clique_mais_info'),
			'txt_toque_info'		=> $this->lang->line('txt_toque_mais_info'),
			'txt_pokes_in_hand'		=> $this->lang->line('txt_pokes_in_hand'),
			'txt_info_detalhada' 	=> $this->lang->line('txt_info_detalhada'),
			'txt_info_pokemon'		=> $this->lang->line('txt_info_pokemon'),
			'txt_apelido'			=> $this->lang->line('txt_apelido'),
			'txt_humor'				=> $this->lang->line('txt_humor'),
			'txt_podertotal'		=> $this->lang->line('txt_podertotal'),
			'txt_capturadopor'		=> $this->lang->line('txt_capturadopor'),
			'txt_capturadocom'		=> $this->lang->line('txt_capturadocom'),
			'txt_estatisticas'		=> $this->lang->line('txt_estatisticas'),
			'txt_ataque'			=> $this->lang->line('txt_ataque'),
			'txt_defesa'			=> $this->lang->line('txt_defesa'),
			'txt_espataque'			=> $this->lang->line('txt_espataque'),
			'txt_espdefesa'			=> $this->lang->line('txt_espdefesa'),
			'txt_vitaminas'			=> $this->lang->line('txt_vitaminas'),
			'txt_proteina'			=> $this->lang->line('txt_proteina'),
			'txt_ferro'				=> $this->lang->line('txt_ferro'),
			'txt_carbo'				=> $this->lang->line('txt_carbo'),
			'txt_hp'				=> $this->lang->line('txt_hp'),
			'txt_calcio'			=> $this->lang->line('txt_calcio'),
			'txt_ataques'			=> $this->lang->line('txt_ataques'),
			'txt_minhas_insignias'	=> $this->lang->line('txt_minhas_insignias'),
			'txt_tipo'				=> $this->lang->line('txt_tipo')
		);
		//Imprimindo a pagina home
		$this->load->view('layout/header_with_login', $titulo);
		$this->load->view('layout/menu_lateral_logado', $txtMenuLateral);
		$this->load->view('home', $txtHome);
		$this->load->view('layout/footer_with_login');
	}
	//Pagina de logout
	public function logout()
	{
		unset(
	        $_SESSION['conta_id'],
	        $_SESSION['personagem_id']
		);
		redirect('/login');
	}
}	

