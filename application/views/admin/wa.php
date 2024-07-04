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
<?php echo $this->session->flashdata('massage') ?>
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">WhatsApp Blast</h4>
                            
                            </div>
                        </div>
                      

                        
                        <form action="<?php echo base_url('administrator/whatsapp') ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    
                                
                                    <div class="row">
                                        
                                        <div class="col-xl-4">
                                        <label>Pesan Blast</label>
                                            <textarea name="pesan" cols="30" rows="10" class="form-control"></textarea>
                                      
                                        </div>
                                        
                                       
                                        <div class="col-xl-6">
                                            <label>Nomor</label>
                                            <textarea name="nomor" cols="30" rows="10" class="form-control"></textarea>
                                            
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-xl-6">
                                            <label>Url Gambar</label>
                                            <input name="url" placeholder="www.zzz.com" class="form-control">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                        <button class="btn btn-primary" type="submit">Kirim</button>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
            <!--<div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">WhatsApp Blast Ke Tiap Pelanggan</h4>
                            
                            </div>
                        </div>
                      

                        
                        <form action="<?php echo base_url('administrator/whatsapp') ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    
                                
                                    <div class="row">
                                        <div class="col-xl-7">
                                        <label>Pesan Blast</label>
                                        <?php $i = $this->db->query("SELECT * FROM tb_blast where id=1 ")->row_array() ?>
                                            <textarea name="blast" cols="30" rows="15" class="form-control" ><?php echo $i['text'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xl-4">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>
</div>
</div>
