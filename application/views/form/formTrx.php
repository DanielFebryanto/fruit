
<div class="">

                    <?php $this->load->view('search')?>
                    <div class="clearfix"></div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>
						Transaksi Baru
					</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-expanded="false"><i
								class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a></li>
								<li><a href="#">Settings 2</a></li>
							</ul></li>
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form id="demo-form2" data-parsley-validate
						class="form-horizontal form-label-left" action="<?php echo base_url('trx/save') ?>" method="post">
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" style="text-align: left;"
								for="first-name">Pembeli <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="SupName" class="form-control">
									<option selected hidden="hidden">Choose Pembeli </option>
									<?php foreach ($SupName->result_array() as $row) {?>
									<option value="<?php echo $row['idsupplier']?>"><?php echo $row['namaPT']?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="middle-name"
								class="control-label col-md-2 col-sm-3 col-xs-12" style="text-align: left;">Tanggal Kirim <span class="required">*</span> 
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="tgltrx" class="date-picker form-control col-md-7 col-xs-12"
									type="text" name="middle-name">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" style="text-align: left;"
								for="last-name">Alamat <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea id="middle-name" class="form-control col-md-7 col-xs-12"
									type="text" name="middle-name"></textarea>
							</div>
						</div>
						
						
					<div style="margin-bottom: 30px"></div>
					<hr>

<button type="button" class="btn btn-primary produkBtn" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Produk</button>
						 <table class="table table-striped responsive-utilities jambo_table bulk_action">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"> </td>
                                                <td>Total</td>
                                                <td>RP. 2.000.000</td>
                                            </tr>
                                        </tbody>
                                    </table>
									
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" class="btn btn-primary">Cancel</button>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
	
	<!-- modal  -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add Product</h4>
                </div>
                <div class="modal-body">
                   <!--ISI MODAL-->
                   <form id="demo-form2" action="<?php echo base_url('trx/save') ?>" method="post"
						class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="first-name">Nama Produk <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="GetProduk" class="form-control">
									<option selected hidden="hidden">Choose Product </option>
									<?php foreach ($GetProduk->result_array() as $row) {?>
									<option value="<?php echo $row['idproduk']?>"><?php echo $row['namaproduk']?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="first-name">Kategori Produk <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="GetKategoriProd" class="form-control">
									<option selected hidden="hidden">Choose Product </option>
									<?php foreach ($GetKategoriProd->result_array() as $row) {?>
									<option value="<?php echo $row['idprodukkat']?>"><?php echo $row['produkkatname']?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="last-name">Jumlah Pesanan (gram) <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="stok"
									required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label for="middle-name"
								class="control-label col-md-3 col-sm-3 col-xs-12">Harga / 100gram</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="middle-name" class="form-control col-md-7 col-xs-12"
									type="text" name="harga">
							</div>
						</div>
						
						<!--<div class="ln_solid"></div>-->

					</form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>

            </div>
        </div>
    </div>
	<!-- end modal -->
</div>
<script>
$(function(){
	$(.produkBtn).click(function(){
		alert("ddd");
		
	});
});
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#tgltrx').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_4",
            chooseYear:true
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>