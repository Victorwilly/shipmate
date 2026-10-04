<?php

	require_once('connection.php');
	require_once('functions.php');
	if (isset($_GET['id'])) {
		$id = base64_decode($_GET['id']);

		$sql = "UPDATE `ship` SET `deleted` = 0 WHERE `id` = '$id'";

		$result = mysqli_query($connect, $sql);
		//checking if the values were saved sucessfully
		if ($result) {
            $success = "1 Shipment Deleted Sucessfully";
            header("location: ../admin/dashboard.php?success=".$success);
            return false;					
		}else{
			$failed = "Error Deleting Shipment";
        header("location: ../admin/editshipment.php?error=".$failed);
        return false;
		}
		
	}


?>