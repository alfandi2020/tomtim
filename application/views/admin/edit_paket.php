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



                        <?php foreach ($pakets as $x) { ?>

                            <form action="<?php echo base_url() . 'administrator/edit_paket_action/' . $x->id_wireless ?>" method="POST">

                                <div class="card-body">

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-xl-4">

                                                <label>Pakat Internet</label>

                                                <div class="input-group-prepend">

                                                    <span id="basic-addon1" class="input-group-text">Internet Up to</span>

                                                    <input type="number" name="paket" value="<?php echo $x->mbps ?>" style="border-color: #1269db;" placeholder="100" class="form-control">

                                                    <span id="basic-addon1" class="input-group-text">Mbps</span>

                                                </div>

                                            </div>

                                            <div class="col-xl-2">

                                                <label><b>Harga</b></label>

                                                <div class="input-group-prepend">

                                                    <span id="basic-addon1" class="input-group-text">Rp.</span>

                                                    <?php $dd = number_format($x->harga, "0", ".", ".");

                                                    ?>

                                                    <input name="harga" id="formatNumber" value="<?php echo $dd ?>" style="border-color: #1269db;" placeholder="100.000" class="form-control">

                                                </div>

                                            </div>
                                            <div class="col-xl-2">

                                                <label><b>Promo</b></label>


                                                    <input name="promo" value="<?php echo $x->promo ?>" style="border-color: #1269db;" placeholder="100.000" class="form-control">


                                            </div>

                                            <div class="col-xl-4">

                                                <label>Layanan</label>

                                                <select name="layanan" id="" class="form-control select22">

                                                    <option value="<?php echo $x->layanan ?>"><?php echo $x->layanan ?></option>

                                                    <?php

                                                    if ($x->layanan == 'Wireless') {
                                                        $h = "<option value='Fiber Optik'>Fiber Optik</option>";
                                                    } elseif ($x->layanan == 'Fiber Optik') {
                                                        $h = "<option value='Wireless'>Wireless</option>";
                                                    }

                                                    echo $h;

                                                    ?>

                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-xl-4">

                                                <a href="<?php echo base_url('administrator/ListPaket'); ?>" class="btn btn-danger">Back</a>

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