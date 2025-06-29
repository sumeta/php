 <!DOCTYPE html>
 <html lang="en">

 <head>
 	<meta charset="utf-8">
 	<meta name="author" content="Vijja Chimphlee">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width,  initial-scale=1,shrink-to-fit=no"> 

 	<title>WMMT2020</title>
 	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!--
 	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/b-1.6.2/b-html5-1.6.2/r-2.2.5/sp-1.1.1/datatables.min.css"/>
	<link rel="stylesheet" href="jquery/dataTables.bootstrap.min.css" />  

    -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>


 </head>
	 <body>
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		  <!-- Brand -->
		  <a class="navbar-brand" href="#"><i class="fab fa-wolf-pack-battalion"></i>&nbsp;Sci&Tech SDU</a>

		  <!-- Toggler/collapsibe Button -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <!-- Navbar links -->
		  <div class="collapse navbar-collapse" id="collapsibleNavbar">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="#">Home</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Blog</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">About</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Contact</a>
		      </li>
		    </ul>
		  </div>
		</nav>

		<!---     --->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="text-center text-danger font-weight-normal my-3">Faculty of Sci&Tech : SDU</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<h4 class="mt-2 text-primary">รายชื่อบุคลากรสายวิชาการ</h4>
				</div>
				<div class="col-lg-6">
					<button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addModal"> <i class="fas fa-user-plus fa-lg"></i> &nbsp;&nbsp;Add New User</button>

					 <a href="action.php?export=excel" class = "btn btn-success m-1 float-right"><i class="fas fa-table fa-lg"></i>&nbsp;&nbsp;Export to Excel</a>

				</div> 
				</div> 
			</div>
			<hr class="my-1">
			<div class="row">
				
				<div class ="col-lg-12">
					<div class="table-responsive" id="showUser">
						<h3 class="text-center text-success" style="margin-top:150px;"> Loading...</h3>					 
					</div>
				</div>
			</div>
		</div> 

		 <!-- Add New User Modal -->
		  <div class="modal fade" id="addModal">
		    <div class="modal-dialog modal-dialog-centered">
		      <div class="modal-content">
		      
		        <!-- Modal Header -->
		        <div class="modal-header">
		          <h4 class="modal-title">เพิ่มบุคลากร</h4>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        
		        <!-- Modal body -->
		        <div class="modal-body px-4">
		          <form action=" " method="post" id="form-data">

		          	<div class="form-group">
		          		<input type="text"  name="tpos_academic" class="form-control" placeholder="ตำแหน่งทางวิชาการ" required="">
		          	</div>

		          	<div class="form-group">
		          		<input type="text" name="tdoctor" class="form-control" placeholder="ดร." required="">
		          	</div>

		          	<div class="form-group">
		          		<input type="text" name="fname" class="form-control" placeholder="ชื่อ" required="">
		          	</div>

		          	<div class="form-group">
		          		<input type="text" name="lname" class="form-control" placeholder="สกุล" required="">
		          	</div>

		          	<div class="form-group">
		          		<input type="text" name="ttypeP" class="form-control" placeholder="ประเภท" required="">
		          	</div>

		          	<div class="form-group">
		          		<input type="text" name="tdeptP" class="form-control" placeholder="สังกัด" required="">
		          	</div>

					<div class="form-group">
		          		<input type="text" name="tdateBorn" class="form-control" placeholder="วันเดือนปีเกิด" required="">
		          	</div>

		          	<div class="form-group">
		          		<input type="text" name="tdateWork" class="form-control" placeholder="วันเริ่มงาน" required="">
		          	</div>

		          	<div class="form-group">
		          		<input type="submit" name="insert" id="insert" value="Add User" class="btn btn-danger btn-block">
		          	</div>

		          </form>
		        </div>
		        
		      </div>
		    </div>
		  </div>

