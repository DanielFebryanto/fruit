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
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div>
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

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
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
                                </div>
                                <div class="x_content">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="headings">
                                                <!-- <th>#</th> -->
                                                <!-- <th>Id</th> -->
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Qty</th>
                                                <th>Retur</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $ind = 0;
                                        foreach ($Detail->result_array() as $row) {
                                        ?> 
                                            <tr>
                                                <th scope="row">1</th>
                                                <td><?php echo $row['namaproduk'] ?></td>
                                                <td><?php echo $row['qty'] ?></td>
                                                <td><input type="text" name="returQty_<?php echo $ind ?>" </td>
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