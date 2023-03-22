<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Testing Controller
*| --------------------------------------------------------------------------
*| Testing site
*|
*/
class Testing extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_testing');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Testings
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('testing_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['testings'] = $this->model_testing->get($filter, $field, $this->limit_page, $offset);
		$this->data['testing_counts'] = $this->model_testing->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/testing/index/',
			'total_rows'   => $this->data['testing_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Testing List');
		$this->render('backend/standart/administrator/testing/testing_list', $this->data);
	}
	
	/**
	* Add new testings
	*
	*/
	public function add()
	{
		$this->is_allowed('testing_add');

		$this->template->title('Testing New');
		$this->render('backend/standart/administrator/testing/testing_add', $this->data);
	}

	/**
	* Add New Testings
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('testing_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('testing_photo_1_name', 'Photo 1', 'trim|required');
		

		$this->form_validation->set_rules('testing_photo_2_name', 'Photo 2', 'trim|required');
		

		

		if ($this->form_validation->run()) {
			$testing_photo_1_uuid = $this->input->post('testing_photo_1_uuid');
			$testing_photo_1_name = $this->input->post('testing_photo_1_name');
			$testing_photo_2_uuid = $this->input->post('testing_photo_2_uuid');
			$testing_photo_2_name = $this->input->post('testing_photo_2_name');
		
			$save_data = [
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/testing/')) {
				mkdir(FCPATH . '/uploads/testing/');
			}

			if (!empty($testing_photo_1_name)) {
				$testing_photo_1_name_copy = date('YmdHis') . '-' . $testing_photo_1_name;

				rename(FCPATH . 'uploads/tmp/' . $testing_photo_1_uuid . '/' . $testing_photo_1_name, 
						FCPATH . 'uploads/testing/' . $testing_photo_1_name_copy);

				if (!is_file(FCPATH . '/uploads/testing/' . $testing_photo_1_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo_1'] = $testing_photo_1_name_copy;
			}
		
			if (!empty($testing_photo_2_name)) {
				$testing_photo_2_name_copy = date('YmdHis') . '-' . $testing_photo_2_name;

				rename(FCPATH . 'uploads/tmp/' . $testing_photo_2_uuid . '/' . $testing_photo_2_name, 
						FCPATH . 'uploads/testing/' . $testing_photo_2_name_copy);

				if (!is_file(FCPATH . '/uploads/testing/' . $testing_photo_2_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo_2'] = $testing_photo_2_name_copy;
			}
		
			
			$save_testing = $id = $this->model_testing->store($save_data);
            

			if ($save_testing) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_testing;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/testing/edit/' . $save_testing, 'Edit Testing'),
						anchor('administrator/testing', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/testing/edit/' . $save_testing, 'Edit Testing')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/testing');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/testing');
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
	* Update view Testings
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('testing_update');

		$this->data['testing'] = $this->model_testing->find($id);

		$this->template->title('Testing Update');
		$this->render('backend/standart/administrator/testing/testing_update', $this->data);
	}

	/**
	* Update Testings
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('testing_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('testing_photo_1_name', 'Photo 1', 'trim|required');
		

		$this->form_validation->set_rules('testing_photo_2_name', 'Photo 2', 'trim|required');
		

		
		if ($this->form_validation->run()) {
			$testing_photo_1_uuid = $this->input->post('testing_photo_1_uuid');
			$testing_photo_1_name = $this->input->post('testing_photo_1_name');
			$testing_photo_2_uuid = $this->input->post('testing_photo_2_uuid');
			$testing_photo_2_name = $this->input->post('testing_photo_2_name');
		
			$save_data = [
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/testing/')) {
				mkdir(FCPATH . '/uploads/testing/');
			}

			if (!empty($testing_photo_1_uuid)) {
				$testing_photo_1_name_copy = date('YmdHis') . '-' . $testing_photo_1_name;

				rename(FCPATH . 'uploads/tmp/' . $testing_photo_1_uuid . '/' . $testing_photo_1_name, 
						FCPATH . 'uploads/testing/' . $testing_photo_1_name_copy);

				if (!is_file(FCPATH . '/uploads/testing/' . $testing_photo_1_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo_1'] = $testing_photo_1_name_copy;
			}
		
			if (!empty($testing_photo_2_uuid)) {
				$testing_photo_2_name_copy = date('YmdHis') . '-' . $testing_photo_2_name;

				rename(FCPATH . 'uploads/tmp/' . $testing_photo_2_uuid . '/' . $testing_photo_2_name, 
						FCPATH . 'uploads/testing/' . $testing_photo_2_name_copy);

				if (!is_file(FCPATH . '/uploads/testing/' . $testing_photo_2_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo_2'] = $testing_photo_2_name_copy;
			}
		
			
			$save_testing = $this->model_testing->change($id, $save_data);

			if ($save_testing) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/testing', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/testing');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/testing');
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
	* delete Testings
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('testing_delete');

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
            set_message(cclang('has_been_deleted', 'testing'), 'success');
        } else {
            set_message(cclang('error_delete', 'testing'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Testings
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('testing_view');

		$this->data['testing'] = $this->model_testing->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Testing Detail');
		$this->render('backend/standart/administrator/testing/testing_view', $this->data);
	}
	
	/**
	* delete Testings
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$testing = $this->model_testing->find($id);

		if (!empty($testing->photo_1)) {
			$path = FCPATH . '/uploads/testing/' . $testing->photo_1;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		if (!empty($testing->photo_2)) {
			$path = FCPATH . '/uploads/testing/' . $testing->photo_2;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_testing->remove($id);
	}
	
	/**
	* Upload Image Testing	* 
	* @return JSON
	*/
	public function upload_photo_1_file()
	{
		if (!$this->is_allowed('testing_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'testing',
		]);
	}

	/**
	* Delete Image Testing	* 
	* @return JSON
	*/
	public function delete_photo_1_file($uuid)
	{
		if (!$this->is_allowed('testing_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'photo_1', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'testing',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/testing/'
        ]);
	}

	/**
	* Get Image Testing	* 
	* @return JSON
	*/
	public function get_photo_1_file($id)
	{
		if (!$this->is_allowed('testing_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$testing = $this->model_testing->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'photo_1', 
            'table_name'        => 'testing',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/testing/',
            'delete_endpoint'   => 'administrator/testing/delete_photo_1_file'
        ]);
	}
	
	/**
	* Upload Image Testing	* 
	* @return JSON
	*/
	public function upload_photo_2_file()
	{
		if (!$this->is_allowed('testing_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'testing',
		]);
	}

	/**
	* Delete Image Testing	* 
	* @return JSON
	*/
	public function delete_photo_2_file($uuid)
	{
		if (!$this->is_allowed('testing_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'photo_2', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'testing',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/testing/'
        ]);
	}

	/**
	* Get Image Testing	* 
	* @return JSON
	*/
	public function get_photo_2_file($id)
	{
		if (!$this->is_allowed('testing_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$testing = $this->model_testing->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'photo_2', 
            'table_name'        => 'testing',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/testing/',
            'delete_endpoint'   => 'administrator/testing/delete_photo_2_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('testing_export');

		$this->model_testing->export(
			'testing', 
			'testing',
			$this->model_testing->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('testing_export');

		$this->model_testing->pdf('testing', 'testing');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('testing_export');

		$table = $title = 'testing';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_testing->find($id);
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


/* End of file testing.php */
/* Location: ./application/controllers/administrator/Testing.php */