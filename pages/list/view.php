<script src="pages/list/script.js"></script>
<input type="hidden" id="user_id" value="<?php echo $user_id;?>">
<div class="bg-light p-2 rounded my-con">
	<div class="my-page">
		<p><i class="fas fa-calendar"></i> ห้องปฏิบัติการคอมพิวเตอร์ / การจอง</p>
	</div>
	<h2><i class="fas fa-list"></i> รายการจองของฉัน</h2>
	<br>

	<table class="table table-striped">
		<thead>
		    <tr>
		      	<th scope="col">ห้อง</th>
		      	<th scope="col">วันที่</th>
		      	<th scope="col">เวลาเริ่ม</th>
		      	<th scope="col">เวลาสิ้นสุด</th>
		      	<th scope="col">สถานะ</th>
		      	<th scope="col"></th>
		    </tr>
		</thead>
		<tbody id="my_cart">
		</tbody>
	</table>
</div>