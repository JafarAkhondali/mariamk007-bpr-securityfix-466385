<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Simulasi Kredit Controller
 *| --------------------------------------------------------------------------
 *| Simulasi Kredit site
 *|
 */
class Simulasi_kredit extends Admin
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_simulasi_kredit');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	 * show all Simulasi Kredits
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{
		$this->is_allowed('simulasi_kredit_list');

		$filter = $this->input->get('q');
		$field = $this->input->get('f');

		$this->data['simulasi_kredits'] = $this->model_simulasi_kredit->get($filter, $field, $this->limit_page, $offset);
		$this->data['simulasi_kredit_counts'] = $this->model_simulasi_kredit->count_all($filter, $field);

		$config = [
			'base_url' => 'administrator/simulasi_kredit/index/',
			'total_rows' => $this->data['simulasi_kredit_counts'],
			'per_page' => $this->limit_page,
			'uri_segment' => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Simulasi Kredit List');
		$this->render('backend/standart/administrator/simulasi_kredit/simulasi_kredit_list', $this->data);
	}

	/**
	 * Add new simulasi_kredits
	 *
	 */
	public function add()
	{
		$this->is_allowed('simulasi_kredit_add');

		$this->template->title('Simulasi Kredit New');
		$this->render('backend/standart/administrator/simulasi_kredit/simulasi_kredit_add', $this->data);
	}

	public function add_import()
	{
		$this->is_allowed('simulasi_kredit_add');

		$this->template->title('Simulasi Kredit New');
		$this->render('backend/standart/administrator/simulasi_kredit/simulasi_kredit_import', $this->data);
	}

	/**
	 * Add New Simulasi Kredits
	 *
	 * @return JSON
	 */
	public function add_save()
	{
		if (!$this->is_allowed('simulasi_kredit_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}



		$this->form_validation->set_rules('plafond', 'Plafond', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('jangkawaktu_12', 'Jangkawaktu 12', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('jangkawaktu_18', 'Jangkawaktu 18', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('jangkawaktu_24', 'Jangkawaktu 24', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('jangkawaktu_30', 'Jangkawaktu 30', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('jangkawaktu_36', 'Jangkawaktu 36', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('jangkawaktu_48', 'Jangkawaktu 48', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('jangkawaktu_60', 'Jangkawaktu 60', 'trim|required|max_length[100]');




		if ($this->form_validation->run()) {

			$save_data = [
				'plafond' => $this->input->post('plafond'),
				'jangkawaktu_12' => $this->input->post('jangkawaktu_12'),
				'jangkawaktu_18' => $this->input->post('jangkawaktu_18'),
				'jangkawaktu_24' => $this->input->post('jangkawaktu_24'),
				'jangkawaktu_30' => $this->input->post('jangkawaktu_30'),
				'jangkawaktu_36' => $this->input->post('jangkawaktu_36'),
				'jangkawaktu_48' => $this->input->post('jangkawaktu_48'),
				'jangkawaktu_60' => $this->input->post('jangkawaktu_60'),
			];








			$save_simulasi_kredit = $id = $this->model_simulasi_kredit->store($save_data);


			if ($save_simulasi_kredit) {




				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] = $save_simulasi_kredit;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/simulasi_kredit/edit/' . $save_simulasi_kredit, 'Edit Simulasi Kredit'),
						anchor('administrator/simulasi_kredit', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
							anchor('administrator/simulasi_kredit/edit/' . $save_simulasi_kredit, 'Edit Simulasi Kredit')
						]),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/simulasi_kredit');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/simulasi_kredit');
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
	 * Update view Simulasi Kredits
	 *
	 * @var $id String
	 */
	public function edit($id)
	{
		$this->is_allowed('simulasi_kredit_update');

		$this->data['simulasi_kredit'] = $this->model_simulasi_kredit->find($id);

		$this->template->title('Simulasi Kredit Update');
		$this->render('backend/standart/administrator/simulasi_kredit/simulasi_kredit_update', $this->data);
	}

	/**
	 * Update Simulasi Kredits
	 *
	 * @var $id String
	 */
	public function edit_save($id)
	{
		if (!$this->is_allowed('simulasi_kredit_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}
		$this->form_validation->set_rules('plafond', 'Plafond', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('jangkawaktu_12', 'Jangkawaktu 12', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('jangkawaktu_18', 'Jangkawaktu 18', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('jangkawaktu_24', 'Jangkawaktu 24', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('jangkawaktu_30', 'Jangkawaktu 30', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('jangkawaktu_36', 'Jangkawaktu 36', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('jangkawaktu_48', 'Jangkawaktu 48', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('jangkawaktu_60', 'Jangkawaktu 60', 'trim|required|max_length[100]');



		if ($this->form_validation->run()) {

			$save_data = [
				'plafond' => $this->input->post('plafond'),
				'jangkawaktu_12' => $this->input->post('jangkawaktu_12'),
				'jangkawaktu_18' => $this->input->post('jangkawaktu_18'),
				'jangkawaktu_24' => $this->input->post('jangkawaktu_24'),
				'jangkawaktu_30' => $this->input->post('jangkawaktu_30'),
				'jangkawaktu_36' => $this->input->post('jangkawaktu_36'),
				'jangkawaktu_48' => $this->input->post('jangkawaktu_48'),
				'jangkawaktu_60' => $this->input->post('jangkawaktu_60'),
			];








			$save_simulasi_kredit = $this->model_simulasi_kredit->change($id, $save_data);

			if ($save_simulasi_kredit) {





				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/simulasi_kredit', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
						]),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/simulasi_kredit');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/simulasi_kredit');
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
	 * delete Simulasi Kredits
	 *
	 * @var $id String
	 */
	public function delete($id = null)
	{
		$this->is_allowed('simulasi_kredit_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) > 0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
			set_message(cclang('has_been_deleted', 'simulasi_kredit'), 'success');
		} else {
			set_message(cclang('error_delete', 'simulasi_kredit'), 'error');
		}

		redirect_back();
	}

	/**
	 * View view Simulasi Kredits
	 *
	 * @var $id String
	 */
	public function view($id)
	{
		$this->is_allowed('simulasi_kredit_view');

		$this->data['simulasi_kredit'] = $this->model_simulasi_kredit->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Simulasi Kredit Detail');
		$this->render('backend/standart/administrator/simulasi_kredit/simulasi_kredit_view', $this->data);
	}

	/**
	 * delete Simulasi Kredits
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$simulasi_kredit = $this->model_simulasi_kredit->find($id);



		return $this->model_simulasi_kredit->remove($id);
	}


	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('simulasi_kredit_export');

		$this->model_simulasi_kredit->export(
			'simulasi_kredit',
			'simulasi_kredit',
			$this->model_simulasi_kredit->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('simulasi_kredit_export');

		$this->model_simulasi_kredit->pdf('simulasi_kredit', 'simulasi_kredit');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('simulasi_kredit_export');

		$table = $title = 'simulasi_kredit';
		$this->load->library('HtmlPdf');

		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight');

		$result = $this->db->get($table);

		$data = $this->model_simulasi_kredit->find($id);
		$fields = $result->list_fields();

		$content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
			'data' => $data,
			'fields' => $fields,
			'title' => $title
		], TRUE);

		$this->pdf->initialize($config);
		$this->pdf->pdf->SetDisplayMode('fullpage');
		$this->pdf->writeHTML($content);
		$this->pdf->Output($table . '.pdf', 'H');
	}

}


/* End of file simulasi_kredit.php */
/* Location: ./application/controllers/administrator/Simulasi Kredit.php */