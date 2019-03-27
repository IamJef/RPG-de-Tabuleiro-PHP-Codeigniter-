<?php
class Personagens_model extends CI_Model{
	
	/*
		Construct 
	*/

	public function __construct()
	{
		parent::__construct();	
	}

	//Pegando todos os personagens
	public function getAllPersonagens($id)
	{
		$this->db->select('*')
		->from('user_personagem')
		->where('conta_id', $id);

		$resultado = $this->db->count_all_results();
		$dados = $this->db->get('user_personagem')->result();

		if($resultado > 0){
			return $dados;
		}else{
			return false;
		}
	}
	//Pegando todas as infos do personagem selecionado
	public function getInfoPersonagem($id, $conta_id)
	{
		$this->db->select('*')
		->from('user_personagem')
		->where('id', $id)
		->where('conta_id', $conta_id);

		return $this->db->get()->row_array();
	}
	//Criando o personagem
	public function criarPersonagem($data)
	{
		//Tratando os dados
		$conta_id 		= $data['conta_id'];
		$nome 			= $data['nome'];
		$personagem 	= $this->personagem($data['personagem']);
		$regiao 		= $this->regiao($data['pokemonInicial']);

		//Transformando os dados para a query em array
		$query = array(
			'conta_id'	=> $conta_id,
			'nome'		=> $nome,
			'personagem'	=> $personagem,
			'nivel'			=> 1,
			'regiao'		=> $regiao,
			'silver'		=> 500,
			'gold'			=> 0,
			'rcoins'		=> 0,
			'inhand'		=> 1
		);
		$pokeInicial 	= $data['pokemonInicial'];
		
		$this->db->insert('user_personagem', $query);
		$id_auto_gerado = $this->db->insert_id();

		$adcInicial = $this->adicionarPoke($pokeInicial, $id_auto_gerado, $nome);
		// $adcBadges = $this->adicionarBadge($id_auto_gerado);

		if($adcInicial == true)
		{
			return true;
		}

	}
	// //Criando uma tabela das badges
	// private function adicionarBadge($id)
	// {
	// 	$dados = array(
 //        	'personagem_id'	=> $$id
 //        );

