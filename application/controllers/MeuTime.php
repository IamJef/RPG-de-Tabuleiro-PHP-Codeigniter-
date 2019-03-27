<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MeuTime extends CI_Controller {
	//Variaveis da classe
	public $dados;
	public $time;
	public $timeMob;
	///Construindo a pagina
	public function __construct()
	{
		parent::__construct();
		//Verificando se usuario está logado
		$logado = $this->utilitarios_model->isLogged();
        if($logado == false){
        	redirect('/my-characters');
        }

        //Verificando o dioma
        if($this->utilitarios_model->isIdioma() == false)
        {
        	redirect('/change-language');
        }

        //Carregando a model de ordernar time
        $meuTimeModel = $this->load->model("OrdernarTime_model");
        //Time atual
        $this->time = $this->utilitarios_model->getMyTeam($this->session->userdata('personagem_id'), 'hand_position');
        $this->timeMob = $this->utilitarios_model->getMyTeam($this->session->userdata('personagem_id'), 'hand_position');

		//Arquivo de linguagem
		$this->lang->load('general_lang', $this->session->userdata('idioma'));
		
		//Idioma dos erros
        $this->config->set_item('language', $this->session->userdata('idioma')); 

        //Dados do personagem
        $this->dados = $this->utilitarios_model->dadosPersonagem($this->session->userdata('personagem_id'));
    }

	//Pagina principal
	public function index()
	{
		//Titulo da pagina
		$titulo['titulo'] = 'Pokemon Reborn - '.$this->lang->line('title-team');

		$links = $this->utilitarios_model->menuLateralLinks();
		//Textos do menu lateral
		$txtMenuLateral = $links;

		$txtConteudo = array(
			'txt_meu_personagem' => $this->lang->line('title-team'),
			'txt_organizar_time' =>	$this->lang->line('txt_organizar_time'),
			'txt_time_atual'	 => $this->lang->line('txt_time_atual'),
			'time'				 => $this->time,
			'timeMob'			 => $this->timeMob,
			'txt_podertotal'	 => $this->lang->line('txt_podertotal'),
			'txt_att_sucesso_ordem' => $this->lang->line('txt_att_sucesso_ordem'),
			'txt_use_setas_time'	=> $this->lang->line('txt_use_setas_time')
		);

		$this->load->view('layout/header_with_login', $titulo);
		$this->load->view('layout/menu_lateral_logado', $txtMenuLateral);
		$this->load->view('MeuTime', $txtConteudo);
		$this->load->view('layout/footer_with_login');
	}
	public function UpdateOrdem()
	{
		$position = $this->input->post('position', TRUE);


		$i=1;
		foreach($position as $k=>$v){

			$this->utilitarios_model->attTeam($i, $v);


			$i++;
		}
	}
	public function UpdateOrdemMob()
	{
		$position = $this->input->post('position', TRUE);
		$id = $this->input->post('id', TRUE);

		$dadosPoke = $this->utilitarios_model->getInfoPokeById($id);
		$positionAtual = $dadosPoke["hand_position"];

		if($dadosPoke == false)
		{
			return false;
		}else{
			if($position == 'cima'){
				if($positionAtual == 1){
					return false;
				}else{
					//Qual será a nova posição do pokemon
					$novaPosition = $positionAtual - 1;
					$personagem_id = $this->session->userdata('personagem_id');
					//Fazendo update no banco de dados onde o novo pokemon ficará e pra onde o antigo irá
					$updateNoDb = $this->utilitarios_model->UpdatePositions($novaPosition, $id, $positionAtual, $personagem_id);

					//Retornando o resultado do update
					if($updateNoDb == true)
					{
						echo "true";
					}
				}
			}
			if($position == 'baixo'){
				if($positionAtual == $this->dados["inhand"]){
					return false;
				}else{
					//Qual será a nova posição do pokemon
					$novaPosition = $positionAtual + 1;
					$personagem_id = $this->session->userdata('personagem_id');
					//Fazendo update no banco de dados onde o novo pokemon ficará e pra onde o antigo irá
					$updateNoDb = $this->utilitarios_model->UpdatePositions($novaPosition, $id, $positionAtual, $personagem_id);

					//Retornando o resultado do update
					if($updateNoDb == true)
					{
						echo "true";
					}
				}
			}
		}
	}
	public function afterAttMyTeam()
	{
		//Titulo da pagina
		$titulo['titulo'] = 'Pokemon Reborn - '.$this->lang->line('title-team');

		//Textos do menu lateral
		$txtMenuLateral = array(
			'txt_titulo_menu_geral' => $this->lang->line('txt_menu_geral'),
			'txt_sair'				=> $this->lang->line('txt_sair'),
			'txt_home'				=> $this->lang->line('txt_home'),
			'txt_mochila'			=> $this->lang->line('txt_mochila'),
			'txt_menu_lateral'		=> $this->lang->line('txt_menu_lateral'),
			'txt_meu_time'			=> $this->lang->line('txt_meu_time')
		);

		$txtConteudo = array(
			'txt_meu_personagem' => $this->lang->line('title-team'),
			'txt_organizar_time' =>	$this->lang->line('txt_organizar_time'),
			'txt_time_atual'	 => $this->lang->line('txt_time_atual'),
			'time'				 => $this->time,
			'timeMob'			 => $this->timeMob,
			'txt_podertotal'	 => $this->lang->line('txt_podertotal'),
			'txt_att_sucesso_ordem' => $this->lang->line('txt_att_sucesso_ordem'),
			'txt_use_setas_time'	=> $this->lang->line('txt_use_setas_time')
		);

		$this->load->view('layout/header_with_login', $titulo);
		$this->load->view('view_myteam_after_refresh', $txtConteudo);
		$this->load->view('layout/footer_with_login');
	}
}