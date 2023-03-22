<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Artikel Controller
*| --------------------------------------------------------------------------
*| Artikel site
*|
*/
class Artikel extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_artikel');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Artikels
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('artikel_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['artikels'] = $this->model_artikel->get($filter, $field, $this->limit_page, $offset);
		$this->data['artikel_counts'] = $this->model_artikel->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/artikel/index/',
			'total_rows'   => $this->data['artikel_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Artikel List');
		$this->render('backend/standart/administrator/artikel/artikel_list', $this->data);
	}
	
	/**
	* Add new artikels
	*
	*/
	public function add()
	{
		$this->is_allowed('artikel_add');

		$this->template->title('Artikel New');
		$this->render('backend/standart/administrator/artikel/artikel_add', $this->data);
	}

	/**
	* Add New Artikels
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('artikel_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('deskripsi_artikel', 'Deskripsi Artikel', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('isi_artikel', 'Isi Artikel', 'trim|required');
		

		$this->form_validation->set_rules('artikel_photo_name', 'Photo', 'trim|required');
		

		

		if ($this->form_validation->run()) {
			$artikel_photo_uuid = $this->input->post('artikel_photo_uuid');
			$artikel_photo_name = $this->input->post('artikel_photo_name');
		
			$save_data = [
				'judul_artikel' => $this->input->post('judul_artikel'),
				'deskripsi_artikel' => $this->input->post('deskripsi_artikel'),
				'isi_artikel' => $this->input->post('isi_artikel'),
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/artikel/')) {
				mkdir(FCPATH . '/uploads/artikel/');
			}

			if (!empty($artikel_photo_name)) {
				$artikel_photo_name_copy = date('YmdHis') . '-' . $artikel_photo_name;

				rename(FCPATH . 'uploads/tmp/' . $artikel_photo_uuid . '/' . $artikel_photo_name, 
						FCPATH . 'uploads/artikel/' . $artikel_photo_name_copy);

				if (!is_file(FCPATH . '/uploads/artikel/' . $artikel_photo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo'] = $artikel_photo_name_copy;
			}
		
			
			$save_artikel = $id = $this->model_artikel->store($save_data);
            

			if ($save_artikel) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_artikel;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/artikel/edit/' . $save_artikel, 'Edit Artikel'),
						anchor('administrator/artikel', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/artikel/edit/' . $save_artikel, 'Edit Artikel')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/artikel');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/artikel');
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
	* Update view Artikels
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('artikel_update');

		$this->data['artikel'] = $this->model_artikel->find($id);

		$this->template->title('Artikel Update');
		$this->render('backend/standart/administrator/artikel/artikel_update', $this->data);
	}

	/**
	* Update Artikels
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('artikel_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('deskripsi_artikel', 'Deskripsi Artikel', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('isi_artikel', 'Isi Artikel', 'trim|required');
		

		$this->form_validation->set_rules('artikel_photo_name', 'Photo', 'trim|required');
		

		
		if ($this->form_validation->run()) {
			$artikel_photo_uuid = $this->input->post('artikel_photo_uuid');
			$artikel_photo_name = $this->input->post('artikel_photo_name');
		
			$save_data = [
				'judul_artikel' => $this->input->post('judul_artikel'),
				'deskripsi_artikel' => $this->input->post('deskripsi_artikel'),
				'isi_artikel' => $this->input->post('isi_artikel'),
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/artikel/')) {
				mkdir(FCPATH . '/uploads/artikel/');
			}

			if (!empty($artikel_photo_uuid)) {
				$artikel_photo_name_copy = date('YmdHis') . '-' . $artikel_photo_name;

				rename(FCPATH . 'uploads/tmp/' . $artikel_photo_uuid . '/' . $artikel_photo_name, 
						FCPATH . 'uploads/artikel/' . $artikel_photo_name_copy);

				if (!is_file(FCPATH . '/uploads/artikel/' . $artikel_photo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo'] = $artikel_photo_name_copy;
			}
		
			
			$save_artikel = $this->model_artikel->change($id, $save_data);

			if ($save_artikel) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/artikel', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/artikel');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/artikel');
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
	* delete Artikels
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('artikel_delete');

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
            set_message(cclang('has_been_deleted', 'artikel'), 'success');
        } else {
            set_message(cclang('error_delete', 'artikel'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Artikels
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('artikel_view');

		$this->data['artikel'] = $this->model_artikel->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Artikel Detail');
		$this->render('backend/standart/administrator/artikel/artikel_view', $this->data);
	}
	
	/**
	* delete Artikels
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$artikel = $this->model_artikel->find($id);

		if (!empty($artikel->photo)) {
			$path = FCPATH . '/uploads/artikel/' . $artikel->photo;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_artikel->remove($id);
	}
	
	/**
	* Upload Image Artikel	* 
	* @return JSON
	*/
	public function upload_photo_file()
	{
		if (!$this->is_allowed('artikel_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'artikel',
		]);
	}

	/**
	* Delete Image Artikel	* 
	* @return JSON
	*/
	public function delete_photo_file($uuid)
	{
		if (!$this->is_allowed('artikel_delete', false)) {
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
            'table_name'        => 'artikel',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/artikel/'
        ]);
	}

	/**
	* Get Image Artikel	* 
	* @return JSON
	*/
	public function get_photo_file($id)
	{
		if (!$this->is_allowed('artikel_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$artikel = $this->model_artikel->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'photo', 
            'table_name'        => 'artikel',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/artikel/',
            'delete_endpoint'   => 'administrator/artikel/delete_photo_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('artikel_export');

		$this->model_artikel->export(
			'artikel', 
			'artikel',
			$this->model_artikel->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('artikel_export');

		$this->model_artikel->pdf('artikel', 'artikel');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('artikel_export');

		$table = $title = 'artikel';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_artikel->find($id);
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


/* End of file artikel.php */
/* Location: ./application/controllers/administrator/Artikel.php */