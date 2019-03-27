<?php
class Utilitarios_model extends CI_Model{
	
	/*
		Construct 
	*/

	public function __construct()
	{
		parent::__construct();
	}

	//Verificando se o usuario está totalmente logado
	public function isLogged()
	{
		//Caso não tenha conta_id e nem persongem_id guardados em sessão
		if(! $this->session->userdata('conta_id') && ! $this->session->userdata('personagem_id'))
		{ 
			return false;	
		}else{
			return true;
		}
	}
	//Verificando se o usuario está totalmente logado
	public function isIdioma()
	{
		//Caso não tenha conta_id e nem persongem_id guardados em sessão
		if(! $this->session->userdata('idioma'))
		{ 
			return false;	
		}else{
			return true;
		}
	}
	//Links do menu lateral
	public function menuLateralLinks()
	{
		$links = array(
			'txt_titulo_menu_geral' => $this->lang->line('txt_menu_geral'),
			'txt_sair'				=> $this->lang->line('txt_sair'),
			'txt_home'				=> $this->lang->line('txt_home'),
			'txt_mochila'			=> $this->lang->line('txt_mochila'),
			'txt_menu_lateral'		=> $this->lang->line('txt_menu_lateral'),
			'txt_meu_time'			=> $this->lang->line('txt_meu_time'),
			'txt_meus_pokes'		=> $this->lang->line('txt_meus_pokes')
		);

		return $links;
	}
	//Dados do usuario // personagem básico
	public function dadosPersonagem($id)
	{
		$this->db->select('*')
		->from('user_personagem')
		->where('id', $id);

		return $this->db->get()->row_array();
	}
	//Pokemon equipados // linkado com o db com info dos pokes
	public function getMyTeam($id, $ordem)
	{
		if($ordem == ''){
			$this->db->select('*')
			->from('user_pokemons as m')
			->where('user_id', $id)
			->where('equipado', '1')
			->join('pokemons as d', 'm.poke_id = d.poke_id');

			$dados = $this->db->get()->result();
			if($this->db->count_all_results() > 0)
			{
				return $dados;
			}else{
				return false;
			}
		}else{
			$this->db->select('*')
			->from('user_pokemons as m')
			->where('user_id', $id)
			->where('equipado', '1')
			->join('pokemons as d', 'm.poke_id = d.poke_id')
			->order_by(''.$ordem.' ASC');

			$dados = $this->db->get()->result();
			if($this->db->count_all_results() > 0)
			{
				return $dados;
			}else{
				return false;
			}
		}
	}
	//qtd pokemon equipado
	public function getQtdEqp($personagem_id)
	{
		$this->db->select('id')
		->from('user_pokemons')
		->where('equipado', '1')
		->where('user_id', $personagem_id);

		return $this->db->count_all_results();
	}
	//Dados do poke
	public function getDadosPoke($id)
	{
		$this->db->select('*')
		->from('pokemons')
		->where('poke_id', $id);

		return $this->get('pokemons')->result();
	}
	//Dados do poke
	public function getDadosJustaPoke($id, $user_id)
	{
		$this->db->select('*')
		->from('user_pokemons as m')
		->where('user_id', $user_id)
		->where('id', $id)
		->join('pokemons as d', 'm.poke_id = d.poke_id');

		return $this->db->get('pokemons')->result();
	}
	//Minhas insignias
	public function getInsignias($personagem_id)
	{
		$this->db->select('*')
		->from('user_insignias as m')
		->where('user_id', $personagem_id)
		->join('insignias as d', 'm.insignia_id = d.id');

		$dados = $this->db->get()->result();
		if($this->db->count_all_results() > 0)
		{
			return $dados;
		}else{
			return false;
		}
	}
	//Quantidade de items na bag
	public function getQtdBag($personagem_id)
	{
		$this->db->select('*')
		->from('user_items')
		->where('user_id', $personagem_id);


		$resultado = $this->db->get()->result();

		$qtd = 0;
		foreach ($resultado as $item) {
			$qtd += $item->qtd;
		}

		return $qtd;
	}
	//Dados dos itens da bag
	public function getItensBag($personagem_id)
	{
		$this->db->select('*')
		->from('user_items as m')
		->where('user_id', $personagem_id)
		->join('items as d', 'm.item_id = d.id');

		$dados = $this->db->get()->result();

		if($this->db->count_all_results() > 0)
		{
			return $dados;
		}else{
			return false;
		}
	}
	//Pegando informações de um Id pelo id
	public function getItemInfo($itemId)
	{
		$this->db->select('*')
		->from('items')
		->where('id', $itemId);

		$dados = $this->db->get()->result();


		return $dados;
	}
	//Atualizando posição do time
	public function attTeam($pos, $id)
	{
		$this->db->set('hand_position', $pos, FALSE);
		$this->db->where('id', $id);
		$this->db->update('user_pokemons');
	}
	//Pegando dados de qualquer pokemon pelo id
	public function getInfoPokeById($id)
	{
		$this->db->select('*')
		->from('user_pokemons')
		->where('id', $id);

		$dados = $this->db->get()->row_array();

		return $dados;
	}
	public function UpdatePositions($nova, $idnova, $antiga, $userid)
	{
		$this->db->select('*')
		->from('user_pokemons')
		->where('user_id', $userid)
		->where('hand_position', $nova);
		
		$dados = $this->db->get()->row_array();

		$this->db->set('hand_position', $nova, FALSE);
		$this->db->where('id', $idnova);
		$this->db->update('user_pokemons');

		$this->db->set('hand_position', $antiga, FALSE);
		$this->db->where('id', $dados["id"]);
		$this->db->update('user_pokemons');

		return true;
	}
}