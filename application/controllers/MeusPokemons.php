<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MeusPokemons extends CI_Controller {
        private $time;
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

        $this->time = $this->utilitarios_model->getMyTeam($this->session->userdata('personagem_id'), 'hand_position');

        }
        //Pagina principal
        public function index()
        {
        //Titulo da pagina
        $titulo['titulo'] = 'Pokemon Reborn - '.$this->lang->line('title-my-pokemons');

        $links = $this->utilitarios_model->menuLateralLinks();
        //Textos do menu lateral
        $txtMenuLateral = $links;


        $txtConteudo = array(
                'txt_meus_pokes'  => $this->lang->line('txt_meus_pokes'),
                'time'            => $this->time,
                'txt_tipo'        => $this->lang->line('txt_tipo'),
                'txt_estatisticas'=> $this->lang->line('txt_estatisticas'),
                'txt_podertotal'  => $this->lang->line('txt_podertotal')
        );

        $this->load->view('layout/header_with_login', $titulo);
        $this->load->view('layout/menu_lateral_logado', $txtMenuLateral);
        $this->load->view('MeusPokes', $txtConteudo);
        $this->load->view('layout/footer_with_login');
        }
}       

        