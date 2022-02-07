<?php
    include 'dbconnection.php';

        //get last index No. to auto generate new index No.
        $lastindex_query = "SELECT index_no FROM student ORDER BY index_no DESC LIMIT 1;";

        $lastindex_result = mysqli_query($connection,$lastindex_query);

        $lastindex_assoc = mysqli_fetch_assoc($lastindex_result);

        $lastindex = $lastindex_assoc['index_no'];

        $newindex = $lastindex + 1; //incremented last index for new student
    
?>
<?php
    //include 'dbconnection.php';
    $dropdown_query = "SELECT DISTINCT(course_code) FROM student";

    $dropdown_result = mysqli_query($connection,$dropdown_query);
?>
<?php
    //include 'dbconnection.php';
    $batch_dropdown_query = "SELECT DISTINCT(batch) FROM course";

    $batch_dropdown_result = mysqli_query($connection,$batch_dropdown_query);
?>
<?php
    //data insert
    ob_start();
    if (isset($_POST['btnRegister'])) {
        $post_data = array();
        $post_data['indexno'] = (int) $newindex;
        $post_data['fullname'] = $_POST['txtFullName'];
        $post_data['nic'] = $_POST['txtNIC'];
        $post_data['gender'] = $_POST['txtGender'];
        $post_data['address'] = $_POST['txtAddress'];
        $post_data['phone'] = $_POST['txtTelephone'];
        $post_data['dob'] = $_POST['txtDOB'];
        $post_data['trainingno'] = $_POST['txtTrainingNo'];
        $post_data['coursecode'] = $_POST['txtCourseCode'];
        $post_data['batch'] = $_POST['txtBatch'];
        $post_data['dropout'] = $_POST['txtDropOut'];
        
        $sql = "INSERT INTO student (index_no, name, nic, gender, address, telephone, dob, training_no, course_code, batch, dropout) VALUES ('".$newindex."','".$post_data['fullname']."','".$post_data['nic']."','".$post_data['gender']."','".$post_data['address']."','".$post_data['phone']."',CAST('".$post_data['dob']."' AS DATE),'".$post_data['trainingno']."','".$post_data['coursecode']."','".$post_data['batch']."','".$post_data['dropout']."')";
        $result = mysqli_query($connection,$sql);

        if ($result) {
            echo "<div class='alert alert-success'>Student registered successfully</div>";
            header("location: /tec/students.php");
        } else {
            echo "<div class='alert alert-danger'>Oops... Something went wrong!</div>";
        }

        $_POST = array();

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
    
    <title>Add Student</title>
</head>
<body>
    <!--navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!--<img src="images/Logo_Head.png" Alt="DTET logo">-->
            <div class="navbar-brand title" href="#">Student Results Management System</div>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-2">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="students.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="courses.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="results.php">Results</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--end navbar-->

    <div class="container pt-4">
        <!--info card-->
        <div class="card mt-5">
            <div class="card-header">
                Student Registration
            </div>
            <div class="card-body p-4">
                <div class="">
                    <img src="images/Title.png" width="30%" class="rounded mx-auto d-block" alt="">
                </div>
            </div>
        </div>
        <!--end info card-->

        <!--form card-->
        <div class="card my-3">
            <div class="card-body p-5">
                <!--registartion form-->
                <form method="POST">
                    <fieldset disabled>
                        <div class="mb-3">
                            <label for="txtIndexNo" class="form-label">Index Number</label>
                            <input type="number" class="form-control" id="txtIndexNo" name="txtIndexNo" value="<?php echo $newindex; ?>" aria-describedby="indexHelp">
                        </div>
                    </fieldset>
                    <div class="mb-3">
                        <label for="txtFullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="txtFullName" name="txtFullName" aria-describedby="nameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="txtNIC" class="form-label">NIC Number</label>
                        <input type="text" class="form-control" id="txtNIC" name="txtNIC" aria-describedby="nicHelp">
                    </div>
                    <div class="mb-3">
                        <label for="txtGender" class="form-label">Gender</label>
                        <select class="form-select" class="form-control" id="txtGender" name="txtGender">
                            <option selected>Choose...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txtAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="txtAddress" name="txtAddress" aria-describedby="addressHelp">
                    </div>
                    <div class="mb-3">
                        <label for="txtTelephone" class="form-label">Telephone</label>
                        <input type="number" class="form-control" id="txtTelephone" name="txtTelephone" aria-describedby="phoneHelp">
                    </div>
                    <div class="mb-3">
                        <label for="txtDOB" class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control" id="txtDOB" name="txtDOB" aria-describedby="dateHelp">
                    </div>
                    <div class="mb-3">
                        <label for="txtTrainingNo" class="form-label">Training No</label>
                        <input type="text" class="form-control" id="txtTrainingNo" name="txtTrainingNo" aria-describedby="nameHelp" placeholder="BA/00/BSC00/0/0000">
                    </div>
                    <div class="mb-3">
                        <label for="txtCourseCode" class="form-label">Course Code</label>
                        <select class="form-select" id="txtCourseCode" name="txtCourseCode">
                            <option selected>Choose...</option> 
                            <?php while ($items = mysqli_fetch_assoc($dropdown_result)) {?>
                                <option value="<?php echo $items['course_code'] ?>"><?php echo $items['course_code'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txtBatch" class="form-label">Batch</label>
                        <select class="form-select" id="txtBatch" name="txtBatch">
                            <option selected>Choose...</option> 
                            <?php while ($items = mysqli_fetch_assoc($batch_dropdown_result)) {?>
                                <option value="<?php echo $items['batch'] ?>"><?php echo $items['batch'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txtDropOut" class="form-label">Drop Out</label>
                        <select class="form-select" id="txtDropOut" name="txtDropOut">
                            <option selected>Choose...</option> 
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <input type="submit" class="btn btn-primary" id="btnRegister" name="btnRegister" value="Register"/>
                    </div> 
                </form>
                <!--end registartion form-->
            </div>
        </div>
        <!--end form card-->
    </div>
</body>
</html>