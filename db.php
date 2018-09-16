<?php 
	function get_connection() {
		$connection = mysqli_connect("localhost", "root" , "" , "test" );
		if(!$connection){
			die("Failed to Connect");
		}
		return $connection;
	}

	function get_all_records() {
		$connection = get_connection();
		$sql = "SELECT * FROM `users`";
		$result = mysqli_query($connection,$sql);
		$html = '';
		$html .= '<thead>';
		$html .= '<tr>';
		$html .= '<th>#</th>';
		$html .= '<th>First Name</th>';
		$html .= '<th>Last Name</th>';
		$html .= '<th>Email</th>';
		$html .= '<th>Operations</th>';
		$html .= '</tr>';
		$html .= '</thead>';
		if(mysqli_num_rows($result)){
			
			while($row = mysqli_fetch_assoc($result)){
				$html .= '<tbody>';
				$html .= '<tr>';
				$html .= '<td>'.$row['id'].'</td>';
				$html .= '<td>'.$row['fname'].'</td>';
				$html .= '<td>'.$row['lname'].'</td>';
				$html .= '<td>'.$row['email'].'</td>';
				$html .= '<td>';
				$html .= '<a data-id="'.$row['id'].'" class="icon" id="update" href="#"><i class="glyphicon glyphicon-edit"></i></a>';
				$html .= '<a data-id="'.$row['id'].'" class="icon" id="delete" href="#"><i class="glyphicon glyphicon-trash"></i></a>';
				$html .= '</td>';
				$html .= '</tr>';
				$html .= '</tbody>';
			}
			echo json_encode(['status' => 'success' , 'html'=> $html]);
		}else{
			$html .= '<tr colspan="">';
			$html .= '<td>No Record Found.</td>';
			$html .= '</tr>';

			echo json_encode(['status' => 'success' , 'html'=>$html]);
		}
	}

function add_record($post){
	$connection = get_connection();

	$fname = $post['fname'];
	$lname = $post['lname'];
	$email = $post['email'];

	$sql = "INSERT INTO `users`(`fname`, `lname` , `email`) VALUES (?,?,?)";

	$stmt = mysqli_prepare($connection, $sql);

	if(is_object($stmt)){
		mysqli_stmt_bind_param($stmt, 'sss', $fname , $lname, $email);
		mysqli_stmt_execute($stmt);

		if(mysqli_stmt_affected_rows($stmt) == 1){
			echo json_encode(['status'=>'success', 'message'=>'Congratulation! Record Inserted']);
		}else{
			echo json_encode(['status'=>'error', 'message'=>'Error: Failed to insert record']);
		}
	}
}

function get_record($post){
	$connection = get_connection();
	$id = $post['id'];

	$sql = "SELECT * FROM `users` WHERE `id` = ?";

	$stmt = mysqli_prepare($connection,$sql);

	if(is_object($stmt)){
		mysqli_stmt_bind_param($stmt , 'i', $id);
		mysqli_stmt_bind_result($stmt, $id, $fname, $lname, $email);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		mysqli_stmt_fetch($stmt);

		if(mysqli_stmt_num_rows($stmt)){
			echo json_encode(['status'=>'success', 'id'=>$id, 'fname'=>$fname, 'lname'=>$lname, 'email'=>$email]);
		}else{
			echo json_encode(['status'=>'error','message'=>'Error: Failed to insert record']);
		}
	}
}

function update_record($post){
	$connection = get_connection();

	$id = $post['id'];
	$fname = $post['fname'];
	$lname = $post['lname'];
	$email = $post['email'];

	$sql = "UPDATE `users` SET `fname`=?, `lname`=?, `email`=? WHERE `id` =? ";

	$stmt = mysqli_prepare($connection,$sql);

	if(is_object($stmt)){
		mysqli_stmt_bind_param($stmt, 'sssi', $fname, $lname, $email, $id);
		mysqli_stmt_execute($stmt);

		if(mysqli_stmt_affected_rows($stmt) == 1){
			echo json_encode(['status'=>'success', 'message'=>'Congratulation! Record Update']);
		}else{
			echo json_encode(['status'=>'error', 'message'=>'Error: Failed to Update  record']);
		}
	}

}

function delete_record($post){
	$connection = get_connection();

	$id = $post['id'];

	$sql = "DELETE FROM `users` WHERE `id` =? ";

	$stmt = mysqli_prepare($connection,$sql);

	if(is_object($stmt)){
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);

		if(mysqli_stmt_affected_rows($stmt) == 1){
			echo json_encode(['status'=>'success', 'message'=>'Congratulation! Record Deleted']);
		}else{
			echo json_encode(['status'=>'error', 'message'=>'Error: Failed to Delete  record']);
		}
	}
}

 ?>