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
                            <div class="card-title">Form Buat Pembayaran </div>Nomor Struk Pembayaran <b class="badge badge-warning" style="font-size: 15px;"><i class="fas fa-receipt"></i>
                                <?php
                                $s = date('i:s');
                                $m = md5($s);
                                $hasil = intval(substr($m, 0, 6), 16);
                                echo $hasil ?></b>
                        </div>
                        <?php echo $this->session->flashdata('massage') ?>
                        <form action="<?php echo base_url('administrator/simpanCetak') ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Nama Pelanggan</label>
                                            <select required id="plg" name="id_registrasi" class="form-control select22">
                                                <option selected disabled>Pilih Nama Pelanggan</option>
                                                <?php
                                                //$data = $this->db->query("SELECT * FROM tb_cetak")->num_rows();

                                                foreach ($pelanggan2 as $y) {
                                                ?>
                                                    <option value="<?php echo $y->id_registrasi ?>"><?php echo $y->nama . " - " . $y->alamat; ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Speed Paket</label>
                                            <select name="internet" id="harga" class="form-control select22 plgChange">
                                                <option selected disabled>Speed Paket</option>
                                            </select>
                                        </div>
                                        <!-- <div class="col-xl-4">
                                                    <label>Paket Internet</label>
                                                    <select required name="internet" class="form-control select22">
                                                        <option value="Internet Up to 7 Mbps - Rp.260.000">Internet Up to 7 Mbps - Rp.260.000</option>
                                                        <option value="Internet Up to 1w0 Mbps - Rp.315.000">Internet Up to 10 Mbps - Rp.315.000</option>
                                                        <option value="Internet Up to 15 Mbps - Rp.370.000">Internet Up to 15 Mbps - Rp.370.000</option>
                                                        <option value="Internet Up to 20 Mbps - Rp.480.000">Internet Up to 20 Mbps - Rp.480.000</option>
                                                        <option value="Custom">Custom</option>
                                                    </select>
                                                </div>-->

                                        <div class="col-xl-2">
                                            <label>Jumlah Tagihan</label>
                                            <div class="input-group mb-3 ">
                                                <div class="input-group-prepend">
                                                    <span id="basic-addon1" class="input-group-text">Rp.</span>
                                                    <div class="hargaChange">
                                                    </div>
                                                    <input name="tagihan" id="tagihan" style="color: black;" readonly style="border-color: #1269db;" placeholder="000.000" class="form-control hargaChange">
                                                </div>
                                            </div>
                                        </div>

                                        <!--<div class="col-xl-4">
                                                <label>Status Pembayaran</label>
                                                <div class="row">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            <span class="form-check-sign">Sudah di bayar</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            <span class="form-check-sign">Belum di bayar</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Nama Penerima Pembayaran</label>
                                            <input type="text" style="color:black" readonly name="penerima" class="form-control" value="<?php echo $this->session->userdata('nama') ?>">
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Periode Pembayaran</label>
                                            <select name="periode" required class="form-control select22">
                                                <?php $tanggal = time();
                                                $bulan = indonesian_date($tanggal, 'F');
                                                $bulanx = $bulan;
                                                ?>
                                                <option selected value="<?php echo str_replace(' ', '', $bulanx); ?>"><?php echo $bulan; ?></option>
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
                                        <div class="col-xl-2">
                                            <label>Tahun</label>
                                            <select name="thn" class="form-control select22" id="">
                                                <option value="<?php echo date('Y') - 1 ?>"><?php echo date('Y') - 1 ?></option>
                                                <option selected value="<?php echo date('Y') ?>"><?php echo date('Y') ?></option>
                                                <option value="<?php echo date('Y') + 1 ?>"><?php echo date('Y') + 1 ?></option>

                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Add on</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span id="basic-addon1" class="input-group-text">Rp.</span>
                                                    <input name="addon1" readonly style="color: black;" style="border-color: #1269db;" placeholder="000.000" class="form-control plgAddon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Add on</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span id="basic-addon1" class="input-group-text">Rp.</span>
                                                    <input name="addon2" readonly style="color: black;" style="border-color: #1269db;" placeholder="000.000" class="form-control plgAddon2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Add on</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span id="basic-addon1" class="input-group-text">Rp.</span>
                                                    <input name="addon3" readonly style="color: black;" style="border-color: #1269db;" placeholder="000.000" class="form-control plgAddon3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Tanggal Pembayaran</label>
                                            <input name="tanggal" style="color:black" class="form-control form_datetime1" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                    echo date('Y-m-d H:i:s'); ?>">
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Potongan</label>
                                            <input readonly name="diskon" style="color:black" class="form-control diskonx">
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Total Pembayaran</label>
                                            <input readonly style="color:black" class="form-control totalx">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" id="ceklis_diskon" style="color: black;background-color:black" type="checkbox" value="show">
                                                    <span class="form-check-sign">Ceklis untuk membuat diskon </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 diskon_hasil">
                                            <label>Diskon</label>
                                            <div class="input-group-prepend">
                                                <span id="basic-addon1" class="input-group-text">Rp.</span>
                                                <input class="form-control diskon" name="diskon" id="formatNumber" placeholder="10000">
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <input name="nomor_struk" type="hidden" value="<?php
                                                                                $s = date('i:s');
                                                                                $m = md5($s);
                                                                                $hasil = intval(substr($m, 0, 6), 16);
                                                                                echo $hasil ?>">
                                <!--<div class="form-group">
                                    <div class="row">
                                        <input type="hidden" name="thn" value="<?php echo date('Y'); ?>">
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <button class="btn btn-primary"><i class="fas fa-print"></i> Cetak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
</script>