<script src="pages/booking-room/script.js"></script>

<input type="hidden" id="user_id" value="<?php echo $user_id;?>">
<div class="bg-light p-2 rounded my-con">
	<div class="my-page">
		<p><i class="fas fa-calendar"></i> ห้องปฏิบัติการคอมพิวเตอร์ / จองห้องปฏิบัติการคอมพิวเตอร์ / เพิ่ม</p>
	</div>

	<h2><i class="fas fa-edit"></i> เพิ่ม การจอง</h2>
	<br>
	<h2>รายละเอียดของ การจอง</h2>
	<?php
		$room_id = $_GET['id'];
		$sql1 = "SELECT * FROM tb_room WHERE room_id=".$room_id."";
		$sql2 = "SELECT * FROM tb_user WHERE user_id=".$user_id."";
		$obj1 = $DATABASE->QueryObj($sql1);
		$obj2 = $DATABASE->QueryObj($sql2);
		foreach ($obj1 as $row1) {
			$room_name = $row1['room_name'];
	?>

	<form id="form-booking">
		<input type="hidden" name="fnBooking" value="fnBooking">
		<div class="row">
		    <div class="col">
		    	<label for="room_name" class="form-label">ชื่อห้อง</label>
		      	<div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="far fa-building"></i></span>
                    <input type="hidden" id="room_id" name="room_id" value="<?php echo $room_id?>">
                    <input type="text" id="room_name" class="form-control" aria-label="Roomrname" aria-describedby="basic-addon1" value="<?php echo $room_name;?>" disabled>
                </div>
		    </div>
		<?php 
		} 
		foreach ($obj2 as $row2) {
			$user_name = $row2['user_name'];
		?>
		    <div class="col">
		    	<label for="user_name" class="form-label">ชื่อผู้จอง</label>
		      	<div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-user"></i></span>
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id?>">
                    <input type="text" id="user_name" class="form-control" aria-label="Username" aria-describedby="basic-addon2" value="<?php echo $user_name?>" disabled>
                </div>
		    </div>
		</div>
		<?php } ?>
		<div class="row">
		    <div class="col">
		    	<label for="booking_phone" class="form-label">โทรศัพท์</label>
		      	<div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3"><i class="fas fa-phone"></i></span>
                    <input type="text" id="booking_phone" name="booking_phone" class="form-control" aria-label="Bookingphone" aria-describedby="basic-addon3" required>
                </div>
		    </div>
		    <div class="col">
		    	<label for="booking_date" class="form-label">วันที่</label>
		      	<div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon4"><i class="far fa-calendar-alt"></i></span>
                    <input type="date" id="booking_date" name="booking_date" class="form-control" aria-label="Bookingdate" aria-describedby="basic-addon4" required>
                </div>
		    </div>
		</div>
		<div class="row">
		    <div class="col">
		    	<label for="time_start" class="form-label">เวลาเริ่มต้น</label>
		      	<div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon5"><i class="far fa-clock"></i></span>
                    <input type="time" id="time_start" name="time_start" class="form-control" aria-label="Timestart" aria-describedby="basic-addon5" required>
                </div>
		    </div>
		    <div class="col">
		    	<label for="time_end" class="form-label">เวลาสิ้นสุด</label>
		      	<div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon6"><i class="far fa-clock"></i></span>
                    <input type="time" id="time_end" name="time_end" class="form-control" aria-label="Timeend" aria-describedby="basic-addon6" required>
                </div>
		    </div>
		</div>
		<button type="submit" class="btn btn-success"><i class="far fa-save"></i> บันทึก</button>
	</form>
	
</div>