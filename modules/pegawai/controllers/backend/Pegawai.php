<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Pegawai Controller
*| --------------------------------------------------------------------------
*| Pegawai site
*|
*/
class Pegawai extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_pegawai');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Pegawais
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('pegawai_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['pegawais'] = $this->model_pegawai->get($filter, $field, $this->limit_page, $offset);
		$this->data['pegawai_counts'] = $this->model_pegawai->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/pegawai/index/',
			'total_rows'   => $this->data['pegawai_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Pegawai List');
		$this->render('backend/standart/administrator/pegawai/pegawai_list', $this->data);
	}
	
	/**
	* Add new pegawais
	*
	*/
	public function add()
	{
		$this->is_allowed('pegawai_add');

		$this->template->title('Data Pegawai New');
		$this->render('backend/standart/administrator/pegawai/pegawai_add', $this->data);
	}

	/**
	* Add New Pegawais
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('pegawai_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required|max_length[255]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama' => $this->input->post('nama'),
				'jabatan' => $this->input->post('jabatan'),
				'is_featured' => $this->input->post('is_featured'),
			];

			
			



			
			
			$save_pegawai = $id = $this->model_pegawai->store($save_data);
            

			if ($save_pegawai) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_pegawai;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/pegawai/edit/' . $save_pegawai, 'Edit Pegawai'),
						anchor('administrator/pegawai', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/pegawai/edit/' . $save_pegawai, 'Edit Pegawai')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/pegawai');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/pegawai');
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
	* Update view Pegawais
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('pegawai_update');

		$this->data['pegawai'] = $this->model_pegawai->find($id);

		$this->template->title('Data Pegawai Update');
		$this->render('backend/standart/administrator/pegawai/pegawai_update', $this->data);
	}

	/**
	* Update Pegawais
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('pegawai_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required|max_length[255]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama' => $this->input->post('nama'),
				'jabatan' => $this->input->post('jabatan'),
				'is_featured' => $this->input->post('is_featured'),
			];

			

			


			
			
			$save_pegawai = $this->model_pegawai->change($id, $save_data);

			if ($save_pegawai) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/pegawai', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/pegawai');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/pegawai');
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
	* delete Pegawais
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('pegawai_delete');

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
            set_message(cclang('has_been_deleted', 'pegawai'), 'success');
        } else {
            set_message(cclang('error_delete', 'pegawai'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Pegawais
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('pegawai_view');

		$this->data['pegawai'] = $this->model_pegawai->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Data Pegawai Detail');
		$this->render('backend/standart/administrator/pegawai/pegawai_view', $this->data);
	}
	
	/**
	* delete Pegawais
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$pegawai = $this->model_pegawai->find($id);

		
		
		return $this->model_pegawai->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('pegawai_export');

		$this->model_pegawai->export(
			'pegawai', 
			'pegawai',
			$this->model_pegawai->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('pegawai_export');

		$this->model_pegawai->pdf('pegawai', 'pegawai');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('pegawai_export');

		$table = $title = 'pegawai';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_pegawai->find($id);
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


/* End of file pegawai.php */
/* Location: ./application/controllers/administrator/Pegawai.php */