<!-- Edit User Modal -->
		  <div class="modal fade" id="editModal">
		    <div class="modal-dialog modal-dialog-centered">
		      <div class="modal-content">
		      
		        <!-- Modal Header -->
		        <div class="modal-header">
		          <h4 class="modal-title">แก้ไขข้อมูล</h4>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        
		        <!-- Modal body -->
		        <div class="modal-body px-4">

		          <form action=" " method="post" id="edit-form-data">
		          	<input type="hidden" name="id" id="id">

		          	<div class="form-group">
		          		<input type="text" id="tpos_academic" name="tpos_academic" class="form-control" placeholder="ตำแหน่งทางวิชาการ" required="">
		          	</div>

		          	<div class="form-group">
		          		<input type="text" id="tdoctor" name="tdoctor" class="form-control" 
		          		placeholder="ดร." required="">
		          	</div>
		          	<div class="form-group">
		          		<input type="text" id="fname" name="fname" class="form-control" 
		          		placeholder="ชื่อ" required="">
		          	</div>

		          	<div class="form-group">
		          		<input type="text" id="lname"  name="lname" class="form-control" 
		          		placeholder="สกุล" required="">
		          	</div>

		          	<div class="form-group">
		          		<input type="text" id="ttypeP" name="ttypeP" class="form-control" 
		          		placeholder="ประเภท" required="">
		          	</div>

		          	<div class="form-group">
		          		<input type="text" id="tdeptP" name="tdeptP" class="form-control" 
		          		placeholder="สังกัด" required="">
		          	</div>

					<div class="form-group">
		          		<input type="text" id="tdateBorn" name="tdateBorn" class="form-control" 
		          		placeholder="วันเดือนปีเกิด" required="">
		          	</div>

		          	<div class="form-group">
		          		<input type="text" id="tdateWork" name="tdateWork" class="form-control" 
		          		placeholder="วันเริ่มงาน" required="">
		          	</div>
		          	 

		          	<div class="form-group">
		          		<input type="submit" name="update" id="update" value="Update User" class="btn btn-primary btn-block">
		          	</div>

		          </form>
		        </div>		        
		      </div>
		    </div>
		  </div>


		

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>


		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				 
				showAllUsers();

				function showAllUsers() {
					//var dTable = $('#dtable');
					$.ajax({
						url: "action.php",
						type: "POST",
						data: {action:"VIEW"},
						success:function(response) {
							//console.log(response);
							$("#showUser").html(response);
							$("#table").DataTable({
								order: [[0,'desc']]
							});							 
						}
					});
				}

				// insert ajax request
				$("#insert").click(function(e) {
					if($("#form-data")[0].checkValidity()) {
						e.preventDefault();
						$.ajax({
							url: "action.php",
							type: "POST",
							data: $("#form-data").serialize()+"&action=insert",
							success:function(response) {
								Swal.fire({
									title: 'User added successfully !',
									type: 'success'
								})
								$("#addModal").modal('hide');
								$("#form-data")[0].reset();
								showAllUsers();
								//console.log(response);
							}
						});
					}
				});
				//Edit User
				$("body").on("click",".editBtn", function(e) {
					//console.log("working")
					e.preventDefault();
					edit_id = $(this).attr('id');
					$.ajax({
						url:"action.php",
						type: "POST",
						data: {edit_id:edit_id},
						success: function(response) {
							//console.log(response);
							data = JSON.parse(response);
							$("#id").val(data.id);
							$("#tpos_academic").val(data.pos_academic);
							$("#tdoctor").val(data.doctor);
							$("#fname").val(data.first_name);
							$("#lname").val(data.last_name);
							$("#ttypeP").val(data.typeP);
							$("#tdeptP").val(data.deptP);
							$("#tdateBorn").val(data.dateBorn);
							$("#tdateWork").val(data.dateWork); 
						}
					});
				});

				// update ajax request
				$("#update").click(function(e) {
					if($("#edit-form-data")[0].checkValidity()) {
						e.preventDefault();
						$.ajax({
							url: "action.php",
							type: "POST",
							data: $("#edit-form-data").serialize()+"&action=update",
							success:function(response) {
								Swal.fire({
									title: 'User updated successfully !',
									type: 'success'
								})
								$("#editModal").modal('hide');
								$("#edit-form-data")[0].reset();
								showAllUsers();
								//console.log(response);
							}
						});
					}
				});

				// Delete ajax request
				$("body").on("click",".delBtn", function(e){
					e.preventDefault();
					var tr = $(this).closest('tr');
					del_id = $(this).attr('id');
					Swal.fire({
						title: 'Are you sure?',
				        text: "You won't be able to revert this!",
				    	type: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes, delete it!'
					}).then((result) => {
					  if (result.value) {
					  	$.ajax({
					  		url: "action.php",
					  		type: "POST",
					  		data: {del_id:del_id},
					  		success:function(response) {
					  			//console.log(response);
					  			tr.css('background-color','#ff6666');
					  			Swal.fire(
					  				'Delete!',
					  				'User deleted successfully!',
					  				'success'
					  			)
 					  			showAllUsers();
					  		}
					  	});
					  }
					});
				});
				// show user details
				$("body").on("click", ".infoBtn", function(e) {
					e.preventDefault();
					info_id = $(this).attr('id');
					$.ajax({
						url:"action.php",
						type:"POST",
						data:{info_id:info_id},
						success:function(response) {
							console.log(response);
							data = JSON.parse(response);
							Swal.fire({
								title:'<strong>User Info : ID('+data.id+')</strong>',
						 		type: 'info',
								html: '<b>Fname: </b>'+data.first_name,
								showCancelButton: true,
							});
						}
					});
				});
			});
		</script>
	</body>
</html>