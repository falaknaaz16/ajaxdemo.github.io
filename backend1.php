<?php
$con = mysqli_connect('localhost' ,'root','','ajaxformdemo');
extract($_POST);



if(isset($_POST['readrecords'])){

	$data= '<table class = "table table-bordered table-striped">
			<tr>
				<th>id</th>
				<th>firstname</th>
				<th>lastname</th>
				<th>mobile</th>
				<th>email</th>
				<th>EDit</th>
				<th>delete</th>

			</tr>';
		

			$q = "select * from crud";
            $result = mysqli_query($con,$q);

           if(mysqli_num_rows($result) > 0)
           {
           	$number = 1;
           
            while ($row = mysqli_fetch_array($result))
            {
            	$data .= '<tr>

            				<td>'.$number.'</td>
							<td>'.$row['firstname'].'</td>
							<td>'.$row['lastname'].'</td>
							<td>'.$row['email'].'</td>
							<td>'.$row['mobile'].'</td>
							<td><button onclick="get_user('.$row['id'].')" class="btn btn-warning" data-toggle="modal" data-target="#update_user_modal">EDIT</button>
							</td>
							<td>
								<button onclick="D_user('.$row['id'].')" class="btn btn-danger">DELETE</button>
							</td>
            			</tr>';
            			$number++;
              
			}
		}
		$data .='</table>';
		echo $data;



}
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile']) )
{
	$q = "INSERT INTO `crud`(`firstname`, `lastname`, `email`, `mobile`) VALUES ('$firstname','$lastname','$email','$mobile')";
	mysqli_query($con,$q);

	//not mysql ok..
}



if(isset($_POST['deleteid'])){
	$userid = $_POST['deleteid'];
	$deleteq = "DELETE FROM `crud` WHERE id='$userid' ";
	 mysqli_query($con,$deleteq);
}

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$deleteq = "DELETE FROM `crud` WHERE id='$id' ";
	 mysqli_query($con,$deleteq);
}

//get user details to update
if(isset($_POST['uid']) && isset($_POST['uid'])!= ""){

	$userid = $_POST['uid'];
	$query = "SELECT * FROM `crud` WHERE id='$userid'";
	if(!$result = mysqli_query($con,$query)){
		exit(mysqli_error());
	}
	//$response = array();


	if(mysqli_num_rows($result) >0){
		while ($row = mysqli_fetch_assoc($result)) {
			# code...
			$response =$row;
		}
	}else{
		$response['status'] = 200;
		$response['message'] = "data not found";
	}
	echo json_encode($response);


}else
{
		$response['status'] = 200;
		$response['message'] = "INvalid";

}


//update details
if(isset($_POST['hidden_user_idsupd'])){

	$hidden_user_idupd  = $_POST['hidden_user_idsupd'];
	$firstnameupd = $_POST['firstnameupd'];
     $lastnameupd = $_POST['lastnameupd'];
     $emailupdupd = $_POST['emailupd'];
  	$mobileupd = $_POST['mobileupd'];

	$update_query = "UPDATE `crud` SET `firstname`='$firstnameupd',`lastname`='$lastnameupd',`email`='$emailupd',`mobile`='$mobileupd' WHERE id='$hidden_user_idsupd' ";

	mysqli_query($con,$update_query);
}

?>
