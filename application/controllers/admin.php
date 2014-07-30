<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('modpanel');
		$data['js'] = array();
		$data['css'] = array();
		$data['menu'] = $this->modpanel->menu_contextual(1);
		$data['title']  ='Panel de administración';
		$this->load->view('estaticos/header', $data);
		$this->load->view('estaticos/menu_principal', $data);
		$this->load->view('admin/panel');
		$this->load->view('estaticos/footer');

	}

	public function crear_cotizacion(){
		$this->load->model('modpanel');
		$data['js'] = array();
		$data['css'] = array();
		$data['menu'] = $this->modpanel->menu_contextual(1);
		$data['title']  ='Panel de administración';
		$this->load->view('estaticos/header', $data);
		$this->load->view('estaticos/menu_principal', $data);
		$this->load->view('admin/panel');
		$this->load->view('estaticos/footer');
	}

	public function banco_cotizaciones(){
		
		$this->load->model('modpanel');
		$data['js'] = array();
		$data['css'] = array();
		$data['menu'] = $this->modpanel->menu_contextual(1);
		$data['title']  ='Panel de administración';
		$this->load->view('estaticos/header', $data);
		$this->load->view('estaticos/menu_principal', $data);
		$this->load->view('admin/panel');
		$this->load->view('estaticos/footer');
	}

	public function estadisticas_cotizaciones(){
		$this->load->model('modpanel');
		$data['js'] = array();
		$data['css'] = array();
		$data['menu'] = $this->modpanel->menu_contextual(1);
		$data['title']  ='Panel de administración';
		$this->load->view('estaticos/header', $data);
		$this->load->view('estaticos/menu_principal', $data);
		$this->load->view('admin/panel');
		$this->load->view('estaticos/footer');
	}

	public function catalogo_productos(){
		$this->load->model('modproductos');
		$this->load->model('modpanel');
		$data['categoria'] = $this->uri->segment(3);
		$data['categorias'] = $this->modproductos->categorias_productos(array("hash"=>$data['categoria']));
		$data['js'] = array('admin/catalogo_productos.js');
		$data['css'] = array('admin/catalogo.css');
		$data['menu'] = $this->modpanel->menu_contextual(1);

		$data['title']  ='Catalogo de productos';
		$this->load->view('estaticos/header', $data);
		$this->load->view('estaticos/menu_principal', $data);
		$this->load->view('admin/catalogo_productos');
		$this->load->view('estaticos/footer');
	}

	function crear_producto(){
		$this->load->model('modproductos');
		$this->load->model('modpanel');
		$data['categorias'] = $this->modproductos->categorias_productos(array());
		$data['js'] = array('admin/productos.js', 'foundation/foundation.reveal.js');
		$data['css'] = array('admin/catalogo.css');
		$data['menu'] = $this->modpanel->menu_contextual(1);
		$data['categorias'] = $this->modproductos->categorias(array());
		$data['marca'] = $this->modproductos->marcas();

		$data['title']  ='Catalogo de productos';
		$this->load->view('estaticos/header', $data);
		$this->load->view('estaticos/menu_principal', $data);
		$this->load->view('admin/crearproducto');
		$this->load->view('estaticos/footer');
	}

	function post(){
		print_r($_POST);
		print_r($_FILES);
		//echo '<script type="text/javascript">window.parent.confirm("asdasd")</script>';
	}

	function ajax(){
		$this->load->model('modproductos');
		switch(@$_POST['case']){
			case 1:
				echo json_encode($_POST);
			break;
			case 2:
				echo json_encode($_POST);
			break;
			case 3:
				$r = $this->modproductos->subcategoria($_POST);
				echo json_encode($r);
			break;
			case 4://productos
				$r = $this->modproductos->productos($_POST);
				echo json_encode($r);
			break;
			case 5://traer_producto
				$r = $this->modproductos->producto($_POST);
				echo json_encode($r);
			break;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */