<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Kredit Controller
*| --------------------------------------------------------------------------
*| Kredit site
*|
*/
class Kredit extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_kredit');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Kredits
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('kredit_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['kredits'] = $this->model_kredit->get($filter, $field, $this->limit_page, $offset);
		$this->data['kredit_counts'] = $this->model_kredit->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/kredit/index/',
			'total_rows'   => $this->data['kredit_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kredit List');
		$this->render('backend/standart/administrator/kredit/kredit_list', $this->data);
	}
	
	/**
	* Add new kredits
	*
	*/
	public function add()
	{
		$this->is_allowed('kredit_add');

		$this->template->title('Kredit New');
		$this->render('backend/standart/administrator/kredit/kredit_add', $this->data);
	}

	/**
	* Add New Kredits
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('kredit_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama_kredit', 'Nama Kredit', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('kredit_photo_name', 'Photo', 'trim|required');
		

		$this->form_validation->set_rules('deskripsi_kredit', 'Deskripsi Kredit', 'trim|required');
		

		

		if ($this->form_validation->run()) {
			$kredit_photo_uuid = $this->input->post('kredit_photo_uuid');
			$kredit_photo_name = $this->input->post('kredit_photo_name');
		
			$save_data = [
				'nama_kredit' => $this->input->post('nama_kredit'),
				'deskripsi_kredit' => $this->input->post('deskripsi_kredit'),
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/kredit/')) {
				mkdir(FCPATH . '/uploads/kredit/');
			}

			if (!empty($kredit_photo_name)) {
				$kredit_photo_name_copy = date('YmdHis') . '-' . $kredit_photo_name;

				rename(FCPATH . 'uploads/tmp/' . $kredit_photo_uuid . '/' . $kredit_photo_name, 
						FCPATH . 'uploads/kredit/' . $kredit_photo_name_copy);

				if (!is_file(FCPATH . '/uploads/kredit/' . $kredit_photo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo'] = $kredit_photo_name_copy;
			}
		
			
			$save_kredit = $id = $this->model_kredit->store($save_data);
            

			if ($save_kredit) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_kredit;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/kredit/edit/' . $save_kredit, 'Edit Kredit'),
						anchor('administrator/kredit', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/kredit/edit/' . $save_kredit, 'Edit Kredit')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kredit');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kredit');
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
	* Update view Kredits
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('kredit_update');

		$this->data['kredit'] = $this->model_kredit->find($id);

		$this->template->title('Kredit Update');
		$this->render('backend/standart/administrator/kredit/kredit_update', $this->data);
	}

	/**
	* Update Kredits
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('kredit_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama_kredit', 'Nama Kredit', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('kredit_photo_name', 'Photo', 'trim|required');
		

		$this->form_validation->set_rules('deskripsi_kredit', 'Deskripsi Kredit', 'trim|required');
		

		
		if ($this->form_validation->run()) {
			$kredit_photo_uuid = $this->input->post('kredit_photo_uuid');
			$kredit_photo_name = $this->input->post('kredit_photo_name');
		
			$save_data = [
				'nama_kredit' => $this->input->post('nama_kredit'),
				'deskripsi_kredit' => $this->input->post('deskripsi_kredit'),
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/kredit/')) {
				mkdir(FCPATH . '/uploads/kredit/');
			}

			if (!empty($kredit_photo_uuid)) {
				$kredit_photo_name_copy = date('YmdHis') . '-' . $kredit_photo_name;

				rename(FCPATH . 'uploads/tmp/' . $kredit_photo_uuid . '/' . $kredit_photo_name, 
						FCPATH . 'uploads/kredit/' . $kredit_photo_name_copy);

				if (!is_file(FCPATH . '/uploads/kredit/' . $kredit_photo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo'] = $kredit_photo_name_copy;
			}
		
			
			$save_kredit = $this->model_kredit->change($id, $save_data);

			if ($save_kredit) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/kredit', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kredit');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kredit');
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
	* delete Kredits
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('kredit_delete');

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
            set_message(cclang('has_been_deleted', 'kredit'), 'success');
        } else {
            set_message(cclang('error_delete', 'kredit'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Kredits
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('kredit_view');

		$this->data['kredit'] = $this->model_kredit->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kredit Detail');
		$this->render('backend/standart/administrator/kredit/kredit_view', $this->data);
	}
	
	/**
	* delete Kredits
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$kredit = $this->model_kredit->find($id);

		if (!empty($kredit->photo)) {
			$path = FCPATH . '/uploads/kredit/' . $kredit->photo;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_kredit->remove($id);
	}
	
	/**
	* Upload Image Kredit	* 
	* @return JSON
	*/
	public function upload_photo_file()
	{
		if (!$this->is_allowed('kredit_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'kredit',
		]);
	}

	/**
	* Delete Image Kredit	* 
	* @return JSON
	*/
	public function delete_photo_file($uuid)
	{
		if (!$this->is_allowed('kredit_delete', false)) {
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
            'table_name'        => 'kredit',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/kredit/'
        ]);
	}

	/**
	* Get Image Kredit	* 
	* @return JSON
	*/
	public function get_photo_file($id)
	{
		if (!$this->is_allowed('kredit_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$kredit = $this->model_kredit->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'photo', 
            'table_name'        => 'kredit',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/kredit/',
            'delete_endpoint'   => 'administrator/kredit/delete_photo_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('kredit_export');

		$this->model_kredit->export(
			'kredit', 
			'kredit',
			$this->model_kredit->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('kredit_export');

		$this->model_kredit->pdf('kredit', 'kredit');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('kredit_export');

		$table = $title = 'kredit';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_kredit->find($id);
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


/* End of file kredit.php */
/* Location: ./application/controllers/administrator/Kredit.php */