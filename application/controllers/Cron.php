<?php
defined('BASEPATH') or exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Cron extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ob_start();
        $this->load->library('Pdf');
        $this->load->model('M_admin');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
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
    function update()
    {
        $db = $this->db->query("SELECT * FROM tb_registrasi")->result();
        foreach ($db as $x) {
           $xx = $this->db->query("UPDATE tb_registrasi set tanggal_blast='2021-10-01' where id_registrasi='$x->id_registrasi'");
        }
        if ($xx == true) {
            echo "berhasil";
        }
    }
    public function bc()
    {
        $key = $this->input->get('key');
        $get = $this->db->query("SELECT * FROM tb_registrasi AS a LEFT JOIN tb_paket AS b ON(a.speed = b.id_wireless) ")->result();
        foreach ($get as $x) {
            sleep(7);
            date_default_timezone_set('Asia/Jakarta');
            // if ($key == "TommY") {
                if ($x->tanggal_blast == date('Y-m-d')) {
                    
                //$sub = substr($x->harga, -3);

                //$total =  random_string('numeric', 3);
                //if ($sub == 0) {
                    // $hasil = number_format($x->harga + $x->addon1 + $x->addon2 + $x->addon3 - $x->diskon, 0, ".", ".");
                    //echo "No Unik :" . $total . "<br>";
                //}

                //$tanggal = date('d', strtotime($x->tanggal_pembayaran));
                $tanggalx = time();
                $bulan = $this->indonesian_date($tanggalx, 'F');
                //$tahunxx = date('Y', strtotime($x->tanggal_pembayaran));
                // $id_pelanggan = crc32($x->id_registrasi);
    
                // if ($x->diskon == true) {
                //     $diskon_show = "(Sudah dikurangi potongan tagihan sebesar " . "*Rp." . number_format($x->diskon,0,".",".") ."*)";
                // }

                // $target = $x->kontak;
                // $marge_tgl = $tanggal . " " . $bulan . $tahunxx;
                // $h = $x->harga + $total;
                $tahun = date('Y');
                $update_tanggal  = date('Y-m-d', strtotime('1 month', strtotime($x->tanggal_blast)));
                //update bulan
                $this->db->query("UPDATE tb_registrasi set tanggal_blast='$update_tanggal' where id_registrasi='$x->id_registrasi'");
                    
                $token = "rasJFCC37ewayax21uu2Caog9CCqyT3KSwBWFqQAbQMdMAefxa";
                        $phone = $x->kontak_pelanggan; //untuk group pakai groupid contoh: 62812xxxxxx-xxxxx
                        $message = "*PT. Lintas Jaringan Nusantara*\nKantor layanan Cipinang Melayu - Jakarta Timur mengucapkan,\n".'*Selamat Hari Raya Idul Fitri, 1 Syawal 1443 H*'." \nBagi anda yang merayakannya, Mohon maaf lahir dan bathin🙏🏻";
                        $image = 'https://i.ibb.co/1mrjc3z/Whats-App-Image-2022-05-02-at-18-19-06.jpg';
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                          CURLOPT_URL => 'https://app.ruangwa.id/api/send_image',
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => '',
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 0,
                          CURLOPT_FOLLOWLOCATION => true,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => 'POST',
                          CURLOPT_POSTFIELDS => 'token='.$token.'&number='.$phone.'&file='.$image.'&caption='.$message,
                        ));
                        $response = curl_exec($curl);
                        curl_close($curl);
                        echo $response;

                // }
            }
        }
    }
    public function reminder()
    {
        $this->db->where('b.id_ppp !=',NULL);
        $this->db->join('dt_ppp as b','a.id_registrasi=b.id_pelanggan','left');
        $this->db->join('tb_paket as c', 'a.speed=c.id_wireless', 'left');
        $get_client = $this->db->get('tb_registrasi as a')->result();
        foreach ($get_client as $x) {
            $day3 = $x->tgl_reminder - 3;//h-3
            $day7 = $x->tgl_reminder - 7;//h-3
            if ($day3 == date('d') || $day7 == date('d')) {
                $hasil = number_format(intval($x->harga) + intval($x->addon1) + intval($x->addon2) + intval($x->addon3) - intval($x->diskon), 0, ".", ".");
                // $message = '📧 Bot Billing\n\nPelanggan LJN (PT. Lintas Jaringan Nusantara) Jakarta Timur yang terhormat,\n\nKami informasikan bahwa saat ini status internet anda ISOLIR/TERBLOKIR\n\nUntuk dapat menggunakan layanan kami kembali, silahkan lakukan pembayaran melalui transfer bank ke nomor rekening berikut :\n\nBCA        : 1640314229\nMandiri  : 0060005009489\nBRI          : 065201009279506\na/n Tomy Nugrahadi.\n\nKirimkan bukti pembayaran melalui whatsapp ke nomor 082211661443 👈 Langsung klik\n\nTerima kasih atas perhatian anda. 🙏\n\n*Mohon untuk tidak membalas pesan ini*';
                $message = '*📧 Bot Billing*\n' .
                    'Pelanggan LJN (PT. Lintas Jaringan Nusantara) Jakarta Timur yang terhormat,\n\n' .
                    '*Bapak/Ibu '.$x->nama.'*\n\n' .
                    'Kami informasikan bahwa tagihan internet anda bulan *'.date('F').'* senilai *Rp.'.$hasil.'* dan akan jatuh tempo pada *'.$x->tgl_reminder.' '. date('F').'*\n\n' .
                    'Untuk terus dapat menggunakan layanan internet anda, silahkan lakukan pembayaran melalui transfer bank ke nomor rekening berikut :\n\n' .
                    'BCA        : 1640314229\n' .
                    'Mandiri  : 0060005009489\n' .
                    'BRI          : 065201009279506\n' .
                    '*_a/n Tomy Nugrahadi._*\n\n' .
                    'Kirimkan bukti pembayaran melalui whatsapp ke nomor 082211661443 👈 Langsung klik\n\n' .
                    'Abaikan pesan ini jika Anda sudah melakukan pembayaran.\n' .
                    'Terima kasih atas perhatian anda. 🙏\n\n' .
                    '*Mohon untuk tidak membalas pesan ini*';


                $token = "rasJFCC37ewayax21uu2Caog9CCqyT3KSwBWFqQAbQMdMAefxa";
                $phone = "083897943785"; //untuk group pakai groupid contoh: 62812xxxxxx-xxxxx
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
                                                        "api_key": "IVUQAJYTX0sQaHe2SSrOIi2ht0rSeB",
                                                        "sender": "6285961403102",
                                                        "number": "' . $phone . '",
                                                        "message" : "' . $message . '"
                                                        }',
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json'
                    ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                echo $response;
            }
        }
        
    }
}
