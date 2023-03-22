<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Slideshow Controller
*| --------------------------------------------------------------------------
*| Slideshow site
*|
*/
class Slideshow extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_slideshow');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Slideshows
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('slideshow_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['slideshows'] = $this->model_slideshow->get($filter, $field, $this->limit_page, $offset);
		$this->data['slideshow_counts'] = $this->model_slideshow->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/slideshow/index/',
			'total_rows'   => $this->data['slideshow_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Slideshow List');
		$this->render('backend/standart/administrator/slideshow/slideshow_list', $this->data);
	}
	
	/**
	* Add new slideshows
	*
	*/
	public function add()
	{
		$this->is_allowed('slideshow_add');

		$this->template->title('Slideshow New');
		$this->render('backend/standart/administrator/slideshow/slideshow_add', $this->data);
	}

	/**
	* Add New Slideshows
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('slideshow_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('slideshow_photo_name', 'Photo', 'trim|required');
		

		

		if ($this->form_validation->run()) {
			$slideshow_photo_uuid = $this->input->post('slideshow_photo_uuid');
			$slideshow_photo_name = $this->input->post('slideshow_photo_name');
		
			$save_data = [
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/slideshow/')) {
				mkdir(FCPATH . '/uploads/slideshow/');
			}

			if (!empty($slideshow_photo_name)) {
				$slideshow_photo_name_copy = date('YmdHis') . '-' . $slideshow_photo_name;

				rename(FCPATH . 'uploads/tmp/' . $slideshow_photo_uuid . '/' . $slideshow_photo_name, 
						FCPATH . 'uploads/slideshow/' . $slideshow_photo_name_copy);

				if (!is_file(FCPATH . '/uploads/slideshow/' . $slideshow_photo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo'] = $slideshow_photo_name_copy;
			}
		
			
			$save_slideshow = $id = $this->model_slideshow->store($save_data);
            

			if ($save_slideshow) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_slideshow;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/slideshow/edit/' . $save_slideshow, 'Edit Slideshow'),
						anchor('administrator/slideshow', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/slideshow/edit/' . $save_slideshow, 'Edit Slideshow')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/slideshow');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/slideshow');
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
	* Update view Slideshows
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('slideshow_update');

		$this->data['slideshow'] = $this->model_slideshow->find($id);

		$this->template->title('Slideshow Update');
		$this->render('backend/standart/administrator/slideshow/slideshow_update', $this->data);
	}

	/**
	* Update Slideshows
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('slideshow_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('slideshow_photo_name', 'Photo', 'trim|required');
		

		
		if ($this->form_validation->run()) {
			$slideshow_photo_uuid = $this->input->post('slideshow_photo_uuid');
			$slideshow_photo_name = $this->input->post('slideshow_photo_name');
		
			$save_data = [
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/slideshow/')) {
				mkdir(FCPATH . '/uploads/slideshow/');
			}

			if (!empty($slideshow_photo_uuid)) {
				$slideshow_photo_name_copy = date('YmdHis') . '-' . $slideshow_photo_name;

				rename(FCPATH . 'uploads/tmp/' . $slideshow_photo_uuid . '/' . $slideshow_photo_name, 
						FCPATH . 'uploads/slideshow/' . $slideshow_photo_name_copy);

				if (!is_file(FCPATH . '/uploads/slideshow/' . $slideshow_photo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo'] = $slideshow_photo_name_copy;
			}
		
			
			$save_slideshow = $this->model_slideshow->change($id, $save_data);

			if ($save_slideshow) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/slideshow', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/slideshow');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/slideshow');
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
	* delete Slideshows
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('slideshow_delete');

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
            set_message(cclang('has_been_deleted', 'slideshow'), 'success');
        } else {
            set_message(cclang('error_delete', 'slideshow'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Slideshows
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('slideshow_view');

		$this->data['slideshow'] = $this->model_slideshow->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Slideshow Detail');
		$this->render('backend/standart/administrator/slideshow/slideshow_view', $this->data);
	}
	
	/**
	* delete Slideshows
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$slideshow = $this->model_slideshow->find($id);

		if (!empty($slideshow->photo)) {
			$path = FCPATH . '/uploads/slideshow/' . $slideshow->photo;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_slideshow->remove($id);
	}
	
	/**
	* Upload Image Slideshow	* 
	* @return JSON
	*/
	public function upload_photo_file()
	{
		if (!$this->is_allowed('slideshow_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'slideshow',
		]);
	}

	/**
	* Delete Image Slideshow	* 
	* @return JSON
	*/
	public function delete_photo_file($uuid)
	{
		if (!$this->is_allowed('slideshow_delete', false)) {
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
            'table_name'        => 'slideshow',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/slideshow/'
        ]);
	}

	/**
	* Get Image Slideshow	* 
	* @return JSON
	*/
	public function get_photo_file($id)
	{
		if (!$this->is_allowed('slideshow_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$slideshow = $this->model_slideshow->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'photo', 
            'table_name'        => 'slideshow',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/slideshow/',
            'delete_endpoint'   => 'administrator/slideshow/delete_photo_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('slideshow_export');

		$this->model_slideshow->export(
			'slideshow', 
			'slideshow',
			$this->model_slideshow->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('slideshow_export');

		$this->model_slideshow->pdf('slideshow', 'slideshow');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('slideshow_export');

		$table = $title = 'slideshow';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_slideshow->find($id);
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


/* End of file slideshow.php */
/* Location: ./application/controllers/administrator/Slideshow.php */