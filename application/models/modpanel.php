<?php 
class modpanel Extends CI_Model{

	/**
	 * [menu_contextual description]
	 * @param  [int] $contexto [description]
	 * @return [html]           [description]
	 */
	function menu_contextual($contexto)
	{
		$this->db->where('contexto', $contexto);
		$query = $this->db->get('core_menu');

		$menu = '<ul class="side-nav">';
			foreach($query->result_array() as $row){

				$menu.='<li>';
				$menu.='<a href="'.base_url().''.$row['url'].'">'.$row['descripcion'].'</a>';
				$menu.='</li>';

			}	

		$menu.='</ul>';
		return $menu;
	}

	function menu_categorias()
	{
		$this->db->select('ca.id, ca.descripcion, hash, count( cat.id_producto ) total_categoria');
		$this->db->from('categoria ca');
		$this->db->join('catalogo cat', 'ca.id = cat.idcategoria', 'left');
		$this->db->group_by('ca.id');
		$query = $this->db->get();

		$menu = '<ul class="side-nav">';
			foreach($query->result_array() as $row){

				$menu.='<li>';
				$menu.='<a href="'.base_url().''.$row['hash'].'">'.$row['descripcion'].'</a>';
				$menu.='</li>';

			}

		$menu.='</ul>';
		return $menu;
	}

}