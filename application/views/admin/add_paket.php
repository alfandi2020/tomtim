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
                                <h4 class="card-title">Table List Paket</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Tambah Paket
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                Paket</span>
                                            <span class="fw-light">
                                                Internet
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="large">Tambah List Paket</h4>
                                        <form method="POST" action="<?php echo base_url('administrator/add_list_paket') ?>">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group form-group-default">
                                                        <label><b>Harga</b></label>
                                                        <div class="input-group-prepend">
                                                            <span id="basic-addon1" class="input-group-text">Rp.</span>
                                                            <input name="harga" style="border-color: #1269db;" placeholder="50000" class="uang form-control hargaChange">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Layanan Internet</label>
                                                        <select name="layanan" id="" class="form-control select22">
                                                            <option value="Wireless">Wireless</option>
                                                            <option value="Fiber Optik">Fiber Optik</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="input-group-prepend">
                                                        <span id="basic-addon1" class="input-group-text">Internet Up to</span>
                                                        <input name="paket" type="number" style="border-color: #1269db; width:200px;" placeholder="100" class="form-control hargaChange">
                                                        <span id="basic-addon1" class="input-group-text">Mbps</span>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" id="ceklis_promo" style="color: black;background-color:black" type="checkbox" value="show">
                                                                <span class="form-check-sign">Ceklis untuk membuat diskon </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group paket_hasil">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                            <label>Keterangan Promo</label>
                                                            <input type="text" class="form-control" name="promo" placeholder="Promo...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" modal-footer no-bd">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <?php echo $this->session->flashdata('massage') ?>
                        <form action="<?php echo base_url('administrator/simpanCetak') ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th style="width: 300px;">Paket Internet</th>
                                                    <th style="width: 150px;">Harga Internet</th>
                                                    <th style="width: 200px;">Layanan internet</th>
                                                    <th style="width: 150px;">Promo Paket</th>
                                                    <th style="width: 150px;">Action</th>

                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th style="width: 300px;">Paket Internet</th>
                                                    <th style="width: 150px;">Harga Internet</th>
                                                    <th style="width: 200px;">Layanan internet</th>
                                                    <th style="width: 150px;">Promo Paket</th>
                                                    <th style="width: 150px;">Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($paket as $data) { ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo "Internet Up to " . $data->mbps . " Mbps" ?></td>
                                                        <td><?php echo "Rp." . number_format($data->harga, 0, ".", ".") ?></td>
                                                        <td><?php echo $data->layanan ?></td>
                                                        <td><?php echo $data->promo ?></td>
                                                        <td>
                                                        <?php if ($this->session->userdata('level') == 'admin') { ?>
                                                            <a style="font-size: 20px;color:red" href="" data-toggle="modal" data-target="#delete_paket<?php echo $data->id_wireless ?>">
                                                                <i class="icon-trash"></i>
                                                                                                                            <?php } ?>
                                                            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a style="font-size: 20px;color:blue" href="<?php
                                                                                                        $id_paket = urlencode(base64_encode($data->id_wireless));
                                                                                                        echo base_url() . 'administrator/edit_paket/' . $id_paket ?>"> <i class="icon-note"></i></a>

                                                            <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_paket<?php echo $data->id_wireless ?>">
                                                                <i class="icon-note"></i>
                                                            </button>-->
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="delete_paket<?php echo $data->id_wireless ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                <label>Paket Internet</label>
                                                                                <input class="form-control" value="<?php echo $data->paket ?>">
                                                                            </div>
                                                                            <div class="col-xl-4">
                                                                                <label>Layanan</label>
                                                                                <input class="form-control" value="<?php echo $data->layanan ?>">
                                                                            </div>
                                                                            <div class="col-xl-5">
                                                                                <label>Harga</label>
                                                                                <input class="form-control" value="<?php echo $data->harga ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a data-dismiss="modal" class="btn btn-danger" href="">Close</a>
                                                                    <a class="btn btn-primary" href="<?php echo base_url() . 'administrator/delete_paket/' . $data->id_wireless ?>">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </tbody>
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