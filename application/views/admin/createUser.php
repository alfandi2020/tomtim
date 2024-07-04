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
                                <h4 class="card-title">Form Create User</h4>

                            </div>
                        </div>
                        <form action="<?php echo base_url('administrator/createUser') ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <label>Nama</label>
                                            <input type="text" name="nama" required class="form-control" placeholder="nama...">
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Username</label>
                                            <input type="text" name="username" required class="form-control" placeholder="username...">
                                        </div>
                                        <div class="col-xl-4">
                                            <label>Password</label>
                                            <input type="password" name="password" required class="form-control" placeholder="password...">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
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
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Table User</h4>

                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo $this->session->flashdata('massage') ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table id="table-user" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Username</th>
                                                    <th>Level</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Username</th>
                                                    <th>Level</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($get_user as $data) { ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $data->nama ?></td>
                                                        <td><?php echo $data->username ?></td>
                                                        <td><?php echo $data->level ?></td>
                                                        <td>
                                                            <?php if ($data->level != 'admin') {
                                                            ?>
                                                                <a style="font-size:20px;color:red;" data-toggle="modal" href="#delete<?php echo $data->id_user ?>"><i class="icon-trash"></i></a>
                                                            <?php
                                                            } ?>

                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a style="font-size:20px;color:blue;" data-toggle="modal" href="#edit_user<?php echo $data->id_user ?>"><i class="icon-note"></i></a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="delete<?php echo $data->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete data user</h5>
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
                                                                                <label>Username</label>
                                                                                <input class="form-control" readonly value="<?php echo $data->username ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button data-dismiss="modal" class="btn btn-primary">Close</button>
                                                                    <a class="btn btn-danger" href="<?php echo base_url() . 'administrator/delete_user/' . $data->id_user ?>">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="modal fade bd-example-modal-lg" id="edit_user<?php echo $data->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                        <form action="<?php echo base_url('administrator/ChangeUser/' . $data->id_user); ?>" method="POST">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data user</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-xl-4">
                                                                                    <label>Nama</label>
                                                                                    <input class="form-control" name="nama" value="<?php echo $data->nama ?>">
                                                                                </div>
                                                                                <div class="col-xl-4">
                                                                                    <label>Username</label>
                                                                                    <input class="form-control" name="username" value="<?php echo $data->username ?>">
                                                                                </div>
                                                                                <div class="col-xl-4">
                                                                                    <label>Password baru</label>
                                                                                    <input type="password" class="form-control" placeholder="password" required name="password">
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                                <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                <?php } ?>
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
</div>
</div>
</div>