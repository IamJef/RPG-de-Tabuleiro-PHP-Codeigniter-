<?php
class Registro_model extends CI_Model{
	
	/*
		Construct 
	*/

	public function __construct()
	{
		parent::__construct();	
	}

	//Pegando o destaque caso haja um
	public function emailInUse($email)
	{
		$this->db->select('*')
	    ->from('contas')
	    ->where('email', $email);
	    

	    $conta = $this->db->count_all_results();


	    if($conta > 0)
	    {
	    	return true;
	    }else{
	    	return false;
	    }
	}
	public function Registrando($dados)
	{
		$this->db->insert('contas', $dados);

		return true;
	}
}