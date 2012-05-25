<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	protected $table = '';

	/** * Insère une nouvelle ligne dans la base de données. */
	public function create($options_echappees = array(), $options_non_echappees = array() ) {
		// Vérification des données à insérer
		if(empty($options_echappees) AND empty($options_non_echappees)) {
			return false;
		}
		return (bool) $this->db->set($options_echappees)
							->set($options_non_echappees, null, false)
							->insert($this->table);
	}

	
	/** * Récupère des données dans la base de données. */
	public function read($select = '*', $where = array(), $orderby = 'id') {
		return $this->db->select($select)
						->from($this->table)
						->where($where)
                                                ->order_by($orderby)
						->get()
						->result();
	}
        public function readone($select = '*', $where = array(), $orderby = 'id') {
		$objects = $this->db->select($select)
						->from($this->table)
						->where($where)
                                                ->order_by($orderby)
						->get()
						->result();
                return $objects[0];
	}
	
	public function read_all() {
		return $this->db->select('*')->from($this->table)->get()->result();
	}

	/** * Modifie une ou plusieurs lignes dans la base de données. */
	public function update($where, $options_echappees = array(), $options_non_echappees = array()) {
		// Vérification des données à mettre à jour
		if(empty($options_echappees) AND empty($options_non_echappees)) {
			return false;
		}
		// Raccourci dans le cas où on sélectionne l'id
		if(is_integer($where)) {
			$where = array('id' => $where);
		}
		
		return (bool) $this->db->set($options_echappees)
								->set($options_non_echappees, null,false)
								->where($where)
								->update($this->table);
	}
	

	/** * Supprime une ou plusieurs lignes de la base de données. */
	public function delete($where) {
		if(is_integer($where)) {
			$where = array('id' => $where);
		}
		return (bool) $this->db->where($where)
								->delete($this->table);
	}


	/** * Retourne le nombre de résultats. */
	// Si $champ est un array, la variable $valeur sera ignorée par la méthode where()
	public function count($champ = array(), $valeur = null) {
 		return (int) $this->db->where($champ, $valeur) 
 								->from($this->table)
								->count_all_results();
	}
	
	public function get_by_id($id) {
	
		$results = $this->db->select('*')
						->from($this->table)
						->where('id',$id)
						->limit(1)
						->get()
						->result();
		return $results[0];
	}
	
}