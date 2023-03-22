<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Sejarah Perusahaan Controller
*| --------------------------------------------------------------------------
*| Sejarah Perusahaan site
*|
*/
class Sejarah_perusahaan extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_sejarah_perusahaan');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Sejarah Perusahaans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('sejarah_perusahaan_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['sejarah_perusahaans'] = $this->model_sejarah_perusahaan->get($filter, $field, $this->limit_page, $offset);
		$this->data['sejarah_perusahaan_counts'] = $this->model_sejarah_perusahaan->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/sejarah_perusahaan/index/',
			'total_rows'   => $this->data['sejarah_perusahaan_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Sejarah Perusahaan List');
		$this->render('backend/standart/administrator/sejarah_perusahaan/sejarah_perusahaan_list', $this->data);
	}
	
	/**
	* Add new sejarah_perusahaans
	*
	*/
	public function add()
	{
		$this->is_allowed('sejarah_perusahaan_add');

		$this->template->title('Sejarah Perusahaan New');
		$this->render('backend/standart/administrator/sejarah_perusahaan/sejarah_perusahaan_add', $this->data);
	}

	/**
	* Add New Sejarah Perusahaans
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('sejarah_perusahaan_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		

		$this->form_validation->set_rules('judul_sejarah', 'Judul Sejarah', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('deskripsi_sejarah', 'Deskripsi Sejarah', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'date' => $this->input->post('date'),
				'judul_sejarah' => $this->input->post('judul_sejarah'),
				'deskripsi_sejarah' => $this->input->post('deskripsi_sejarah'),
			];

			
			



			
			
			$save_sejarah_perusahaan = $id = $this->model_sejarah_perusahaan->store($save_data);
            

			if ($save_sejarah_perusahaan) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_sejarah_perusahaan;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/sejarah_perusahaan/edit/' . $save_sejarah_perusahaan, 'Edit Sejarah Perusahaan'),
						anchor('administrator/sejarah_perusahaan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/sejarah_perusahaan/edit/' . $save_sejarah_perusahaan, 'Edit Sejarah Perusahaan')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/sejarah_perusahaan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/sejarah_perusahaan');
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
	* Update view Sejarah Perusahaans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('sejarah_perusahaan_update');

		$this->data['sejarah_perusahaan'] = $this->model_sejarah_perusahaan->find($id);

		$this->template->title('Sejarah Perusahaan Update');
		$this->render('backend/standart/administrator/sejarah_perusahaan/sejarah_perusahaan_update', $this->data);
	}

	/**
	* Update Sejarah Perusahaans
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('sejarah_perusahaan_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('date', 'Date', 'trim|required');
		

		$this->form_validation->set_rules('judul_sejarah', 'Judul Sejarah', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('deskripsi_sejarah', 'Deskripsi Sejarah', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'date' => $this->input->post('date'),
				'judul_sejarah' => $this->input->post('judul_sejarah'),
				'deskripsi_sejarah' => $this->input->post('deskripsi_sejarah'),
			];

			

			


			
			
			$save_sejarah_perusahaan = $this->model_sejarah_perusahaan->change($id, $save_data);

			if ($save_sejarah_perusahaan) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/sejarah_perusahaan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/sejarah_perusahaan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/sejarah_perusahaan');
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
	* delete Sejarah Perusahaans
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('sejarah_perusahaan_delete');

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
            set_message(cclang('has_been_deleted', 'sejarah_perusahaan'), 'success');
        } else {
            set_message(cclang('error_delete', 'sejarah_perusahaan'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Sejarah Perusahaans
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('sejarah_perusahaan_view');

		$this->data['sejarah_perusahaan'] = $this->model_sejarah_perusahaan->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Sejarah Perusahaan Detail');
		$this->render('backend/standart/administrator/sejarah_perusahaan/sejarah_perusahaan_view', $this->data);
	}
	
	/**
	* delete Sejarah Perusahaans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$sejarah_perusahaan = $this->model_sejarah_perusahaan->find($id);

		
		
		return $this->model_sejarah_perusahaan->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('sejarah_perusahaan_export');

		$this->model_sejarah_perusahaan->export(
			'sejarah_perusahaan', 
			'sejarah_perusahaan',
			$this->model_sejarah_perusahaan->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('sejarah_perusahaan_export');

		$this->model_sejarah_perusahaan->pdf('sejarah_perusahaan', 'sejarah_perusahaan');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('sejarah_perusahaan_export');

		$table = $title = 'sejarah_perusahaan';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_sejarah_perusahaan->find($id);
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


/* End of file sejarah_perusahaan.php */
/* Location: ./application/controllers/administrator/Sejarah Perusahaan.php */