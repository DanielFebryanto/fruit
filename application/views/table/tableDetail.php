<div class="">
<div class="page-title">
<div class="title_left">
<h3>
<?php echo $title ?>
                    <small>
                        <?php echo "" ?>
                    </small>
                </h3>
                        </div>
                        
                        <div class="title_right">
                          <!--   <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <?php if($this->session->flashdata('success')){ ?>
<div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Success</strong> <?php echo $this->session->flashdata('success') ?>
</div>
	
<?php } if($this->session->flashdata('error')){ ?>
	<div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>Error</strong> <?php echo $this->session->flashdata('error') ?>
     </div>
<?php } ?>
                    <div class="row">
                    <?php foreach($header->result_array() as $row){ ?>
                        <div style="margin-left: 10px">
                            <h2>Nama : <?php echo $row['namaPT'] ?></h2>
                            <h2>No PO : <?php echo $row['nopo'] ?></h2>
                            <h2>Alamat : <?php echo $row['alamat']?></h2>
                            <h2>kontak : <?php echo $row['kontak']?></h2>
                            <h2>Email : <?php echo $row['email']?></h2>
                        </div>
                      <?php  } ?>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                               <!--  <div class="x_title">
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div> -->
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <!-- <th>#</th> -->
                                                <!-- <th>No</th> -->
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Qty</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $ind = 0;
                                        foreach ($detail->result_array() as $det) { 
                                        ?> 
                                            <tr>
                                                <th scope="row"> <?php echo $ind +1; ?></th>
                                                <td><?php echo $det['namaproduk'] ?></td>
                                                <td><?php echo $det['qty'] ?></td>
                                                <td></td>
                                            </tr>
                                          <?php $ind++; } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <br />
                        <br />
                        <br />

                    </div>
                </div>