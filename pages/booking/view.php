<script src="pages/booking/script.js"></script>

<div class="bg-light p-2 rounded my-con">
	<div class="my-page">
		<p><i class="fas fa-calendar"></i> ห้องปฏิบัติการคอมพิวเตอร์/รายการ</p>
	</div>

	<h2><i class="far fa-building"></i> รายการห้องปฏิบัติการคอมพิวเตอร์</h2>
	<br>

	<table class="table table-striped">
		<thead>
		    <tr>
		      	<th scope="col">ห้อง</th>
		      	<th scope="col">รายละเอียด</th>
		      	<th scope="col">สถานะ</th>
		      	<th scope="col"></th>
		    </tr>
		</thead>
		<input type="hidden" id="user_id" value="<?php echo $user_id;?>">
		<tbody id="c_room">
		</tbody>
	</table>
</div>