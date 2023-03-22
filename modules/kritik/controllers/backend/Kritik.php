<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Kritik Controller
*| --------------------------------------------------------------------------
*| Kritik site
*|
*/
class Kritik extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_kritik');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Kritiks
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('kritik_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['kritiks'] = $this->model_kritik->get($filter, $field, $this->limit_page, $offset);
		$this->data['kritik_counts'] = $this->model_kritik->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/kritik/index/',
			'total_rows'   => $this->data['kritik_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kritik List');
		$this->render('backend/standart/administrator/kritik/kritik_list', $this->data);
	}
	
	/**
	* Add new kritiks
	*
	*/
	public function add()
	{
		$this->is_allowed('kritik_add');

		$this->template->title('Kritik New');
		$this->render('backend/standart/administrator/kritik/kritik_add', $this->data);
	}

	/**
	* Add New Kritiks
	*
	* @return JSON
	*/
	public function add_save()
	{
		// if (!$this->is_allowed('kritik_add', false)) {
		// 	echo json_encode([
		// 		'success' => false,
		// 		'message' => cclang('sorry_you_do_not_have_permission_to_access')
		// 		]);
		// 	exit;
		// }
		
		

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('kritik', 'Kritik/saran', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama' => $this->input->post('nama'),
				'kritik' => $this->input->post('kritik'),
			];

			
			



			
			
			$save_kritik = $id = $this->model_kritik->store($save_data);
            

			if ($save_kritik) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_kritik;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/kritik/edit/' . $save_kritik, 'Edit Kritik'),
						anchor('administrator/kritik', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/kritik/edit/' . $save_kritik, 'Edit Kritik')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kritik');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kritik');
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
	* Update view Kritiks
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('kritik_update');

		$this->data['kritik'] = $this->model_kritik->find($id);

		$this->template->title('Kritik Update');
		$this->render('backend/standart/administrator/kritik/kritik_update', $this->data);
	}

	/**
	* Update Kritiks
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('kritik_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('kritik', 'Kritik/saran', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama' => $this->input->post('nama'),
				'kritik' => $this->input->post('kritik'),
			];

			

			


			
			
			$save_kritik = $this->model_kritik->change($id, $save_data);

			if ($save_kritik) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/kritik', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kritik');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kritik');
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
	* delete Kritiks
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('kritik_delete');

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
            set_message(cclang('has_been_deleted', 'kritik'), 'success');
        } else {
            set_message(cclang('error_delete', 'kritik'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Kritiks
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('kritik_view');

		$this->data['kritik'] = $this->model_kritik->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kritik Detail');
		$this->render('backend/standart/administrator/kritik/kritik_view', $this->data);
	}
	
	/**
	* delete Kritiks
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$kritik = $this->model_kritik->find($id);

		
		
		return $this->model_kritik->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('kritik_export');

		$this->model_kritik->export(
			'kritik', 
			'kritik',
			$this->model_kritik->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('kritik_export');

		$this->model_kritik->pdf('kritik', 'kritik');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('kritik_export');

		$table = $title = 'kritik';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_kritik->find($id);
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


/* End of file kritik.php */
/* Location: ./application/controllers/administrator/Kritik.php */