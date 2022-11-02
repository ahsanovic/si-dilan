<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penanganan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('penanganan_model');
    }
   
    public function index() 
    {
        $data['title'] = 'Penanganan Jalan';
        $data['years'] = $this->penanganan_model->get_years();
        $this->load->view('dist/_partials/header', $data);
        $this->load->view('dist/_partials/navbar');
        $this->load->view('penanganan/index');
        $this->load->view('dist/_partials/footer');
    }

    public function detail($id) 
    {
        $data['title'] = 'Penanganan Jalan';
        $data['data'] = $this->penanganan_model->get_by_id($id);
        $this->load->view('dist/_partials/header', $data);
        $this->load->view('dist/_partials/navbar');
        $this->load->view('penanganan/detail', $data);
        $this->load->view('dist/_partials/footer');
    }

    public function get_list()
    {
        $list = $this->penanganan_model->get_datatables();
        $data = [];
        $no = $_POST['start'];
        foreach ($list as $value) {
            $no++;
            $row = [];
            $row[] = '<center>' . $no . '</center>';
            $row[] = bulan($value->bulan);
            $row[] = $value->jenis_pengadaan;
            $row[] = $value->nama_paket;
            $row[] = $value->penyedia_jasa;
            $row[] = $value->nilai_kontrak;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-info" href="' . base_url('penanganan/edit/') . $value->id . '" title="Edit"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus(' . "'" . $value->id . "'" . ')"><i class="fas fa-trash-alt"></i></a>
                    <a class="btn btn-sm btn-warning" href="' . base_url('penanganan/detail/') . $value->id . '" title="Detail"><i class="fas fa-eye"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->penanganan_model->count_all(),
            "recordsFiltered" => $this->penanganan_model->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    private function _validate()
    {
        $data = [];
        $data['inputerror'] = [];
        $data['error_string'] = [];
        $data['status'] = TRUE;

        if ($this->input->post('tahun') == '') {
            $data['inputerror'][] = 'tahun';
            $data['error_string'][] = 'tahun harus diisi';
            $data['status'] = FALSE;
        }

        if ($this->input->post('bulan') == '') {
            $data['inputerror'][] = 'bulan';
            $data['error_string'][] = 'bulan harus diisi';
            $data['status'] = FALSE;
        }

        if ($this->input->post('jenis_pengadaan') == '') {
            $data['inputerror'][] = 'jenis_pengadaan';
            $data['error_string'][] = 'jenis pengadaan harus diisi';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nama_paket') == '') {
            $data['inputerror'][] = 'nama_paket';
            $data['error_string'][] = 'nama paket harus diisi';
            $data['status'] = FALSE;
        }

        if ($this->input->post('penyedia_jasa') == '') {
            $data['inputerror'][] = 'penyedia_jasa';
            $data['error_string'][] = 'penyedia jasa harus diisi';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nilai_kontrak') == '') {
            $data['inputerror'][] = 'nilai_kontrak';
            $data['error_string'][] = 'nilai kontrak harus diisi';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            $data['success'] = true;
            echo json_encode($data);
            exit();
        }
    }

    private function _check_duplicate()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $jenis_pengadaan = $this->input->post('jenis_pengadaan');
        $data = $this->penanganan_model->check_duplicate($tahun, $bulan, $jenis_pengadaan);
        if ($data) {
            echo json_encode([
                'duplicate' => true,
                'msg' => 'data yang dimasukkan sudah ada!'
            ]);
            exit;
        }
    }

    public function create()
    {
        $data['title'] = 'Penanganan Jalan';
        $this->load->view('dist/_partials/header', $data);
        $this->load->view('dist/_partials/navbar');
        $this->load->view('penanganan/create');
        $this->load->view('dist/_partials/footer');
    }

    private function _upload($name)
    {
        $config['upload_path'] = './public/' . $name;
        $config['allowed_types'] = 'jpg|jpeg|pdf';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = true;

        // load library upload
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($name)) {
            $data['success'] = false;
            $data['msg'] = $this->upload->display_errors();
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    public function store()
    {
        cek_ajax();
        cek_csrf_ajax();
        $this->_validate();
        $this->_check_duplicate();

        $data = [
            'tahun' => $this->input->post('tahun'),
            'bulan' => $this->input->post('bulan'),
            'jenis_pengadaan' => $this->input->post('jenis_pengadaan'),
            'nama_paket' => $this->input->post('nama_paket'),
            'penyedia_jasa' => $this->input->post('penyedia_jasa'),
            'nilai_kontrak' => $this->input->post('nilai_kontrak'),
            'hasil_survey' => !empty($_FILES['hasil_survey']['name']) ? $this->_upload('hasil_survey') : null,
            'gambar_perencanaan' => !empty($_FILES['gambar_perencanaan']['name']) ? $this->_upload('gambar_perencanaan') : null,
            'kak' => !empty($_FILES['kak']['name']) ? $this->_upload('kak') : null,
            'hps_oe' => !empty($_FILES['hps_oe']['name']) ? $this->_upload('hps_oe') : null,
            'berita_hasil' => !empty($_FILES['berita_hasil']['name']) ? $this->_upload('berita_hasil') : null,
            'shop_drawing' => !empty($_FILES['shop_drawing']['name']) ? $this->_upload('shop_drawing') : null,
            'as_built_drawing' => !empty($_FILES['as_built_drawing']['name']) ? $this->_upload('as_built_drawing') : null,
            'backup_volume' => !empty($_FILES['backup_volume']['name']) ? $this->_upload('backup_volume') : null,
            'dokumentasi' => !empty($_FILES['dokumentasi']['name']) ? $this->_upload('dokumentasi') : null,
            'buku_harian' => !empty($_FILES['buku_harian']['name']) ? $this->_upload('buku_harian') : null,
            'bast' => !empty($_FILES['bast']['name']) ? $this->_upload('bast') : null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->penanganan_model->save($data);

        echo json_encode([
            'status' => true,
            'success' => true
        ]);
    }

    public function edit($id)
    {
        $data['title'] = 'Penanganan Jalan';
        $data['data'] = $this->penanganan_model->get_by_id($id);
        $this->load->view('dist/_partials/header', $data);
        $this->load->view('dist/_partials/navbar');
        $this->load->view('penanganan/update', $data);
        $this->load->view('dist/_partials/footer');
    }

    public function update()
    {
        cek_ajax();
        cek_csrf_ajax();
        $this->_validate();

        $file = $this->penanganan_model->get_by_id($this->input->post('id'));

        $data = [
            'tahun' => $this->input->post('tahun'),
            'bulan' => $this->input->post('bulan'),
            'jenis_pengadaan' => $this->input->post('jenis_pengadaan'),
            'nama_paket' => $this->input->post('nama_paket'),
            'penyedia_jasa' => $this->input->post('penyedia_jasa'),
            'nilai_kontrak' => $this->input->post('nilai_kontrak'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if (!empty($_FILES['hasil_survey']['name'])) {
            if (file_exists('public/hasil_survey/' . $file->hasil_survey) && $file->hasil_survey) {
                unlink('public/hasil_survey/' . $file->hasil_survey);
            }
            $data['hasil_survey'] = $this->_upload('hasil_survey');
        }
        if (!empty($_FILES['gambar_perencanaan']['name'])) {
            if (file_exists('public/gambar_perencanaan/' . $file->gambar_perencanaan) && $file->gambar_perencanaan) {
                unlink('public/gambar_perencanaan/' . $file->gambar_perencanaan);
            }
            $data['gambar_perencanaan'] = $this->_upload('gambar_perencanaan');
        }
        if (!empty($_FILES['kak']['name'])) {
            if (file_exists('public/kak/' . $file->kak) && $file->kak) {
                unlink('public/kak/' . $file->kak);
            }
            $data['kak'] = $this->_upload('kak');
        }
        if (!empty($_FILES['hps_oe']['name'])) {
            if (file_exists('public/hps_oe/' . $file->hps_oe) && $file->hps_oe) {
                unlink('public/hps_oe/' . $file->hps_oe);
            }
            $data['hps_oe'] = $this->_upload('hps_oe');
        }
        if (!empty($_FILES['berita_hasil']['name'])) {
            if (file_exists('public/berita_hasil/' . $file->berita_hasil) && $file->berita_hasil) {
                unlink('public/berita_hasil/' . $file->berita_hasil);
            }
            $data['berita_hasil'] = $this->_upload('berita_hasil');
        }
        if (!empty($_FILES['shop_drawing']['name'])) {
            if (file_exists('public/shop_drawing/' . $file->shop_drawing) && $file->shop_drawing) {
                unlink('public/shop_drawing/' . $file->shop_drawing);
            }
            $data['shop_drawing'] = $this->_upload('shop_drawing');
        }
        if (!empty($_FILES['as_built_drawing']['name'])) {
            if (file_exists('public/as_built_drawing/' . $file->as_built_drawing) && $file->as_built_drawing) {
                unlink('public/as_built_drawing/' . $file->as_built_drawing);
            }
            $data['as_built_drawing'] = $this->_upload('as_built_drawing');
        }
        if (!empty($_FILES['backup_volume']['name'])) {
            if (file_exists('public/backup_volume/' . $file->backup_volume) && $file->backup_volume) {
                unlink('public/backup_volume/' . $file->backup_volume);
            }
            $data['backup_volume'] = $this->_upload('backup_volume');
        }
        if (!empty($_FILES['dokumentasi']['name'])) {
            if (file_exists('public/dokumentasi/' . $file->dokumentasi) && $file->dokumentasi) {
                unlink('public/dokumentasi/' . $file->dokumentasi);
            }
            $data['dokumentasi'] = $this->_upload('dokumentasi');
        }
        if (!empty($_FILES['buku_harian']['name'])) {
            if (file_exists('public/buku_harian/' . $file->buku_harian) && $file->buku_harian) {
                unlink('public/buku_harian/' . $file->buku_harian);
            }
            $data['buku_harian'] = $this->_upload('buku_harian');
        }
        if (!empty($_FILES['bast']['name'])) {
            if (file_exists('public/bast/' . $file->bast) && $file->bast) {
                unlink('public/bast/' . $file->bast);
            }
            $data['bast'] = $this->_upload('bast');
        }

        $this->penanganan_model->update(['id' => $this->input->post('id')], $data);

        echo json_encode([
            'status' => true,
            'success' => true
        ]);
    }

    public function destroy($id)
    {
        cek_ajax();

        $file = $this->penanganan_model->get_by_id($id);

        if (file_exists('public/hasil_survey/' . $file->hasil_survey) && $file->hasil_survey) {
            unlink('public/hasil_survey/' . $file->hasil_survey);
        }
        if (file_exists('public/gambar_perencanaan/' . $file->gambar_perencanaan) && $file->gambar_perencanaan) {
            unlink('public/gambar_perencanaan/' . $file->gambar_perencanaan);
        }
        if (file_exists('public/kak/' . $file->kak) && $file->kak) {
            unlink('public/kak/' . $file->kak);
        }
        if (file_exists('public/hps_oe/' . $file->hps_oe) && $file->hps_oe) {
            unlink('public/hps_oe/' . $file->hps_oe);
        }
        if (file_exists('public/berita_hasil/' . $file->berita_hasil) && $file->berita_hasil) {
            unlink('public/berita_hasil/' . $file->berita_hasil);
        }
        if (file_exists('public/shop_drawing/' . $file->shop_drawing) && $file->shop_drawing) {
            unlink('public/shop_drawing/' . $file->shop_drawing);
        }
        if (file_exists('public/as_built_drawing/' . $file->as_built_drawing) && $file->as_built_drawing) {
            unlink('public/as_built_drawing/' . $file->as_built_drawing);
        }
        if (file_exists('public/backup_volume/' . $file->backup_volume) && $file->backup_volume) {
            unlink('public/backup_volume/' . $file->backup_volume);
        }
        if (file_exists('public/dokumentasi/' . $file->dokumentasi) && $file->dokumentasi) {
            unlink('public/dokumentasi/' . $file->dokumentasi);
        }
        if (file_exists('public/buku_harian/' . $file->buku_harian) && $file->buku_harian) {
            unlink('public/buku_harian/' . $file->buku_harian);
        }
        if (file_exists('public/bast/' . $file->bast) && $file->bast) {
            unlink('public/bast/' . $file->bast);
        }

        $this->penanganan_model->delete($id);
        echo json_encode(['status' => true]);
    }

}
