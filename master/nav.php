<script src="pages/login/script.js"></script>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  	<div class="container">
    	<a class="navbar-brand" href="./">หน้าหลัก</a>
    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      		<span class="navbar-toggler-icon"></span>
    	</button>
	    <div class="collapse navbar-collapse" id="navbarCollapse">
	      	<ul class="navbar-nav me-auto mb-2 mb-md-0">
	        	<li class="nav-item">
	          		<a class="nav-link" href="?page=booking">จองห้องปฏิบัติการคอมพิวเตอร์</a>
	        	</li>
	        	<?php
	        		if(!isset($_SESSION["user_id"])){
				        echo '
				        	<li class="nav-item">
				          		<a class="nav-link" href="?page=login">เข้าสู่ระบบ</a>
				        	</li>
				        ';
				    }else{
				    	$user_name = $_SESSION["user_name"];
				    	$user_lname = $_SESSION["user_lname"];
				        echo '
				        	<li class="nav-item">
				          		<a class="nav-link" href="?page=list">รายการจองของฉัน</a>
				        	</li>
				        	<li class="nav-item dropdown">
					          	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					            สวัสดี '.$user_name.' '.$user_lname.'
					          	</a>
					    ';
					    $user_status = $_SESSION["user_status"];
					    if ($user_status == 'a') {
					    	echo '
					    			<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						            	<li><a class="dropdown-item" href="?page=report">รายงาน</a></li>
						            	<li><a class="dropdown-item" href="?page=add-room">เพิ่มห้องปฎิบัติการคอมพิวเตอร์</a></li>
						            	<li><a class="dropdown-item" href="#" id="logout">ออกจากระบบ</a></li>
						          	</ul>
	        					</li>
					    	';
					    }else{
					    	echo '
					    			<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						            	<li><a class="dropdown-item" href="#" id="logout">ออกจากระบบ</a></li>
						          	</ul>
	        					</li>
					    	';
					    }
				    }
	        	?>
	      	</ul>
	    </div>
  	</div>
</nav>