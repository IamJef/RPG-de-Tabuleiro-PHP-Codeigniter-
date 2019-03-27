<?php
class Usuarios_model extends CI_Model{
	
	/*
		Construct 
	*/

	public function __construct()
	{
		parent::__construct();	
	}
	//Verifica se existe algum usuario
    public function autenticarUsuario($email, $senha)
    {
        $this->db->where("email", $email);
        $this->db->where("senha", $senha);
        $usuario = $this->db->get("contas")->row_array();

        return $usuario;
    }
}