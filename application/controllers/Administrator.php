<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'formatbytesbites.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('Pdf');
        ob_start();
        $this->load->model('M_admin');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation','Routerosapi'));
        //cek jika user blm login maka redirect ke halaman login
        if ($this->session->userdata('username', 'nama') != true) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Maaf anda belum login !</div>');
            redirect('Auth');
        }
    }
    public function index()
    {
        $thn = date("Y");
        $data['pelanggan'] = $this->db->query("SELECT * FROM tb_registrasi where lokasi='TomTimNet'")->num_rows();
        $data['pakettt'] = $this->db->query("SELECT * FROM tb_paket")->num_rows();
        $data['Januari'] = $this->db->query("SELECT sum(a.tagihan) + sum(a.addon1) + sum(a.addon2) + sum(a.addon3) - sum(a.tagihan_diskon) as a,a.periode,a.thn,b.lokasi from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi=b.id_registrasi) where b.lokasi='TomTimNet' and periode='Januari' and thn='$thn' order by id_cetak asc")->result();
        $data['Februari'] = $this->db->query("SELECT sum(a.tagihan) + sum(a.addon1) + sum(a.addon2) + sum(a.addon3) - sum(a.tagihan_diskon) as b,a.periode,a.thn,b.lokasi from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi=b.id_registrasi) where b.lokasi='TomTimNet' and periode='Februari' and thn='$thn' order by id_cetak asc")->result();
        $data['Maret'] = $this->db->query("SELECT sum(a.tagihan) + sum(a.addon1) + sum(a.addon2) + sum(a.addon3) - sum(a.tagihan_diskon) as c,a.periode,a.thn,b.lokasi from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi=b.id_registrasi) where b.lokasi='TomTimNet' and periode='Maret' and thn='$thn' order by id_cetak asc")->result();
        $data['April'] = $this->db->query("SELECT sum(a.tagihan) + sum(a.addon1) + sum(a.addon2) + sum(a.addon3) - sum(a.tagihan_diskon) as d,a.periode,a.thn,b.lokasi from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi=b.id_registrasi) where b.lokasi='TomTimNet' and periode='April' and thn='$thn' order by id_cetak asc")->result();
        $data['Mei'] = $this->db->query("SELECT sum(a.tagihan) + sum(a.addon1) + sum(a.addon2) + sum(a.addon3) - sum(a.tagihan_diskon) as e,a.periode,a.thn,b.lokasi from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi=b.id_registrasi) where b.lokasi='TomTimNet' and periode='Mei' and thn='$thn' order by id_cetak asc")->result();
        $data['Juni'] = $this->db->query("SELECT sum(a.tagihan) + sum(a.addon1) + sum(a.addon2) + sum(a.addon3) - sum(a.tagihan_diskon) as f,a.periode,a.thn,b.lokasi from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi=b.id_registrasi) where b.lokasi='TomTimNet' and periode='Juni' and thn='$thn' order by id_cetak asc")->result();
        $data['Juli'] = $this->db->query("SELECT sum(a.tagihan) + sum(a.addon1) + sum(a.addon2) + sum(a.addon3) - sum(a.tagihan_diskon) as g,a.periode,a.thn,b.lokasi from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi=b.id_registrasi) where b.lokasi='TomTimNet' and periode='Juli' and thn='$thn' order by id_cetak asc")->result();
        $data['Agustus'] = $this->db->query("SELECT sum(a.tagihan) + sum(a.addon1) + sum(a.addon2) + sum(a.addon3) - sum(a.tagihan_diskon) as h,a.periode,a.thn,b.lokasi from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi=b.id_registrasi) where b.lokasi='TomTimNet' and periode='Agustus' and thn='$thn' order by id_cetak asc")->result();
        $data['September'] = $this->db->query("SELECT sum(a.tagihan) + sum(a.addon1) + sum(a.addon2) + sum(a.addon3) - sum(a.tagihan_diskon) as i,a.periode,a.thn,b.lokasi from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi=b.id_registrasi) where b.lokasi='TomTimNet' and periode='September' and thn='$thn' order by id_cetak asc")->result();
        $data['Oktober'] = $this->db->query("SELECT sum(a.tagihan) + sum(a.addon1) + sum(a.addon2) + sum(a.addon3) - sum(a.tagihan_diskon) as j,a.periode,a.thn,b.lokasi from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi=b.id_registrasi) where b.lokasi='TomTimNet' and periode='Oktober' and thn='$thn' order by id_cetak asc")->result();
        $data['November'] = $this->db->query("SELECT sum(a.tagihan) + sum(a.addon1) + sum(a.addon2) + sum(a.addon3) - sum(a.tagihan_diskon) as k,a.periode,a.thn,b.lokasi from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi=b.id_registrasi) where b.lokasi='TomTimNet' and periode='November' and thn='$thn' order by id_cetak asc")->result();
        $data['Desember'] = $this->db->query("SELECT sum(a.tagihan) + sum(a.addon1) + sum(a.addon2) + sum(a.addon3) - sum(a.tagihan_diskon) as l,a.periode,a.thn,b.lokasi from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi=b.id_registrasi) where b.lokasi='TomTimNet' and periode='Desember' and thn='$thn' order by id_cetak asc")->result();
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/head');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer', $data);
    }
    function update_blast(){
        $db = $this->db->query("SELECT * FROM tb_registrasi")->result();
        foreach ($db as $x) {
            $data = [
                "tanggal_blast" => date('Y-m-d')
            ];
            $this->db->where('id_registrasi',$x->id_registrasi);
            $this->db->update('tb_registrasi',$data);
            
        }
    }
    

    public function createUser()
    {
        if ($this->session->userdata('level') != 'admin') {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Maaf anda bukan admin !</div>');
            redirect('administrator/ListPaket');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['pakettt'] = $this->db->query("SELECT * FROM tb_paket")->num_rows();
            $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['pelanggan'] = $this->db->query("SELECT * FROM tb_registrasi")->num_rows();
            $data['get_user'] = $this->M_admin->get_user();
            $this->load->view('admin/head');
            $this->load->view('admin/createUser', $data);
            $this->load->view('admin/footer');
        } else {
            $nama = $this->input->post('nama');
            $username =	$this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->db->query("SELECT * FROM tb_user where username='$username' ")->num_rows();
            if ($user == true) {
                $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"></i> data user ' . $username . ' tidak boleh sama </div>');
                redirect('administrator/createUser');
            } else {
                $insert = [
                    'nama' => $nama,
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'level' => 'user'
                ];
                $this->db->insert('tb_user', $insert);
                $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"> berhasil menambahkan user ' . $nama . '! </div>');
                redirect('administrator/createUser');
            }
        }
    }
    public function jam()
    {
        date_default_timezone_set('Asia/Jakarta'); //Menyesuaikan waktu dengan tempat kita tinggal
        echo $timestamp = date('H:i:s'); //Menampilkan Jam Sekarang
    }
    public function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        // $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
    function getReport(){
        $postData = $this->input->post();
        $data = $this->M_admin->ListReport($postData);
        echo json_encode($data);
    }
    function getClient(){
        $postData = $this->input->post();
        $data = $this->M_admin->ListClient($postData);
        echo json_encode($data);
    }
    function getClient2(){
        $postData = $this->input->post();
        $data = $this->M_admin->ListClient2($postData);
        echo json_encode($data);
    }
    
    public function whatsapp()
    {
        $pesan = $this->input->post('pesan');
        $url = $this->input->post('url');
        $nomor = $this->input->post('nomor');
        $sender = "tommy";
        if ($pesan == true & $url == true & $nomor == true) {
                $ex = explode(',',$nomor);
                foreach ($ex as $x_nomor) {
                    sleep(2);
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'http://103.171.85.211:8000/send-media',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => 'sender='.$sender.'&number='.$x_nomor.'&file='.$url.'&caption='.$pesan.'',
                    ));
                    
                    $response = curl_exec($curl);
                }
                curl_close($curl);
                $o = json_decode($response);
                if (json_encode($o->status) == true) {
                    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"> Pesan Berhasil dikirim </div>');
                    redirect('administrator/whatsapp');
                }else{
                    $this->session->set_flashdata('massage', '<div class="alert alert-alert" role="alert"> Pesan gagal dikirim </div>');
                    redirect('administrator/whatsapp');
                }
            
        } 
        if($pesan == true & $nomor == true){
            $ex = explode(',',$nomor);
            foreach ($ex as $x_nomor) {
                sleep(2);
                $curl2 = curl_init();
                    curl_setopt_array($curl2, array(
                      CURLOPT_URL => 'http://103.171.85.211:8000/send-message',
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'POST',
                      CURLOPT_POSTFIELDS => 'sender='.$sender.'&number='.$x_nomor.'&message='.$pesan.'',
                    ));
                    
                    $response = curl_exec($curl2);
                }
                    curl_close($curl2);
                    $o = json_decode($response);
                    if (json_encode($o->status) == true){
                        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"></i> Pesan Berhasil dikirim </div>');
                        redirect('administrator/whatsapp');
                    }else{
                        $this->session->set_flashdata('massage', '<div class="alert alert-alert" role="alert"></i> Pesan gagal dikirim </div>');
                     redirect('administrator/whatsapp');
                    }
        }
        $data['pelanggan'] = $this->db->query("SELECT * FROM tb_registrasi")->num_rows();
        $data['pakettt'] = $this->db->query("SELECT * FROM tb_paket")->num_rows();
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
       
        $this->load->view('admin/head');
        $this->load->view('admin/wa', $data);
        $this->load->view('admin/footer', $data);
    }
    public function interface_view()
    {
        error_reporting(error_reporting() & ~E_NOTICE);

        $get_con = $this->db->query("SELECT * FROM tb_mikrotik")->row_array();
        if ($this->routerosapi->connect('103.122.32.114:8778', 'setro', '159753')) {
            //$data = $this->routerosapi->write('/interface/print');

            //$READ = $API->read(false). "<br>";
            $data = $this->routerosapi->comm("/interface/print");
            $num = count($data);
            //print_r($data);
            for ($b = 0; $b     < $num; $b++) {
                $interface = $data[$b]['name'];
                $getinterfaceTraffic = $this->routerosapi->comm("/interface/monitor-traffic", array("interface" => "$interface", "once" => "",));
                $nama = $getinterfaceTraffic[0]['name'];
                $tx = formatBites($getinterfaceTraffic[0]['tx-bits-per-second'], 1);
                $rx = formatBites($getinterfaceTraffic[0]['rx-bits-per-second'], 1);
                $total = formatBites($data[$b]['driver-tx-byte'], 1);

                echo '
            <tr>
              <td>
                      <span class="btn btn-primary" style="width:200px;"> <i class="fas fa-sitemap"></i> ' . $nama . '</span>
              </td>
              <td>
                      <span class="btn btn-primary" style="width:150px;"><i class="icon-arrow-up-circle"></i> ' . $tx . '</span>
              </td>
              <td>
                      <span class="btn btn-danger" style="width:150px;"><i class="icon-arrow-down-circle"></i> ' . $rx . '</span>
              </td>
              <td>
                      <span class="btn btn-danger" style="width:150px;"><i class="icon-arrow-down-circle"></i> ' . $total . '</span>
              </td>
             <tr>';
            }
        } else {
            echo "kosong";
        }
    }
    public function ChangeUser($id_user)
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->query("SELECT * FROM tb_user where username='$username' ")->num_rows();
        if ($user == true) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"></i> data user ' . $username . ' tidak boleh sama </div>');
            redirect('administrator/createUser');
        } else {
            $data = [
                'nama' => $nama,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ];
            $this->db->where('id_user', $id_user);
            $this->db->update('tb_user', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"></i> data user ' . $nama . ' berhasil di update! </div>');
            redirect('administrator/createUser');
        }
    }
    public function infophp()
    {
        phpinfo();
    }
    public function manual_wa()
    {
        $id = $this->uri->segment(3, 0);
        $bulan = str_replace(' ','',$this->uri->segment(4,0));
        $tahun = $this->uri->segment(5,0);
        if($bulan == false  || $tahun == false){
            $tanggalx = time();
            $bulan = str_replace(' ','',$this->indonesian_date($tanggalx, 'F'));
            $tahun = date('Y');
        }
        //$key = $this->input->get('key');
        $x = $this->db->query("SELECT * FROM tb_registrasi AS a LEFT JOIN tb_paket AS b ON(a.speed = b.id_wireless) where a.id_registrasi='$id'")->row_array();
        //foreach ($get as $x) {
        date_default_timezone_set('Asia/Jakarta');
        //if ($key == "TommY") {
        //  if ($x->tanggal_blast == date('Y-m-d')) {
                    
        //$sub = substr($x->harga, -3);
        $nama = $x['nama'];
	$pakettt = $x['mbps']. 'Mbps'; 
        //$total =  random_string('numeric', 3);
        //if ($sub == 0) {
        
        //echo "No Unik :" . $total . "<br>";
        //}

        //$tanggal = date('d', strtotime($x->tanggal_pembayaran));
//        $tanggalx = time();
//        $bulan = $this->indonesian_date($tanggalx, 'F');
        //$tahunxx = date('Y', strtotime($x->tanggal_pembayaran));
        //$id_pelanggan = crc32($x->id_registrasi);
    
        if ($x['diskon'] == false) {
            echo "";
        } else {
            $diskon_show = "(Sudah dikurangi potongan tagihan sebesar " . "*Rp." . number_format($x['diskon'], 0, ".", ".") ."*)";
        }
        
        if($x['addon1'] == true || $x['addon2'] == true || $x['addon3'] == true){
            $addon_show = "sudah termasuk biaya sewa ".$x['noteee'] . " *Rp." . number_format(intval($x['addon1']) + intval($x['addon2']) + intval($x['addon3']), 0, ".", ".") ."*.";
        }
        
        $hasil = number_format(intval($x['harga']) + intval($x['addon1']) + intval($x['addon2']) + intval($x['addon3']) - intval($x['diskon']), 0, ".", ".");

        $target = $x['kontak'];
        // $marge_tgl = $tanggal . " " . $bulan . $tahunxx;
        // $h = $x['harga'] + $total;
//        $tahun = date('Y');
        // $update_tanggal  = date('Y-m-d', strtotime('1 month', strtotime($x['tanggal_wa'])));
        //update bulan
        // $insert_log = [
        //     "tanggal_wa" => date('Y-m'),
        //     "status_wa" => 1,
        //     "id_registrasi" => $id
        // ];
        // $this->db->insert("tb_log_wa", $insert_log);
        //update bulan
        $insert_log = [
                     "date_wa" => date('d-m-Y H:i:s'),
                 ];
        $this->db->where('id_registrasi', $id);
        $this->db->update("tb_registrasi", $insert_log);

        $msgg = '*Billing*\n\nPelanggan *LJN* (PT. Lintas Jaringan Nusantara) Jakarta Timur yang terhormat.\n\n*Bapak/Ibu '.$nama.',*\n\nTagihan internet Anda periode *'.$bulan ." ". $tahun.'* dengan paket *'.$pakettt.'* sebesar *Rp.'.$hasil.'* '.$diskon_show.' '.$addon_show.' \nKami ingatkan bahwa pembayaran internet jatuh pada tanggal 1.\n_Pastikan agar melakukan pembayaran untuk menghindari pemblokiran._\n\nPembayaran dapat melalui outlet kami di JL. Harapan III No. 05 (samping SD/SMP Budiharapan),\nJam operasional pukul 08:00 s/d pukul 17:00 di hari kerja (Senin s/d Sabtu).\n*atau melalui transfer bank ke nomor rekening berikut :*\nBCA        : 1640314229\nMandiri  : 0060005009489\nBRI          : 065201009279506\na/n Tomy Nugrahadi.\n\n*_Lakukan konfirmasi setelah melakukan pembayaran ke nomor wa.me/6282211661443_  <- Langsung klik*\nHiraukan jika anda telah melakukan pembayaran.\n\nUntuk informasi lainnya;\n*Layanan gangguan, masalah teknis, ganti nama wifi dan password :*\n- wa.me/6287868881443 <- Langsung klik\n\nTerima kasih atas perhatian anda. ';
                       
                        $token = "rasJFCC37ewayax21uu2Caog9CCqyT3KSwBWFqQAbQMdMAefxa";
                        $phone = $x['kontak']; //untuk group pakai groupid contoh: 62812xxxxxx-xxxxx
                        $sender = 'tommy';
                        $curl = curl_init();
                         curl_setopt_array($curl, array(
                           CURLOPT_URL => 'http://103.171.85.211:8000/send-message',
                           CURLOPT_RETURNTRANSFER => true,
                           CURLOPT_ENCODING => '',
                           CURLOPT_MAXREDIRS => 10,
                           CURLOPT_TIMEOUT => 0,
                           CURLOPT_FOLLOWLOCATION => true,
                           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                           CURLOPT_CUSTOMREQUEST => 'POST',
                             CURLOPT_POSTFIELDS => '{
                                                     "api_key": "iEQRRY8J4UUAkWKW78iPja2hc8rjlcCK",
                                                     "sender": "6285961403102",
                                                     "number": "'.$phone.'",
                                                     "message" : "' . $msgg . '"
                                                     }',
                             CURLOPT_HTTPHEADER => array(
                                 'Content-Type: application/json'
                             ),
                         ));
                         $response = curl_exec($curl);
                         curl_close($curl);
                        // echo $response;
        // $o = json_decode($response);
        // if (json_encode($o->status) == true) {
        //     $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"></i> WhatApp berhasil dikirim</div>');
            redirect('administrator/client?bulan='.$bulan.'&thn='.$tahun);
        // }else{
        //     $this->session->set_flashdata('massage', '<div class="alert alert-alert" role="alert"></i> WhatApp gagal dikirim</div>');
        //     redirect('administrator/client?bulan='.$bulan.'&thn='.$tahun);
        // }
               
        // }
           // }
       // }
    }
    public function delete_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_user');
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"></i> data user berhasil di delete</div>');
        redirect('administrator/createUser');
    }
    public function delete_pembayaran($id_cetak)
    {
        $this->db->where('id_cetak', $id_cetak);
        $this->db->delete('tb_cetak');
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"></i> data Pembayaran berhasil di delete</div>');
        redirect('administrator/cetak');
    }
    public function cetak_client($key)
    {
        if ($key == 'otista') {
             $data['client'] = $this->db->query("SELECT * FROM tb_registrasi as a LEFT JOIN tb_paket as b on(a.speed = b.id_wireless) where lokasi='otista'")->result();
            $this->load->view('admin/cetak_client', $data);
        }else if($key == 'TomTimNet'){
            $data['client'] = $this->db->query("SELECT * FROM tb_registrasi as a LEFT JOIN tb_paket as b on(a.speed = b.id_wireless) where lokasi='TomTimNet'")->result();
            $this->load->view('admin/cetak_client', $data);
        }
    }
    public function registrasi()
    {
        $this->form_validation->set_rules('paket', 'Paket', 'trim|required');
        $this->form_validation->set_rules('speed', 'Speed', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('ktp_sim', 'Ktp_sim', 'trim|required');
        $this->form_validation->set_rules('nomor', 'Nomor', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('kodepos', 'Kodepos', 'trim|required');
        $this->form_validation->set_rules('kontak', 'Kontak', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('tindakan', 'Tindakan', 'trim|required');
        $this->form_validation->set_rules('nama_pelanggan', 'Nama_pelanggan', 'trim|required');
        $this->form_validation->set_rules('ktp_sim_pelanggan', 'Ktp_sim_pelanggan', 'trim|required');
        $this->form_validation->set_rules('nomor_pelanggan', 'Nomor_pelanggan', 'trim|required');
        $this->form_validation->set_rules('alamat_pelanggan', 'Alamat_pelanggan', 'trim|required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'trim|required');
        $this->form_validation->set_rules('kontak_pelanggan', 'Kontak_pelanggan', 'trim|required');
        $this->form_validation->set_rules('email_pelanggan', 'Email_pelanggan', 'trim|required');
        $this->form_validation->set_rules('pembayaran', 'Pembayaran', 'trim|required');
        $this->form_validation->set_rules('tanggal_installasi', 'Tanggal_installasi', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['pelanggan'] = $this->db->query("SELECT * FROM tb_registrasi")->num_rows();
            $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['pakettt'] = $this->db->query("SELECT * FROM tb_paket")->num_rows();
            $this->load->view('admin/head');
            $this->load->view('admin/registrasi', $data);
            $this->load->view('admin/footer');
        } else {
            $this->registrasi2();
        }
    }
    public function registrasi2()
    {
        $paket = $this->input->post('paket');
        $speed = $this->input->post('speed');
        $addon1 = $this->input->post('addon1');
        $addon2 = $this->input->post('addon2');
        $addon3 = $this->input->post('addon3');
        $note = $this->input->post('noteee1');
        $r_addon1 = $this->remove_special_characters($addon1);
        $r_addon2 = $this->remove_special_characters($addon2);
        $r_addon3 = $this->remove_special_characters($addon3);
        $nama =	$this->input->post('nama');
        $ktp_sim =	$this->input->post('ktp_sim');
        $nomor =	$this->input->post('nomor');
        $alamat =	$this->input->post('alamat');
        $kodepos =	$this->input->post('kodepos');
        $kontak =	$this->input->post('kontak');
        $email =	$this->input->post('email');
        $tindakan =	$this->input->post('tindakan');
        //data pelanggan
        $nama_pelanggan =	$this->input->post('nama_pelanggan');
        $ktp_sim_pelanggan =	$this->input->post('sim_ktp_pelanggan');
        $nomor_pelanggan =	$this->input->post('nomor_pelanggan');
        $alamat_pelanggan =	$this->input->post('alamat_pelanggan');
        $kodepos_pelanggan =	$this->input->post('kodepos_pelanggan');
        $npwp =	$this->input->post('npwp');
        $kontak_pelanggan =	$this->input->post('kontak_pelanggan');
        $email_pelanggan =	$this->input->post('email_pelanggan');
        $pembayaran =	$this->input->post('pembayaran');
        $tanggal_installasi =	$this->input->post('tanggal_installasi');
        $installasi2 = date('Y-m', strtotime('1 month', strtotime($tanggal_installasi)));
        $lok_pelanggan = $this->input->post('lok_pelanggan');

        //auto kode
        $quer = $this->db->query("SELECT max(id_registrasi) as kode FROM tb_registrasi")->row_array();
        $kode = $quer['kode'];
        $urut = (int) substr($kode, 3, 8);
        $urut++;
        $hasil = "LJN" . sprintf("%03s", $urut);
        $data = [
            'id_registrasi' => $hasil,
            'layanan' => $paket,
            'speed' => $speed,
            'addon1' => $r_addon1,
            'addon2' => $r_addon2,
            'addon3' => $r_addon3,
            'noteee' => $note,
            'nama' => $nama,
            'ktp_sim' => $ktp_sim,
            'nomor' => $nomor,
            'alamat' => $alamat,
            'kodepos' => $kodepos,
            'kontak' => $kontak,
            'email' => $email,
            'tindakan' => $tindakan,
            'nama_pelanggan' => $nama_pelanggan,
            'ktp_sim_pelanggan' => $ktp_sim_pelanggan,
            'nomor_pelanggan' => $nomor_pelanggan,
            'alamat_pelanggan' => $alamat_pelanggan,
            'kodepos_pelanggan' => $kodepos_pelanggan,
            'npwp' => $npwp,
            'kontak_pelanggan' => $kontak_pelanggan,
            'email_pelanggan' => $email_pelanggan,
            'pembayaran' => $pembayaran,
            'tanggal_installasi' => $tanggal_installasi,
            'tanggal_blast' =>$installasi2 . "-01",
            'date_wa' => '',
            'lokasi' => $lok_pelanggan

        ];
        $this->db->insert('tb_registrasi', $data);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"></i> Data Berhasil di input</div>');
        redirect('Administrator/registrasi');
    }
    public function create()
    {
        $data['user'] = $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pelanggan2'] = $this->M_admin->get_pelanggan();
        $data['pelanggan'] = $this->db->query("SELECT * FROM tb_registrasi")->num_rows();
        $data['pakettt'] = $this->db->query("SELECT * FROM tb_paket")->num_rows();
        $data['struk'] = $this->M_admin->get_struk();
        $this->load->view('admin/head');
        $this->load->view('admin/create_pembayaran', $data);
        $this->load->view('admin/footer');
    }
    public function ListPaket()
    {
        $data['user'] = $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pelanggan'] = $this->db->query("SELECT * FROM tb_registrasi")->num_rows();
        $data['pakettt'] = $this->db->query("SELECT * FROM tb_paket")->num_rows();
        $data['paket'] = $this->M_admin->get_list_paket();
        $this->load->view('admin/head');
        $this->load->view('admin/add_paket', $data);
        $this->load->view('admin/footer');
    }
    public function add_list_paket()
    {
        $paket = $this->input->post('paket');
        $harga = $this->input->post('harga');
        $r_harga = $this->remove_special_characters($harga);
        $layanan = $this->input->post('layanan');
        $promo = $this->input->post('promo');
        $r_paket = "Internet Up to " . $paket . " Mbps" . " - Rp." . $r_harga;
        $data = [
            'paket' => $r_paket,
            'mbps' => $paket,
            'harga' => $r_harga,
            'layanan' => $layanan,
            'promo' => $promo,
        ];
        $this->db->insert('tb_paket', $data);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"></i> Data Paket Berhasil ditambah !</div>');
        redirect('administrator/ListPaket');
    }
    public function updatex()
    {
        $x = $this->db->query("SELECT * FROM tb_registrasi")->result();
        foreach ($x as $k) {
            // $dax = date('Y-m');
            // $log = $this->db->query("SELECT * FROM tb_log_wa where tanggal_wa='$dax' and id_registrasi='$k->id_registrasi'")->num_rows();
            // if ($log == false) {
            //     $waktu = date('d-m-Y H:i:s');
            //     $data =[
            //             "date_wa" => $waktu
            //         ];
            //     $z = $this->db->update("tb_registrasi", $data);
            //     print_r($z);
            // }
            $d = [
                "lokasi" => "TomTimNet"
            ];
            $m = $this->db->update("tb_registrasi", $d);
            print_r($m);
        }
    }
    public function cekPembayaran()
    {
        $data['user'] = $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pelanggan'] = $this->db->query("SELECT * FROM tb_registrasi")->num_rows();
        $data['pakettt'] = $this->db->query("SELECT * FROM tb_paket")->num_rows();
        $data['cek'] = $this->db->query("SELECT * FROM tb_registrasi")->result();
        $data['cek_cetak'] = $this->db->query("SELECT * FROM tb_cetak")->result();
        $this->load->view('admin/head');
        $this->load->view('admin/cek', $data);
        $this->load->view('admin/footer');
    }
    public function client()
    {
        $data['user'] = $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pelanggan2'] = $this->db->query("SELECT a.id_registrasi,a.diskon,a.date_wa,a.nama,a.email,a.alamat,b.paket,a.kontak,a.tanggal_installasi,a.kodepos,a.addon1,a.addon2,a.addon3,a.noteee,b.promo,a.ktp_sim,a.nomor,b.id_wireless,a.speed,b.layanan,b.paket,b.harga,a.nama_pelanggan,a.alamat_pelanggan,a.email_pelanggan FROM tb_registrasi as a inner join tb_paket as b on(a.speed = b.id_wireless) where lokasi='TomTimNet'")->result();
        $data['pelanggan3'] = $this->db->query("SELECT a.id_registrasi,a.diskon,a.date_wa,a.nama,a.email,a.alamat,b.paket,a.kontak,a.tanggal_installasi,a.kodepos,a.addon1,a.addon2,a.addon3,a.noteee,b.promo,a.ktp_sim,a.nomor,b.id_wireless,a.speed,b.layanan,b.paket,b.harga,a.nama_pelanggan,a.alamat_pelanggan,a.email_pelanggan FROM tb_registrasi as a inner join tb_paket as b on(a.speed = b.id_wireless) where lokasi='otista'")->result();
        $data['pelanggan'] = $this->db->query("SELECT * FROM tb_registrasi where lokasi='TomTimNet'")->num_rows();
        $data['pakettt'] = $this->db->query("SELECT * FROM tb_paket")->num_rows();
        $this->load->view('admin/head');
        $this->load->view('admin/client', $data);
        $this->load->view('admin/footer');
    }

    public function simpanCetak()
    {
        $id_registrasix = $this->input->post('id_registrasi');
        $internet = $this->input->post('internet');
        $addon1 = $this->input->post('addon1');
        $addon2 = $this->input->post('addon2');
        $addon3 = $this->input->post('addon3');
        $tagihan = $this->input->post('tagihan');
        $diskon = $this->input->post('diskon');
        $r_tagihan = $this->remove_special_characters($tagihan);
        $r_addon1 = $this->remove_special_characters($addon1);
        $r_addon2 = $this->remove_special_characters($addon2);
        $r_addon3 = $this->remove_special_characters($addon3);
        $r_diskon = $this->remove_special_characters($diskon);
        $penerima = $this->input->post('penerima');
        $periode = $this->input->post('periode');
        $tanggal = $this->input->post('tanggal');
        $nomor_struk = $this->input->post('nomor_struk');
        $thn = $this->input->post('thn');
        
        $quer = $this->db->query("SELECT max(id_cetak) as kode FROM tb_cetak")->row_array();
        $kode = $quer['kode'];
        $kode++;
        //$urut = (int) substr($kode, 1, 8);
        //$urut++;
        //$hasil = "C" . sprintf("%03s", $urut);
        $xx = $this->db->query("SELECT * FROM tb_cetak where id_registrasi='$id_registrasix' and internet='$internet' and periode='$periode' and thn='$thn'")->num_rows();
        $get_registrasi = $this->db->query("SELECT * from tb_registrasi where id_registrasi='$id_registrasix'")->row_array();
        if ($xx == true) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"></i> Data pembayaran tidak boleh dobel nama ' . $get_registrasi['nama'] . ' ,bulan ' . $periode . ' dan tahun ' . $thn . '</div>');
            redirect('administrator/create');
        } else {
            $total_tagihan = $r_tagihan + $get_registrasi['addon1'] + $get_registrasi['addon2'] + $get_registrasi['addon3'] - $get_registrasi['diskon'];
            $msgg= '📧 *Pembayaran Sukses*\n\nYth Bapak/Ibu '.$get_registrasi['nama'].' \nKami Ucapkan Terima Kasih telah melakukan pembayaran internet untuk Bulan '.$periode.' '.$thn.' sebesar Rp.'. number_format($total_tagihan,0,".",".").'\n\nSalam,\nFinance\nLintas Jaringan Nusantara\nKantor Layanan Makasar - Jakarta Timur';
            $data = [
                'id_cetak' => $kode,
                'id_registrasi' => $id_registrasix,
                'nama' => $get_registrasi['nama'],
                'internet' => $internet,
                'addon1' => $r_addon1,
                'addon2' => $r_addon2,
                'addon3' => $r_addon3,
                'tagihan' => $r_tagihan,
                'tagihan_diskon' => $get_registrasi['diskon'],
                'penerima' => $penerima,
                'periode' => $periode,
                'thn' => $thn,
                'tanggal' => $tanggal,
                'nomor_struk' => $nomor_struk,
            ];
            // $this->db->insert('tb_cetak', $data);

                        $token = "rasJFCC37ewayax21uu2Caog9CCqyT3KSwBWFqQAbQMdMAefxa";
                        $phone = $get_registrasi['kontak']; //untuk group pakai groupid contoh: 62812xxxxxx-xxxxx
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'http://103.171.85.211:8000/send-message',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => '{
                                                                "api_key": "iEQRRY8J4UUAkWKW78iPja2hc8rjlcCK",
                                                                "sender": "6285961403102",
                                                                "number": "' . $phone . '",
                                                                "message" : "' . $msgg . '"
                                                                }',
                            CURLOPT_HTTPHEADER => array(
                                'Content-Type: application/json'
                            ),
                        )
                        );
                        $response = curl_exec($curl);
                        curl_close($curl);
                        $o = json_decode($response);
                        if (json_encode($o->status) == true){
                            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"></i> Silahkan Cetak Struk</div>');
                            redirect('administrator/cetak');
                        }else{
                            $this->session->set_flashdata('massage', '<div class="alert alert-alert" role="alert"></i> Gagal buat Pembayaran</div>');
                            redirect('administrator/cetak');
                        }
        }
    
    }
    public function cetak()
    {
        $data['struk'] = $this->M_admin->get_struk();
        $data['pelanggan'] = $this->db->query("SELECT * FROM tb_registrasi")->num_rows();
        $data['pakettt'] = $this->db->query("SELECT * FROM tb_paket")->num_rows();
        $data['pelanggann'] = $this->M_admin->get_pelanggan();
        $data['user'] = $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/head');
        $this->load->view('admin/cetak', $data);
        $this->load->view('admin/footer');
    }

    public function tagihan()
    {
        $data['pelanggan'] = $this->db->query("SELECT * FROM tb_registrasi")->num_rows();
        $data['pakettt'] = $this->db->query("SELECT * FROM tb_paket")->num_rows();
        $data['pelanggann'] = $this->M_admin->get_pelanggan();
        $data['user'] = $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pelanggan2'] = $this->M_admin->get_pelanggan();
        $this->load->view('admin/head');
        $this->load->view('admin/tagihan', $data);
        $this->load->view('admin/footer');
    }

    public function CreateTagihan()
    {
        $pdf = new FPDF('L', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        // mencetak string
        $pdf->Image('assets/tagihan.png', 0, 0, 210, 150, 'PNG');
        $id_paket = $this->input->post('internet');
        $nomor_struk = $this->input->post('nomor_struk');
        $nama = $this->input->post('nama');
        $tagihan = $this->remove_special_characters($this->input->post('tagihan'));
        $addon1 = $this->remove_special_characters($this->input->post('addon1'));
        $addon2 = $this->remove_special_characters($this->input->post('addon2'));
        $addon3 = $this->remove_special_characters($this->input->post('addon3'));
        $tagihan_diskon = $this->remove_special_characters($this->input->post('diskon'));
        $paket = $this->db->query("SELECT * FROM tb_paket where id_wireless = '$id_paket'")->result_array();
        foreach ($paket as $row) {
            /*if ($row['internet'] == '12') {
                $ss = $row['paket'];
            }*/
            $pdf->SetTitle($nama);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(0, 100);
            $pdf->Cell(-125);
            $pdf->Cell(-234, 56, '#' . $nomor_struk, 0, 0, 'L');
            $pdf->Cell(234);
            $tanggal = time();
            $bulan = $this->indonesian_date($tanggal, 'F');
            $pdf->Cell(30, 68, '01 ' . $bulan . date('Y'), 0, 0, 'L');
            $pdf->Cell(-30);
            $pdf->Cell(6, 80, '10 ' . $bulan . date('Y'), 0, 0, 'L');
            $pdf->Ln(59);
            $pdf->Cell(73);
            $pdf->Cell(158, 9, $nama, 0, 0, 'L');
            $pdf->Ln(15);
            $pdf->Cell(73);
            $pdf->Cell(25, 7, "Internet Up to " . $row['mbps'] . " Mbps", 0, 0, 'L');
            //	$pdf->Cell(25, 7, $ss, 0, 0, 'L');
            $pdf->Ln(14);
            $pdf->Cell(73);
            if ($tagihan_diskon == true) {
                $diskon = '      -       Diskon  :  Rp.' . number_format($tagihan_diskon, 0, ".", ".");
            }
            $pdf->Cell(168, 8, 'Rp. ' . number_format($row['harga'], 0, ".", ".") . $diskon, 0, 0, 'L');
            $pdf->Ln(20);
            $pdf->Cell(74);
            //$pdf->Cell(103, -6, $nama, 0, 0, 'L');
            $pdf->Ln(-5.2);
            $pdf->Cell(150);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFontSize(12);
            $total =  $tagihan + $addon1 + $addon2 + $addon3 - $tagihan_diskon;
            $pdf->Cell(22, 3, 'Rp. ' . number_format($total, 0, ".", "."), 0, 0, 'L');
            if ($addon1 && $addon2 && $addon3 == true) {
                $pdf->Cell(-169);
                $total_addon = $addon1 + $addon2 + $addon3;
                $pdf->Cell(50, 2, 'AddOn :  Rp.' . number_format($total_addon, 0, ".", "."), 0, 0, 'L');
            }
            $pdf->Output('', $nama . ' - #' . $nama . '.pdf', false);
        }
    }

    public function edit_paket($id_wireless)
    {
        $id_paket = base64_decode(urldecode($id_wireless));
        $data['pelanggan'] = $this->db->query("SELECT * FROM tb_registrasi")->num_rows();
        $data['pakettt'] = $this->db->query("SELECT * FROM tb_paket")->num_rows();
        $data['user'] = $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pakets'] = $this->db->query("SELECT * FROM tb_paket where  id_wireless= '$id_paket'")->result();
        $this->load->view('admin/head');
        $this->load->view('admin/edit_paket', $data);
        $this->load->view('admin/footer');
    }
    public function edit_paket_action($id_action)
    {
        $paket = $this->input->post('paket');
        $hrg = $this->remove_special_characters($this->input->post('harga'));
        $layanan = $this->input->post('layanan');
        $promo = $this->input->post('promo');
        $data = [
            'mbps' => $paket,
            'harga' => $hrg,
            'layanan' => $layanan,
            'promo' => $promo,
        ];
        $this->db->where('id_wireless', $id_action);
        $this->db->update('tb_paket', $data);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"></i> Paket Internet Berhasil di update</div>');
        redirect('administrator/ListPaket');
    }
    public function edit_pelanggan($id_plg)
    {
        // $id_plg = base64_decode(urldecode($id_pelanggan));
        //$pembayaran =	$this->input->post('pembayaran');
        //$tanggal_installasi =	$this->input->post('tanggal_installasi');
        $data['pelanggan'] = $this->db->query("SELECT * FROM tb_registrasi")->num_rows();
        $data['pakettt'] = $this->db->query("SELECT * FROM tb_paket")->num_rows();
        $data['user'] = $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['edit'] = $this->db->query("SELECT * FROM tb_registrasi as a inner join tb_paket as b on(a.speed = b.id_wireless) where id_registrasi = '$id_plg'")->result();
        $this->load->view('admin/head');
        $this->load->view('admin/edit_pelanggan', $data);
        $this->load->view('admin/footer');
    }
    public function edit_pelanggan_action($get_id_pelanggan)
    {
        $paket = $this->input->post('paket');
        $speed = $this->input->post('speed');
        $addon1 = $this->input->post('addon1');
        $addon2 = $this->input->post('addon2');
        $addon3 = $this->input->post('addon3');
        $note = $this->input->post('noteee');
        $diskon = $this->remove_special_characters($this->input->post('diskon'));
        $r_addon1 = $this->remove_special_characters($addon1);
        $r_addon2 = $this->remove_special_characters($addon2);
        $r_addon3 = $this->remove_special_characters($addon3);
        $nama =	$this->input->post('nama');
        $ktp_sim =	$this->input->post('ktp_sim');
        $nomor =	$this->input->post('nomor');
        $alamat =	$this->input->post('alamat');
        $kodepos =	$this->input->post('kodepos');
        $kontak =	$this->input->post('kontak');
        $email =	$this->input->post('email');
        $tindakan =	$this->input->post('tindakan');
        //data pelanggan
        $nama_pelanggan =	$this->input->post('nama_pelanggan');
        $ktp_sim_pelanggan =	$this->input->post('ktp_sim_pelanggan');
        $nomor_pelanggan =	$this->input->post('nomor_pelanggan');
        $alamat_pelanggan =	$this->input->post('alamat_pelanggan');
        $kodepos_pelanggan =	$this->input->post('kodepos_pelanggan');
        $npwp =	$this->input->post('npwp');
        $kontak_pelanggan =	$this->input->post('kontak_pelanggan');
        $email_pelanggan =	$this->input->post('email_pelanggan');
        $update = [
            'layanan' => $paket,
            'speed' => $speed,
            'addon1' => $r_addon1,
            'addon2' => $r_addon2,
            'addon3' => $r_addon3,
            'noteee' => $note,
            'diskon' => $diskon,
            'nama' => $nama,
            'ktp_sim' => $ktp_sim,
            'nomor' => $nomor,
            'alamat' => $alamat,
            'kodepos' => $kodepos,
            'kontak' => $kontak,
            'email' => $email,
            'tindakan' => $tindakan,
            'nama_pelanggan' => $nama_pelanggan,
            'ktp_sim_pelanggan' => $ktp_sim_pelanggan,
            'nomor_pelanggan' => $nomor_pelanggan,
            'alamat_pelanggan' => $alamat_pelanggan,
            'kodepos_pelanggan' => $kodepos_pelanggan,
            'npwp' => $npwp,
            'kontak_pelanggan' => $kontak_pelanggan,
            'email_pelanggan' => $email_pelanggan,
        ];
        $this->db->where('id_registrasi', $get_id_pelanggan);
        $this->db->update('tb_registrasi', $update);

        $dataxx = [
            "internet" => $speed
        ];
        $this->db->where('id_registrasi',$get_id_pelanggan);
        $this->db->update('tb_cetak',$dataxx);
        
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"></i> Data Pelanggan Berhasil di update</div>');
        redirect('administrator/client');
    }
    public function delete_paket($id_p)
    {
        $this->db->where('id_wireless', $id_p);
        $this->db->delete('tb_paket');
        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"></i> Data paket berhasil di hapus </div>');
        redirect('administrator/ListPaket');
    }
    public function delete_pelanggan($id_pelanggan)
    {
        $this->db->where('id_registrasi', $id_pelanggan);
        $this->db->delete('tb_registrasi');
        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"></i> Data Pelanggan berhasil di hapus   </div>');
        redirect('administrator/client');
    }
    public function pdf($cetak)
    {
        // $cetak = base64_decode(urldecode($id_cetak));
        $pdf = new FPDF('L', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        // mencetak string
        $pdf->Image('assets/struk2.png', 0, 0, 210, 150, 'PNG');

        $xcc = $this->db->query("SELECT * FROM tb_cetak as a INNER JOIN tb_paket as b on(b.id_wireless = a.internet) where a.id_cetak = '$cetak'")->result_array();
        foreach ($xcc as $row) {
            /*if ($row['internet'] == '12') {
                $ss = $row['paket'];
            }*/
            $pdf->SetTitle($row['nama']);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(0, 100);
            $pdf->Cell(-125);
            $pdf->Cell(-234, 56, '#' . $row['nomor_struk'], 0, 0, 'L');
            $pdf->Cell(234);
            $pdf->Cell(30, 68, $row['periode'] . ' ' . $row['thn'], 0, 0, 'L');
            $pdf->Cell(-30);
            $pdf->Cell(6, 80, $row['tanggal'], 0, 0, 'L');
            $pdf->Ln(59);
            $pdf->Cell(73);
            $pdf->Cell(158, 9, $row['nama'], 0, 0, 'L');
            $pdf->Ln(15);
            $pdf->Cell(73);
            $pdf->Cell(25, 7, "Internet Up to " . $row['mbps'] . " Mbps" . " " . $row['promo'], 0, 0, 'L');
            //	$pdf->Cell(25, 7, $ss, 0, 0, 'L');
            $pdf->Ln(14);
            $pdf->Cell(73);
            if ($row['tagihan_diskon'] == true) {
                $diskon = '      -       Potongan  :  Rp.' . number_format($row['tagihan_diskon'], 0, ".", ".");
                $pdf->Cell(168, 8, 'Rp. ' . number_format($row['tagihan'], 0, ".", ".") . $diskon, 0, 0, 'L');
            }
            $pdf->Cell(168, 8, 'Rp. ' . number_format($row['tagihan'], 0, ".", "."), 0, 0, 'L');
            
            $pdf->Ln(20);
            $pdf->Cell(74);
            $pdf->Cell(103, -6, $row['penerima'], 0, 0, 'L');
            $pdf->Ln(7.2);
            $pdf->Cell(148);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFontSize(12);
            $total =  $row['tagihan'] + $row['addon1'] + $row['addon2'] + $row['addon3'] - $row['tagihan_diskon'];
            $pdf->Cell(22, 3, 'Rp. ' . number_format($total, 0, ".", "."), 0, 0, 'L');
            if ($row['addon1'] || $row['addon2'] || $row['addon3'] == true) {
                $pdf->Cell(-169);
                $total_addon = $row['addon1'] + $row['addon2'] + $row['addon3'];
                $pdf->Cell(50, 2, 'AddOn :  Rp.' . number_format($total_addon, 0, ".", "."), 0, 0, 'L');
            }

            $pdf->Output('', $row['nama'] . ' - #' . $row['nomor_struk'] . '.pdf', false);
        }
    }
    public function image()
    {
        header("Content-Type: image/png");//change the php file to an image
        $font= base_url('assets/MONTSERRAT.REGULAR.TTF');
        $im = @imagecreate(800, 500)
            or die("Cannot Initialize new GD image stream");//creates an image with the resolution x:110 y:20
        $background_color = imagecolorallocate($im, 255, 255, 255);//create an color with RGB
        $text_color = imagecolorallocate($im, 0, 0, 0);
        imagestring($im, 7, 12, 12, "A Simple Text String", $text_color, $font);//draws text to the image with the font:1 xpos:5 ypos:5
        imagepng($im);//sends the image data to the user
        imagedestroy($im);//destroys the image from the server
    }
    public function excel()
    {
       // $get = $this->input->post('plg');
        $get2 = $this->input->post('periode');
        $thn = $this->input->post('thn');
        $lokasi = $this->input->post('lokasi');
        $data['excel'] = $this->db->query("SELECT * from tb_cetak as a left join tb_paket as b on(a.internet = b.id_wireless) left join tb_registrasi as c on(a.id_registrasi = c.id_registrasi) where a.periode='$get2' and a.thn='$thn' and c.lokasi='$lokasi'")->result();
        $this->load->view('admin/excel', $data);
    }

    public function excel2()
    {
        $data2['excel2'] = $this->db->query("SELECT * from tb_cetak as a inner join tb_paket as b on(a.internet = b.id_wireless)")->result();
        $this->load->view('admin/excel_all', $data2);
    }
    public function paket()
    {
        $id_paket = $this->input->post('id'); // record data dari select option
        $data = $this->M_admin->get_paket($id_paket);
        echo json_encode($data);
    }
    public function plg()
    {
        $id_plg = $this->input->post('id');
        $data = $this->M_admin->get_plg($id_plg);
        echo json_encode($data);
    }
    public function plgAddon()
    {
        $id = $this->input->post('id');
        $data = $this->M_admin->get_addon($id);
        echo json_encode($data);
    }
    public function harga()
    {
        $id_harga = $this->input->post('id');
        $data = $this->M_admin->get_harga($id_harga);
        echo json_encode($data);
    }
    public function remove_special_characters($user_string)
    {

        // Replaces all spaces using hyphens.
        $user_string = str_replace(' ', '-', $user_string);

        // Removes special chars wothout A to Z and 0 to 9.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $user_string);
    }
    public function indonesian_date($timestamp = '', $date_format = 'd F Y', $suffix = '')
    {
        if ($timestamp == null) {
            return '-';
        }

        if ($timestamp == '1970-01-01' || $timestamp == '0000-00-00' || $timestamp == '-25200') {
            return '-';
        }


        if (trim($timestamp) == '') {
            $timestamp = time();
        } elseif (!ctype_digit($timestamp)) {
            $timestamp = strtotime($timestamp);
        }
        # remove S (st,nd,rd,th) there are no such things in indonesia :p
        $date_format = preg_replace("/S/", "", $date_format);
        $pattern = array(
            '/Mon[^day]/', '/Tue[^sday]/', '/Wed[^nesday]/', '/Thu[^rsday]/',
            '/Fri[^day]/', '/Sat[^urday]/', '/Sun[^day]/', '/Monday/', '/Tuesday/',
            '/Wednesday/', '/Thursday/', '/Friday/', '/Saturday/', '/Sunday/',
            '/Jan[^uary]/', '/Feb[^ruary]/', '/Mar[^ch]/', '/Apr[^il]/', '/May/',
            '/Jun[^e]/', '/Jul[^y]/', '/Aug[^ust]/', '/Sep[^tember]/', '/Oct[^ober]/',
            '/Nov[^ember]/', '/Dec[^ember]/', '/January/', '/February/', '/March/',
            '/April/', '/June/', '/July/', '/August/', '/September/', '/October/',
            '/November/', '/December/',
        );
        $replace = array(
            'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min',
            'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des',
            'Januari', 'Februari', 'Maret', 'April', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember',
        );
        $date = date($date_format, $timestamp);
        $date = preg_replace($pattern, $replace, $date);
        $date = "{$date} {$suffix}";
        return $date;
    }
}
