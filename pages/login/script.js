$(document).ready(function() {
	$('#login').click(function(event) {
		var user_email = $('#user_email').val();
		var user_password = $('#user_password').val();
		$.ajax({
			url:  "pages/login/action.php",
			method: "POST",
			data: { fn:"login", user_email:user_email, user_password:user_password},
			success : function(data){
				if(data == 'true'){
					window.location.href = '?page=booking';
				}else{
					alert(data);
				}
			}
		})
	});
	$('#logout').click(function(event) {
		$.ajax({
			url:  "pages/login/action.php",
			method: "POST",
			data: { fn:"logout"},
			success : function(data){
				if(data == 'true'){
					window.location.href = './';
				}else{
					alert(data);
				}
			}
		});
	});
});