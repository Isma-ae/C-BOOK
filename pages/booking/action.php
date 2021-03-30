<?php

include("../../php/functions.php");
	$fn = isset( $_POST["fn"] ) ? $_POST["fn"] : "";
	switch ($fn) {
		case 'loadRoom'		: loadRoom(); 	break;
		case 'checkRoom'	: checkRoom(); 	break;
		default: break;
	}

	function loadRoom () {
		global $DATABASE;
		$sql = "SELECT * FROM tb_room ";
		$obj = $DATABASE->QueryObj($sql);
		foreach ($obj as $row) {
			$room_id = $row["room_id"];
			$room_name = $row["room_name"];
			$room_description = $row["room_description"];
			$room_status = $row["room_status"];
			if($room_status == 'n'){
				$room_status_message = 'ว่าง';
			}else{
				$room_status_message = 'ไม่ว่าง';
			}
			echo '
				<tr>
			      	<th scope="row">'.$room_name.'</th>
			      	<td>'.$room_description.'</td>
			      	<td>'.$room_status_message.'</td>
			      	<td><button type="butoon" class="btn btn-dark booking" booking-id="'.$room_id.'"><i class="fas fa-cart-plus"></i> จองห้อง</button></td>
			    </tr>
			';
		}
	}

	function checkRoom() {
		global $DATABASE;
		$room_id = @$_POST["booking_id"];
		$sql = "SELECT * FROM tb_room WHERE room_id = '".$room_id."'";
	    $obj = $DATABASE->QueryObj($sql);
	    foreach ($obj as $row) {
	    	$room_status = $row["room_status"];
	    	echo $room_status;
	    }
	}

?>