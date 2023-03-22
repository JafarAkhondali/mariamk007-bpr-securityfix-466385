<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Faq Controller
*| --------------------------------------------------------------------------
*| Faq site
*|
*/
class Faq extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_faq');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Faqs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('faq_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['faqs'] = $this->model_faq->get($filter, $field, $this->limit_page, $offset);
		$this->data['faq_counts'] = $this->model_faq->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/faq/index/',
			'total_rows'   => $this->data['faq_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Faq List');
		$this->render('backend/standart/administrator/faq/faq_list', $this->data);
	}
	
	/**
	* Add new faqs
	*
	*/
	public function add()
	{
		$this->is_allowed('faq_add');

		$this->template->title('Faq New');
		$this->render('backend/standart/administrator/faq/faq_add', $this->data);
	}

	/**
	* Add New Faqs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('faq_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required');
		

		$this->form_validation->set_rules('jawaban', 'Jawaban', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'pertanyaan' => $this->input->post('pertanyaan'),
				'jawaban' => $this->input->post('jawaban'),
			];

			
			



			
			
			$save_faq = $id = $this->model_faq->store($save_data);
            

			if ($save_faq) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_faq;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/faq/edit/' . $save_faq, 'Edit Faq'),
						anchor('administrator/faq', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/faq/edit/' . $save_faq, 'Edit Faq')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/faq');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/faq');
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
	* Update view Faqs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('faq_update');

		$this->data['faq'] = $this->model_faq->find($id);

		$this->template->title('Faq Update');
		$this->render('backend/standart/administrator/faq/faq_update', $this->data);
	}

	/**
	* Update Faqs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('faq_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required');
		

		$this->form_validation->set_rules('jawaban', 'Jawaban', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'pertanyaan' => $this->input->post('pertanyaan'),
				'jawaban' => $this->input->post('jawaban'),
			];

			

			


			
			
			$save_faq = $this->model_faq->change($id, $save_data);

			if ($save_faq) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/faq', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/faq');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/faq');
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
	* delete Faqs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('faq_delete');

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
            set_message(cclang('has_been_deleted', 'faq'), 'success');
        } else {
            set_message(cclang('error_delete', 'faq'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Faqs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('faq_view');

		$this->data['faq'] = $this->model_faq->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Faq Detail');
		$this->render('backend/standart/administrator/faq/faq_view', $this->data);
	}
	
	/**
	* delete Faqs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$faq = $this->model_faq->find($id);

		
		
		return $this->model_faq->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('faq_export');

		$this->model_faq->export(
			'faq', 
			'faq',
			$this->model_faq->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('faq_export');

		$this->model_faq->pdf('faq', 'faq');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('faq_export');

		$table = $title = 'faq';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_faq->find($id);
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


/* End of file faq.php */
/* Location: ./application/controllers/administrator/Faq.php */