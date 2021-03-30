
<?php
    session_start();
    include("php/functions.php");
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }else{
        $user_id = '';
    }
    $page = isset($_GET['page']) ? $_GET['page']:'home'; 
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.82.0">
        <title>C-BOOKING</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200;300;400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="asset/style.css">
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://fullcalendar.io/js/fullcalendar-2.4.0/lib/moment.min.js"></script>
        <script src="https://fullcalendar.io/js/fullcalendar-2.4.0/lib/jquery.min.js"></script>

        <link href='https://fullcalendar.io/js/fullcalendar-2.4.0/fullcalendar.css' rel='stylesheet' />
        <script src='https://fullcalendar.io/js/fullcalendar-2.4.0/fullcalendar.min.js'></script>

        <script src="asset/moment.js"></script>
        </script>
    </head>
    <body class="my-body">
        
        <?php 
            include('master/nav.php')
        ?>
        <div class="text-center my-logo">
            <h1><i class="far fa-calendar-alt"></i></h1>
            <h2>C-booking</h2>
            <p><strong>ระบบจองห้องปฏิบัติการคอมพิวเตอร์</strong></p>
        </div>
        <main class="container">
            <?php  
                switch ($page) {
                    case 'home'             : include("pages/home/view.php");           break;
                    case 'booking'          : include("pages/booking/view.php");        break;
                    case 'login'            : include("pages/login/view.php");          break;
                    case 'booking-room'     : include("pages/booking-room/view.php");   break;
                    case 'list'             : include("pages/list/view.php");           break;
                    case 'report'           : include("pages/report/view.php");         break;
                    case 'add-room'         : include("pages/add-room/view.php");         break;
                    default:break;
                }
            ?>
        </main>
        
              
    </body>
</html>
