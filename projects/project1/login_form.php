<?php
include_once("config/db_conn.php");
session_start();
if(isset($_POST['submit'])){
    $database_conn= new db_class;
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=md5($_POST['password']);
    $cpass=md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $sql="SELECT * FROM user_form WHERE email='$email' && password='$pass'";
    $results =$database_conn->query($sql);
    $results->execute();

    if($results->rowCount() > 0){
        $row = $database_conn->fetch_Assoc($results)[0];

        // if($row['user_type'] == 'admin'){

        //     $_SESSION['admin_name'] = $row['name'];
        //     header('location: admin_page.php');

        // }elseif($row['user_type'] == 'user'){

        //     $_SESSION['user_name'] = $row['name'];
        //     header('location: user_page.php');
        // }

        $_SESSION['user_data'] = $row;
        header('location: profile.php');
    }else{
        $error[] ='incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <h3>login form</h3>
            <?php
            if(isset($error)){
                foreach($error as $errors){
                    echo '<span class="error-msg">' . $errors .'</span>';
                }
            }
            ?>
            <input type="hidden" name="name">
            <input type="text" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="hidden" name="cpassword" required placeholder="confirm your password">
           
            <input type="submit" name="submit" value="Login now" class="form-btn">
            <p>Don't have account?<a href="register_form.php">Register now</a></p>
        </form>
    </div>
</body>
</html>