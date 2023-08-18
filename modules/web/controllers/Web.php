<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *| --------------------------------------------------------------------------
 *| Web Controller
 *| --------------------------------------------------------------------------
 *| For default controller
 *|
 */
class Web extends Front
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk/model_produk');
        $this->load->model('kategori_produk/model_kategori_produk');
        $this->load->model('job_deskripsi_pekerjaan/model_job_deskripsi_pekerjaan');
        $this->load->model('sejarah_perusahaan/model_sejarah_perusahaan');
        $this->load->model('dokumentasi/model_dokumentasi');
        $this->load->model('artikel/model_artikel');
        $this->load->model('faq/model_faq');
        $this->load->model('kritik/model_kritik');
        $this->load->model('kredit/model_kredit');
        $this->load->model('slider/model_slider');
        $this->load->model('pegawai/model_pegawai');
        $this->load->model('user/model_user');
        $this->load->model('simulasi_kredit/model_simulasi_kredit');
        $this->load->model('visi_misi/model_visi_misi');
    }

    public function index()
    {
        if (installation_complete()) {
            $this->home();
        } else {
            redirect('wizzard/language', 'refresh');
        }
    }

    public function switch_lang($lang = 'english')
    {
        $this->load->helper(['cookie']);

        set_cookie('language', $lang, (60 * 60 * 24) * 365);
        $this->lang->load('web', $lang);
        redirect_back();
    }

    public function check()
    {

        die(report_builder(1, 1));
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->load->view('report/report/blog_content_1', [], true));
        $mpdf->Output();
    }

    public function home()
    {
        if (defined('IS_DEMO')) {
            $this->template->build('home-demo');
        } else {
            $this->data['produks'] = $this->model_produk->get();
            $this->data['kredits'] = $this->model_kredit->get();
            $this->data['sliders'] = $this->model_slider->get();
            $this->template->build('home', $this->data);
        }
    }

    public function detail_blog($id)
    {
        $this->data['blogs'] = $this->model_artikel->get_by_id($id);
        $this->template->build('detail_blog', $this->data);
    }

    public function faq()
    {
        $this->data['faqs'] = $this->model_faq->get();
        $this->template->build('faq', $this->data);
    }

    public function kritik()
    {
        $this->data['kritiks'] = $this->model_kritik->get();
        $this->template->build('kritik', $this->data);
    }

    public function detail_produk($id)
    {
        $this->data['produks'] = $this->model_produk->get_by_kategori($id);
        $this->template->build('detail_produk', $this->data);
    }

    public function bayar_cash() 
    {
        $this->template->build('bayar_cash');
    }

    public function bayar_transfer()
    {
        $this->template->build('bayar_transfer');
    }

    public function bayar_va()
    {
        $this->template->build('bayar_va');
    }

    public function bayar_dompet_digital()
    {
        $this->template->build('bayar_dompet_digital');
    }

    public function detail_kredit($id)
    {
        $this->data['kredits'] = $this->model_kredit->get_by_id($id);
        $this->template->build('detail_kredit', $this->data);
    }

    public function simulasi_kredit()
    {
        $this->data['simulasi_kredits'] = $this->model_simulasi_kredit->get();
        $this->template->build('simulasi_kredit', $this->data);
    }

    public function detail_simulasi_kredit()
    {
        $this->template->build('detail_simulasi_kredit');
    }

    public function detail_kalkulator_kredit()
    {
        $this->template->build('detail_kalkulator_kredit');
    }

    public function getKredit($plafond)
    {
        $query = $this->db->query("SELECT * FROM `simulasi_kredit` WHERE simulasi_kredit.plafond =" . $plafond . "");
        $data = $query->result();
        return $this->response($data);
    }

    public function ajukan_kredit()
    {
        $this->data['simulasi_kredits'] = $this->model_simulasi_kredit->get();
        $this->template->build('form_kredit',$this->data);
        $this->form_validation->set_rules('nama_lengkap', 'Nama', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run()) {
            $session = array(
                "tahapan" => 1,
                "nama_lengkap" => $this->input->post('nama_lengkap'),
                "alamat" => $this->input->post('alamat'),
                "no_hp" => $this->input->post('no_hp'),
                "usia" => $this->input->post('usia'),
                "jangka_waktu" => $this->input->post('jangka_waktu'),
                "jumlah_pinjaman" => $this->input->post('jumlah_pinjaman'),
                "jumlah_angsuran" => $this->input->post('jumlah_angsuran'),
                "bunga" => $this->input->post('bunga'),
            );
            $this->session->set_userdata($session);
            redirect(base_url('web/ajukan_kredit2'));
        } else {
            $this->template->build('form_kredit');
        }

    }

    public function ajukan_kredit2()
    {
        $this->form_validation->set_rules('idkredit', 'Id Kredit', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run()) {
            $session = array(
                "tahapan" => 2,
                "idkredit" => $this->input->post('idkredit'),
            );
            $this->session->set_userdata($session);
            redirect(base_url('web/ajukan_kredit3'));
        } else {
            $this->template->build('form_kredit2');
        }
    }

    public function ajukan_kredit3()
    {
        $this->form_validation->set_rules('idkredit', 'ID Kredit', 'required');
        // $this->form_validation->set_rules('file_photo', 'Pas Foto', 'required|callback_validate_file');

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run()) {
            $session = array(
                "tahapan" => 3,
            );
            if (!empty($_FILES)) {
                $config['upload_path']          = getcwd() . '/uploads/pengajuan_kredit/';
                $config['allowed_types']        = '*';
                $config['encrypt_name']         = true;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->session->userdata('idkredit') == 1) {
                    if ($this->upload->do_upload('file_photo')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_photo'] = $filename;
                    } else {
                        $session['file_photo'] = "";
                    }
                    if ($this->upload->do_upload('file_ktp')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_ktp'] = $filename;
                    } else {
                        $session['file_ktp'] = "";
                    }
                    if ($this->upload->do_upload('file_kk')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_kk'] = $filename;
                    } else {
                        $session['file_kk'] = "";
                    }
                    if ($this->upload->do_upload('file_surat_nikah')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_surat_nikah'] = $filename;
                    } else {
                        $session['file_surat_nikah'] = "";
                    }
                    if ($this->upload->do_upload('jaminan')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['jaminan'] = $filename;
                    } else {
                        $session['jaminan'] = "";
                    }
                    if ($this->upload->do_upload('file_jaminan')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_jaminan'] = $filename;
                    } else {
                        $session['file_jaminan'] = "";
                    }
                }
                if ($this->session->userdata('idkredit') == 2) {
                    if ($this->upload->do_upload('file_photo')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_photo'] = $filename;
                    } else {
                        $session['file_photo'] = "";
                    }
                    if ($this->upload->do_upload('file_ktp')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_ktp'] = $filename;
                    } else {
                        $session['file_ktp'] = "";
                    }
                    if ($this->upload->do_upload('file_kk')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_kk'] = $filename;
                    } else {
                        $session['file_kk'] = "";
                    }
                    if ($this->upload->do_upload('file_surat_nikah')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_surat_nikah'] = $filename;
                    } else {
                        $session['file_surat_nikah'] = "";
                    }
                    if ($this->upload->do_upload('jaminan')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['jaminan'] = $filename;
                    } else {
                        $session['jaminan'] = "";
                    }
                    if ($this->upload->do_upload('file_jaminan')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_jaminan'] = $filename;
                    } else {
                        $session['file_jaminan'] = "";
                    }
                    if ($this->upload->do_upload('file_sku')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_sku'] = $filename;
                    } else {
                        $session['file_sku'] = "";
                    }
                    if ($this->upload->do_upload('file_skp')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_skp'] = $filename;
                    } else {
                        $session['file_skp'] = "";
                    }
                }
                if ($this->session->userdata('idkredit') == 3) {
                    if ($this->upload->do_upload('file_photo')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_photo'] = $filename;
                    } else {
                        $session['file_photo'] = "";
                    }
                    if ($this->upload->do_upload('file_ktp')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_ktp'] = $filename;
                    } else {
                        $session['file_ktp'] = "";
                    }
                    if ($this->upload->do_upload('file_kk')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_kk'] = $filename;
                    } else {
                        $session['file_kk'] = "";
                    }
                    if ($this->upload->do_upload('file_surat_nikah')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_surat_nikah'] = $filename;
                    } else {
                        $session['file_surat_nikah'] = "";
                    }
                    if ($this->upload->do_upload('jaminan')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['jaminan'] = $filename;
                    } else {
                        $session['jaminan'] = "";
                    }
                    if ($this->upload->do_upload('file_jaminan')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_jaminan'] = $filename;
                    } else {
                        $session['file_jaminan'] = "";
                    }
                    if ($this->upload->do_upload('file_buktipenghasilan')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_buktipenghasilan'] = $filename;
                    } else {
                        $session['file_buktipenghasilan'] = "";
                    }
                }
                if ($this->session->userdata('idkredit') == 4) {
                    if ($this->upload->do_upload('file_photo')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_photo'] = $filename;
                    } else {
                        $session['file_photo'] = "";
                    }
                    if ($this->upload->do_upload('file_ktp')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_ktp'] = $filename;
                    } else {
                        $session['file_ktp'] = "";
                    }
                    if ($this->upload->do_upload('file_kk')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_kk'] = $filename;
                    } else {
                        $session['file_kk'] = "";
                    }
                    if ($this->upload->do_upload('file_surat_nikah')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_surat_nikah'] = $filename;
                    } else {
                        $session['file_surat_nikah'] = "";
                    }
                    if ($this->upload->do_upload('jaminan')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['jaminan'] = $filename;
                    } else {
                        $session['jaminan'] = "";
                    }
                    if ($this->upload->do_upload('file_jaminan')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_jaminan'] = $filename;
                    } else {
                        $session['file_jaminan'] = "";
                    }
                    if ($this->upload->do_upload('file_buktipenghasilan')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_buktipenghasilan'] = $filename;
                    } else {
                        $session['file_buktipenghasilan'] = "";
                    }
                    if ($this->upload->do_upload('file_slipgaji')) {
                        $dataupload = array('upload_data' => $this->upload->data());
                        $filename = $dataupload['upload_data']['file_name'];
                        $session['file_slipgaji'] = $filename;
                    } else {
                        $session['file_slipgaji'] = "";
                    }
                }
            }
            $this->session->set_userdata($session);
            redirect(base_url('web/ajukan_kredit4'));
        } else {
            $this->template->build('form_kredit3');
        }
    }

    public function ajukan_kredit4()
    {

        $this->form_validation->set_rules('idkredit', 'Id Kredit', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $kredit = $this->db->where('id', $this->session->userdata('idkredit'))->get('kredit')->row();
        $jenis_pinjaman = $kredit->nama_kredit;
        if ($this->form_validation->run()) {
            $simpan = array(
                "nama_lengkap" => $this->session->userdata('nama_lengkap'),
                "alamat" => $this->session->userdata('alamat'),
                "no_hp" => $this->session->userdata('no_hp'),
                "usia" => $this->session->userdata('usia'),
                "jangka_waktu" => $this->session->userdata('jangka_waktu'),
                "jumlah_pinjaman" => $this->session->userdata('jumlah_pinjaman'),
                'jumlah_angsuran' => $this->session->userdata('jumlah_angsuran'),
				'bunga' => $this->session->userdata('bunga'),
                "jenis_pinjaman" => $jenis_pinjaman,
                "file_ktp" => $this->session->userdata('file_ktp'),
                "file_sku" => $this->session->userdata('file_sku'),
                "file_skp" => $this->session->userdata('file_skp'),
                "file_photo" => $this->session->userdata('file_photo'),
                "file_ktp_istri" => $this->session->userdata('file_ktp_istri'),
                "file_kk" => $this->session->userdata('file_kk'),
                "file_surat_nikah" => $this->session->userdata('file_surat_nikah'),
                "jaminan" => $this->session->userdata('jaminan'),
                "file_jaminan" => $this->session->userdata('file_jaminan'),
                "file_rekening_listrik" => $this->session->userdata('file_rekening_listrik'),
                "file_pbb_stnk" => $this->session->userdata('file_pbb_stnk'),
                "file_laporankeuangan" => $this->session->userdata('file_laporankeuangan'),
                "file_buktipenghasilan" => $this->session->userdata('file_buktipenghasilan'),
                "file_slipgaji" => $this->session->userdata('file_slipgaji'),
                'username' => $this->session->userdata('username'),
                'updated_at' => null,
                'status' => 'menunggu',
            );
            if (!empty($_FILES)) {
                $config['upload_path']          = getcwd() . '/uploads/pengajuan_kredit/';
                $config['allowed_types']        = '*';
                // $config['allowed_types']        = '*';
                $config['encrypt_name']         = true;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_rekening_listrik')) {
                    $dataupload = array('upload_data' => $this->upload->data());
                    $filename = $dataupload['upload_data']['file_name'];
                    $simpan['file_rekening_listrik'] = $filename;
                }
                if ($this->upload->do_upload('file_pbb_stnk')) {
                    $dataupload = array('upload_data' => $this->upload->data());
                    $filename = $dataupload['upload_data']['file_name'];
                    $simpan['file_pbb_stnk'] = $filename;
                }
                if ($this->upload->do_upload('file_laporankeuangan')) {
                    $dataupload = array('upload_data' => $this->upload->data());
                    $filename = $dataupload['upload_data']['file_name'];
                    $simpan['file_laporankeuangan'] = $filename;
                }
            }
            $id = $this->db->insert('pengajuan_kredit', $simpan);
            $idkredit = $this->db->insert_id($id);
            $username = $this->session->userdata('username');
            $data = [
                'title' => 'Pengajuan baru ' . $jenis_pinjaman . ' atas nama : ' . $this->session->userdata('username'),
                'content' => '-',
                'url' => $idkredit,
                'read' => 0,
                'username' => 'management',
				'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->insert('notification', $data);
            
            $this->session->set_flashdata('success', 'Pengajuan Kredit anda berhasil di simpan, mohon menunggu konfirmasi management');

            redirect(base_url('administrator/pengajuan_kredit/user'));
        } else {
            $this->template->build('form_kredit4');
        }
    }
    
    public function profil()
    {
        $this->data['pegawais'] = $this->model_pegawai->get_by_featured();
        $this->data['pekerjaans'] = $this->model_job_deskripsi_pekerjaan->get();
        $this->data['sejarahs'] = $this->model_sejarah_perusahaan->get();
        $this->data['visi_misis'] = $this->model_visi_misi->get();
        $this->template->build('profil', $this->data);
    }

    public function produk()
    {
        $this->data['produks'] = $this->model_produk->get();
        $this->data['kredits'] = $this->model_kredit->get();
        $this->template->build('produk', $this->data);
    }

    public function set_notification_status_as_read($username)
    {
        $this->model_user->set_notification_status_as_readss($username);
    }
    public function set_notification_status_as_read_admin()
    {
        $this->model_user->set_notification_status_as_readss_admin();
    }

    public function dokumentasi()
    {
        $this->data['dokumentasis'] = $this->model_dokumentasi->get();
        $this->template->build('dokumentasi', $this->data);
    }

    public function set_full_group_sql()
    {
        $this->db->query(" 
            set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
         ");

        $this->db->query(" 
            set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
         ");
    }

    public function migrate($version = null)
    {
        $this->load->library('migration');

        if ($version) {
            if ($this->migration->version($version) === FALSE) {
                show_error($this->migration->error_string());
            }
        } else {
            if ($this->migration->latest() === FALSE) {
                show_error($this->migration->error_string());
            }
        }
    }

    public function migrate_cicool()
    {
        $this->load->helper('file');
        $this->load->helper('directory');

        $files = (directory_map('application/controllers/administrator'));

        foreach ($files as $file) {
            $f_name = str_replace('.php', '', $file);
            $f_name_lower = strtolower(str_replace('.php', '', $file));

            if ($file == 'index.html') {
                continue;
            }
            if ($f_name_lower != 'web') {

                mkdir('modules/' . $f_name);
                mkdir('modules/' . $f_name . '/models');
                mkdir('modules/' . $f_name . '/views');
                mkdir('modules/' . $f_name . '/controllers');
                mkdir('modules/' . $f_name . '/controllers/backend');
                mkdir('modules/' . $f_name . '/views/backend');
                mkdir('modules/' . $f_name . '/views/backend/standart');
                mkdir('modules/' . $f_name . '/views/backend/standart/administrator');
                copy(FCPATH . '/application/models/Model_' . $f_name_lower . '.php', 'modules/' . $f_name_lower . '/models/Model_' . $f_name_lower . '.php');
                copy(FCPATH . '/application/controllers/administrator/' . $f_name . '.php', 'modules/' . $f_name . '/controllers/backend/' . $f_name . '.php');
                if (is_dir(FCPATH . '/application/views/backend/standart/administrator/' . $f_name_lower)) {

                    $this->recurse_copy(FCPATH . '/application/views/backend/standart/administrator/' . $f_name_lower, 'modules/' . $f_name . '/views/backend/standart/administrator/' . $f_name_lower);
                }
                //unlink('modules/'.$f_name_lower.'/models'.$f_name_lower.'.php' );
            }
        }
    }
    public function migrate_cicool_front()
    {
        $this->load->helper('file');
        $this->load->helper('directory');

        $files = (directory_map('application/controllers'));

        foreach ($files as $file) {
            $f_name = str_replace('.php', '', $file);
            $f_name_lower = strtolower(str_replace('.php', '', $file));

            if ($file == 'index.html') {
                continue;
            }
            if ($f_name_lower != 'web') {

                mkdir('modules/' . $f_name);
                mkdir('modules/' . $f_name . '/models');
                mkdir('modules/' . $f_name . '/views');
                mkdir('modules/' . $f_name . '/controllers');
                mkdir('modules/' . $f_name . '/controllers');
                mkdir('modules/' . $f_name . '/views/backend');
                mkdir('modules/' . $f_name . '/views/backend/standart');
                mkdir('modules/' . $f_name . '/views/backend/standart/administrator');
                copy(FCPATH . '/application/models/Model_' . $f_name_lower . '.php', 'modules/' . $f_name_lower . '/models/Model_' . $f_name_lower . '.php');
                copy(FCPATH . '/application/controllers/' . $f_name . '.php', 'modules/' . $f_name . '/controllers/' . $f_name . '.php');
                if (is_dir(FCPATH . '/application/views/backend/standart/administrator/' . $f_name_lower)) {

                    $this->recurse_copy(FCPATH . '/application/views/backend/standart/administrator/' . $f_name_lower, 'modules/' . $f_name . '/views/backend/standart/administrator/' . $f_name_lower);
                }
                //unlink('modules/'.$f_name_lower.'/models'.$f_name_lower.'.php' );
            }
        }
    }

    public function recurse_copy($src, $dst)
    {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    function image($mime_type_or_return = 'image/png')
    {
        $file_path = $this->input->get('path');
        $this->helper('file');

        $image_content = read_file($file_path);

        // Image was not found
        if ($image_content === FALSE) {
            show_error('Image "' . $file_path . '" could not be found.');
            return FALSE;
        }

        // Return the image or output it?
        if ($mime_type_or_return === TRUE) {
            return $image_content;
        }

        header('Content-Length: ' . strlen($image_content)); // sends filesize header
        header('Content-Type: ' . $mime_type_or_return); // send mime-type header
        header('Content-Disposition: inline; filename="' . basename($file_path) . '";'); // sends filename header
        exit($image_content); // reads and outputs the file onto the output buffer
    }

    public function create_user()
    {
        for ($i = 0; $i < 30; $i++) {
            $this->aauth->create_user('user' . $i . '@gmail.com', 'admin123', 'user' . $i);
        }
    }

    public function check_qry()
    {
        $this->db->where('id', 1);
        $this->db->query('
        
        SELECT *, 
        count(category_id) y_axis,
        category_name as x_axis
        FROM blog_category
        GROUP BY category_name
        ');
        echo $this->db->last_query();
    }

    public function mailer($limit = 5)
    {
        $this->load->model('mailer/model_mailer');

        $mails = $this->db
            ->select('mailer.*, email.message, email.title')
            ->limit($limit)
            ->join('email', 'email.id = mailer.email_id', 'left')
            ->where('status != "sent    "')
            ->get('mailer')
            ->result();

        $this->load->library('email');

        $this->config_vars = $this->config->item('aauth');

        foreach ($mails as $email) {
            $user = $this->db->get_where('aauth_users', ['email' => $email->mail_to])->row();
            $this->email->from($this->config_vars['email'], $this->config_vars['name']);
            $this->email->to($email->mail_to);
            $title = str_replace(['{username}', '{fullname}', '{email}'], [
                $user->username, $user->full_name, $user->email
            ], $email->title);

            $this->email->subject($title);

            $message = str_replace(['{username}', '{fullname}', '{email}'], [
                $user->username, $user->full_name, $user->email
            ], $email->message);



            $this->email->message($message);
            $result = $this->email->send();

            $status = 'failed';

            if ($result) {
                $status = 'sent';
            }

            $this->model_mailer->change($email->id, ['status' => $status]);
            echo 'email ' . $status . ' ' . $email->mail_to;

            sleep(5);
        }
    }
}


/* End of file Web.php */
/* Location: ./application/controllers/Web.php */