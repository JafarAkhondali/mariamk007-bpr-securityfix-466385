<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Survei Lapangan Controller
*| --------------------------------------------------------------------------
*| Survei Lapangan site
*|
*/
class Survei_lapangan extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_survei_lapangan');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Survei Lapangans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('survei_lapangan_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['survei_lapangans'] = $this->model_survei_lapangan->get($filter, $field, $this->limit_page, $offset);
		$this->data['survei_lapangan_counts'] = $this->model_survei_lapangan->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/survei_lapangan/index/',
			'total_rows'   => $this->data['survei_lapangan_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Survei Lapangan List');
		$this->render('backend/standart/administrator/survei_lapangan/survei_lapangan_list', $this->data);
	}
	
	/**
	* Add new survei_lapangans
	*
	*/
	public function add()
	{
		$this->is_allowed('survei_lapangan_add');

		$this->template->title('Survei Lapangan New');
		$this->render('backend/standart/administrator/survei_lapangan/survei_lapangan_add', $this->data);
	}

	/**
	* Add New Survei Lapangans
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('survei_lapangan_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('jaminan_kredit', 'Jaminan Kredit', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('lokasi_jaminan', 'Lokasi Jaminan', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('situasi_jaminan', 'Situasi Jaminan', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'jaminan_kredit' => $this->input->post('jaminan_kredit'),
				'lokasi_jaminan' => $this->input->post('lokasi_jaminan'),
				'situasi_jaminan' => $this->input->post('situasi_jaminan'),
				'updated_by' => $this->input->post('updated_by'),
				'created_at' => date('Y-m-d H:i:s'),
				'username' => $this->input->post('username'),
				'status_layak' => $this->input->post('status_layak'),
			];

			
			



			
			
			$save_survei_lapangan = $id = $this->model_survei_lapangan->store($save_data);
            

			if ($save_survei_lapangan) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_survei_lapangan;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/survei_lapangan/edit/' . $save_survei_lapangan, 'Edit Survei Lapangan'),
						anchor('administrator/survei_lapangan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/survei_lapangan/edit/' . $save_survei_lapangan, 'Edit Survei Lapangan')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/survei_lapangan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/survei_lapangan');
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
	* Update view Survei Lapangans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('survei_lapangan_update');

		$this->data['survei_lapangan'] = $this->model_survei_lapangan->find($id);

		$this->template->title('Survei Lapangan Update');
		$this->render('backend/standart/administrator/survei_lapangan/survei_lapangan_update', $this->data);
	}

	/**
	* Update Survei Lapangans
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('survei_lapangan_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('jaminan_kredit', 'Jaminan Kredit', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('lokasi_jaminan', 'Lokasi Jaminan', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('situasi_jaminan', 'Situasi Jaminan', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'jaminan_kredit' => $this->input->post('jaminan_kredit'),
				'lokasi_jaminan' => $this->input->post('lokasi_jaminan'),
				'situasi_jaminan' => $this->input->post('situasi_jaminan'),
				'username' => $this->input->post('username'),
				'status_layak' => $this->input->post('status_layak'),
			];

			

			


			
			
			$save_survei_lapangan = $this->model_survei_lapangan->change($id, $save_data);

			if ($save_survei_lapangan) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/survei_lapangan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/survei_lapangan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/survei_lapangan');
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
	* delete Survei Lapangans
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('survei_lapangan_delete');

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
            set_message(cclang('has_been_deleted', 'survei_lapangan'), 'success');
        } else {
            set_message(cclang('error_delete', 'survei_lapangan'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Survei Lapangans
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('survei_lapangan_view');

		$this->data['survei_lapangan'] = $this->model_survei_lapangan->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Survei Lapangan Detail');
		$this->render('backend/standart/administrator/survei_lapangan/survei_lapangan_view', $this->data);
	}
	
	/**
	* delete Survei Lapangans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$survei_lapangan = $this->model_survei_lapangan->find($id);

		
		
		return $this->model_survei_lapangan->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('survei_lapangan_export');

		$this->model_survei_lapangan->export(
			'survei_lapangan', 
			'survei_lapangan',
			$this->model_survei_lapangan->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('survei_lapangan_export');

		$this->model_survei_lapangan->pdf('survei_lapangan', 'survei_lapangan');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('survei_lapangan_export');

		$table = $title = 'survei_lapangan';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_survei_lapangan->find($id);
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


/* End of file survei_lapangan.php */
/* Location: ./application/controllers/administrator/Survei Lapangan.php */