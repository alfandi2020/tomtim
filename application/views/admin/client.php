<!-- Sidebar -->
<?php include 'sidebar.php' ?>
<!-- End Sidebar -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Forms</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Forms</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Basic Form</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Table Client</h4>
                                <a class="btn btn-primary btn-round ml-auto"
                                    href="<?php $key = 'TomTimNet'; echo base_url('administrator/cetak_client/'). $key ?>">
                                    <i class="fa fa-plus"></i>
                                    Export Pelanggan
                                </a>
                            </div>
                        </div>
                        <!-- <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                Excel</span>
                                            <span class="fw-light">
                                                Form
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="large">Export Excel All / Filter</h4>
                                        <form method="POST" action="<?php echo base_url('administrator/excel') ?>">
                                            <div class="row">
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group form-group-default">
                                                        <label><b>Periode Pembayaran</b></label>
                                                        <select name="periode" class="form-control select22" style="width: 200px;">
                                                            <option disabled selected>Pilih Periode</option>
                                                            <option value="Januari">Januari</option>
                                                            <option value="Febuari">Febuari</option>
                                                            <option value="Maret">Maret</option>
                                                            <option value="April">April</option>
                                                            <option value="Mei">Mei</option>
                                                            <option value="Juni">Juni</option>
                                                            <option value="Juli">Juli</option>
                                                            <option value="Agustus">Agustus</option>
                                                            <option value="September">September</option>
                                                            <option value="Oktober">Oktober</option>
                                                            <option value="November">November</option>
                                                            <option value="Desember">Desember</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Pelanggan</label>
                                                        <select name="plg" class="form-control select22" style="width: 200px;">
                                                            <option disabled selected>Pilih Nama Pelanggan</option>
                                                            <?php foreach ($pelanggan as $r) { ?>
                                                                <option value="<?php echo $r->nama ?>"><?php echo $r->nama ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" modal-footer no-bd">
                                                <button type="submit" class="btn btn-primary">Cetak</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                        <p style="text-align: center;">Atau</p>
                                    </div>
                                    <a href="<?php echo base_url('administrator/excel2') ?>" class="btn btn-primary">Export All Pembayaran Pelanggan</a>

                                </div>
                            </div>
                        </div>-->

                        <?php echo $this->session->flashdata('massage') ?>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="table-responsive">
                                    <form method="get">
                                        <div class="row mb-3">

                                            <div class="col-xl-4">

                                                <select class="form-control select2" name="bulan">
                                                    <?php $tanggal = time();
                                                $bulan = indonesian_date($tanggal, 'F');
                                                $bulanx = $bulan;
                                                ?>
                                                    <option value="<?php echo str_replace(' ', '', $bulanx); ?>">
                                                        <?php echo $bulan; ?></option>
                                                    <option disabled>Pilih Periode</option>

                                                    <option value="Januari">Januari</option>
                                                    <option value="Februari">Februari</option>
                                                    <option value="Maret">Maret</option>
                                                    <option value="April">April</option>
                                                    <option value="Mei">Mei</option>
                                                    <option value="Juni">Juni</option>
                                                    <option value="Juli">Juli</option>
                                                    <option value="Agustus">Agustus</option>
                                                    <option value="September">September</option>
                                                    <option value="Oktober">Oktober</option>
                                                    <option value="November">November</option>
                                                    <option value="Desember">Desember</option>
                                                </select>

                                            </div>
                                            <div class="col-xl-4">
                                                <select class="select2 form-control" name="thn">
                                                    <option value="<?= date('Y') - 1 ?>"><?= date('Y') - 1 ?></option>
                                                    <option selected value="<?= date('Y') ?>"><?= date('Y') ?></option>
                                                    <option value="<?= date('Y') + 1 ?>"><?= date('Y') + 1 ?></option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <button type="submit" class="btn btn-primary">Change</button>
                                                <a href="<?= base_url('administrator/client') ?>"
                                                    class="btn btn-warning">Reset</a>
                                            </div>

                                        </div>
                                        <?php
                                            error_reporting(error_reporting() & ~E_NOTICE);
                                        $bln = $_GET['bulan'];
                                        if($bln == true){ ?>
                                        <h4 class="mb-2">Tagihan dikirim bulan <span
                                                style="color:red"><?= $_GET['bulan'] . " " . $_GET['thn']?> </span></h4>
                                        <?php }?>
                                    </form>
                                    <table id="table-client" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>

                                                <th style="width: 150px;">Nama</th>

                                                <th style="width: 150px;">Status Wa Tagihan</th>
                                                <th style="width: 150px;">Action</th>

                                                <th style="width: 250px;">Alamat</th>
                                                <th style="width: 250px;">Paket</th>
                                                <th style="width: 250px;">No tlp</th>
                                                <th style="width: 250px;">Email</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th style="width: 150px;">Nama</th>

                                                <th style="width: 150px;">Status Wa Tagihan</th>
                                                <th style="width: 150px;">Action</th>

                                                <th style="width: 250px;">Alamat</th>
                                                <th style="width: 250px;">Paket</th>
                                                <th style="width: 250px;">No tlp</th>
                                                <th style="width: 250px;">Email</th>
                                            </tr>
                                        </tfoot>
                                        <!-- <tbody>
                                                <?php $no = 1;
                                                foreach ($pelanggan2 as $data) { ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $data->nama ?></td>
                                                        
                                                            <?php
                                                            //$tanggal = time();
                                                            //$bulan = indonesian_date($tanggal, 'F');
                                                            $tanggal = date('d-m-Y H:i:s', strtotime($data->date_wa));

                           
                                                            $xquery = $this->db->query("SELECT * FROM tb_registrasi where id_registrasi='$data->id_registrasi' and date_wa='$tanggal'  ")->num_rows();
                                                            echo '<td><span  class="btn btn-success"><i class="far fa-calendar"></i> ' . $data->date_wa .'</span></td>';

                                                            // if ($xquery == true) {
                                                            //     echo '<td><span  class="btn btn-success">' .$data->date_wa .'</span></td>';
                                                            // } else {
                                                            //     echo '<td><span  class="btn btn-success">' .$data->date_wa .'</span></td>';
                                                            // }
                                                            ?>
                                                        <td>
                                                            <a style="color: coral;font-size:20px" data-toggle="modal" href="#detail_pelanggan<?php echo $data->id_registrasi ?>">
                                                                <i class="icon-information"></i>
                                                            </a>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a style="color: blue;font-size:20px" href="<?php
                                                                                                        $edit = urlencode(base64_encode($data->id_registrasi));
                                                                                                        echo base_url() . 'administrator/edit_pelanggan/' . $edit ?>">
                                                                <i class="icon-note"></i>
                                                            </a>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a style="color: red;font-size:20px" data-toggle="modal" href="#delete_paket<?php echo $data->id_registrasi ?>">
                                                                <i class="icon-trash"></i>
                                                            </a>
                                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a style="color: #00d652;font-size:20px" class="wa-confirm" href="<?php echo base_url() . 'administrator/manual_wa/' . $data->id_registrasi  ?>">
                                                                <i class="fab fa-whatsapp"></i>
                                                            </a>
                                                        </td>
                                                        <td><?php echo $data->alamat ?></td>
                                                        <td><?php echo $data->paket ?></td>
                                                        <td><?php echo $data->kontak ?></td>
                                                        <td><?php echo $data->email ?></td>
                                                        
                                                    </tr>
                                                    <div class="modal fade bd-example-modal-lg" id="detail_pelanggan<?php echo $data->id_registrasi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Data Pelanggan</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xl-5">
                                                                                <label>Paket Layanan</label><br>
                                                                                <select style="border-color: #1269db;" required id="layanan" class="form-control" name="paket">
                                                                                    <option selected value="<?php $data->layanan ?>"><?php echo $data->layanan ?></option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-xl-5">
                                                                                <label>Paket Internet</label><br>
                                                                                <select name="speed" required class="form-control">
                                                                                    <option value="0">Pilih kecepatan</option>
                                                                                    <option selected value="<?php $data->layanan ?>"><?php echo $data->paket ?> </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xl-4">
                                                                                <label>addon</label>
                                                                                <input class="form-control" readonly value="<?php echo $data->addon1 ?>">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label>addon</label>
                                                                                <input class="form-control" readonly value="<?php echo $data->addon2 ?>">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label>addon</label>
                                                                                <input class="form-control" readonly value="<?php echo $data->addon3 ?>">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xl-4">
                                                                                <label>Note addon</label>
                                                                                <textarea class="form-control" rows="3" cols="30" readonly><?php echo $data->noteee ?></textarea>
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label>Diskon</label>
                                                                                
                                                                                 <input class="form-control" readonly value="<?php if ($data->diskon == 0) {
                                                                                                            echo "";
                                                                                                        } else {
                                                                                                            echo "Rp." . number_format($data->diskon, 0, ".", ".");
                                                                                                        } ?>">
                                                                            </div>
                                                                            
                                                                         <?php if ($data->promo) { ?>
                                                                            <div class="col-xl-4">
                                                                                <label>Promo</label>
                                                                                <input class="form-control" rows="3" cols="30" value="<?php echo $data->promo ?>" readonly>
                                                                            </div>
                                                                        <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xl-5">
                                                                                <label>Nama</label>
                                                                                <input class="form-control" style="color: black;" readonly value="<?php echo $data->nama ?>">
                                                                            </div>
                                                                            <div class="col-xl-3">
                                                                                <label>Identitas diri</label>
                                                                                <input class="form-control" style="color: black;" readonly value="<?php echo $data->ktp_sim ?>">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label>No</label>
                                                                                <input class="form-control" style="color: black;" readonly value="<?php echo $data->nomor ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xl-8">
                                                                                <label>Alamat</label>
                                                                                <input class="form-control" style="color: black;" readonly value="<?php echo $data->alamat ?>">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label>Kodepos</label>
                                                                                <input class="form-control" style="color: black;" readonly value="<?php echo $data->kodepos ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xl-8">
                                                                                <label>Tanggal Pemasangan</label>
                                                                                <input class="form-control" style="color: black;" readonly value="<?php echo $data->tanggal_installasi ?>">
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">

                                                                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal fade" id="delete_paket<?php echo $data->id_registrasi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit List Paket</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="form-control">
                                                                        <div class="row">
                                                                            <div class="col-xl-8">
                                                                                <label>Nama Pelanggan</label>
                                                                                <input class="form-control" value="<?php echo $data->nama_pelanggan ?>">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label>Alamat</label>
                                                                                <input class="form-control" value="<?php echo $data->alamat_pelanggan ?>">
                                                                            </div>
                                                                            <div class="col-xl-5">
                                                                                <label>Email</label>
                                                                                <input class="form-control" value="<?php echo $data->email_pelanggan ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a data-dismiss="modal" class="btn btn-danger" href="">Close</a>
                                                                    <a class="btn btn-primary" href="<?php echo base_url() . 'administrator/delete_pelanggan/' . $data->id_registrasi ?>">Delete <i class="icon-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </tbody> -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Table Client Otista</h4>
                                <a class="btn btn-primary btn-round ml-auto"
                                    href="<?php $key = 'otista'; echo base_url('administrator/cetak_client/'). $key ?>">
                                    <i class="fa fa-plus"></i>
                                    Export Pelanggan
                                </a>
                            </div>
                        </div>
                        <!-- <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                Excel</span>
                                            <span class="fw-light">
                                                Form
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="large">Export Excel All / Filter</h4>
                                        <form method="POST" action="<?php echo base_url('administrator/excel') ?>">
                                            <div class="row">
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group form-group-default">
                                                        <label><b>Periode Pembayaran</b></label>
                                                        <select name="periode" class="form-control select22" style="width: 200px;">
                                                            <option disabled selected>Pilih Periode</option>
                                                            <option value="Januari">Januari</option>
                                                            <option value="Febuari">Febuari</option>
                                                            <option value="Maret">Maret</option>
                                                            <option value="April">April</option>
                                                            <option value="Mei">Mei</option>
                                                            <option value="Juni">Juni</option>
                                                            <option value="Juli">Juli</option>
                                                            <option value="Agustus">Agustus</option>
                                                            <option value="September">September</option>
                                                            <option value="Oktober">Oktober</option>
                                                            <option value="November">November</option>
                                                            <option value="Desember">Desember</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Pelanggan</label>
                                                        <select name="plg" class="form-control select22" style="width: 200px;">
                                                            <option disabled selected>Pilih Nama Pelanggan</option>
                                                            <?php foreach ($pelanggan as $r) { ?>
                                                                <option value="<?php echo $r->nama ?>"><?php echo $r->nama ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" modal-footer no-bd">
                                                <button type="submit" class="btn btn-primary">Cetak</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                        <p style="text-align: center;">Atau</p>
                                    </div>
                                    <a href="<?php echo base_url('administrator/excel2') ?>" class="btn btn-primary">Export All Pembayaran Pelanggan</a>

                                </div>
                            </div>
                        </div>-->

                        <?php echo $this->session->flashdata('massage') ?>
                        
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="table-responsive">
                                        <form method="get">
                                            <div class="row mb-3">

                                                <div class="col-xl-4">

                                                    <select class="form-control select2" name="bulan">
                                                        <?php $tanggal = time();
                                                    $bulan = indonesian_date($tanggal, 'F');
                                                    $bulanx = $bulan;
                                                    ?>
                                                        <option value="<?php echo str_replace(' ', '', $bulanx); ?>">
                                                            <?php echo $bulan; ?></option>
                                                        <option disabled>Pilih Periode</option>

                                                        <option value="Januari">Januari</option>
                                                        <option value="Februari">Februari</option>
                                                        <option value="Maret">Maret</option>
                                                        <option value="April">April</option>
                                                        <option value="Mei">Mei</option>
                                                        <option value="Juni">Juni</option>
                                                        <option value="Juli">Juli</option>
                                                        <option value="Agustus">Agustus</option>
                                                        <option value="September">September</option>
                                                        <option value="Oktober">Oktober</option>
                                                        <option value="November">November</option>
                                                        <option value="Desember">Desember</option>
                                                    </select>

                                                </div>
                                                <div class="col-xl-4">
                                                    <select class="select2 form-control" name="thn">
                                                        <option value="<?= date('Y') - 1 ?>"><?= date('Y') - 1 ?>
                                                        </option>
                                                        <option selected value="<?= date('Y') ?>"><?= date('Y') ?>
                                                        </option>
                                                        <option value="<?= date('Y') + 1 ?>"><?= date('Y') + 1 ?>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-4">
                                                    <button type="submit" class="btn btn-primary">Change</button>
                                                    <a href="<?= base_url('administrator/client') ?>"
                                                        class="btn btn-warning">Reset</a>
                                                </div>

                                            </div>
                                            <?php
                                error_reporting(error_reporting() & ~E_NOTICE);
                                $bln = $_GET['bulan'];
                                if($bln == true){ ?>
                                                                            <h4 class="mb-2">Tagihan dikirim bulan <span
                                                    style="color:red"><?= $_GET['bulan'] . " " . $_GET['thn']?> </span>
                                            </h4>
                                            <?php }?>
                                        </form>
                                        <table id="table-client2" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>

                                                    <th style="width: 150px;">Nama</th>

                                                    <th style="width: 150px;">Status Wa Tagihan</th>
                                                    <th style="width: 150px;">Action</th>

                                                    <th style="width: 250px;">Alamat</th>
                                                    <th style="width: 250px;">Paket</th>
                                                    <th style="width: 250px;">No tlp</th>
                                                    <th style="width: 250px;">Email</th>

                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th style="width: 150px;">Nama</th>

                                                    <th style="width: 150px;">Status Wa Tagihan</th>
                                                    <th style="width: 150px;">Action</th>

                                                    <th style="width: 250px;">Alamat</th>
                                                    <th style="width: 250px;">Paket</th>
                                                    <th style="width: 250px;">No tlp</th>
                                                    <th style="width: 250px;">Email</th>
                                                </tr>
                                            </tfoot>
                                            <!-- <tbody>
                                                <?php $no = 1;
                                                foreach ($pelanggan3 as $data) { ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $data->nama ?></td>
                                                        
                                                            <?php
                                                            //$tanggal = time();
                                                            //$bulan = indonesian_date($tanggal, 'F');
                                                            $tanggal = date('d-m-Y H:i:s', strtotime($data->date_wa));

                           
                                                            $xquery = $this->db->query("SELECT * FROM tb_registrasi where id_registrasi='$data->id_registrasi' and date_wa='$tanggal'  ")->num_rows();
                                                            echo '<td><span  class="btn btn-success"><i class="far fa-calendar"></i> ' . $data->date_wa .'</span></td>';

                                                            // if ($xquery == true) {
                                                            //     echo '<td><span  class="btn btn-success">' .$data->date_wa .'</span></td>';
                                                            // } else {
                                                            //     echo '<td><span  class="btn btn-success">' .$data->date_wa .'</span></td>';
                                                            // }
                                                            ?>
                                                        <td>
                                                            <a style="color: coral;font-size:20px" data-toggle="modal" href="#detail_pelanggan<?php echo $data->id_registrasi ?>">
                                                                <i class="icon-information"></i>
                                                            </a>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a style="color: blue;font-size:20px" href="<?php
                                                                                                        $edit = urlencode(base64_encode($data->id_registrasi));
                                                                                                        echo base_url() . 'administrator/edit_pelanggan/' . $edit ?>">
                                                                <i class="icon-note"></i>
                                                            </a>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a style="color: red;font-size:20px" data-toggle="modal" href="#delete_paket<?php echo $data->id_registrasi ?>">
                                                                <i class="icon-trash"></i>
                                                            </a>
                                                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a style="color: #00d652;font-size:20px" class="wa-confirm" href="<?php echo base_url() . 'administrator/manual_wa/' . $data->id_registrasi . '/'.$_GET['bulan'] .'/'. $_GET['thn'] ?>">
                                                                <i class="fab fa-whatsapp"></i>
                                                            </a>
                                                        </td>
                                                        <td><?php echo $data->alamat ?></td>
                                                        <td><?php echo $data->paket ?></td>
                                                        <td><?php echo $data->kontak ?></td>
                                                        <td><?php echo $data->email ?></td>
                                                        
                                                    </tr>
                                                    <div class="modal fade bd-example-modal-lg" id="detail_pelanggan<?php echo $data->id_registrasi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Data Pelanggan</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xl-5">
                                                                                <label>Paket Layanan</label><br>
                                                                                <select style="border-color: #1269db;" required id="layanan" class="form-control" name="paket">
                                                                                    <option selected value="<?php $data->layanan ?>"><?php echo $data->layanan ?></option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-xl-5">
                                                                                <label>Paket Internet</label><br>
                                                                                <select name="speed" required class="form-control">
                                                                                    <option value="0">Pilih kecepatan</option>
                                                                                    <option selected value="<?php $data->layanan ?>"><?php echo $data->paket ?> </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xl-4">
                                                                                <label>addon</label>
                                                                                <input class="form-control" readonly value="<?php echo $data->addon1 ?>">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label>addon</label>
                                                                                <input class="form-control" readonly value="<?php echo $data->addon2 ?>">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label>addon</label>
                                                                                <input class="form-control" readonly value="<?php echo $data->addon3 ?>">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xl-4">
                                                                                <label>Note addon</label>
                                                                                <textarea class="form-control" rows="3" cols="30" readonly><?php echo $data->noteee ?></textarea>
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label>Diskon</label>
                                                                                
                                                                                 <input class="form-control" readonly value="<?php if ($data->diskon == 0) {
                                                                                                            echo "";
                                                                                                        } else {
                                                                                                            echo "Rp." . number_format($data->diskon, 0, ".", ".");
                                                                                                        } ?>">
                                                                            </div>
                                                                            
                                                                         <?php if ($data->promo) { ?>
                                                                            <div class="col-xl-4">
                                                                                <label>Promo</label>
                                                                                <input class="form-control" rows="3" cols="30" value="<?php echo $data->promo ?>" readonly>
                                                                            </div>
                                                                        <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xl-5">
                                                                                <label>Nama</label>
                                                                                <input class="form-control" style="color: black;" readonly value="<?php echo $data->nama ?>">
                                                                            </div>
                                                                            <div class="col-xl-3">
                                                                                <label>Identitas diri</label>
                                                                                <input class="form-control" style="color: black;" readonly value="<?php echo $data->ktp_sim ?>">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label>No</label>
                                                                                <input class="form-control" style="color: black;" readonly value="<?php echo $data->nomor ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xl-8">
                                                                                <label>Alamat</label>
                                                                                <input class="form-control" style="color: black;" readonly value="<?php echo $data->alamat ?>">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label>Kodepos</label>
                                                                                <input class="form-control" style="color: black;" readonly value="<?php echo $data->kodepos ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xl-8">
                                                                                <label>Tanggal Pemasangan</label>
                                                                                <input class="form-control" style="color: black;" readonly value="<?php echo $data->tanggal_installasi ?>">
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">

                                                                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal fade" id="delete_paket<?php echo $data->id_registrasi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit List Paket</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="form-control">
                                                                        <div class="row">
                                                                            <div class="col-xl-8">
                                                                                <label>Nama Pelanggan</label>
                                                                                <input class="form-control" value="<?php echo $data->nama_pelanggan ?>">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label>Alamat</label>
                                                                                <input class="form-control" value="<?php echo $data->alamat_pelanggan ?>">
                                                                            </div>
                                                                            <div class="col-xl-5">
                                                                                <label>Email</label>
                                                                                <input class="form-control" value="<?php echo $data->email_pelanggan ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a data-dismiss="modal" class="btn btn-danger" href="">Close</a>
                                                                    <a class="btn btn-primary" href="<?php echo base_url() . 'administrator/delete_pelanggan/' . $data->id_registrasi ?>">Delete <i class="icon-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </tbody> -->
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>