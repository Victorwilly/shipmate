<?php

	require_once('connection.php');
	require_once('functions.php');
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$track = $_GET['track'];

		$sql = "DELETE FROM history WHERE id = '$id'";

		$result = mysqli_query($connect, $sql);
		//checking if the values were saved sucessfully
		if ($result) {
            $success = "History Deleted Sucessfully";
            header("location: ../admin/history.php?success=".$success.'&track='.$track);
            return false;					
		}else{
			$failed = "Error Deleting Shipment";
        header("location: ../admin/history.php?error=".$failed.'&track='.$track);
        return false;
		}
		
	}


?>