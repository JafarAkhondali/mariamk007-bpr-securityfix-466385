<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Job Deskripsi Pekerjaan Controller
*| --------------------------------------------------------------------------
*| Job Deskripsi Pekerjaan site
*|
*/
class Job_deskripsi_pekerjaan extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_job_deskripsi_pekerjaan');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Job Deskripsi Pekerjaans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('job_deskripsi_pekerjaan_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['job_deskripsi_pekerjaans'] = $this->model_job_deskripsi_pekerjaan->get($filter, $field, $this->limit_page, $offset);
		$this->data['job_deskripsi_pekerjaan_counts'] = $this->model_job_deskripsi_pekerjaan->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/job_deskripsi_pekerjaan/index/',
			'total_rows'   => $this->data['job_deskripsi_pekerjaan_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Job Deskripsi Pekerjaan List');
		$this->render('backend/standart/administrator/job_deskripsi_pekerjaan/job_deskripsi_pekerjaan_list', $this->data);
	}
	
	/**
	* Add new job_deskripsi_pekerjaans
	*
	*/
	public function add()
	{
		$this->is_allowed('job_deskripsi_pekerjaan_add');

		$this->template->title('Job Deskripsi Pekerjaan New');
		$this->render('backend/standart/administrator/job_deskripsi_pekerjaan/job_deskripsi_pekerjaan_add', $this->data);
	}

	/**
	* Add New Job Deskripsi Pekerjaans
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('job_deskripsi_pekerjaan_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama_department', 'Nama Department', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('deskripsi_pekerjaan', 'Deskripsi Pekerjaan', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_department' => $this->input->post('nama_department'),
				'deskripsi_pekerjaan' => $this->input->post('deskripsi_pekerjaan'),
			];

			
			



			
			
			$save_job_deskripsi_pekerjaan = $id = $this->model_job_deskripsi_pekerjaan->store($save_data);
            

			if ($save_job_deskripsi_pekerjaan) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_job_deskripsi_pekerjaan;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/job_deskripsi_pekerjaan/edit/' . $save_job_deskripsi_pekerjaan, 'Edit Job Deskripsi Pekerjaan'),
						anchor('administrator/job_deskripsi_pekerjaan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/job_deskripsi_pekerjaan/edit/' . $save_job_deskripsi_pekerjaan, 'Edit Job Deskripsi Pekerjaan')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/job_deskripsi_pekerjaan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/job_deskripsi_pekerjaan');
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
	* Update view Job Deskripsi Pekerjaans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('job_deskripsi_pekerjaan_update');

		$this->data['job_deskripsi_pekerjaan'] = $this->model_job_deskripsi_pekerjaan->find($id);

		$this->template->title('Job Deskripsi Pekerjaan Update');
		$this->render('backend/standart/administrator/job_deskripsi_pekerjaan/job_deskripsi_pekerjaan_update', $this->data);
	}

	/**
	* Update Job Deskripsi Pekerjaans
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('job_deskripsi_pekerjaan_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama_department', 'Nama Department', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('deskripsi_pekerjaan', 'Deskripsi Pekerjaan', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_department' => $this->input->post('nama_department'),
				'deskripsi_pekerjaan' => $this->input->post('deskripsi_pekerjaan'),
			];

			

			


			
			
			$save_job_deskripsi_pekerjaan = $this->model_job_deskripsi_pekerjaan->change($id, $save_data);

			if ($save_job_deskripsi_pekerjaan) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/job_deskripsi_pekerjaan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/job_deskripsi_pekerjaan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/job_deskripsi_pekerjaan');
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
	* delete Job Deskripsi Pekerjaans
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('job_deskripsi_pekerjaan_delete');

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
            set_message(cclang('has_been_deleted', 'job_deskripsi_pekerjaan'), 'success');
        } else {
            set_message(cclang('error_delete', 'job_deskripsi_pekerjaan'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Job Deskripsi Pekerjaans
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('job_deskripsi_pekerjaan_view');

		$this->data['job_deskripsi_pekerjaan'] = $this->model_job_deskripsi_pekerjaan->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Job Deskripsi Pekerjaan Detail');
		$this->render('backend/standart/administrator/job_deskripsi_pekerjaan/job_deskripsi_pekerjaan_view', $this->data);
	}
	
	/**
	* delete Job Deskripsi Pekerjaans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$job_deskripsi_pekerjaan = $this->model_job_deskripsi_pekerjaan->find($id);

		
		
		return $this->model_job_deskripsi_pekerjaan->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('job_deskripsi_pekerjaan_export');

		$this->model_job_deskripsi_pekerjaan->export(
			'job_deskripsi_pekerjaan', 
			'job_deskripsi_pekerjaan',
			$this->model_job_deskripsi_pekerjaan->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('job_deskripsi_pekerjaan_export');

		$this->model_job_deskripsi_pekerjaan->pdf('job_deskripsi_pekerjaan', 'job_deskripsi_pekerjaan');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('job_deskripsi_pekerjaan_export');

		$table = $title = 'job_deskripsi_pekerjaan';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_job_deskripsi_pekerjaan->find($id);
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


/* End of file job_deskripsi_pekerjaan.php */
/* Location: ./application/controllers/administrator/Job Deskripsi Pekerjaan.php */