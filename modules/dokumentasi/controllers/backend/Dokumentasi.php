<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Dokumentasi Controller
*| --------------------------------------------------------------------------
*| Dokumentasi site
*|
*/
class Dokumentasi extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_dokumentasi');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Dokumentasis
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('dokumentasi_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['dokumentasis'] = $this->model_dokumentasi->get($filter, $field, $this->limit_page, $offset);
		$this->data['dokumentasi_counts'] = $this->model_dokumentasi->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/dokumentasi/index/',
			'total_rows'   => $this->data['dokumentasi_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Dokumentasi List');
		$this->render('backend/standart/administrator/dokumentasi/dokumentasi_list', $this->data);
	}
	
	/**
	* Add new dokumentasis
	*
	*/
	public function add()
	{
		$this->is_allowed('dokumentasi_add');

		$this->template->title('Dokumentasi New');
		$this->render('backend/standart/administrator/dokumentasi/dokumentasi_add', $this->data);
	}

	/**
	* Add New Dokumentasis
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('dokumentasi_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('dokumentasi_photo_name', 'Photo', 'trim|required');
		

		

		if ($this->form_validation->run()) {
			$dokumentasi_photo_uuid = $this->input->post('dokumentasi_photo_uuid');
			$dokumentasi_photo_name = $this->input->post('dokumentasi_photo_name');
		
			$save_data = [
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/dokumentasi/')) {
				mkdir(FCPATH . '/uploads/dokumentasi/');
			}

			if (!empty($dokumentasi_photo_name)) {
				$dokumentasi_photo_name_copy = date('YmdHis') . '-' . $dokumentasi_photo_name;

				rename(FCPATH . 'uploads/tmp/' . $dokumentasi_photo_uuid . '/' . $dokumentasi_photo_name, 
						FCPATH . 'uploads/dokumentasi/' . $dokumentasi_photo_name_copy);

				if (!is_file(FCPATH . '/uploads/dokumentasi/' . $dokumentasi_photo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo'] = $dokumentasi_photo_name_copy;
			}
		
			
			$save_dokumentasi = $id = $this->model_dokumentasi->store($save_data);
            

			if ($save_dokumentasi) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_dokumentasi;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/dokumentasi/edit/' . $save_dokumentasi, 'Edit Dokumentasi'),
						anchor('administrator/dokumentasi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/dokumentasi/edit/' . $save_dokumentasi, 'Edit Dokumentasi')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/dokumentasi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/dokumentasi');
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
	* Update view Dokumentasis
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('dokumentasi_update');

		$this->data['dokumentasi'] = $this->model_dokumentasi->find($id);

		$this->template->title('Dokumentasi Update');
		$this->render('backend/standart/administrator/dokumentasi/dokumentasi_update', $this->data);
	}

	/**
	* Update Dokumentasis
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('dokumentasi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('dokumentasi_photo_name', 'Photo', 'trim|required');
		

		
		if ($this->form_validation->run()) {
			$dokumentasi_photo_uuid = $this->input->post('dokumentasi_photo_uuid');
			$dokumentasi_photo_name = $this->input->post('dokumentasi_photo_name');
		
			$save_data = [
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/dokumentasi/')) {
				mkdir(FCPATH . '/uploads/dokumentasi/');
			}

			if (!empty($dokumentasi_photo_uuid)) {
				$dokumentasi_photo_name_copy = date('YmdHis') . '-' . $dokumentasi_photo_name;

				rename(FCPATH . 'uploads/tmp/' . $dokumentasi_photo_uuid . '/' . $dokumentasi_photo_name, 
						FCPATH . 'uploads/dokumentasi/' . $dokumentasi_photo_name_copy);

				if (!is_file(FCPATH . '/uploads/dokumentasi/' . $dokumentasi_photo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo'] = $dokumentasi_photo_name_copy;
			}
		
			
			$save_dokumentasi = $this->model_dokumentasi->change($id, $save_data);

			if ($save_dokumentasi) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/dokumentasi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/dokumentasi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/dokumentasi');
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
	* delete Dokumentasis
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('dokumentasi_delete');

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
            set_message(cclang('has_been_deleted', 'dokumentasi'), 'success');
        } else {
            set_message(cclang('error_delete', 'dokumentasi'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Dokumentasis
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('dokumentasi_view');

		$this->data['dokumentasi'] = $this->model_dokumentasi->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Dokumentasi Detail');
		$this->render('backend/standart/administrator/dokumentasi/dokumentasi_view', $this->data);
	}
	
	/**
	* delete Dokumentasis
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$dokumentasi = $this->model_dokumentasi->find($id);

		if (!empty($dokumentasi->photo)) {
			$path = FCPATH . '/uploads/dokumentasi/' . $dokumentasi->photo;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_dokumentasi->remove($id);
	}
	
	/**
	* Upload Image Dokumentasi	* 
	* @return JSON
	*/
	public function upload_photo_file()
	{
		if (!$this->is_allowed('dokumentasi_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'dokumentasi',
		]);
	}

	/**
	* Delete Image Dokumentasi	* 
	* @return JSON
	*/
	public function delete_photo_file($uuid)
	{
		if (!$this->is_allowed('dokumentasi_delete', false)) {
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
            'table_name'        => 'dokumentasi',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/dokumentasi/'
        ]);
	}

	/**
	* Get Image Dokumentasi	* 
	* @return JSON
	*/
	public function get_photo_file($id)
	{
		if (!$this->is_allowed('dokumentasi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$dokumentasi = $this->model_dokumentasi->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'photo', 
            'table_name'        => 'dokumentasi',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/dokumentasi/',
            'delete_endpoint'   => 'administrator/dokumentasi/delete_photo_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('dokumentasi_export');

		$this->model_dokumentasi->export(
			'dokumentasi', 
			'dokumentasi',
			$this->model_dokumentasi->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('dokumentasi_export');

		$this->model_dokumentasi->pdf('dokumentasi', 'dokumentasi');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('dokumentasi_export');

		$table = $title = 'dokumentasi';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_dokumentasi->find($id);
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


/* End of file dokumentasi.php */
/* Location: ./application/controllers/administrator/Dokumentasi.php */