$(document).ready(function() {
	var user_id = $('#user_id').val();
	loadCart();
	function loadCart() {
		if (user_id == '') {
			window.location.href = './';
			return false;
		}else{	
			$.ajax({
				url:  "pages/list/action.php",
				method: "POST",
				data: { fn:"loadCart", user_id:user_id},
				success : function(data){
					$("#my_cart").html(data);
					$('.CLbooking').click(function(event) {
						if (confirm("คุณต้องการยกเลิกการจองใช่หรือไม่") == true) {
						    var booking_id = $(this).attr('list-id');
						    var room_id = $(this).attr('room-id');
							$.ajax({
								url:  "pages/list/action.php",
								method: "POST",
								data: { fn:"cancelCart", booking_id:booking_id, room_id:room_id},
								success : function(data){
									if (data == 'success') {
										alert("ยกเลิกการจองของคุณแล้ว");
										loadCart();
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