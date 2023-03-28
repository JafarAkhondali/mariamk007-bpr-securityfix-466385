<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Visi Misi Perusahaan Controller
*| --------------------------------------------------------------------------
*| Visi Misi Perusahaan site
*|
*/
class Visi_misi extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_visi_misi');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Visi Misi Perusahaans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		// $this->is_allowed('visi_misi_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['visi_misis'] = $this->model_visi_misi->get($filter, $field, $this->limit_page, $offset);
		$this->data['visi_misi_counts'] = $this->model_visi_misi->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/visi_misi/index/',
			'total_rows'   => $this->data['visi_misi_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Visi Misi Perusahaan List');
		$this->render('backend/standart/administrator/visi_misi/visi_misi_list', $this->data);
	}
	
	/**
	* Add new visi_misis
	*
	*/
	public function add()
	{
		$this->is_allowed('sejarah_perusahaan_add');

		$this->template->title('Visi Misi Perusahaan New');
		$this->render('backend/standart/administrator/visi_misi/visi_misi_add', $this->data);
	}

	/**
	* Add New Visi Misi Perusahaans
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
		
		

		$this->form_validation->set_rules('icon', 'Icon', 'trim|required');
		

		$this->form_validation->set_rules('title', 'Judul Visi Misi', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('deskripsi', 'Deskripsi Visi Misi', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'icon' => $this->input->post('icon'),
				'title' => $this->input->post('title'),
				'deskripsi' => $this->input->post('deskripsi'),
			];

			
			



			
			
			$save_visi_misi = $id = $this->model_visi_misi->store($save_data);
            

			if ($save_visi_misi) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_visi_misi;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/visi_misi/edit/' . $save_visi_misi, 'Edit Visi Misi Perusahaan'),
						anchor('administrator/visi_misi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/visi_misi/edit/' . $save_visi_misi, 'Edit Visi Misi Perusahaan')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/visi_misi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/visi_misi');
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
	* Update view Visi Misi Perusahaans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('sejarah_perusahaan_update');

		$this->data['visi_misi'] = $this->model_visi_misi->find($id);

		$this->template->title('Visi Misi Perusahaan Update');
		$this->render('backend/standart/administrator/visi_misi/visi_misi_update', $this->data);
	}

	/**
	* Update Visi Misi Perusahaans 
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
				$this->form_validation->set_rules('icon', 'Icon', 'trim|required');
		

		$this->form_validation->set_rules('title', 'Judul Visi Misi', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'icon' => $this->input->post('icon'),
				'title' => $this->input->post('title'),
				'deskripsi' => $this->input->post('deskripsi'),
			];

			

			


			
			
			$save_visi_misi = $this->model_visi_misi->change($id, $save_data);

			if ($save_visi_misi) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/visi_misi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/visi_misi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/visi_misi');
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
	* delete Visi Misi Perusahaans
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
            set_message(cclang('has_been_deleted', 'visi_misi'), 'success');
        } else {
            set_message(cclang('error_delete', 'visi_misi'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Visi Misi Perusahaans
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('sejarah_perusahaan_view');

		$this->data['visi_misi'] = $this->model_visi_misi->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Visi Misi Perusahaan Detail');
		$this->render('backend/standart/administrator/visi_misi/visi_misi_view', $this->data);
	}
	
	/**
	* delete Visi Misi Perusahaans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$visi_misi = $this->model_visi_misi->find($id);

		
		
		return $this->model_visi_misi->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('visi_misi_export');

		$this->model_visi_misi->export(
			'visi_misi', 
			'visi_misi',
			$this->model_visi_misi->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('visi_misi_export');

		$this->model_visi_misi->pdf('visi_misi', 'visi_misi');
	}

}


/* End of file visi_misi.php */
/* Location: ./application/controllers/administrator/Visi Misi Perusahaan.php */