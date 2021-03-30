$(document).ready(function() {
		
	loadReport();
	function loadReport() {
		var user_id = $('#user_id').val();
		if (user_id == '') {
			window.location.href = './';
			return false;
		}else{
			$.ajax({
				url:  "pages/report/action.php",
				method: "POST",
				data: { fn:"loadReport"},
				success : function(data){
					$("#my_report").html(data);
					$('.btnApprove').click(function(event) {
					    var booking_id = $(this).attr('list-id');
					    var room_id = $(this).attr('room-id');
						$.ajax({
							url:  "pages/report/action.php",
							method: "POST",
							data: { fn:"approveReport", booking_id:booking_id, room_id:room_id},
							success : function(data){
								if (data == 'success') {
									loadReport();
								}
							}
						});
					});
					$('.btnNApprove').click(function(event) {
					    var booking_id = $(this).attr('list-id');
					    var room_id = $(this).attr('room-id');
						$.ajax({
							url:  "pages/report/action.php",
							method: "POST",
							data: { fn:"notapproveReport", booking_id:booking_id, room_id:room_id},
							success : function(data){
								if (data == 'success') {
									loadReport();
								}
							}
						});
					});
					$('.btnCApprove').click(function(event) {
						if (confirm("คุณต้องการลบการจองนี้ใช่หรือไม่") == true) {
						    var booking_id = $(this).attr('list-id');
						    var room_id = $(this).attr('room-id');
							$.ajax({
								url:  "pages/report/action.php",
								method: "POST",
								data: { fn:"cancelReport", booking_id:booking_id, room_id:room_id},
								success : function(data){
									if (data == 'success') {
										alert("ยกเลิกการจองของคุณแล้ว");
										loadReport();
									}
								}
							});	
						}
					});
				}
			});
		}
	}
});