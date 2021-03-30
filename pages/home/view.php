<!--<script src="pages/home/script.js"></script>-->
<?php
	$sql = "SELECT * 
			FROM tb_booking 
			INNER JOIN tb_user 
			ON tb_booking.user_id = tb_user.user_id 
			INNER JOIN tb_room 
			ON tb_booking.room_id = tb_room.room_id WHERE tb_booking.booking_status = 'y'";
	$obj = $DATABASE->QueryObj($sql);
	if(sizeof($obj) > 0){
		foreach ($obj as $row) {
			$return[] = array('id' => $row['booking_id'], 
							'title' => $row['room_name'], 
							'start' => $row['booking_date'], 
							'end' => $row['booking_date'],
							'user_name' => $row['user_name'],
							'user_lname' => $row['user_lname'],
							'room_description' => $row['room_description'],
							'time_start' => $row['time_start'],
							'time_end' => $row['time_end']
						);
		}
	}else{
		$return = '';
	}
	
?>
<script>
	$(document).ready(function() {
		var data = <?php echo json_encode($return); ?>;
	    $('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: moment().format("YYYY-MM-DD"),
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: data,
			eventClick: function(calEvent, jsEvent, view) {
				$('#room_name').val(calEvent.title);
				$('#user_name').val(calEvent.user_name+' '+calEvent.user_lname);
				$('#room_description').val(calEvent.room_description);
				$('#time_start').val(calEvent.time_start);
				$('#time_end').val(calEvent.time_end);
				$('#booking-modal').modal('show');
			 }
		});
	});
</script>
<div class="bg-light p-2 rounded my-con">
	<div class="my-page">
		<p><i class="fas fa-home"></i> หน้าหลัก</p>
	</div>
	<div id="calendar"></div>
</div>

<div class="modal" tabindex="-1" id="booking-modal">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title">รายละเอียดการจอง</h5>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<div class="modal-body">
        		<div class="mb-3 row">
    				<label for="room_name" class="col-sm-2 col-form-label">ชื่อห้อง :</label>
    				<div class="col-sm-10">
      					<input type="text" readonly class="form-control-plaintext" id="room_name">
    				</div>
  				</div>
  				<div class="mb-3 row">
    				<label for="user_name" class="col-sm-2 col-form-label">ชื่อผู้จอง :</label>
    				<div class="col-sm-10">
      					<input type="text" readonly class="form-control-plaintext" id="user_name">
    				</div>
  				</div>
  				<div class="mb-3 row">
    				<label for="room_description" class="col-sm-2 col-form-label">รายละเอียดห้อง :</label>
    				<div class="col-sm-10">
      					<input type="text" readonly class="form-control-plaintext" id="room_description">
    				</div>
  				</div>
  				<div class="mb-3 row">
    				<label for="time_start" class="col-sm-2 col-form-label">จองเวลา</label>
    				<div class="col-sm-10">
      					<input type="text" readonly class="form-control-plaintext" id="time_start">
    				</div>
  				</div>
  				<div class="mb-3 row">
    				<label for="time_end" class="col-sm-2 col-form-label">ถึงเวลา</label>
    				<div class="col-sm-10">
      					<input type="text" readonly class="form-control-plaintext" id="time_end">
    				</div>
  				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      		</div>
    	</div>
  	</div>
</div>

		  	