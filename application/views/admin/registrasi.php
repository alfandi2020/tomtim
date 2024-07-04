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
                            <div class="card-title">Form Registrasi Pelanggan</div>
                        </div>
                        <?php echo $this->session->flashdata('massage') ?>
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('Administrator/registrasi2'); ?>">
                                <div class="form-group">
                                    <div class="row">
                                        <h2><b>I. Detail Layanan</b></h2>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Paket Layanan</label>
                                            <select style="border-color: #1269db;" required id="layanan" class="form-control select22" name="paket">
                                                <option>Pilih Paket Layanan</option>
                                                <option value="Wireless">Wireless</option>
                                                <option value="Fiber Optik">Fiber Optik</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Kecepatan</label>
                                            <select name="speed" required class="form-control select22 paketChange">
                                                <option value="0">Pilih kecepatan</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-2">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" id="ceklis_tv" style="color: black;background-color:black" type="checkbox" value="show">
                                                    <span class="form-check-sign">Add on </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row tv_hasil">
                                            <div class="col-xl-4">
                                                <label>Add on 1</label>
                                                <div class="input-group mb-3 ">
                                                    <div class="input-group-prepend">
                                                        <span id="basic-addon1" class="input-group-text">Rp.</span>
                                                        <input class="form-control uang" name="addon1" placeholder="add on">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <label>Add on 2</label>
                                                <div class="input-group mb-3 ">
                                                    <div class="input-group-prepend">
                                                        <span id="basic-addon1" class="input-group-text">Rp.</span>
                                                        <input class="form-control uang" name="addon2" placeholder="add on">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <label>Add on 3</label>
                                                <div class="input-group mb-3 ">
                                                    <div class="input-group-prepend">
                                                        <span id="basic-addon1" class="input-group-text">Rp.</span>
                                                        <input class="form-control uang" name="addon3" placeholder="add on">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <label>Note Add on</label>
                                                <textarea name="noteee" class="form-control" placeholder="router,access point" cols="40" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <h2><b>II. Data Pelanggan</b></h2>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Nama</label>
                                            <input style="border-color: #1269db;" type="text" name="nama" required required class="form-control" placeholder="Nama...">
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Nomor NPWP</label>
                                            <input type="number" style="border-color: #1269db;" name="npwp" class="form-control" placeholder="npwp...">
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Lokasi Pelanggan</label>
                                           <select name="lok_pelanggan" id="" required class="form-control select22">
                                               <option>Pilih Lokasi Pelanggan</option>
                                               <option value="TomTimNet">TomTimNet</option>
                                               <option value="Otista">Otista</option>
                                           </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Identitas Diri</label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="ktp_sim" value="KTP" class="selectgroup-input ktp_sim">
                                                    <span class="selectgroup-button"><i class="far fa-id-card"></i> KTP</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="ktp_sim" value="SIM" class="selectgroup-input ktp_sim">
                                                    <span class="selectgroup-button"><i class="far fa-address-card"></i> SIM</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <label>No.</label>
                                            <input type="number" style="border-color: #1269db;" name="nomor" placeholder="3175xxxxx" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Alamat</label>
                                            <textarea style="border-color: #1269db;" name="alamat" required class="form-control" placeholder="alamat.."></textarea>
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Kodepos</label>
                                            <input type="number" required style="border-color: #1269db;" name="kodepos" required class="form-control" placeholder="13xxxx">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Kontak Handphone / Telp</label>
                                            <input style="border-color: #1269db;" type="number" required name="kontak" placeholder="Handphone / Telp..." class="form-control">
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Email</label>
                                            <input style="border-color: #1269db;" placeholder="input@email.com" name="email" type="email" class="form-control" name="">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label>
                                                <h3><b>Dalam hal ini bertindak untuk dan atas nama : </b></h3>
                                            </label>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="selectgroup selectgroup-secondary selectgroup-pills">
                                                <label class="selectgroup-item">
                                                    <input style="border-color: #1269db;" type="radio" required name="tindakan" value="Pribadi" class="selectgroup-input">
                                                    <span class="selectgroup-button selectgroup-button-icon"><i class="far fa-user"></i> Pribadi</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input style="border-color: #1269db;" type="radio" required name="tindakan" value="Pemberi Kuasa" class="selectgroup-input">
                                                    <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-user-friends"></i> Pemberi Kuasa</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input style="border-color: #1269db;" type="radio" required name="tindakan" value="Perusahaan" class="selectgroup-input">
                                                    <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-building"></i> Perusahaan</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" onclick="salindata(this.form)" name="salin_to" style="color: black;background-color:black" type="checkbox" value="">
                                                    <span class="form-check-sign" style="color: black;">Ceklis Jika Data pelanggan sama...</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Nama Pelanggan</label>
                                            <input style="border-color: #1269db;" class="form-control" placeholder="nama pelanggan..." name="nama_pelanggan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Identitas Diri</label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="sim_ktp_pelanggan" value="KTP" class="selectgroup-input ktp_simChange">
                                                    <span class="selectgroup-button"><i class="far fa-id-card"></i> KTP</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="sim_ktp_pelanggan" value="SIM" class="selectgroup-input ktp_simChange">
                                                    <span class="selectgroup-button selectgroup-button-icon"><i class="far fa-address-card"></i> SIM</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <label>No.</label>
                                            <input type="number" style="border-color: #1269db;" required name="nomor_pelanggan" placeholder="3175xxxxx" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Alamat</label>
                                            <textarea style="border-color: #1269db;" class="form-control" required name="alamat_pelanggan" placeholder="alamat.."></textarea>
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Kodepos</label>
                                            <input type="number" style="border-color: #1269db;" class="form-control" name="kodepos_pelanggan" required placeholder="13xxxx">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Kontak Handphone / Telp</label>
                                            <input style="border-color: #1269db;" type="number" name="kontak_pelanggan" required placeholder="Handphone / Telp..." class="form-control">
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Email</label>
                                            <input style="border-color: #1269db;" placeholder="input@email.com" type="email" class="form-control" name="email_pelanggan">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <h2><b>III. Pembayaran registrasi</b></h2>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label class="form-label d-block">Pembayaran</label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" required name="pembayaran" value="Tunai" class="selectgroup-input">
                                                    <span class="selectgroup-button selectgroup-button-icon"><i class="far fa-money-bill-alt"></i> Tunai</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" required name="pembayaran" value="Transfer" class="selectgroup-input">
                                                    <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-exchange-alt"></i> Transfer</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Tanggal dan Waktu Installasi</label>
                                            <input style="border-color: #1269db;" size="16" type="text" placeholder="Pilih Tanggal" name="tanggal_installasi" class="form-control form_datetime1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <b class="btn btn-warning" style="color: white;" onclick="stepper1.previous()">Back</b>
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
    $.swal("Good job!", "You clicked the button!", {
        icon: "success",
        buttons: {
            confirm: {
                className: 'btn btn-success'
            }
        },
    });
</script>