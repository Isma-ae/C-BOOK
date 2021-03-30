<?php
	include("../../php/functions.php");
	$fn = isset( $_POST["fn"] ) ? $_POST["fn"] : "";
	switch ($fn) {
		case 'getRoom'		: getRoom(); 		break;
		case 'addRoom'		: addRoom(); 		break;
		case 'editRoom'		: editRoom(); 		break;
		case 'delRoom'		: delRoom(); 		break;
		default: break;
	}

	function getRoom () {
		global $DATABASE;
		$sql = "SELECT * FROM tb_room ";
		$obj = $DATABASE->QueryObj($sql);
		foreach ($obj as $row) {
			$room_id = $row["room_id"];
			$room_name = $row["room_name"];
			$room_description = $row["room_description"];
			echo '
				<tr data-json="'.$DATABASE->Escape(json_encode($row),'display').'">
			      	<th scope="row">'.$room_name.'</th>
			      	<td>'.$room_description.'</td>
			      	<td>
			      		<button type="butoon" class="btn btn-warning btn-sm update"><i class="far fa-edit"></i> แก้ไข</button>
			      		<button type="butoon" class="btn btn-danger btn-sm del"><i class="far fa-trash-alt"></i> ลบ</button>
			      	</td>
			    </tr>
			';
		}
	}

	function addRoom(){
		global $DATABASE;
		$room_name = @$_POST["room_name"];
		$room_description = @$_POST["room_description"];
		$room_id = $DATABASE->QueryMaxId("tb_room","room_id");
		$sql = "
			INSERT INTO tb_room (
				room_id,
				room_name,
				room_description,
				room_status
			) VALUES (
				'".$room_id."',
				'".$DATABASE->Escape($room_name)."',
				'".$DATABASE->Escape($room_description)."',
				'n'
			)
		";
		$run_query = $DATABASE->Query($sql);
		if($run_query){
			echo "true";
		} else {
			echo "Query Fail.";
		}
	}

	function editRoom(){
		global $DATABASE;
		$room_id = @$_POST["room_id"];
		$room_name = @$_POST["room_name"];
		$room_description = @$_POST["room_description"];
		$sql = "UPDATE tb_room SET 
					room_name='".$DATABASE->Escape($room_name)."',
					room_description='".$DATABASE->Escape($room_description)."'
				WHERE room_id=".$room_id."";
		$run_query = $DATABASE->Query($sql);
		if($run_query){
			echo "true";
		}
	}

	function delRoom(){
		global $DATABASE;
	    $room_id = $_POST["room_id"];
	    $sql = "DELETE FROM tb_room WHERE room_id = ".$room_id."";
	    $run_query = $DATABASE->Query($sql);
	    if($run_query) {
	        echo "true";
	    }
	}
?>