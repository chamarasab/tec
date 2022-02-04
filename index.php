<?php
    include 'dbconnection.php';

    ob_start();
        if (isset($_POST['btnLogin'])) {
            $name = $_POST['txtUserName'];
            $password = $_POST['txtPassword'];

            $query = "SELECT * FROM user WHERE username='".$name."' AND password='".$password."'";
            $result = mysqli_query($connection,$query);
            
            if ($result->num_rows > 0) {                                    //checking whether got any result from query executon
                echo "<div class='alert alert-success'> Valid User </div>";

                $userrole="Student";
                while ($record = mysqli_fetch_assoc($result)) {             //if there's any values in $result, get that data in to an associative array 
                        $userrole = $record['role'];                            //if some value contains under 'role' key assign that value to $userrole String variable
                }
                    
                if ($userrole=='Admin') {
                        header("location: /tec/students.php");
                } else if ($userrole=="Student") {
                        header("location: /tec/students.php");
                } else {
                        echo "<div class='alert alert-danger'> Valid User, but user role $userrole is not okay </div>";
                }
                  
            } else {
                    echo "<div class='alert alert-danger'> Invalid User </div>";
            }
        }
    ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center my-5 p-5">
            <div class="card col-6">
                <div class="card-body p-4">
                    <h5 class="card-title text-center">Technical College</h5>
                    <p class="card-text fs-4 text-center">Sign In</p>
                    <!--login form-->
                        <form method="POST">
                            <div class="mb-3">
                                <label for="txtUserName" class="form-label">Username</label>
                                <input type="email" class="form-control" id="txtUserName" name="txtUserName" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="txtPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="txtPassword" name="txtPassword">
                            </div>
                           
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <input type="submit" class="btn btn-primary" id="btnLogin" name="btnLogin" value="Sign In"/>
                            </div>    
                        </form>
                    <!--login form end-->
                    <p class="card-text my-4 text-center">Forgot password?</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>