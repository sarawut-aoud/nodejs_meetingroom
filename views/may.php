<?php 
    session_start();
	require '../function/path.php';
    require 'function/title.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- ICON Title & Title -->
    <title><?php echo $ps_title; ?></title>
	<link rel="shortcut icon" href="../dist/img/logo.png" />

	<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../dist/css/custom.css">
	<link rel="stylesheet" href="../dist/css/adminlte.min.css">

	<!-- Datatable -->
	<link rel="stylesheet" href="../plugins/dataTables-bootstrap4/css/dataTables.bootstrap4.min.css">

	<!-- SweetAlert -->
	<link rel="stylesheet" href="../plugins/sweetalert/css/sweetalert.css">

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

	<!-- daterange picker -->
	<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
	
	<link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 	<!-- Tempusdominus Bootstrap 4 -->
  	<link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  	<!-- Select2 -->
  	<link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  	<link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

	<?php require '../css.php'; ?>	

</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
        <?php 
            require '../menu_top.php'; 
            require '../menu_sidebar.php';
        ?>
        
    	<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
    		<div class="content-header">
    			<div class="container-fluid">
    				<div class="row mb-2">
    					<div class="col-6"><h1 class="m-0">ระดับตำแหน่ง</h1></div>
    					<div class="col-6">
    						<ol class="breadcrumb float-sm-right">
    							<li class="breadcrumb-item"><a href="../home.php">Home</a></li>
    							<li class="breadcrumb-item active">ระดับตำแหน่ง</li>
    						</ol>
    					</div>
    				</div><!-- /.row -->
    			</div><!-- /.container-fluid -->
    		</div>
    		<!-- /.content-header -->
    		
    		<!-- Main content -->
    		<div class="content">
    			<div class="container-fluid">
    				<div class="row">
    					<div class="col-lg-12">
    						<form class="form-data" id="frmData" name="frmData" action="" method="post" enctype="multipart/form-date" >
    							
    							<div class="row">
                                <div class="col-lg-4 block">
                                    <input type="hidden" name="edit" id="edit" value="false">
    							
                                <input type="hidden" name="ac_id" id="ac_id" value="" class="form-control" onKeyPress='return keyPressed(event)'>
                                ประเภทตำแหน่ง
    								<select name="typeac_id" id="typeac_id" class="form-control item_typeac"></select>
       								</div>
    								<div class="col-lg-4 block">
         
    				
                                    <?php echo $ps_po1; ?>
    									<input type="text" name="ac_name" id="ac_name" value="" class="form-control" onKeyPress='return keyPressed(event)'>
       								</div>
                                       <div class="col-lg-12 block">
                                       ระดับ<br>
											<input type="radio" name="ac_pubilc" id="edu_status_1" value="Y" onKeyPress='return keyPressed(event)'>&emsp;
                                            <label for="edu_status_1" >
												อนุมัติ</label>
											&emsp;
											<input type="radio" name="ac_pubilc" id="edu_status_2" value="N" onKeyPress='return keyPressed(event)'>&emsp; 
                                            <label for="edu_status_2" >
												ไม่อนุมัติ</label>
											
									 </div>
                                     
       							</div>
       							
	
								<br>
    							<div class="row">
    								<div class="col-lg-3"></div>
       								<div class="col-lg-3 block">
       									<button type="submit" class="btn btn-md btn-block btn-info" id="btnSave">บันทึก</button>
       								</div>
       								<div class="col-lg-3 block">
       									<button type="reset" class="btn btn-md btn-block btn-danger" id="btnReset">ยกเลิก</button>
       								</div>
       								<div class="col-lg-3"></div>
       							</div>
       							
    						</form>
    					</div>
    				</div>

    				<br>
    				<div class="row"><div class="col-lg-12" id="show-order"></div></div>
    				
    				
            
                    <!-- /.row -->
                    
                    <div class="row">
    					<div class="col-lg-12" id="dataTable">
    						<table id="tblChk" name="tblChk" width="100%" class="table table-bordered table-hover"  >
    							<thead>
    								<tr>
									<th><div align="center">ลำดับ</div></th>
                                    <th><div align="center">ประเภทตำแหน่ง</div></th>    				
    									<th><div align="center">ระดับตำแหน่ง</div></th>    								
    									<th><div align="center">แก้ไข</div></th>
										<th><div align="center">ลบ</div></th>
    									<!--<th><div align="center">ลบ</div></th>-->
    								</tr>	
    							</thead>
    						</table>	
    					</div>
            		</div>
          		</div>
                <!-- /.container-fluid -->
        	</div>
            <!-- /.content -->
      	</div>
        <!-- /.content-wrapper -->
    
    	<!-- Control Sidebar -->
    	<aside class="control-sidebar control-sidebar-dark">
    	   <!-- Control sidebar content goes here -->
    	</aside>
    	<!-- /.control-sidebar -->
    	
    	<?php require '../footer.php'; ?>	
    </div>
    <?php require '../script.php'; ?>	

    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Datatable -->
    <script src="../plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../plugins/dataTables-bootstrap4/js/dataTables.bootstrap4.min.js"></script>
   
    
    <!-- Don't press enter -->
    <script src="../dist/js/disabledenter.js"></script>
    <script src="../dist/js/menubar.js"></script> 
    <!-- Autologout -->
    <script src="../dist/js/autologout.js"></script>
	
	<!-- Select2 -->
	<script src="../plugins/select2/js/select2.full.min.js"></script>
	<script src="../plugins/moment/moment.min.js"></script>
	<script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
		<!-- date-range-picker -->
	<script src="../plugins/daterangepicker/daterangepicker.js"></script>
	<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../dist/css/mdp.css?ver=1.0.0">
	
    
    <script>
		var path = '<?php echo $path; ?>', 
			token = '<?php echo  $_SESSION['erp_token']; ?>', 
    			user = '<?php echo $_SESSION['erp_user']; ?>', 
    			level = '<?php echo $_SESSION['erp_right']; ?>';
    
    		$.ajax({
                type: "POST",
                url: path+"/login/right",
                data: {level:level, page:"right_user"},
                dataType: "json", 
                success: function(result) {
				if (result.status == 1 && token == "Enterprise Resource Planning") {	

	
                    $(".item_typeac").select2({		
											placeholder: "เลือกประเภทตำแหน่ง",
									ajax: {
										
										url: path+"/typeacademic",
										dataType: "json",
										type: "GET",
									
										data: function (params) {
											
											var queryParameters = {
												typeac_name: params.term,			
												page: params.page || 1
											}
											return queryParameters;
										},
										processResults: function (data) {
											return {
												results: $.map(data, function (item) {
													
													return {
						
														text: item.typeac_name,
														id: item.typeac_id
													}
												
												})
											};
										}
									}
							   });

		$(document).on('click', '.btnEdits', function(e) {           
				e.preventDefault();			
				var id = $(this).attr('id');
                $(".item_typeac").empty();
                $("#edu_status_1").attr('checked', false);
			    $("#edu_status_2").attr('checked', false);
                                $.ajax({
									type: "GET",
									//url: "../hots/academic/",
									url: path+"/academic/",
									
									//url: "../api/hr/academic.php",
									data: {id:id,show:'ture'},
									success: function(result) {
									//	var obj = jQuery.parseJSON(result);
									for (kk in result) {

										$("#ac_id").val(result[kk].ac_id);	
                                        $("#ac_name").val(result[kk].ac_name);
                                        if(result[kk].ac_pubilc  =='Y'){
                                            $("#edu_status_1").attr('checked', true);	                                           
                                        }else{
                                            $("#edu_status_2").attr('checked', true);	
										}	
										
									

                                $(".item_typeac").select2({		
											placeholder: "เลือกประเภทตำแหน่ง",
									ajax: {
										
										url: path+"/typeacademic",
										dataType: "json",
										type: "GET",
									
										data: function (params) {
											
											var queryParameters = {
												typeac_name: params.term,			
												page: params.page || 1
											}
											return queryParameters;
										},
										processResults: function (data) {
											return {
												results: $.map(data, function (item) {
													
													return {
						
														text: item.typeac_name,
														id: item.typeac_id
													}
												
												})
											};
										}
									}
							   });
                               var option0 = new Option(result[kk].typeac_name,result[kk].typeac_id);							
			                $(".item_typeac").append(option0); 

                                        
                                        $("#edit").val('ture');	

									}     
							         }
							

                                });	



          
																
			});
	
		$(function() {
			var table = $('#tblChk').DataTable({
				"destroy": true, 
				"processing": true,
				"scrollY": false,
		        "scrollX": true,
		        "scrollCollapse": true,
		        "ajax": {
					"url": path+"/academic", 
					"type": "GET", 
					"data": {status:'check',show:'ture'}, 
					"dataSrc": ""
				}, 
				"columnDefs": [
					{	
					  "targets" : 0, 
					  "searchable" : false, 
					  "className" : "text-center", 
					  "data": "ac_id",
					  "defaultContent": "", 
					  render: function (data, type, row, meta) {
					  	return meta.row + meta.settings._iDisplayStart + 1;
					  }
					},
					{ "targets" : 1, "data" : "typeac_name" },
                    { "targets" : 2, "data" : "ac_name" },
					{	
						"targets" : 3, 
						"className": "text-center", 
					    "data": "ac_id",
					    render: function (data, type, full, meta) {
					    	if(data!=null){						
					    		return '<i class="fa fa-edit btnEdits" id="'+data+'"></i>';
							}else{
								return '';
							}	    }
					},
					{	
						"targets" : 4, 
						"className": "text-center", 
					    "data": "ac_id",
					    render: function (data, type, full, meta) {
							if(data!=null){	
					    	return '<i class="fa fa-trash btnDels" id="'+data+'"></i>';
							}else{
								return '';
							}	    

					    }
					}
				],
				
				
		        "academicSave": true,
		        "paging": true,
		        "cache": false
		});
		$(document).on('click', '.btnDels', function(e) {    
		e.preventDefault();
		var id = $(this).attr('id');
				swal({
    			        title: "คุณต้องการลบ\nคำนำหน้าใช่หรือไม่",
    			        type: "warning",
    			        showCancelButton: true,
    			        confirmButtonColor: "#0c419c",
    			        confirmButtonText: "ยืนยัน",
    			        cancelButtonText: "ยกเลิก",
    			        closeOnConfirm: true,
    			        closeOnCancel: true
    			    },
    			    function (isConfirm) {
    					setTimeout(function() {
						
    						if (isConfirm) {
        						$.ajax({
        	    					// type: "POST",
									// url: "../api/hr/academic_del.php",
									dataType: 'JSON',
									type: "DELETE",									
        	    					url: path+"/academic/",
									data: {id:id},
                              		
        	    					success: function(result) {
        	    						if (result.status == 0) {
        	    							swal({
        	    						        title: result.message,
        	    						        type: "success",
        	    						        showLoaderOnConfirm: true, 
        	    		                        confirmButtonColor: "#0c419c",
        	    		                        confirmButtonText: "ตกลง"
        	    							}, function() {
        	    								location.reload();
        	    								
            	    						});
        	    						} 
										
									if (result.status == 1) {
										setTimeout(function() {

												swal({title:result.message,  type: 'warning', showLoaderOnConfirm: true, })	
									  }, 500);	
									}
										
										
        	    					}
        			        	});							
        					}
        				}, 500);
						
    				});
    
    			    return false;
				
	
	});       
	$('#btnSave').on('click', function(e) {
				e.preventDefault();
			if(frmData.ac_name.value == "" ) {
				
							swal({
								title: "กรุณากรอกระดับตำแหน่ง",
								type: "warning",
								showLoaderOnConfirm: true, 
								confirmButtonColor: "#0c419c",
								confirmButtonText: "ตกลง",
								closeOnConfirm: false,
							}, function() {
								swal.close();                        
						 document.frmData.ac_name.focus();
								
							});
							return false;
			}else if(frmData.typeac_id.value == "" ) {

				swal({
						title: "กรุณาเลือกประเภทตำแหน่ง",
						type: "warning",
						showLoaderOnConfirm: true, 
						confirmButtonColor: "#0c419c",
						confirmButtonText: "ตกลง",
						closeOnConfirm: false,
					}, function() {
						swal.close();                        
				$(".item_typeac").select2('open');
						
					});
					return false;			
			} else {
			 
                if( frmData.edit.value =="false"){
                                  var text = 'บันทึก';        
                    }else{
                        var text = 'แก้ไข';  
                                        
                    }
					swal({
    			        title: "คุณต้องการ"+ text +"\nคำนำหน้าใช่หรือไม่",
    			        type: "warning",
    			        showCancelButton: true,
    			        confirmButtonColor: "#0c419c",
    			        confirmButtonText: "ยืนยัน",
    			        cancelButtonText: "ยกเลิก",
    			        closeOnConfirm: true,
    			        closeOnCancel: true
    			    },
    			    function (isConfirm) {
    					setTimeout(function() {
							var form = $("#frmData")[0];		
                            var formData = new FormData(form);	
    						if (isConfirm) {
								if($("#edit").val()=="ture"){
						
									$.ajax({	
									type: "PUT",
									//url: "../api/hr/academic_save.php",
        	    					url: path+"/academic/",
								//	data: formData,
									dataType: 'JSON',
									data: $("#frmData").serialize(),
								// processData: false,
                                  //   contentType: false,									
        	    					beforeSend: function () {
        	    						$("#btnSave").html("<img alt='loading' class='imgLoading' src='../dist/img/load.gif'>");
        	            			},
        	    					success: function(result) {
                                        
        	    						$("#btnSave").html('บันทึก');
        	    						
        	    						if (result.status == 0) {
        	    							swal({
        	    						        title: result.message,
        	    						        type: "success",
        	    						        showLoaderOnConfirm: true, 
        	    		                        confirmButtonColor: "#0c419c",
        	    		                        confirmButtonText: "ตกลง"
        	    							}, function() {
        	    								location.reload();
        	    								//table.ajax.reload(null, false); 
            	    							//$('#frmData')[0].reset();
            	    							//$('#coName').focus();
            	    						});
        	    						} 
										
									if (result.status == 1) {
										setTimeout(function() {

												swal({title:result.message,  type: 'warning', showLoaderOnConfirm: true, })	
									  }, 500);	
									}
										
										
        	    					}
								});	
																	
								}else{
        						$.ajax({	
									type: "POST",
									//url: "../api/hr/academic_save.php",
        	    					url: path+"/academic/",
								//	data: formData,
									dataType: 'JSON',
									data: $("#frmData").serialize(),
								// processData: false,
                                  //   contentType: false,									
        	    					beforeSend: function () {
        	    						$("#btnSave").html("<img alt='loading' class='imgLoading' src='../dist/img/load.gif'>");
        	            			},
        	    					success: function(result) {
                                        
        	    						$("#btnSave").html('บันทึก');
        	    						
        	    						if (result.status == 0) {
        	    							swal({
        	    						        title: result.message,
        	    						        type: "success",
        	    						        showLoaderOnConfirm: true, 
        	    		                        confirmButtonColor: "#0c419c",
        	    		                        confirmButtonText: "ตกลง"
        	    							}, function() {
        	    								location.reload();
        	    								//table.ajax.reload(null, false); 
            	    							//$('#frmData')[0].reset();
            	    							//$('#coName').focus();
            	    						});
        	    						} 
										
									if (result.status == 1) {
										setTimeout(function() {

												swal({title:result.message,  type: 'warning', showLoaderOnConfirm: true, })	
									  }, 500);	
									}
										
										
        	    					}
								});	
								
							}	

        					}
        				}, 500);
    				});
    
    			    return false;
				}
			
			});

			$('#btnReset').on('click', function() {
				$('.item_typeac').val(null).trigger('change');
				$(".item_typeac").empty();
				clearData();
			});

			
			
			function clearData() {

								
				$('#frmData')[0].reset();   
			
				
			}
		});
	} else if (result.status == 0) {
    					location.href = '../index.php';
        }
	}
	});
    </script>
</body>
</html>
