<?php

	include("../../php/functions.php");
	$room_id = @$_POST["room_id"];
	$user_id = @$_POST["user_id"];
	$booking_phone = @$_POST["booking_phone"];
	$booking_date = @$_POST["booking_date"];
	$time_start = @$_POST["time_start"];
	$time_end = @$_POST["time_end"];
	$booking_id = $DATABASE->QueryMaxId("tb_booking","booking_id");
	$sql = "
		INSERT INTO tb_booking (
			booking_id,
			room_id,
			user_id,
			booking_phone,
			booking_date,
			time_start,
			time_end,
			booking_status
		) VALUES (
			'".$booking_id."',
			'".$room_id."',
			'".$user_id."',
			'".$DATABASE->Escape($booking_phone)."',
			'".$DATABASE->Escape($booking_date)."',
			'".$DATABASE->Escape($time_start)."',
			'".$DATABASE->Escape($time_end)."',
			'w'
		)
	";
	$run_query = $DATABASE->Query($sql);
	if($run_query){
		echo "true";
	}else{
		echo $sql;
	}
?>