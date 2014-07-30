<?php 
class modproductos extends CI_Model{

	function categorias_productos($param){

		$this->db->select('ca.id, ca.descripcion, hash, imagen, count( cat.id_producto ) total_categoria');
		$this->db->from('categoria ca');
		$this->db->join('catalogo cat', 'ca.id = cat.idcategoria', 'left');
		$this->db->group_by('ca.id');
		$query = $this->db->get();
	

		return $query->result_array();
	}

	function subcategoria($param){

		/*
		SELECT ca.hash, cm . * , sc . * 
		FROM  `catalogo_menu` cm
		JOIN categoria ca ON cm.categoria = ca.id
		LEFT JOIN subcategoria sc ON cm.subcategoria = sc.id
		 */
		if(isset($param['hash']))
		{
			$this->db->select('ca.hash, cm.* , sc.*, count(cat.id_producto) total');
			$this->db->where('ca.hash', $param['hash']);
			$this->db->from('catalogo_menu cm');
			$this->db->join('categoria ca','cm.categoria = ca.id');
			$this->db->join('subcategoria sc', 'cm.subcategoria = sc.id', 'left');
			$this->db->join('catalogo cat', 'cm.categoria = ca.id and cm.subcategoria = cat.idsubcategoria', 'left');
			$this->db->group_by('cm.subcategoria');
			$this->db->order_by('sc.descripcion');
			$query = $this->db->get();
		return $query->result_array();
		}else{
			return array();
		}
	}

	function productos($param){
		$this->db->where('idcategoria', $param['categoria']);
		$this->db->where('idsubcategoria', $param['subcategoria']);
		$query = $this->db->get('catalogo');
		return $query->result_array();
	}

	function nuevo_producto($param)
	{

	}

	function nueva_imagen_producto($param, $files){

	}

	function categorias($param){
		$query = $this->db->get('categoria');
		return $query->result_array();
	}


	function marcas(){
		$this->db->select('marca');
		$this->db->group_by('marca');
		$query = $this->db->get('catalogo');
		return $query->result_array();
	}

} ?>