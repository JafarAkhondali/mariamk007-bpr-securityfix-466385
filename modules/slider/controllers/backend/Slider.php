<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Slider Controller
*| --------------------------------------------------------------------------
*| Slider site
*|
*/
class Slider extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_slider');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Sliders
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('slider_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['sliders'] = $this->model_slider->get($filter, $field, $this->limit_page, $offset);
		$this->data['slider_counts'] = $this->model_slider->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/slider/index/',
			'total_rows'   => $this->data['slider_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Slider List');
		$this->render('backend/standart/administrator/slider/slider_list', $this->data);
	}
	
	/**
	* Add new sliders
	*
	*/
	public function add()
	{
		$this->is_allowed('slider_add');

		$this->template->title('Slider New');
		$this->render('backend/standart/administrator/slider/slider_add', $this->data);
	}

	/**
	* Add New Sliders
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('slider_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('slider_slideshow_name', 'Slideshow', 'trim|required');
		

		

		if ($this->form_validation->run()) {
			$slider_slideshow_uuid = $this->input->post('slider_slideshow_uuid');
			$slider_slideshow_name = $this->input->post('slider_slideshow_name');
		
			$save_data = [
				'text' => $this->input->post('text'),
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/slider/')) {
				mkdir(FCPATH . '/uploads/slider/');
			}

			if (!empty($slider_slideshow_name)) {
				$slider_slideshow_name_copy = date('YmdHis') . '-' . $slider_slideshow_name;

				rename(FCPATH . 'uploads/tmp/' . $slider_slideshow_uuid . '/' . $slider_slideshow_name, 
						FCPATH . 'uploads/slider/' . $slider_slideshow_name_copy);

				if (!is_file(FCPATH . '/uploads/slider/' . $slider_slideshow_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['slideshow'] = $slider_slideshow_name_copy;
			}
		
			
			$save_slider = $id = $this->model_slider->store($save_data);
            

			if ($save_slider) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_slider;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/slider/edit/' . $save_slider, 'Edit Slider'),
						anchor('administrator/slider', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/slider/edit/' . $save_slider, 'Edit Slider')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/slider');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/slider');
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
	* Update view Sliders
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('slider_update');

		$this->data['slider'] = $this->model_slider->find($id);

		$this->template->title('Slider Update');
		$this->render('backend/standart/administrator/slider/slider_update', $this->data);
	}

	/**
	* Update Sliders
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('slider_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('slider_slideshow_name', 'Slideshow', 'trim|required');
		

		
		if ($this->form_validation->run()) {
			$slider_slideshow_uuid = $this->input->post('slider_slideshow_uuid');
			$slider_slideshow_name = $this->input->post('slider_slideshow_name');
		
			$save_data = [
				'text' => $this->input->post('text'),
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/slider/')) {
				mkdir(FCPATH . '/uploads/slider/');
			}

			if (!empty($slider_slideshow_uuid)) {
				$slider_slideshow_name_copy = date('YmdHis') . '-' . $slider_slideshow_name;

				rename(FCPATH . 'uploads/tmp/' . $slider_slideshow_uuid . '/' . $slider_slideshow_name, 
						FCPATH . 'uploads/slider/' . $slider_slideshow_name_copy);

				if (!is_file(FCPATH . '/uploads/slider/' . $slider_slideshow_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['slideshow'] = $slider_slideshow_name_copy;
			}
		
			
			$save_slider = $this->model_slider->change($id, $save_data);

			if ($save_slider) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/slider', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/slider');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/slider');
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
	* delete Sliders
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('slider_delete');

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
            set_message(cclang('has_been_deleted', 'slider'), 'success');
        } else {
            set_message(cclang('error_delete', 'slider'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Sliders
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('slider_view');

		$this->data['slider'] = $this->model_slider->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Slider Detail');
		$this->render('backend/standart/administrator/slider/slider_view', $this->data);
	}
	
	/**
	* delete Sliders
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$slider = $this->model_slider->find($id);

		if (!empty($slider->slideshow)) {
			$path = FCPATH . '/uploads/slider/' . $slider->slideshow;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_slider->remove($id);
	}
	
	/**
	* Upload Image Slider	* 
	* @return JSON
	*/
	public function upload_slideshow_file()
	{
		if (!$this->is_allowed('slider_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'slider',
		]);
	}

	/**
	* Delete Image Slider	* 
	* @return JSON
	*/
	public function delete_slideshow_file($uuid)
	{
		if (!$this->is_allowed('slider_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'slideshow', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'slider',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/slider/'
        ]);
	}

	/**
	* Get Image Slider	* 
	* @return JSON
	*/
	public function get_slideshow_file($id)
	{
		if (!$this->is_allowed('slider_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$slider = $this->model_slider->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'slideshow', 
            'table_name'        => 'slider',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/slider/',
            'delete_endpoint'   => 'administrator/slider/delete_slideshow_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('slider_export');

		$this->model_slider->export(
			'slider', 
			'slider',
			$this->model_slider->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('slider_export');

		$this->model_slider->pdf('slider', 'slider');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('slider_export');

		$table = $title = 'slider';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_slider->find($id);
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


/* End of file slider.php */
/* Location: ./application/controllers/administrator/Slider.php */