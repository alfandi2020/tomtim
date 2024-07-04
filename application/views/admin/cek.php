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
                            <div class="card-title">Table Cek Status Pembayaran </div>
                            <h4>Status Pembayaran bulan <span class="badge badge-primary"><?php
                                                                                            $tanggal = time();
                                                                                            $bulan = indonesian_date($tanggal, 'F');
                                                                                            echo $bulan;
                                                                                            echo date('Y')  ?></span> <?php ?></h4>
                            <form method="GET">
                                <div class="row">
                                    <div class="col-xl-3">
                                        <label> Filter Berdasarkan Bulan dan tahun:</label>
                                        <select name="bulan" id="" class="form-control select22">
                                            <option disabled selected>Pilih Bulan</option>
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
                                    <div class="col-xl-3">
                                        <label>Tahun:</label>
                                        <select name="tahun" id="" class="form-control select22">

                                            <option value="<?php echo date('Y') - 2 ?>"><?php echo date('Y') - 2 ?></option>
                                            <option value="<?php echo date('Y') - 1 ?>"><?php echo date('Y') - 1 ?></option>
                                            <option value="<?php echo date('Y') ?>" selected><?php echo date('Y') ?></option>
                                           <option value="<?= date('Y')+1 ?>"><?= date('Y')+1 ?></option>
					</select>
                                    </div>
                                    <div class="col-xl-3">
                                        <p></p>
                                        <button type="submit" class="btn btn-danger"> <i class="fas fa-filter"></i> Sortir</button>
                                        <a href="<?php echo base_url('administrator/cekPembayaran') ?>" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Reset</a>

                                    </div>
                                </div>
                                <h4><b> <?php
                                        if ($this->input->get('bulan')) {
                                            echo "Sortir bulan " . $this->input->get('bulan');
                                        }
                                        ?></b></h4>
                            </form>
                        </div>

                        <?php echo $this->session->flashdata('massage') ?>
                        <form action="<?php echo base_url('administrator/simpanCetak') ?>" method="POST">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-user" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>alamat</th>
                                                <th>Status Pembayaran</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>alamat</th>
                                                <th>Status Pembayaran</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query = $this->db->query("SELECT * FROM tb_registrasi where lokasi='TomTimNet'")->result();
                                            foreach ($query as $row) {
                                            ?>
                                                <tr>

                                                    <td> <?php echo $no++ ?> </td>
                                                    <td> <?php echo $row->nama ?> </td>
                                                    <td> <?php echo $row->alamat ?> </td>
                                                <?php

                                                $get_bulan = $this->input->get('bulan');
                                                $get_thn = $this->input->get('tahun');
                                                $thnn =date('Y');
                                                $tanggal = time();
                                                $bulan = indonesian_date($tanggal, 'F');
                                                if ($get_bulan) {
                                                    $xquery = $this->db->query("SELECT * FROM tb_cetak where id_registrasi='$row->id_registrasi' and periode='$get_bulan' and thn='$get_thn'  ")->num_rows();
                                                } else {
                                                    $xquery = $this->db->query("SELECT * FROM tb_cetak where id_registrasi='$row->id_registrasi' and periode='$bulan' and thn='$thnn'")->num_rows();
                                                }


                                                if ($xquery == true) {
                                                    echo '<td><span  class="btn btn-primary"><i style="font-size:21px" class="fas fa-check"></i> Sudah bayar </span></td>';
                                                } else {
                                                    echo '<td><span  class="btn btn-danger"><i style="font-size:21px" class="far fa-times-circle"></i> Belum bayar</span></td>';
                                                }
                                            }
                                                ?>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <div class="card-title">Table Cek Status Pembayaran Otista </div>
                            <h4>Status Pembayaran bulan <span class="badge badge-primary"><?php
                                                                                            $tanggal = time();
                                                                                            $bulan = indonesian_date($tanggal, 'F');
                                                                                            echo $bulan;
                                                                                            echo date('Y')  ?></span> <?php ?></h4>
                            <form method="GET">
                                <div class="row">
                                    <div class="col-xl-3">
                                        <label> Filter Berdasarkan Bulan dan tahun:</label>
                                        <select name="bulan2" id="" class="form-control select22">
                                            <option disabled selected>Pilih Bulan</option>
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
                                    <div class="col-xl-3">
                                        <label>Tahun:</label>
                                        <select name="tahun2" id="" class="form-control select22">

                                            <option value="<?php echo date('Y') - 2 ?>"><?php echo date('Y') - 2 ?></option>
                                            <option value="<?php echo date('Y') - 1 ?>"><?php echo date('Y') - 1 ?></option>
                                            <option value="<?php echo date('Y') ?>" selected><?php echo date('Y') ?></option>
                                        	<option value="<?= date('Y') + 1 ?>"><?= date('Y') + 1 ?></option>
					</select>
                                    </div>
                                    <div class="col-xl-3">
                                        <p></p>
                                        <button type="submit" class="btn btn-danger"> <i class="fas fa-filter"></i> Sortir</button>
                                        <a href="<?php echo base_url('administrator/cekPembayaran') ?>" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Reset</a>

                                    </div>
                                </div>
                                <h4><b> <?php
                                        if ($this->input->get('bulan2')) {
                                            echo "Sortir bulan " . $this->input->get('bulan2');
                                        }
                                        ?></b></h4>
                            </form>
                        </div>

                        <?php echo $this->session->flashdata('massage') ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-user2" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>alamat</th>
                                                <th>Status Pembayaran</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>alamat</th>
                                                <th>Status Pembayaran</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query = $this->db->query("SELECT * FROM tb_registrasi where lokasi='otista'")->result();
                                            foreach ($query as $row) {
                                            ?>
                                                <tr>

                                                    <td> <?php echo $no++ ?> </td>
                                                    <td> <?php echo $row->nama ?> </td>
                                                    <td> <?php echo $row->alamat ?> </td>
                                                <?php

                                                $get_bulan = $this->input->get('bulan2');
                                                $get_thn = $this->input->get('tahun2');

                                                $tanggal = time();
                                                $bulan = indonesian_date($tanggal, 'F');
                                                if ($get_bulan) {
                                                    $xquery = $this->db->query("SELECT * FROM tb_cetak where id_registrasi='$row->id_registrasi' and periode='$get_bulan' and thn='$get_thn'  ")->num_rows();
                                                } else {
                                                    $xquery = $this->db->query("SELECT * FROM tb_cetak where id_registrasi='$row->id_registrasi' and periode='$bulan' and thn=date('Y')")->num_rows();
                                                }


                                                if ($xquery == true) {
                                                    echo '<td><span  class="btn btn-primary"><i style="font-size:21px" class="fas fa-check"></i> Sudah bayar </span></td>';
                                                } else {
                                                    echo '<td><span  class="btn btn-danger"><i style="font-size:21px" class="far fa-times-circle"></i> Belum bayar</span></td>';
                                                }
                                            }
                                                ?>
                                                </tr>
                                        </tbody>
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

<!-- <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.themekita.com">
                            ThemeKita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Help
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright ml-auto">
                2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
            </div>
        </div>
    </footer>-->
</div>


<script>
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true
    });
    $(document).ready(function() {
        $('.select22').select2();
    });
</script>
