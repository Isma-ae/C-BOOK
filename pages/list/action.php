<?php

include("../../php/functions.php");
	$fn = isset( $_POST["fn"] ) ? $_POST["fn"] : "";
	switch ($fn) {
		case 'loadCart'		: loadCart(); 		break;
		case 'cancelCart'	: cancelCart(); 	break;
		default: break;
	}

	function loadCart () {
		global $DATABASE;
		$user_id = @$_POST["user_id"];
		$sql = "SELECT * FROM tb_booking INNER JOIN tb_room ON tb_booking.room_id=tb_room.room_id WHERE tb_booking.user_id=".$user_id."";
		$obj = $DATABASE->QueryObj($sql);
		foreach ($obj as $row) {
			$booking_id = $row["booking_id"];
			$room_id = $row["room_id"];
			$room_name = $row["room_name"];
			$booking_date = $row["booking_date"];
			$time_start = $row["time_start"];
			$time_end = $row["time_end"];
			$booking_status = $row["booking_status"];
			if($booking_status == 'w'){
				$booking_status_message = 'รออนุมัติ';
			}else if($booking_status == 'n'){
				$booking_status_message = 'ไม่อนุมัติ';
			}else{
				$booking_status_message = 'อนุมัติ';
			}
			echo '
				<tr>
			      	<th scope="row">'.$room_name.'</th>
			      	<td>'.$booking_date.'</td>
			      	<td>'.$time_start.'</td>
			      	<td>'.$time_end.'</td>
			      	<td>'.$booking_status_message.'</td>
			      	<td><button type="butoon" class="btn btn-dark CLbooking" list-id="'.$booking_id.'" room-id="'.$room_id.'"><i class="fas fa-cart-plus"></i> ยกเลิกการจอง</button></td>
			    </tr>
			';
		}
	}

	function cancelCart(){
		global $DATABASE;
		$booking_id = @$_POST["booking_id"];
		$room_id = @$_POST["room_id"];
		$sql = "DELETE FROM tb_booking WHERE booking_id=".$booking_id."";
		$obj = $DATABASE->Query($sql);
		if ($obj) {
			$sql2 = "UPDATE tb_room SET room_status='n' WHERE room_id=".$room_id."";
			$obj2 = $DATABASE->Query($sql2);
			echo "success";
		}
	}

?>