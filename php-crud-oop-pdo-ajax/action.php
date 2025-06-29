<?php

	require_once 'db.php';
	$db = new Database();

	if(isset($_POST['action']) && $_POST['action']=="VIEW") {
		$output = '';
		$data = $db->read();
		//print_r($data);
		if ($db->totalRowCount()>0) {
			$output .= '<table id="table" class="table table-striped table-sm table-bordered">
							<thead>
								<tr 
								class="text-center">
 									<th>ID</th>
 									<th>ตำแหน่งทางวิชาการ</th>
 									<th>ป.เอก</th>
									<th>ชื่อ</th>	
									<th>สกุล</th>
									<th>ประเภท</th>
									<th>สังกัด</th>
							 		<th>วันเดือนปีเกิด</th>
							 		<th>วันที่เริ่มงาน</th>
									<th>Action</th>
 								</tr>
							</thead>
							<tbody>';
			foreach ($data as $row) {
				$output .= '<tr class="text-center text-secondary">

					<td>'.$row['id'].'				</td>
					<td>'.$row['pos_academic'].'	</td>
					<td>'.$row['doctor'].'			</td>
					<td>'.$row['first_name'].'		</td>
					<td>'.$row['last_name'].'		</td>
					<td>'.$row['typeP'].'			</td>
					<td>'.$row['deptP'].'			</td>
					<td>'.$row['dateBorn'].'		</td>
					<td>'.$row['dateWork'].'		</td>
					<td>
		<a href="#" title="View Details" class="text-success infoBtn" id="'.$row['id'].'"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;	

		<a href="#" title="Edit" class="text-primary editBtn" data-toggle="modal" data-target="#editModal" id="'.$row['id'].'"><i class="fas fa-edit fa-lg"></i></a>&nbsp;&nbsp;	

		<a href="action.php?export=excel" title="Delete" class="text-danger delBtn" id="'.$row['id'].'"><i class="fas fa-trash fa-lg"></i></a>

					</td></tr>';				# code...
			}
			$output .= '</tbody></table>';
			echo $output;
		}
		else {
			echo '<h3> class="text-center text-secondary mt-5">:( No any user present in the database</h3>';
		}
	}

	if (isset($_POST['action']) && $_POST['action']=="insert") {
		$tpos_academic = $_POST['tpos_academic'];
		$tdoctor       = $_POST['tdoctor'];
		$fname 		   = $_POST['fname'];
		$lname 		   = $_POST['lname'];
		$ttypeP        = $_POST['ttypeP'];
		$tdeptP        = $_POST['tdeptP'];
		$tdateBorn     = $_POST['tdateBorn'];
		$tdateWork     = $_POST['tdateWork'];

		$db->insert($tpos_academic,$tdoctor,$fname,$lname,$ttypeP,$tdeptP,$tdateBorn,$tdateWork);
	}


	if (isset($_POST['edit_id'])) {
		$id = $_POST['edit_id'];
		
		$row = $db->getUserById($id);
		echo json_encode($row);
 	}

 	if (isset($_POST['action']) && $_POST['action']=="update") {
		
		$id 		   = $_POST['id'];
		$tpos_academic = $_POST['tpos_academic'];
		$tdoctor       = $_POST['tdoctor'];
		$fname 		   = $_POST['fname'];
		$lname 		   = $_POST['lname'];
		$ttypeP        = $_POST['ttypeP'];
		$tdeptP        = $_POST['tdeptP'];
		$tdateBorn     = $_POST['tdateBorn'];
		$tdateWork     = $_POST['tdateWork'];
	
		$db->update($id,$tpos_academic,$tdoctor,$fname,$lname,$ttypeP,$tdeptP,$tdateBorn,         $tdateWork);
  	}

  	if (isset($_POST['del_id'])) {
		$id = $_POST['del_id'];

		$db->delete($id);
 	}

	if (isset($_POST['info_id'])) {
		$id = $_POST['info_id'];

		$row = $db->getUserById($id);

		echo json_encode($row);
 	} 	


 	if (isset($_GET['export']) && $_GET['export'] == "excel") {
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=users.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$data = $db->read();
		echo '<table border="1">';
		echo '<tr><th>ID</th> <th>ตำแหน่งทางวิชาการ</th> <th>ดร.</th> <th>ชื่อ</th><th>สกุล</th><th> ประเภท</th><th>สังกัด</th><th> วันเดือนปีเกิด</th><th>วันที่เริ่มงาน</th></tr>';

		foreach ($data as $row ) {
			echo '<tr>
			<td>'.$row['id'].'				</td>
			<td>'.$row['pos_academic'].'	</td>
			<td>'.$row['doctor'].'			</td>
			<td>'.$row['first_name'].'		</td>
			<td>'.$row['last_name'].'		</td>
			<td>'.$row['typeP'].'			</td>
			<td>'.$row['deptP'].'			</td>
			<td>'.$row['dateBorn'].'		</td>
			<td>'.$row['dateWork'].'		</td> 
			</tr>';
		}
		echo '</table>';
 	}




?>