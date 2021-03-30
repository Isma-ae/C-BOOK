$(document).ready(function() {
		var user_id = $('#user_id').val();
		if (user_id == '') {
			window.location.href = './';
		}
	
	$("#form-booking").submit(function(event) {
		event.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			url: "pages/booking-room/action.php",
			type: "POST",
			data: formData,
			contentType: false,
			cache: false,
			processData:false,
			success: function(data)
			{
				if (data == "true") {
					alert("จองสำเร็จ รอการอนุมัตจากผู้ดูแลระบบ");
					window.location.href = "?page=list";
				}else{
					alert("ไม่สำเร็จ เนื่องจาก "+data);
				}
			}
		});
	});
});
