<?php

class M_admin extends CI_Model
{
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
            '/Mon[^day]/',
            '/Tue[^sday]/',
            '/Wed[^nesday]/',
            '/Thu[^rsday]/',
            '/Fri[^day]/',
            '/Sat[^urday]/',
            '/Sun[^day]/',
            '/Monday/',
            '/Tuesday/',
            '/Wednesday/',
            '/Thursday/',
            '/Friday/',
            '/Saturday/',
            '/Sunday/',
            '/Jan[^uary]/',
            '/Feb[^ruary]/',
            '/Mar[^ch]/',
            '/Apr[^il]/',
            '/May/',
            '/Jun[^e]/',
            '/Jul[^y]/',
            '/Aug[^ust]/',
            '/Sep[^tember]/',
            '/Oct[^ober]/',
            '/Nov[^ember]/',
            '/Dec[^ember]/',
            '/January/',
            '/February/',
            '/March/',
            '/April/',
            '/June/',
            '/July/',
            '/August/',
            '/September/',
            '/October/',
            '/November/',
            '/December/',
        );
        $replace = array(
            'Sen',
            'Sel',
            'Rab',
            'Kam',
            'Jum',
            'Sab',
            'Min',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu',
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Ags',
            'Sep',
            'Okt',
            'Nov',
            'Des',
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        );
        $date = date($date_format, $timestamp);
        $date = preg_replace($pattern, $replace, $date);
        $date = "{$date} {$suffix}";
        return $date;
    }
    function get_pelanggan()
    {
        $query = $this->db->query("SELECT * FROM tb_registrasi");
        return $query->result();
    }
    function get_list_paket()
    {
        $query = $this->db->query("SELECT * FROM tb_paket");
        return $query->result();
    }
    function get_struk()
    {
        $query = $this->db->query("SELECT * FROM tb_cetak as a INNER JOIN tb_paket as b ON(b.id_wireless = a.internet)");
        return $query->result();
    }
    function get_paket($id_paket)
    {
        $query = $this->db->query("SELECT * FROM tb_paket where layanan='$id_paket'");
        return $query->result();
    }
    function get_plg($id_plg)
    {
        $query = $this->db->query("SELECT * FROM tb_registrasi AS a left join tb_paket AS b ON(b.id_wireless = a.speed) WHERE a.id_registrasi = '$id_plg'");
        return $query->result();
    }
    function get_harga($id_harga)
    {
        $query = $this->db->query("SELECT * FROM tb_registrasi AS a left join tb_paket AS b on(b.id_wireless = a.speed) where b.id_wireless='$id_harga'");
        return $query->result();
    }
    function get_user()
    {
        $query = $this->db->query("SELECT * FROM tb_user");
        return $query->result();
    }
    function get_addon($id)
    {
        $query = $this->db->query("SELECT * FROM tb_registrasi where id_registrasi='$id'");
        return $query->result();
    }
    function ListReport($postData){
        ini_set('display_errors', 1);
        error_reporting(-1);
        $response = array();

        //value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = 'a.tanggal';
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = $postData['search']['value'];

        //search
        $searchQuery = "";
        if($searchValue != ''){
            $searchQuery = " (nama like '%".$searchValue."%' or periode like '%".$searchValue."%' or tanggal like'%".$searchValue."%' ) ";
        }

        $this->db->select('count(*) as allcount');
        $this->db->from('tb_cetak as a');
        $this->db->join('tb_paket as b', 'a.internet = b.id_wireless','left');
        $this->db->order_by('a.tanggal','desc');
        $records = $this->db->get()->result();
        $totalRecords = $records[0]->allcount;

        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
            $this->db->where($searchQuery);
            // $this->db->like('nama',$searchValue);
        $this->db->order_by('tanggal', 'desc');
        $records = $this->db->get('tb_cetak')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        if($searchQuery != '')
        $this->db->select('*');
        $this->db->from('tb_cetak as a');
        $this->db->join('tb_paket as b', 'a.internet = b.id_wireless','left');
        //  $this->db->where('a.nama');
        $this->db->like('a.nama',$searchValue);
        $this->db->or_like('a.periode',$searchValue);
        $this->db->or_like('a.tanggal',$searchValue);
        //  $this->db->order_by('tanggal', 'desc');
        $this->db->order_by('a.tanggal', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        //  $records = $this->db->query("SELECT a.id_cetak,a.nama,b.paket,a.tagihan,a.penerima,a.periode,a.tanggal,a.nomor_struk FROM tb_cetak as a left join tb_paket as b on(a.internet = b.id_wireless) where '$searchQuery' order by '$columnName' asc limit $rowperpage")->result();
        
        $records = $this->db->get()->result();
        $data = array();
        $no =1;
        foreach($records as $record ){
            if ($record->promo == true) {
                $paket = $record->promo . ' ' . $record->mbps;
            } else {
                $paket = $record->paket;
            }
            $data[] = array(
            "no"=>$no++,
            "nama"=>$record->nama,
            "paket"=>$paket,
            "tagihan"=> $record->tagihan,
            "penerima"=>$record->penerima,
            "periode"=>$record->periode,
            "tanggal"=>$record->tanggal,
            "nomor_struk"=> "#".$record->nomor_struk,
            "id" => $record->id_cetak
            );
        }

        //response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    function list_status1($postData)
    {
        $response = array();

        //value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = 'a.nama';
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = $postData['search']['value'];


        //search
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = "(nama like '%" . $searchValue . "%' or kontak like '%" . $searchValue . "%' or alamat like '%" . $searchValue . "%') ";
        }
        $searchQuery2 = "";
        if ($searchValue != '') {
            $searchQuery2 = "(a.nama like '%" . $searchValue . "%' or a.kontak like '%" . $searchValue . "%' or a.alamat like '%" . $searchValue . "%')";
        }

        $this->db->select('count(*) as allcount');
        $this->db->from('tb_registrasi as a');
        $this->db->join('tb_paket as b', 'a.speed = b.id_wireless');
        if ($this->session->userdata('lokasi') == 'TomTimNet') {
            $this->db->where('a.lokasi', 'TomTimNet');
        } else {
            $this->db->where('a.lokasi', 'Otista');
        }
        $records = $this->db->get()->result();
        $totalRecords = $records[0]->allcount;

        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        //             $this->db->like('nama',$searchValue);
        // $this->db->where('lokasi', 'TomTimNet');
        if ($this->session->userdata('lokasi') == 'TomTimNet') {
            $this->db->where('lokasi', 'TomTimNet');
        } else {
            $this->db->where('lokasi', 'Otista');
        }
        $records = $this->db->get('tb_registrasi')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        if ($searchQuery != '')
            $this->db->select('*');
        $this->db->from('tb_registrasi as a');
        $this->db->join('tb_paket as b', 'a.speed = b.id_wireless');
        if ($searchValue == true) {
            $this->db->where($searchQuery2);
        }
        // $this->db->where('a.lokasi', 'TomTimNet');
        if ($this->session->userdata('lokasi') == 'TomTimNet') {
            $this->db->where('a.lokasi', 'TomTimNet');
        } else {
            $this->db->where('a.lokasi', 'Otista');
        }
        //  $this->db->order_by('tanggal', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        //  $records = $this->db->query("SELECT a.id_cetak,a.nama,b.paket,a.tagihan,a.penerima,a.periode,a.tanggal,a.nomor_struk FROM tb_cetak as a left join tb_paket as b on(a.internet = b.id_wireless) where '$searchQuery' order by '$columnName' asc limit $rowperpage")->result();

        $records = $this->db->get()->result();
        $data = array();
        $no =1;
        foreach ($records as $record) {
            $get_bulan = $this->session->userdata('bln');
            $get_thn = $this->session->userdata('thn');
            

            $tanggal = time();
            $bulan = $this->indonesian_date($tanggal, 'F');
            if ($get_bulan) {
                $xquery = $this->db->query("SELECT * FROM tb_cetak where id_registrasi='$record->id_registrasi' and periode='$get_bulan' and thn='$get_thn' ")->num_rows();
            } else {
                $xquery = $this->db->query("SELECT * FROM tb_cetak where id_registrasi='$record->id_registrasi' and periode='$bulan' and thn=date('Y')")->num_rows();
            }
            $xx = '';
            if ($xquery == true) {
                $xx = '<td><span  class="btn btn-primary"><i style="font-size:21px" class="fas fa-check"></i> Sudah bayar </span></td>';
            } else {
                $xx = '<td><span  class="btn btn-danger"><i style="font-size:21px" class="far fa-times-circle"></i> Belum bayar</span></td>';
            }
            $data[] = array(
                "no"=>$no++,
                "nama" => $record->nama,
                "alamat" => $record->alamat,
                "status" => $xx,
            );
        }

        //response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    function ListClient($postData){
        $response = array();

        //value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = 'a.nama';
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = $postData['search']['value'];

        //search
        $searchQuery = "";
        if($searchValue != ''){
            $searchQuery = "(nama like '%".$searchValue."%' or kontak like '%".$searchValue."%' or alamat like '%".$searchValue."%') ";
        }
        $searchQuery2 = "";
        if($searchValue != ''){
            $searchQuery2 = "(a.nama like '%".$searchValue."%' or a.kontak like '%".$searchValue."%' or a.alamat like '%".$searchValue."%')";
        }

        $this->db->select('count(*) as allcount');
        $this->db->from('tb_registrasi as a');
        $this->db->join('tb_paket as b', 'a.speed = b.id_wireless');
        $this->db->where('a.lokasi','TomTimNet');
        $records = $this->db->get()->result();
        $totalRecords = $records[0]->allcount;

        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
        $this->db->where($searchQuery);
//             $this->db->like('nama',$searchValue);
         $this->db->where('lokasi','TomTimNet');
        $records = $this->db->get('tb_registrasi')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        if($searchQuery != '')
        $this->db->select('*');
        $this->db->from('tb_registrasi as a');
        $this->db->join('tb_paket as b', 'a.speed = b.id_wireless');
//        $this->db->or_like('a.nama',$searchValue);
//        $this->db->or_like('a.alamat',$searchValue);
//        $this->db->or_like('a.kontak',$searchValue);
        if($searchValue == true){
            $this->db->where($searchQuery2);
        }
        $this->db->where('a.lokasi','TomTimNet');
        //  $this->db->order_by('tanggal', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        //  $records = $this->db->query("SELECT a.id_cetak,a.nama,b.paket,a.tagihan,a.penerima,a.periode,a.tanggal,a.nomor_struk FROM tb_cetak as a left join tb_paket as b on(a.internet = b.id_wireless) where '$searchQuery' order by '$columnName' asc limit $rowperpage")->result();
        
        $records = $this->db->get()->result();
        $data = array();
        // $no =1;
        foreach($records as $record ){
            if ($record->promo == true) {
                $paket = $record->promo .' ' . $record->mbps;
            }else{
                $paket = $record->paket;
            }
            $data[] = array(
            // "no"=>$no++,
            "nama"=>'<a data-toggle="collapse" href="#collapseExample'.$record->id_registrasi.'" role="button" aria-expanded="false" aria-controls="collapseExample2" style="color:#545559">'. $record->nama.'</a>
            <div class="collapse" id="collapseExample'.$record->id_registrasi.'">
            <div class="card card-body">
            <a style="color: red;font-size:20px" href="delete_pelanggan/' .$record->id_registrasi. '"><i class="fas fa-trash"></i></a>
            </div>
            </div>',
            "status_wa"=> '<span class="btn btn-primary">'.$record->date_wa. '</span>',
            "id"=>$record->id_registrasi,
            "alamat"=>$record->alamat,
            "paket"=> $paket,
            "kontak"=>$record->kontak,
            "email"=>$record->email,
            );
        }

        //response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
    function ListClient2($postData){
        $response = array();

        //value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];
        $columnIndex = $postData['order'][0]['column'];
        $columnName = 'a.nama';
        $columnSortOrder = $postData['order'][0]['dir'];
        $searchValue = $postData['search']['value'];

        //search
        $searchQuery = "";
        if($searchValue != ''){
            $searchQuery = " (nama like '%".$searchValue."%' or kontak like '%".$searchValue."%' or alamat like '%".$searchValue."%') ";
        }
        $searchQuery2 = "";
        if($searchValue != ''){
            $searchQuery2 = " (nama like '%".$searchValue."%' or kontak like '%".$searchValue."%' or alamat like '%".$searchValue."%') ";
        }

        $this->db->select('count(*) as allcount');
        $this->db->from('tb_registrasi as a');
        $this->db->join('tb_paket as b', 'a.speed = b.id_wireless');
        $this->db->where('a.lokasi','Otista');
        $records = $this->db->get()->result();
        $totalRecords = $records[0]->allcount;
        
        //total page
        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
            $this->db->where($searchQuery);
            // $this->db->like('nama',$searchValue);
         $this->db->where('lokasi','Otista');
        $records = $this->db->get('tb_registrasi')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        if($searchQuery != '')
        $this->db->select('*');
        $this->db->from('tb_registrasi as a');
        $this->db->join('tb_paket as b', 'a.speed = b.id_wireless');
//        $this->db->or_like('a.nama',$searchValue);
//        $this->db->or_like('a.alamat',$searchValue);
//        $this->db->or_like('a.kontak',$searchValue);
        if($searchValue == true){
            $this->db->where($searchQuery2);
        }

        $this->db->where('a.lokasi','Otista');
        //  $this->db->order_by('tanggal', 'desc');
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        //  $records = $this->db->query("SELECT a.id_cetak,a.nama,b.paket,a.tagihan,a.penerima,a.periode,a.tanggal,a.nomor_struk FROM tb_cetak as a left join tb_paket as b on(a.internet = b.id_wireless) where '$searchQuery' order by '$columnName' asc limit $rowperpage")->result();
        
        $records = $this->db->get()->result();
        $data = array();
        // $no =1;
        foreach($records as $record ){
            if ($record->promo == true) {
                $paket = $record->promo . ' ' . $record->mbps;
            } else {
                $paket = $record->paket;
            }
            $data[] = array(
            // "no"=>$no++,
            "nama"=>'<a data-toggle="collapse" href="#collapseExample'.$record->id_registrasi.'" role="button" aria-expanded="false" aria-controls="collapseExample2" style="color:#545559">'. $record->nama.'</a>
            <div class="collapse" id="collapseExample'.$record->id_registrasi.'">
            <div class="card card-body">
            <a style="color: red;font-size:20px" href="delete_pelanggan/' .$record->id_registrasi. '"><i class="fas fa-trash"></i></a>
            </div>
            </div>',
            "status_wa"=> '<span class="btn btn-primary">'.$record->date_wa. '</span>',
            "id"=>$record->id_registrasi,
            "alamat"=>$record->alamat,
            "paket"=> $paket,
            "kontak"=>$record->kontak,
            "email"=>$record->email,
            );
        }

        //response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
}

