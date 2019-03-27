<?php
class OrdernarTime_model extends CI_Model{
	public function UpdatePositions($nova, $idnova, $antiga, $userid)
	{
		$this->db->select('*')
		->from('user_pokemons')
		->where('user_id', $userid)
		->where('hand_position', $nova);
		
		$dados = $this->db->get()->row_array();

		$this->db->set('hand_position', $nova, FALSE);
		$this->db->where('id', $id);
		$this->db->update('user_pokemons');

		$this->db->set('hand_position', $antiga, FALSE);
		$this->db->where('id', $dados["id"]);
		$this->db->update('user_pokemons');

		return true;
	}
}