 //        $this->db->insert('user_insignias', $dados);
	// }
	//Sabendo qual o personagem pela ID
	private function personagem($id)
	{
		//Pegando o nome do personagem na tabela
		$this->db->select('nome')
		->from('personagens_para_criar')
		->where('id', $id);

		//Transformando o resultando em array
		$dados = $this->db->get()->row_array();

		//Salvando o resultado em uma variavel
		$personagem = $dados["nome"];

		//Retornando o resultado
		return $personagem;
	}
	//Sabendo a região pelo inicial
	private function regiao($poke_id)
	{
		//Pegando a regiao
		$this->db->select('regiao')
		->from('pokemons')
		->where('poke_id', $poke_id);

		//Transformando o resultando em array
		$dados = $this->db->get()->row_array();

		//Salvando o resultando em uma variavel
		$regiao = $dados["regiao"];

		//Retornando o resultado
		return $regiao;
	}
	//Adicionando o pokemon inicial
	private function adicionarPoke($poke_id, $personagem_id, $user_nome)
	{
		//Nature
		$this->db->select('*')
		->from('natures')
		->order_by('rand()')
		->limit(1);

		//Nature
		$ndados = $this->db->get()->row_array();
		$this->db->reset_query();

		$nature = $ndados['nature_nome'];

		//Dados do pokemon
		$this->db->select('*')
		->from('pokemons')
		->where('poke_id', $poke_id);

		//Dados do pokemon
		$pdados = $this->db->get()->row_array();
		$this->db->reset_query();

		//Pegando a quantidade de exp
		$this->db->select('*')
		->from('experience')
		->where('cresci_vel', $pdados['vel_de_crescimento'])
		->where('level', 5);

		$exp = $this->db->get()->row_array();
		$this->db->reset_query();


	    //Definindo as IV's do pokemon
        $novoPoke['ataque_iv'] = rand(2, 31);
        $novoPoke['defesa_iv'] = rand(2, 31);
        $novoPoke['velocidade_iv'] = rand(2, 31);
        $novoPoke['spcataque_iv'] = rand(2, 31);
        $novoPoke['spcdefesa_iv'] = rand(2, 31);
        $novoPoke['hp_iv'] = rand(2, 31);

        //Nivel novo
        $novoPoke['nivel'] = 5;
        
        $txShiny = rand(0,100);
        if($txShiny == 0){
        	$shiny = 1;
        }else{
        	$shiny = 0;
        }
        //calculando os stats
        //Formula base = int((int(int(A*2+B+int(C/4))*D/100)+5)*E)
        
        //Ataque
        $novoPoke['ataque'] = round((((($pdados['ataque_base'] * 2 + $novoPoke['ataque_iv']) * $novoPoke['nivel'] / 100) + 5) * 1) * $ndados['attack_add']);
        //Defesa
        $novoPoke['defesa'] = round((((($pdados['defesa_base'] * 2 + $novoPoke['defesa_iv']) * $novoPoke['nivel'] / 100) + 5) * 1) * $ndados['defence_add']);
        //Velocidade
        $novoPoke['velocidade'] = round((((($pdados['velocidade_base'] * 2 + $novoPoke['velocidade_iv']) * $novoPoke['nivel'] / 100) + 5) * 1) * $ndados['speed_add']);
        //Spc. ataque
        $novoPoke['spcataque'] = round((((($pdados['spc.ataque_base'] * 2 + $novoPoke['spcataque_iv']) * $novoPoke['nivel'] / 100) + 5) * 1) * $ndados['spc.attack_add']);
        //Spc. defesa
        $novoPoke['spcdefesa'] = round((((($pdados['spc.defesa_base'] * 2 + $novoPoke['spcdefesa_iv']) * $novoPoke['nivel'] / 100) + 5) * 1) * $ndados['spc.attack_add']);
        //HP
        $novoPoke['hp'] = round(((($pdados['hp_base'] * 2 + $novoPoke['hp_iv']) * $novoPoke['nivel'] / 100) + $novoPoke['nivel']) + 10);


        $dados = array(
        	'poke_id'			=> $poke_id,
        	'user_id'			=> $personagem_id,
        	'inicial'			=> 1,
        	'equipado'			=> 1,
        	'hand_position'		=> 1,
        	'nature'			=> $nature,
        	'shiny'				=> $shiny,
        	'trocavel'			=> 0,
        	'nivel'				=> $novoPoke['nivel'],
        	'hp_max'			=> $novoPoke['hp'],
        	'hp'				=> $novoPoke['hp'],
        	'exp'				=> 0,
        	'max_exp'			=> $exp['pontos'],
        	'exp_necessario'	=> $exp['pontos'],
        	'ataque'			=> $novoPoke['ataque'],
        	'defesa'			=> $novoPoke['defesa'],
        	'velocidade'		=> $novoPoke['velocidade'],
        	'spc_ataque'		=> $novoPoke['spcataque'],
        	'spc_defesa'		=> $novoPoke['spcdefesa'],
        	'ataque_iv'			=> $novoPoke['ataque_iv'],
        	'defesa_iv'			=> $novoPoke['defesa_iv'],
        	'spc_ataque_iv'		=> $novoPoke['spcataque_iv'],
        	'spc_defesa_iv'		=> $novoPoke['spcdefesa_iv'],
        	'mataque_1'			=> $pdados['ataque_1'],
        	'mataque_2'			=> $pdados['ataque_2'],
        	'mataque_3'			=> $pdados['ataque_3'],
        	'mataque_4'			=> $pdados['ataque_4'],
        	'capturado_com'		=> 'Poke ball',
        	'capturado_por'		=> $user_nome
        );

        $this->db->insert('user_pokemons', $dados);
        $this->db->reset_query();

        return true;

	}

}