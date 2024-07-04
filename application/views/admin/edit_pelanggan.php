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

                            </div>
                        </div>

                        <?php echo $this->session->flashdata('massage') ?>

                        <?php foreach ($edit as $x) { ?>
                            <form action="<?php echo base_url() . 'administrator/edit_pelanggan_action/' . $x->id_registrasi ?>" method="POST">
                                <div class="card-body">
                                    <h4>I. Detail Layanan</h4>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label>Paket Layanan</label>
                                                <select style="border-color: #1269db;" required id="layanan" class="form-control select22" name="paket">
                                                    <option>Pilih Paket Layanan</option>
                                                    <?php if ($x->layanan == 'Wireless') {
                                                        $layanan = "<option value='Fiber Optik'>Fiber Optik</option>";
                                                    } else if ($x->layanan == 'Fiber Optik') {
                                                        $layanan = "<option  value='Wireless'>Wireless</option>";
                                                    }
                                                    echo $layanan;

                                                    if ($x->layanan == 'Wireless') {
                                                        $layanan2 = $x->layanan;
                                                    } elseif ($x->layanan == 'Fiber Optik') {
                                                        $layanan2 = $x->layanan;
                                                    }
                                                    ?>
                                                    <option selected value="<?php echo $layanan2 ?>"><?php echo $layanan2; ?></option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label>Kecepatan</label>
                                                <select name="speed" required class="form-control select22 paketChange">
                                                    <option value="0">Pilih kecepatan</option>
                                                    <option value="<?php echo $x->id_wireless ?>" selected><?php echo $x->paket ?></option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label>Addon</label>
                                                <input class="form-control uang" name="addon1" value="<?php if ($x->addon1 == true) {
                                                                                                            echo number_format($x->addon1, 0, ".", ".");
                                                                                                        } ?>">
                                            </div>
                                            <div class="col-xl-4">
                                                <label>Addon</label>
                                                <input class="form-control uang" name="addon2" value="<?php
                                                                                                        if ($x->addon2 == true) {
                                                                                                            echo number_format($x->addon2, 0, ".", ".");
                                                                                                        }

                                                                                                        ?>">
                                            </div>
                                            <div class="col-xl-4">
                                                <label>Addon</label>
                                                <input class="form-control uang" name="addon" value="<?php if ($x->addon3 == true) {
                                                                                                            echo number_format($x->addon3, 0, ".", ".");
                                                                                                        } ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label>Note Addon</label>
                                                <textarea name="noteee" class="form-control" id="" cols="30" rows="4"><?php echo $x->noteee ?></textarea>
                                            </div>
                                            <div class="col-xl-4">
                                                <label>Diskon</label>
                                                <input type="text" class="form-control uang" name="diskon" value="<?php if ($x->diskon == false) {
                                                    echo "";
                                                }else{
                                                    echo $x->diskon;
                                                } ?>">                                                
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4>II. Data Pelanggan</h4>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label for="">Nama</label>
                                                <input class="form-control" required name="nama" type="text" value="<?php echo $x->nama_pelanggan ?>">
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="">Identitas diri</label>

                                                <div class="row">
                                                    <?php
                                                    if ($x->ktp_sim == 'KTP') {
                                                        $identitas =
                                                            "<div class='form-check'>
                                                                 <label class='form-check-label'> 
                                                                    <input class='form-check-input' value='KTP' name='ktp_sim' checked type='checkbox'>
                                                                    <span class='form-check-sign'>KTP</span>
                                                                 </label>
                                                                </div>";
                                                    } elseif ($x->ktp_sim == 'SIM') {
                                                        $identitas = "<div class='form-check'>
                                                                <label class='form-check-label'> 
                                                                   <input class='form-check-input' name='ktp_sim' checked type='checkbox' value='SIM'>
                                                                   <span class='form-check-sign'>SIM</span>
                                                                </label>
                                                               </div>";
                                                    }
                                                    echo $identitas;
                                                    if ($x->ktp_sim == 'KTP') {
                                                        $identitas2 = "SIM";
                                                    } else if ($x->ktp_sim == 'SIM') {
                                                        $identitas2 = "KTP";
                                                    }
                                                    ?>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="ktp_sim" type="checkbox" value="<?php echo $identitas2 ?>">
                                                            <span class="form-check-sign"><?php echo $identitas2 ?></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="">Nomor</label>
                                                <input class="form-control" type="text" name="nomor" value="<?php echo $x->nomor ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" class="form-control" value="<?php echo $x->alamat ?>">
                                            </div>
                                            <div class="col-xl-4 ">
                                                <label>Kodepos</label>
                                                <input type="text" name="kodepos" class="form-control" value="<?php echo $x->kodepos ?>">
                                            </div>
                                            <div class="col-xl-4">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" value="<?php echo $x->email ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label>Kontak Tlp / Handphone</label>
                                                <input type="number" name="kontak" class="form-control" value="<?php echo $x->kontak ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <h3>Dalam hal ini bertindak untuk dan atas nama :</h3>
                                                <p style="color: red;margin-top:-12px;">* Pilih salah satu tindakan !</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="row">
                                                    <?php
                                                    if ($x->tindakan == 'Pribadi') {
                                                        $tindakan =
                                                            "<div class='form-check'>
                                                                 <label class='form-check-label'> 
                                                                    <input class='form-check-input' name='tindakan' checked type='checkbox' value='Pribadi'>
                                                                    <span class='form-check-sign'>Pribadi</span>
                                                                 </label>
                                                                </div>";
                                                    } elseif ($x->tindakan == 'Pemberi Kuasa') {
                                                        $tindakan = "<div class='form-check'>
                                                                <label class='form-check-label'> 
                                                                   <input class='form-check-input' name='tindakan' checked type='checkbox' value='Pemberi Kuasa'>
                                                                   <span class='form-check-sign'>Pemberi Kuasa</span>
                                                                </label>
                                                               </div>";
                                                    } elseif ($x->tindakan == 'Perusahaan') {
                                                        $tindakan = "<div class='form-check'>
                                                                <label class='form-check-label'> 
                                                                   <input class='form-check-input' name='tindakan' checked type='checkbox' value='Perusahaan'>
                                                                   <span class='form-check-sign'>Perusahaan</span>
                                                                </label>
                                                               </div>";
                                                    }
                                                    echo $tindakan;
                                                    if ($x->tindakan == 'Pribadi') {
                                                        $tindakan3 =  "<div class='form-check'>
                                                                <label class='form-check-label'> 
                                                                   <input class='form-check-input' name='tindakan' type='checkbox' value='Pemberi Kuasa'>
                                                                   <span class='form-check-sign'>Pemberi Kuasa</span>
                                                                </label>
                                                               </div>
                                                                <div class='form-check'>
                                                                <label class='form-check-label'> 
                                                                   <input class='form-check-input' name='tindakan' type='checkbox' value='Perusahaan'>
                                                                   <span class='form-check-sign'>Perusahaan</span>
                                                                </label>
                                                               </div>";
                                                    } else if ($x->tindakan == 'Pemberi Kuasa') {
                                                        $tindakan3 = "<div class='form-check'>
                                                                <label class='form-check-label'> 
                                                                   <input class='form-check-input' name='tindakan' type='checkbox' value='Pribadi'>
                                                                   <span class='form-check-sign'>Pribadi</span>
                                                                </label>
                                                               </div>
                                                                <div class='form-check'>
                                                                <label class='form-check-label'> 
                                                                   <input class='form-check-input' name='tindakan' type='checkbox' value='Perusahaan'>
                                                                   <span class='form-check-sign'>Perusahaan</span>
                                                                </label>
                                                               </div>";
                                                    } elseif ($x->tindakan == 'Perusahaan') {
                                                        $tindakan3 = "<div class='form-check'>
                                                                <label class='form-check-label'> 
                                                                   <input class='form-check-input' name='tindakan' type='checkbox' value='Pribadi'>
                                                                   <span class='form-check-sign'>Pribadi</span>
                                                                </label>
                                                               </div>
                                                                <div class='form-check'>
                                                                <label class='form-check-label'> 
                                                                   <input class='form-check-input' name='tindakan' type='checkbox' value='Pemberi Kuasa'>
                                                                   <span class='form-check-sign'>Pemberi Kuasa</span>
                                                                </label>
                                                               </div>";
                                                    }
                                                    echo $tindakan3;
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label> Nama Pelanggan</label>
                                                <input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $x->nama_pelanggan ?>">
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="">Identitas diri</label>

                                                <div class="row">
                                                    <?php
                                                    if ($x->ktp_sim_pelanggan == 'KTP') {
                                                        $identitasss =
                                                            "<div class='form-check'>
                                                                 <label class='form-check-label'> 
                                                                    <input class='form-check-input' name='ktp_sim_pelanggan' checked type='checkbox' value='KTP'>
                                                                    <span class='form-check-sign'>KTP</span>
                                                                 </label>
                                                                </div>";
                                                    } elseif ($x->ktp_sim_pelanggan == 'SIM') {
                                                        $identitasss = "<div class='form-check'>
                                                                <label class='form-check-label'> 
                                                                   <input class='form-check-input' name='ktp_sim_pelanggan' checked type='checkbox' value='SIM'>
                                                                   <span class='form-check-sign'>SIM</span>
                                                                </label>
                                                               </div>";
                                                    }
                                                    echo $identitasss;
                                                    if ($x->ktp_sim_pelanggan == 'KTP') {
                                                        $identitass = "SIM";
                                                    } else if ($x->ktp_sim_pelanggan == 'SIM') {
                                                        $identitass = "KTP";
                                                    }
                                                    ?>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="ktp_sim_pelanggan" type="checkbox" value="<?php echo $identitass ?>">
                                                            <span class="form-check-sign"><?php echo $identitass ?></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="">Nomor</label>
                                                <input class="form-control" type="text" required name="nomor_pelanggan" value="<?php echo $x->nomor_pelanggan ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label>Alamat Pelanggan</label>
                                                <input type="text" class="form-control" required name="alamat_pelanggan" value="<?php echo $x->alamat_pelanggan ?>">
                                            </div>
                                            <div class="col-xl-4">
                                                <label>Kodepos</label>
                                                <input type="text" class="form-control" required name="kodepos_pelanggan" value="<?php echo $x->kodepos_pelanggan ?>">
                                            </div>
                                            <div class="col-xl-4">
                                                <label>Email Pelanggan</label>
                                                <input type="text" class="form-control" name="email_pelanggan" value="<?php echo $x->email_pelanggan ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label>Kontak Pelanggan</label>
                                                <input type="text" class="form-control" required name="kontak_pelanggan" value="<?php echo $x->kontak_pelanggan ?>">
                                            </div>
                                            <div class="col-xl-4">
                                                <label>NPWP </label>
                                                <input type="text" class="form-control" name="npwp" value="<?php echo $x->npwp ?>">
                                                <p style="color: red;font-size:12px">* Jika ada</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <label>Registrasi Pelanggan</label>
                                                <input type="text" class="form-control" disabled value="<?php echo $x->tanggal_installasi ?>">
                                            </div>
                                           
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <button type="button" onclick="window.history.back()" class="btn btn-warning">Back</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>