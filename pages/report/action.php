<?php

include("../../php/functions.php");
	$fn = isset( $_POST["fn"] ) ? $_POST["fn"] : "";
	switch ($fn) {
		case 'loadReport'		: loadReport(); 		break;
		case 'approveReport'	: approveReport(); 		break;
		case 'notapproveReport'	: notapproveReport(); 	break;
		case 'cancelReport'		: cancelReport(); 		break;
		default: break;
	}

	function loadReport () {
		global $DATABASE;
		$sql = "SELECT * FROM tb_booking INNER JOIN tb_room ON tb_booking.room_id=tb_room.room_id";
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
				$btn_approve = '<td><button type="butoon" class="btn btn-success btn-sm btnApprove" list-id="'.$booking_id.'" room-id="'.$room_id.'"><i class="fas fa-check"></i> อนุมัติ</button><button type="butoon" class="btn btn-danger btn-sm btnNApprove" list-id="'.$booking_id.'" room-id="'.$room_id.'"><i class="fas fa-times"></i> ไม่อนุมัติ</button><button type="butoon" class="btn btn-dark btn-sm btnCApprove" list-id="'.$booking_id.'" room-id="'.$room_id.'"><i class="far fa-trash-alt"></i> ลบการจอง</button></td>';
			}else if($booking_status == 'n'){
				$booking_status_message = 'ไม่อนุมัติ';
				$btn_approve = '<td><button type="butoon" class="btn btn-success btn-sm btnApprove" list-id="'.$booking_id.'" room-id="'.$room_id.'"><i class="fas fa-check"></i> อนุมัติ</button><button type="butoon" class="btn btn-dark btn-sm btnCApprove" list-id="'.$booking_id.'" room-id="'.$room_id.'"><i class="far fa-trash-alt"></i> ลบการจอง</button></td>';
			}else{
				$booking_status_message = 'อนุมัติ';
				$btn_approve = '<td><button type="butoon" class="btn btn-danger btn-sm btnNApprove" list-id="'.$booking_id.'" room-id="'.$room_id.'"><i class="fas fa-times"></i> ไม่อนุมัติ</button><button type="butoon" class="btn btn-dark btn-sm btnCApprove" list-id="'.$booking_id.'" room-id="'.$room_id.'"><i class="far fa-trash-alt"></i> ลบการจอง</button></td>';
			}
			echo '
				<tr>
			      	<th scope="row">'.$room_name.'</th>
			      	<td>'.$booking_date.'</td>
			      	<td>'.$time_start.'</td>
			      	<td>'.$time_end.'</td>
			      	<td>'.$booking_status_message.'</td>
			      	'.$btn_approve.'
			    </tr>
			';
		}
	}

	function approveReport(){
		global $DATABASE;
		$booking_id = @$_POST["booking_id"];
		$room_id = @$_POST["room_id"];
		$sql = "UPDATE tb_booking SET booking_status='y' WHERE booking_id=".$booking_id."";
		$obj = $DATABASE->Query($sql);
		if ($obj) {
			$sql2 = "UPDATE tb_room SET room_status='y' WHERE room_id=".$room_id."";
			$obj2 = $DATABASE->Query($sql2);
			echo "success";
		}
	}

	function notapproveReport(){
		global $DATABASE;
		$booking_id = @$_POST["booking_id"];
		$room_id = @$_POST["room_id"];
		$sql = "UPDATE tb_booking SET booking_status='n' WHERE booking_id=".$booking_id."";
		$obj = $DATABASE->Query($sql);
		if ($obj) {
			$sql2 = "UPDATE tb_room SET room_status='n' WHERE room_id=".$room_id."";
			$obj2 = $DATABASE->Query($sql2);
			echo "success";
		}
	}

	function cancelReport(){
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