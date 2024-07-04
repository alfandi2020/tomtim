<!-- Sidebar -->
<?php include 'sidebar.php' ?>
<!-- End Sidebar -->

<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h1 class="text-white pb-2 fw-bold">Dashboard</h1>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="<?php echo base_url('administrator/registrasi') ?>" class="btn btn-white btn-border btn-round mr-2">Registrasi Client</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-8 col-md-6">
                                    <div class="card card-stats card-success card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="icon-big text-center">
                                                        <i class="flaticon-interface-6"></i>
                                                    </div>
                                                </div>
                                                <?php
                                                $hari = array(
                                                    1 =>    'Senin',

                                                    'Selasa',

                                                    'Rabu',

                                                    'Kamis',

                                                    'Jumat',

                                                    'Sabtu',

                                                    'Minggu'

                                                );
                                                //$hari[date('N')], "," . date('d-F-Y');
                                                ?>
                                                <div class="col-10 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Pemasukan Bulan ini <span class="badge badge-primary"> <?php $tanggal = time();
                                                                                                                                        echo indonesian_date($tanggal, 'F Y');  ?></span></p>
                                                        <?php
                                                        date_default_timezone_set('Asia/Jakarta');
                                                        $tanggal = time();
                                                        $thnx = date('Y');

                                                        $bulan = indonesian_date($tanggal, 'F');
                                                          $keuangan = $this->db->query("SELECT sum(a.tagihan) + sum(a.addon1) + sum(a.addon2) + sum(a.addon3) - sum(a.tagihan_diskon) as total,periode,b.lokasi from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi = b.id_registrasi) where periode='$bulan' and thn='$thnx' and lokasi='TomTimNet'")->result();
                                                            foreach ($keuangan as $row) {
                                                                $total = number_format($row->total, 0, '.', '.'); ?>
                                                        <?php if ($this->session->userdata('level') == 'admin') { ?>
                                                            <h4 class="card-title"><?php echo "Rp. " . $total ?></h4>
                                                            <?php } else { ?>
                                                            <h4 class="card-title">Permission user</h4>
                                                            <?php } ?>
                                                        <?php
                                                            } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-md-6">
                                    <div class="card card-stats card-primary card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="icon-big text-center">
                                                        <i class="flaticon-users"></i>
                                                    </div>
                                                </div>

                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Pelanggan yang sudah bayar Bulan ini <span class="badge badge-success"> <?php

                                                                                                                                                            $tanggal = time();
                                                                                                                                                            echo indonesian_date($tanggal, 'F Y');  ?></span></p>

                                                        <?php
                                                        date_default_timezone_set('Asia/Jakarta');

                                                        $tanggal2 = time();
                                                        $thnx = date('Y');
                                                        $bulan2 = indonesian_date($tanggal2, 'F');
                                                        $c = $this->db->query("SELECT * from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi = b.id_registrasi) where a.periode='$bulan2' and a.thn='$thnx' and b.lokasi='TomTimNet' ")->num_rows();
                                                        ?>
                                                        <h4 class="card-title count"><?php echo $c;
                                                                                        ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-md-6">
                                    <div class="card card-stats card-primary card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="icon-big text-center">
                                                        <i class="flaticon-users"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Total Pelanggan</p>
                                                        <h4 class="card-title"><a style="color: aliceblue;" href="<?php echo base_url('administrator/client') ?>"><strong class="count"> <?php echo $pelanggan ?></a></strong></h4>
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
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <h2>Otista - Jakarta Timur</h2>
                            <div class="row">

                                <div class="col-sm-8 col-md-6">
                                    <div class="card card-stats card-success card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="icon-big text-center">
                                                        <i class="flaticon-interface-6"></i>
                                                    </div>
                                                </div>
                                                <?php
                                                $hari = array(
                                                    1 =>    'Senin',

                                                    'Selasa',

                                                    'Rabu',

                                                    'Kamis',

                                                    'Jumat',

                                                    'Sabtu',

                                                    'Minggu'

                                                );
                                                //$hari[date('N')], "," . date('d-F-Y');
                                                ?>
                                                <div class="col-10 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Pemasukan Bulan ini  <span class="badge badge-primary"> <?php $tanggal = time();
                                                                                                                                        echo indonesian_date($tanggal, 'F Y');  ?></span></p>
                                                        <?php
                                                        date_default_timezone_set('Asia/Jakarta');
                                                        $tanggal = time();
                                                        $thnx = date('Y');

                                                        $bulan = indonesian_date($tanggal, 'F');
                                                          $keuangan = $this->db->query("SELECT sum(a.tagihan) + sum(a.addon1) + sum(a.addon2) + sum(a.addon3) - sum(a.tagihan_diskon) as total,periode,b.lokasi from tb_cetak as a left join tb_registrasi as b on(a.id_registrasi = b.id_registrasi) where periode='$bulan' and thn='$thnx' and lokasi='otista'")->result();
                                                            foreach ($keuangan as $row) {
                                                                $total = number_format($row->total, 0, '.', '.'); ?>
                                                        <?php if ($this->session->userdata('level') == 'admin') { ?>
                                                            <h4 class="card-title"><?php echo "Rp. " . $total ?></h4>
                                                            <?php } else { ?>
                                                            <h4 class="card-title">Permission user</h4>
                                                            <?php } ?>
                                                        <?php
                                                            } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-md-6">
                                    <div class="card card-stats card-primary card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="icon-big text-center">
                                                        <i class="flaticon-users"></i>
                                                    </div>
                                                </div>

                                                <div class="col-8 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Pelanggan yang sudah bayar Bulan ini <span class="badge badge-success"> <?php

                                                                                                                                                            $tanggal = time();
                                                                                                                                                            echo indonesian_date($tanggal, 'F Y');  ?></span></p>

                                                        <?php
                                                        date_default_timezone_set('Asia/Jakarta');

                                                        $tanggal2 = time();
                                                        $thnx = date('Y');
                                                        $bulan2 = indonesian_date($tanggal2, 'F');
                                                        $c = $this->db->query("SELECT * from tb_cetak as a left join tb_registrasi as b on (a.id_registrasi = b.id_registrasi) where periode='$bulan2' and thn='$thnx' and lokasi='otista'")->num_rows();
                                                        ?>
                                                        <h4 class="card-title count"><?php echo $c;
                                                                                        ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-md-6">
                                    <div class="card card-stats card-primary card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="icon-big text-center">
                                                        <i class="flaticon-users"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Total Pelanggan</p>
                                                        <h4 class="card-title"><a style="color: aliceblue;" href="<?php echo base_url('administrator/client') ?>"><strong class="count"> <?php
                                                        $xx = $this->db->query("SELECT * FROM tb_registrasi where lokasi='otista'")->num_rows();
                                                        echo $xx; ?></a></strong></h4>
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
                <!-- <div class="col-md-6">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row card-tools-still-right">
                                <h4 class="card-title">Interface Bridge Lokal</h4>

                            </div>
                        </div>
                        <div class="card-body">
                            <div id="container" class="chart-container"></div>
                            <input type=hidden name="interface" id="interface" type="text" />
                            <div id="traffic"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Interface Ether-2</div>
                            <div class="chart-container">
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="col-md-6">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Total Pemasukan Tahun <?php echo date('Y') ?></div>
                            <div class="chart-container">
                             
        					<?php if ($this->session->userdata('level') == 'admin') { ?>
                                <canvas id="barChart"></canvas>
                                <?php } else { ?>
                           	 <h2>Permession user</h2>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Total Pemasangan Tahun <?php echo date('Y') ?></div>
                            <div class="chart-container">
                            
                                <canvas id="barChart_client"></canvas>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">

                </ul>
            </nav>
            <div class="copyright ml-auto">
                &copy; 2020
            </div>
        </div>
    </footer>
</div>

<!-- Custom template | don't include it in your project! -->
<div class="custom-template">
    <div class="title">Settings</div>
    <div class="custom-content">
        <div class="switcher">
            <div class="switch-block">
                <h4>Logo Header</h4>
                <div class="btnSwitch">
                    <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
                    <button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                    <br />
                    <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                    <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                </div>
            </div>
            <div class="switch-block">
                <h4>Navbar Header</h4>
                <div class="btnSwitch">
                    <button type="button" class="changeTopBarColor" data-color="dark"></button>
                    <button type="button" class="changeTopBarColor" data-color="blue"></button>
                    <button type="button" class="changeTopBarColor" data-color="purple"></button>
                    <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                    <button type="button" class="changeTopBarColor" data-color="green"></button>
                    <button type="button" class="changeTopBarColor" data-color="orange"></button>
                    <button type="button" class="changeTopBarColor" data-color="red"></button>
                    <button type="button" class="changeTopBarColor" data-color="white"></button>
                    <br />
                    <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                    <button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
                    <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                    <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                    <button type="button" class="changeTopBarColor" data-color="green2"></button>
                    <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                    <button type="button" class="changeTopBarColor" data-color="red2"></button>
                </div>
            </div>
            <div class="switch-block">
                <h4>Sidebar</h4>
                <div class="btnSwitch">
                    <button type="button" class="selected changeSideBarColor" data-color="white"></button>
                    <button type="button" class="changeSideBarColor" data-color="dark"></button>
                    <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                </div>
            </div>
            <div class="switch-block">
                <h4>Background</h4>
                <div class="btnSwitch">
                    <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                    <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                    <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                    <button type="button" class="changeBackgroundColor" data-color="dark"></button>
                </div>
            </div>
        </div>
    </div>
    <div class="custom-toggle">
        <i class="flaticon-settings"></i>
    </div>
</div>
<!-- End Custom template -->
</div>