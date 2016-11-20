<div class="">
<div class="page-title">
<div class="title_left">
<h3>
<?php echo "Title" ?>
                    <small>
                        <?php echo "Conter	" ?>
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

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Daily active users <small>Sessions</small></h2>
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
                                <!-- nambah button untuk add -->
                                <a class="btn btn-success" href="<?php echo base_url()?>admin/formSupplier">Add New</a>
                                <!-- end -->
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table" >
                                        <thead>
                                            <tr class="headings">
                                               	<th>No</th>
					               				<th>Nama Supplier</th>
					               				<th>Email</th>
					               				<th>Alamat</th>
					               				<th>Kontak</th>
					               				<th>Action</th>
                                            </tr>
                                        </thead>
										<?php
											$no = 1; 
											foreach ($supplierGetAll->result() as $row) 
										{
                                            echo '
                                            <tbody>
                                                <tr>
                                                    <td>'.$no++.'</td>
                                                    <td>'.$row->namaSupplier.'</a></td>
                                                    <td>'.$row->email.'</a></td>
                                                    <td>'.$row->alamat.'</a></td>
                                                    <td>'.$row->kontak.'</a></td>
                                                    <td style="width: 150px">
                                                        <a class="btn btn-info btn-xs" href="'.base_url().'admin/formupdateSupplier">Edit</a>
                                                        <a class="btn btn-danger btn-xs" href="'.base_url().'admin/formupdateSupplier">Delete</a>
                                                    </td>
                                                </tr>
                                            </tbody>';
                                        
										} ?>
                                    </table>
                                </div>
                            </div>
                        </div>
						
                        <br />
                        <br />
                        <br />

                    </div>
                </div>
