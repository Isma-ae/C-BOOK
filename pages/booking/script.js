$(document).ready(function() {
	
	loadRoom()
	function loadRoom() {
		$.ajax({
			url:  "pages/booking/action.php",
			method: "POST",
			data: { fn:"loadRoom"},
			success : function(data){
				$("#c_room").html(data);
				$('.booking').click(function(event) {
					var user_id = $('#user_id').val();
					if (user_id == '') {
						alert("กรุณาเข้าสู่ระบบก่อนใช้งาน");
						window.location.href = '?page=login';
					}else{
						var bookin_id = $(this).attr('booking-id');
						$.ajax({
							url:  "pages/booking/action.php",
							method: "POST",
							data: { fn:"checkRoom", booking_id:bookin_id},
							success : function(data){
								if(data == 'y'){
									alert("ห้องนี้ยู่ในสถานะจองแล้ว กรุณาเลือกห้องอื่น")
								}else{
									window.location.href = '?page=booking-room&id='+bookin_id+'';
								}
							}
						});
					}
				});
			}
		});
	}
});