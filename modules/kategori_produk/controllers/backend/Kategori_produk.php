<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Kategori Produk Controller
*| --------------------------------------------------------------------------
*| Kategori Produk site
*|
*/
class Kategori_produk extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_kategori_produk');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Kategori Produks
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('kategori_produk_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['kategori_produks'] = $this->model_kategori_produk->get($filter, $field, $this->limit_page, $offset);
		$this->data['kategori_produk_counts'] = $this->model_kategori_produk->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/kategori_produk/index/',
			'total_rows'   => $this->data['kategori_produk_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kategori Produk List');
		$this->render('backend/standart/administrator/kategori_produk/kategori_produk_list', $this->data);
	}
	
	/**
	* Add new kategori_produks
	*
	*/
	public function add()
	{
		$this->is_allowed('kategori_produk_add');

		$this->template->title('Kategori Produk New');
		$this->render('backend/standart/administrator/kategori_produk/kategori_produk_add', $this->data);
	}

	/**
	* Add New Kategori Produks
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('kategori_produk_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required|max_length[50]');
		

		

		if ($this->form_validation->run()) {
			$kategori_produk_photo_uuid = $this->input->post('kategori_produk_photo_uuid');
			$kategori_produk_photo_name = $this->input->post('kategori_produk_photo_name');
		
			$save_data = [
				'nama_kategori' => $this->input->post('nama_kategori'),
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/kategori_produk/')) {
				mkdir(FCPATH . '/uploads/kategori_produk/');
			}

			if (!empty($kategori_produk_photo_name)) {
				$kategori_produk_photo_name_copy = date('YmdHis') . '-' . $kategori_produk_photo_name;

				rename(FCPATH . 'uploads/tmp/' . $kategori_produk_photo_uuid . '/' . $kategori_produk_photo_name, 
						FCPATH . 'uploads/kategori_produk/' . $kategori_produk_photo_name_copy);

				if (!is_file(FCPATH . '/uploads/kategori_produk/' . $kategori_produk_photo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo'] = $kategori_produk_photo_name_copy;
			}
		
			
			$save_kategori_produk = $id = $this->model_kategori_produk->store($save_data);
            

			if ($save_kategori_produk) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_kategori_produk;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/kategori_produk/edit/' . $save_kategori_produk, 'Edit Kategori Produk'),
						anchor('administrator/kategori_produk', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/kategori_produk/edit/' . $save_kategori_produk, 'Edit Kategori Produk')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kategori_produk');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kategori_produk');
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
	* Update view Kategori Produks
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('kategori_produk_update');

		$this->data['kategori_produk'] = $this->model_kategori_produk->find($id);

		$this->template->title('Kategori Produk Update');
		$this->render('backend/standart/administrator/kategori_produk/kategori_produk_update', $this->data);
	}

	/**
	* Update Kategori Produks
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('kategori_produk_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required|max_length[50]');
		

		
		if ($this->form_validation->run()) {
			$kategori_produk_photo_uuid = $this->input->post('kategori_produk_photo_uuid');
			$kategori_produk_photo_name = $this->input->post('kategori_produk_photo_name');
		
			$save_data = [
				'nama_kategori' => $this->input->post('nama_kategori'),
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/kategori_produk/')) {
				mkdir(FCPATH . '/uploads/kategori_produk/');
			}

			if (!empty($kategori_produk_photo_uuid)) {
				$kategori_produk_photo_name_copy = date('YmdHis') . '-' . $kategori_produk_photo_name;

				rename(FCPATH . 'uploads/tmp/' . $kategori_produk_photo_uuid . '/' . $kategori_produk_photo_name, 
						FCPATH . 'uploads/kategori_produk/' . $kategori_produk_photo_name_copy);

				if (!is_file(FCPATH . '/uploads/kategori_produk/' . $kategori_produk_photo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo'] = $kategori_produk_photo_name_copy;
			}
		
			
			$save_kategori_produk = $this->model_kategori_produk->change($id, $save_data);

			if ($save_kategori_produk) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/kategori_produk', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kategori_produk');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kategori_produk');
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
	* delete Kategori Produks
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('kategori_produk_delete');

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
            set_message(cclang('has_been_deleted', 'kategori_produk'), 'success');
        } else {
            set_message(cclang('error_delete', 'kategori_produk'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Kategori Produks
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('kategori_produk_view');

		$this->data['kategori_produk'] = $this->model_kategori_produk->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kategori Produk Detail');
		$this->render('backend/standart/administrator/kategori_produk/kategori_produk_view', $this->data);
	}
	
	/**
	* delete Kategori Produks
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$kategori_produk = $this->model_kategori_produk->find($id);

		if (!empty($kategori_produk->photo)) {
			$path = FCPATH . '/uploads/kategori_produk/' . $kategori_produk->photo;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_kategori_produk->remove($id);
	}
	
	/**
	* Upload Image Kategori Produk	* 
	* @return JSON
	*/
	public function upload_photo_file()
	{
		if (!$this->is_allowed('kategori_produk_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'kategori_produk',
		]);
	}

	/**
	* Delete Image Kategori Produk	* 
	* @return JSON
	*/
	public function delete_photo_file($uuid)
	{
		if (!$this->is_allowed('kategori_produk_delete', false)) {
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
            'table_name'        => 'kategori_produk',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/kategori_produk/'
        ]);
	}

	/**
	* Get Image Kategori Produk	* 
	* @return JSON
	*/
	public function get_photo_file($id)
	{
		if (!$this->is_allowed('kategori_produk_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$kategori_produk = $this->model_kategori_produk->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'photo', 
            'table_name'        => 'kategori_produk',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/kategori_produk/',
            'delete_endpoint'   => 'administrator/kategori_produk/delete_photo_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('kategori_produk_export');

		$this->model_kategori_produk->export(
			'kategori_produk', 
			'kategori_produk',
			$this->model_kategori_produk->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('kategori_produk_export');

		$this->model_kategori_produk->pdf('kategori_produk', 'kategori_produk');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('kategori_produk_export');

		$table = $title = 'kategori_produk';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_kategori_produk->find($id);
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


/* End of file kategori_produk.php */
/* Location: ./application/controllers/administrator/Kategori Produk.php */