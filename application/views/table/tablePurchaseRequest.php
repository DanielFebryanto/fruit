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

                                <div class="x_content">
                                    <div><button id="approve" class="btn btn-success">Approve</button></div>
                                    <!-- <div class="Search" style="float: right; margin-bottom: 10px"><input type="text" name="Search"></div> -->
                                    <table id="example" class="table table-striped responsive-utilities jambo_table bulk_action tabs">
                                        <thead>
                                            <tr class="headings">
                                                <!-- <th>
                                                    <input type="checkbox" class="tableflat">
                                                </th> -->
                                                <th>
                                                    <input type="checkbox" id="check-all" class="flat">
                                                </th>
                                                <th>Nama Pembeli </th>
                                                <th>No PO </th>
                                                <th>Kategori </th>
                                                <th>Tgl Transaksi </th>
                                                <th>Kontak </th>
                                                <th>Status </th>
                                                <th class=" no-link last" style="width:150px"><span class="nobr">Action</span>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($getPurchaseRequest->result_array() as $row) {?>
                                            <tr class="even pointer bawah">
                                                <!-- <td class="a-center ">
                                                    <input type="checkbox" class="tableflat">
                                                </td> -->
                                                <td class="a-center "><input type="checkbox" class="flat" name="table_records"></td>
                                                <td class="tes" style="display: none;"><input type="text" name="idheader" id="idheader" value="<?php echo $row['idtrxheader'] ?>"></td>
                                                <td class=" "><?php echo $row['namaPT'] ?></td>
                                                <td class=" "><?php echo $row['nopo'] ?></td>
                                                <td class=" "><?php echo $row['suppliertypename'] ?></td>
                                                <td class=" "><?php echo $row['tgltrx'] ?></td>
                                                <td class=" "><?php echo $row['kontak'] ?></td>
                                                <td class="a-right a-right "><?php echo $row['statusname'] ?></td>
                                                <td class=" last">
                                                    <a href="<?php echo base_url('retur/create/'.$row['idtrxheader'].'') ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?php echo base_url('trx/detail/'.$row['idtrxheader'].'') ?>" class="btn btn-primary" ><i class="fa fa-hand-o-right"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
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




<script type="text/javascript">
    $(document).ready(function(){
        //alert('asdasdsa');
        //var getLength = $(".tabs > tr").length;
        $("#approve").click(function(){

            //var kirim = [];
            $('.bawah input:checked').each(function() {
              var id, name;
              id = $(this).closest('tr').find('#idheader').val();
              // var idheaderatas = {'idhead':id};
              // kirim.push(idheaderatas);
               $.post("<?php echo base_url('ajax/UpdateTrxHeader') ?>",
                {
                  idheader: id
                },
                function(data, status){
                //alert("Data: " + data + "\nStatus: " + status);
                });

               if(status = "success"){
                alert("Succsess Approve Data.");
                window.location.href = "<?php echo base_url('trx/purchaseRequest')?>";
               }
            });

            

        });
    });
</script>