$(document).ready(function(){
	
	getRoom();
	function getRoom() {
		var user_id = $('#user_id').val();
		if (user_id == '') {
			window.location.href = './';
			return false;
		}else{
			$.ajax({
				url:  "pages/add-room/action.php",
				method: "POST",
				data: { fn:"getRoom"},
				success : function(data){
					$("#my_room").html(data);
					$("#my_room").find('.update').click(function(event) {
						event.preventDefault();
						var data_json = JSON.parse( $(this).closest('tr').attr("data-json") );
						showEdit(data_json);
					});
					$("#my_room").find('.del').click(function(event) {
						event.preventDefault();
						var data_json = JSON.parse( $(this).closest('tr').attr("data-json") );
						showDel(data_json);
					});
				}
			});
		}
	}

	$("#form-room").submit(function(event) {
		event.preventDefault();
    	var formData = new FormData(this);
		$.ajax({
			url: "pages/add-room/action.php", // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
				if (data == "true") {
					alert("สำเร็จ");
					getRoom();
					$("#room-modal").modal('hide');
				}else if(data=='false'){
					alert("ไม่สำเร็จ เนื่องจาก"+data);
				}
			}
		});
	});

	$('#add_room').click(function(event) {
		$("#room_id").val("");
		$("#room_name").val("");
		$("#room_description").val("");
		$("#room-modal").modal('show');
		$("#insert-room").show();
		$("#edit-room").hide();
	});
	$("#insert-room").click(function(event){
    	$("[name=fn]").val("addRoom");
    	$("#form-room").submit();
    });

    function showEdit(data) {
    	$("#room_id").val(data.room_id);
		$("#room_name").val(data.room_name);
		$("#room_description").val(data.room_description);
		$("#room-modal").modal('show');
		$("#insert-room").hide();
		$("#edit-room").show();
    };
    $("#edit-room").click(function(event) {
    	$("[name=fn]").val("editRoom");
    	$("#form-room").submit();
    });

    function showDel(data) {
    	if (confirm("คุณต้องการลบห้องนี้ใช่หรือไม่") == true) {
    		var	room_id = data.room_id;
			$.ajax({
				url:  "pages/add-room/action.php",
				method: "POST",
				data : {fn:"delRoom",room_id:room_id},
				success : function(data){
					
					if (data == "true") {
						alert("ลบสำเร็จ");
						getRoom();
				    }else{
			  			swal({title: "ไม่สำเร็จ", text: "ลบไม่สำเร็จ", type: "error"});
			  		}
			    }
	  	
			})
    	}
	}
});