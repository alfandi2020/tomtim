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
                                <h4 class="card-title">Table Cetak Pembayaran</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Export Excel
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Tahun</label>
                                                        <select name="thn" class="form-control select22" style="width: 200px;">
                                                            <option value="<?= date('Y') - 1 ?>"><?php echo date('Y') - 1 ?></option>
                                                            <option selected value="<?= date('Y') ?>"><?php echo date('Y') ?></option>
                                                            <option value="<?= date('Y') + 1  ?>"><?php echo date('Y') + 1 ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <!-- <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Pelanggan</label>
                                                        <select name="plg" class="form-control select22" style="width: 200px;">
                                                            <option disabled selected>Pilih Nama Pelanggan</option>
                                                            <?php foreach ($pelanggann as $r) { ?>
                                                                <option value="<?php echo $r->nama ?>"><?php echo $r->nama ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div> -->
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Lokasi Pelanggan</label>
                                                        <select name="lokasi" class="form-control select22" style="width: 200px;">
                                                            <option value="TomTimNet">TomTimNet</option>
                                                            <option value="otista">otista</option>
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
                        </div>

                        <?php echo $this->session->flashdata('massage') ?>
                        <form action="<?php echo base_url('administrator/simpanCetak') ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="table-responsive">
                                        <table id="table-report" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th style="width: 150px;">Nama</th>
                                                    <th style="width: 250px;">Paket internet</th>
                                                    <th style="width: 100px;">Tagihan</th>
                                                    <th style="width: 150px;">Penerima Pembayaran</th>
                                                    <th style="width: 100px;">Periode</th>
                                                    <th style="width: 160px;">Tanggal Pembayaran</th>
                                                    <th style="width: 100px;">No Struk</th>
                                                    <th style="width: 150px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th style="width: 150px;">Nama</th>
                                                    <th style="width: 250px;">Paket internet</th>
                                                    <th style="width: 100px;">Tagihan</th>
                                                    <th style="width: 150px;">Penerima Pembayaran</th>
                                                    <th style="width: 100px;">Periode</th>
                                                    <th style="width: 160px;">Tanggal Pembayaran</th>
                                                    <th style="width: 100px;">No Struk</th>
                                                    <th style="width: 150px;">Action</th>
                                                </tr>
                                            </tfoot>
                                            <!-- <tbody>
                                                <?php $no = 1;
                                                foreach ($struk as $data) { ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $data->nama ?></td>
                                                        <td>Internet Up to <?php echo $data->mbps . "Mbps";?></td>
                                                        <td>Rp. <?php echo ((int)$data->tagihan + (int)$data->addon1 + (int)$data->addon2 + (int)$data->addon3 - (int)$data->tagihan_diskon); ?></td>
                                                        <td><?php echo $data->penerima ?></td>
                                                        <td><?php echo $data->periode ?></td>
                                                        <td><?php echo $data->tanggal ?></td>
                                                        <td><?php echo '#' . $data->nomor_struk ?></td>
                                                        <td>
                                                            <a target="_blank" href="<?php

                                                                                        $cetak = urlencode(base64_encode($data->id_cetak));
                                                                                        echo base_url() . 'administrator/pdf/' . $cetak; ?>" class="btn btn-primary"><i class="fas fa-print"></i></a>
                                                            &nbsp;&nbsp;&nbsp;
                                                            <?php if ($this->session->userdata('level') == 'admin') { ?>
                                                                <a class="btn btn-danger" href="" data-toggle="modal" data-target="#delete_paket<?php echo $data->id_cetak ?>">
                                                                    <i class="icon-trash"></i>
                                                                <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="delete_paket<?php echo $data->id_cetak ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Pembayaran <span class="badge badge-warning">#<?php echo $data->nomor_struk ?></span></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="form-control">
                                                                        <div class="row">
                                                                            <div class="col-xl-8">
                                                                                <label>Nama</label>
                                                                                <input class="form-control" readonly value="<?php echo $data->nama ?>">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label>Tagihan</label>
                                                                                <input class="form-control" readonly value="<?php echo $data->tagihan ?>">
                                                                            </div>
                                                                            <div class="col-xl-5">
                                                                                <label>Bulan</label>
                                                                                <input class="form-control" readonly value="<?php echo $data->periode ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-primary" data-dismiss="modal" style="color: white;">Close</a>
                                                                    <a href="<?php echo base_url() . 'administrator/delete_pembayaran/' . $data->id_cetak ?>" class="btn btn-danger">Delete</a>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
