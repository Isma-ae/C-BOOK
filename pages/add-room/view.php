<script src="pages/add-room/script.js"></script>
<input type="hidden" id="user_id" value="<?php echo $user_id;?>">
<div class="bg-light p-2 rounded my-con">
	<div class="my-page">
		<p><i class="fas fa-calendar"></i> ห้องปฏิบัติการคอมพิวเตอร์ / เพิ่มห้อง</p>
	</div>
	<h2><i class="fas fa-list"></i> เพิ่มห้องปฏิบัติการคอมพิวเตอร์</h2>
	<br>
	<button type="button" class="btn btn-success" id="add_room"><i class="fas fa-plus"></i> เพิ่มห้องปฏิบัติการคอมพิวเตอร์</button>
	<br><br>
	<table class="table table-striped">
		<thead>
		    <tr>
		      	<th scope="col">ชื่อห้อง</th>
		      	<th scope="col">รายละเอียด</th>
		      	<th scope="col"></th>
		    </tr>
		</thead>
		
		<tbody id="my_room">
		</tbody>
	</table>
</div>

<div class="modal" tabindex="-1" id="room-modal">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title">รายละเอียดการจอง</h5>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<div class="modal-body">
      			<form enctype="multipart/form-data" method="post" id="form-room">
      				<input type="hidden" id="room_id" name="room_id">
                    <input type="hidden" name="fn">
	        		<div class="mb-3 row">
				    	<label for="room_name" class="col-sm-2 col-form-label">ชื่อห้อง : </label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" id="room_name" name="room_name">
				    	</div>
				  	</div>
				  	<div class="mb-3 row">
				    	<label for="room_description" class="col-sm-2 col-form-label">รายละเอียด : </label>
				    	<div class="col-sm-10">
				      		<textarea type="text" class="form-control" id="room_description" name="room_description" rows="5"></textarea>
				    	</div>
				  	</div>
				  	<div class="mb-3 row">
				  		<label for="buttonAll" class="col-sm-2 col-form-label"></label>
				    	<div class="col-sm-10">
				      		<button type="button" class="btn btn-success" id="insert-room" style="display: none;">เพิ่มห้อง</button>
                            <button type="button" class="btn btn-warning" id="edit-room" style="display: none;">แก้ไขห้อง</button>
				    	</div>
				  	</div>
			  	</form>
      		</div>
    	</div>
  	</div>
</div>