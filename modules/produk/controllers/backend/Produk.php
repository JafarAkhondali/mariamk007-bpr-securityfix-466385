<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Produk Controller
*| --------------------------------------------------------------------------
*| Produk site
*|
*/
class Produk extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_produk');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Produks
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('produk_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['produks'] = $this->model_produk->get($filter, $field, $this->limit_page, $offset);
		$this->data['produk_counts'] = $this->model_produk->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/produk/index/',
			'total_rows'   => $this->data['produk_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Produk List');
		$this->render('backend/standart/administrator/produk/produk_list', $this->data);
	}
	
	/**
	* Add new produks
	*
	*/
	public function add()
	{
		$this->is_allowed('produk_add');

		$this->template->title('Produk New');
		$this->render('backend/standart/administrator/produk/produk_add', $this->data);
	}

	/**
	* Add New Produks
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('produk_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'trim|required');
		

		$this->form_validation->set_rules('produk_photo_name', 'Photo', 'trim|required');
		

		

		if ($this->form_validation->run()) {
			$produk_photo_uuid = $this->input->post('produk_photo_uuid');
			$produk_photo_name = $this->input->post('produk_photo_name');
		
			$save_data = [
				'nama_produk' => $this->input->post('nama_produk'),
				'deskripsi_produk' => $this->input->post('deskripsi_produk'),
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/produk/')) {
				mkdir(FCPATH . '/uploads/produk/');
			}

			if (!empty($produk_photo_name)) {
				$produk_photo_name_copy = date('YmdHis') . '-' . $produk_photo_name;

				rename(FCPATH . 'uploads/tmp/' . $produk_photo_uuid . '/' . $produk_photo_name, 
						FCPATH . 'uploads/produk/' . $produk_photo_name_copy);

				if (!is_file(FCPATH . '/uploads/produk/' . $produk_photo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo'] = $produk_photo_name_copy;
			}
		
			
			$save_produk = $id = $this->model_produk->store($save_data);
            

			if ($save_produk) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_produk;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/produk/edit/' . $save_produk, 'Edit Produk'),
						anchor('administrator/produk', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/produk/edit/' . $save_produk, 'Edit Produk')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/produk');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/produk');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
		/**
	* Update view Produks
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('produk_update');

		$this->data['produk'] = $this->model_produk->find($id);

		$this->template->title('Produk Update');
		$this->render('backend/standart/administrator/produk/produk_update', $this->data);
	}

	/**
	* Update Produks
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('produk_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'trim|required');
		

		$this->form_validation->set_rules('produk_photo_name', 'Photo', 'trim|required');
		

		
		if ($this->form_validation->run()) {
			$produk_photo_uuid = $this->input->post('produk_photo_uuid');
			$produk_photo_name = $this->input->post('produk_photo_name');
		
			$save_data = [
				'nama_produk' => $this->input->post('nama_produk'),
				'deskripsi_produk' => $this->input->post('deskripsi_produk'),
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/produk/')) {
				mkdir(FCPATH . '/uploads/produk/');
			}

			if (!empty($produk_photo_uuid)) {
				$produk_photo_name_copy = date('YmdHis') . '-' . $produk_photo_name;

				rename(FCPATH . 'uploads/tmp/' . $produk_photo_uuid . '/' . $produk_photo_name, 
						FCPATH . 'uploads/produk/' . $produk_photo_name_copy);

				if (!is_file(FCPATH . '/uploads/produk/' . $produk_photo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo'] = $produk_photo_name_copy;
			}
		
			
			$save_produk = $this->model_produk->change($id, $save_data);

			if ($save_produk) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/produk', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/produk');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/produk');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
	/**
	* delete Produks
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('produk_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'produk'), 'success');
        } else {
            set_message(cclang('error_delete', 'produk'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Produks
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('produk_view');

		$this->data['produk'] = $this->model_produk->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Produk Detail');
		$this->render('backend/standart/administrator/produk/produk_view', $this->data);
	}
	
	/**
	* delete Produks
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$produk = $this->model_produk->find($id);

		if (!empty($produk->photo)) {
			$path = FCPATH . '/uploads/produk/' . $produk->photo;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_produk->remove($id);
	}
	
	/**
	* Upload Image Produk	* 
	* @return JSON
	*/
	public function upload_photo_file()
	{
		if (!$this->is_allowed('produk_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'produk',
		]);
	}

	/**
	* Delete Image Produk	* 
	* @return JSON
	*/
	public function delete_photo_file($uuid)
	{
		if (!$this->is_allowed('produk_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'photo', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'produk',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/produk/'
        ]);
	}

	/**
	* Get Image Produk	* 
	* @return JSON
	*/
	public function get_photo_file($id)
	{
		if (!$this->is_allowed('produk_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$produk = $this->model_produk->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'photo', 
            'table_name'        => 'produk',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/produk/',
            'delete_endpoint'   => 'administrator/produk/delete_photo_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('produk_export');

		$this->model_produk->export(
			'produk', 
			'produk',
			$this->model_produk->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('produk_export');

		$this->model_produk->pdf('produk', 'produk');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('produk_export');

		$table = $title = 'produk';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_produk->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	
}


/* End of file produk.php */
/* Location: ./application/controllers/administrator/Produk.php */