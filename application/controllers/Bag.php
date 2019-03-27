<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bag extends CI_Controller {
	//Variaveis da classe
	public $dados;
	public $qtdBag;
	public $items;

	//Construindo a pagina
	public function __construct()
	{
		parent::__construct();

        //Verificando o dioma
        if($this->utilitarios_model->isIdioma() == false)
        {
        	redirect('/change-language');
        }
		//Arquivo de linguagem
		$this->lang->load('general_lang', $this->session->userdata('idioma'));
		
		//Idioma dos erros
        $this->config->set_item('language', $this->session->userdata('idioma')); 

        //Dados do personagem
        $this->dados = $this->utilitarios_model->dadosPersonagem($this->session->userdata('personagem_id'));

        $logado = $this->utilitarios_model->isLogged();


        if($logado == false){
        	redirect('/my-characters');
        }


        //Time atual
        //$this->time = $this->utilitarios_model->getMyTeam($this->session->userdata('personagem_id'));

        //Quantidade de items na bag
        $this->qtdBag = $this->utilitarios_model->getQtdBag($this->session->userdata('personagem_id'));

        //Dados dos itens

        if($this->qtdBag > 0){
        	$this->items = $this->utilitarios_model->getItensBag($this->session->userdata('personagem_id'));
        }
	}

	//Pagian index
	public function index()
	{
		//Titulo da pagina
		$titulo['titulo'] = 'Pokemon Reborn - '.$this->lang->line('title-bag');

		$links = $this->utilitarios_model->menuLateralLinks();
		//Textos do menu lateral
		$txtMenuLateral = $links;


		//Textos bag
		$txtConteudo = array(
			'dados'				=> $this->dados,
			'qtdItensBag' 		=> $this->qtdBag,
			'dadosItem' 		=> $this->items,
			'txt_titulo_modal'	=> $this->lang->line('txt_titulo_detalheItem'),
			'txt_bag_atual'		=> $this->lang->line('txt_bag_atual'),
			'txt_aumentar_bag'	=> $this->lang->line('txt_aumentar_box'),
			'txt_fechar'		=> $this->lang->line('txt_fechar'),
			'txt_minha_mochila'	=> $this->lang->line('txt_minha_mochila')
		);
		$this->load->view('layout/header_with_login', $titulo);
		$this->load->view('layout/menu_lateral_logado', $txtMenuLateral);
		$this->load->view('bag', $txtConteudo);
		$this->load->view('layout/footer_with_login');
	}
	public function itemInfo($itemId)
	{
		$itemDados = $this->utilitarios_model->getItemInfo($itemId);
		$info = array(
			"dados" 				=> $itemDados,
			'txt_nome' 				=> $this->lang->line('txt_nome'),
			'txt_raridade'			=> $this->lang->line('txt_raridade'),
			'txt_preco_de_venda'	=> $this->lang->line('txt_preco_de_venda'),
			'txt_para_vender'		=> $this->lang->line('txt_para_vender')
		);
		$this->load->view('layout/header_with_login');
		$this->load->view('bag/bag_modal', $info);
		$this->load->view('layout/footer_with_login');
	}
}