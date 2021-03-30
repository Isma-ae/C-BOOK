<?php
	include("../../php/functions.php");
	$sql = "SELECT * FROM tb_booking INNER JOIN tb_user ON tb_booking.user_id = tb_user.user_id";
		$return = array();
		$return["data"] = $DATABASE->QueryObj($sql);
		return json_encode( $return );