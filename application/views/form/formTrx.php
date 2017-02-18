
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
				

				<div class="x_content" style="margin-top: -20px">
					<br />
					<form id="demo-form2" data-parsley-validate
						class="form-horizontal form-label-left">
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12" style="padding-left: 0px">
								<button type="submit" class="btn btn-primary">Cancel</button>
								<button type="submit" class="btn btn-success">Save</button>
							</div>
						</div>
						<div class="clearfix"></div>
						<hr style="margin-top: -5px; border-bottom: 1px solid #E6E9ED">
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" style="text-align: left;"
								for="first-name">Pilih Pembeli<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<button type="button" class="pembeliBtn btn btn-primary" data-toggle="modal"><i class="fa fa-plus"></i> Pembeli</button>
								<input type="text" id="namaPembeli" name="last-name" value="Nama Pembeli" 
									required="required" disabled="disabled" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" style="text-align: left;"
								for="last-name">Tanggal Kirim <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="tglkirim" name="last-name"
									required="required" class="date-picker form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" style="text-align: left;"
								for="last-name">No Tlp <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="noTlp" name="last-name" id="noTlp" 
									required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label for="middle-name"
								class="control-label col-md-2 col-sm-3 col-xs-12" style="text-align: left;">Alamat</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea id="alamat" class="form-control col-md-7 col-xs-12"
									type="text" name="middle-name"></textarea>
							</div>
						</div>
						
						<hr>

<button type="button" class="produkBtn btn btn-primary" data-toggle="modal"><i class="fa fa-plus"></i> Produk</button>
						 <table class="table table-striped responsive-utilities jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                                                <!-- <th>#</th> -->
                                                <th>Id</th>
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablebawah">
                                          <!--   <tr>
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
                                            </tr> -->
                                        </tbody>
                                    </table>
									
						<div class="ln_solid"></div>
						<!-- <div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12" style="padding-left: 0px">
								<button type="submit" class="btn btn-primary">Cancel</button>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div> -->
					</form>	
				</div>
			</div>
		</div>
	</div>


	<!-- modal pembeli -->

	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal_pembeli">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Pilih Pembeli</h4>
                </div>
                <div class="modal-body">
					<table id="" class="table table-striped responsive-utilities jambo_table bulk_action">
						<thead>
							<tr class="headings">
								<th>Nama</th>
								<th>Kontak</th>
								<th>Alamat</th>
								<th class=" no-link last"><span class="nobr">Action</span></th>
							</tr>
						</thead>

						<tbody id="modal_body_pembeli">
						</tbody>

					</table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>

            </div>
        </div>
    </div>

	<!-- end of modal pembeli -->

	<!-- modal product -->

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal_produk">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Pilih Product</h4>
                </div>
                <div class="modal-body">
					<table id="" class="table table-striped responsive-utilities jambo_table bulk_action">
						<thead>
							<tr class="headings">
								<th>Nama Produk</th>
								<th>Kategori</th>
								<th>Harga</th>
								<th class=" no-link last"><span class="nobr">Action</span></th>
							</tr>
						</thead>

						<tbody id="modal_body">
						</tbody>

					</table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>

            </div>
        </div>
    </div>

    <!-- end of modal product -->

</div>
<script>

$(function(){	
	$(".produkBtn").click(function(){
		$("#modal_body").html("");
		$.ajax({
			type: "GET",
			dataType:"JSON",
			url: "<?php echo base_url('ajax/getProduk') ?>",
			success: function(obj){
				$.each( obj, function( key, value ) {
					console.log(value);
					$("#modal_body").append("<tr>"+
					"<td class=''>"+value.namaproduk+"</td>"+
					"<td class=''>"+value.produkkatname+"</td>"+
					"<td class=''>"+value.harga+"</td>"+
					"<td class='last'><button id='"+value.idproduk+"' class='btn btn-success' onclick='selectedProduk("+value.idproduk+")'><i class='fa fa-plus'></i> </td>"+
					"</tr>");
				});
			}
			});
			$("#modal_produk").modal('show');
	});

	$(".produkClickBtn").click(function(){
		var t = $('.produkClickBtn').attr('id');
		alert(t);
	});
});

// modal pembeli
$(function(){	
	$(".pembeliBtn").click(function(){
		$("#modal_body_pembeli").html("");
		$.ajax({
			type: "GET",
			dataType:"JSON",
			url: "<?php echo base_url('ajax/getCustomer') ?>",
			success: function(obj){
				$.each( obj, function( key, value ) {
					//console.log(value);
					$("#modal_body_pembeli").append("<tr>"+
					"<td class=''>"+value.namaPT+"</td>"+
					"<td class=''>"+value.kontak+"</td>"+
					"<td class=''>"+value.alamat+"</td>"+
					"<td class='last'><button id='"+value.idsupplier+"' class='btn btn-success' onclick='selectedPembeli("+value.idsupplier+")'><i class='fa fa-plus'></i> </td>"+
					"</tr>");
				});
			}
			});
			$("#modal_body_pembeli").modal('show');
	});

	$(".pembeliClickBtn").click(function(){
		var t = $('.produkClickBtn').attr('id');
		alert(t);
	});
});
//end modal pembeli

//button pembeli
function selectedPembeli(id){
	//alert(id);
	$.ajax({
			type: "GET",
			dataType:"JSON",
			url: "<?php echo base_url('ajax/getSelectedCustomer/') ?>" + id, 
			success: function(obj){
				$.each( obj, function( key, value ) {
					console.log(value);
					$("#namaPembeli").val(value.namaPT);
					$("#noTlp").val(value.kontak);
					$("#alamat").val(value.alamat);
				});
			}
			});

	//alert("asdasdsad");

	$("#modal_pembeli").modal('hide');

}
//end

function selectedProduk(id){
	$.ajax({
			type: "GET",
			dataType:"JSON",
			url: "<?php echo base_url('ajax/getSelectedProduk/') ?>" + id,
			success: function(obj){
				$.each( obj, function( key, value ) {
					console.log(value);
					$("#tablebawah").append("<tr>"+
					"<td class='idtable'>"+value.idproduk+"</td>"+
					"<td class=''>"+value.namaproduk+"</td>"+
					"<td class=''>"+value.produkkatname+"</td>"+
					"<td class=''>"+value.harga+"</td>"+
					// "<td class='last'><button id='"+value.idproduk+"' class='btn btn-success' onclick='selectedProduk("+value.idproduk+")'><i class='fa fa-plus'></i> </td>"+
					"<td class=''><input type='number'></input></td>"+
					"<td class=''></td>"+
					"</tr>");
					// if (value.idproduk = idtable){
					// 	alert("adasdasdsa");
					// 	return;
					// }
					
				});
			}
			});

	$("#modal_produk").modal('hide');
}
</script>

<script type="text/javascript">
	$(document).ready(function () {
        $('#tglkirim').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_4",
            chooseYear:true
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>

<script type="text/javascript">
	$('.pembeliBtn').click(function(){
		$('#modal_pembeli').modal('show');
	});
</script>