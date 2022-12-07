<?php 
session_start();
if(!isset($_SESSION['user_data']) && empty($_SESSION['user_data'])){
    header('location: login_form.php');
}else{
    $logged_user = $_SESSION['user_data'];
}
?>

<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <h3>hi, <span></span></h3>
            <h1>welcome <span><?php echo $logged_user['name'] ;?></span></h1>
            <p>this is your profile page</p>
            <ul>
                <li>Email: <span><?php echo $logged_user['email'] ;?></span></li>
            </ul>
            <a href="logout.php" class="btn">logout</a>
        </div>
    </div>

</body></html>