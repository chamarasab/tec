<?php
    include 'dbconnection.php';
?>
<?php
    //include 'dbconnection.php';
    $dropdown_query = "SELECT DISTINCT(trade_name) FROM course";

    $dropdown_result = mysqli_query($connection,$dropdown_query);
?>
<?php
    //data insert
    ob_start();
    if (isset($_POST['btnCreate'])) {
        $post_data = array();
        $post_data['courseId'] = $_POST['txtCourseId'];
        $post_data['courseCode'] = $_POST['txtCourseCode'];
        $post_data['courseName'] = $_POST['txtCourseName'];
        $post_data['tradeName'] = $_POST['txtTradeName'];
        $post_data['courseType'] = $_POST['txtCourseType'];
        $post_data['batch'] = $_POST['txtBatch'];
        $post_data['duration'] = $_POST['txtDuration'];
        $post_data['nvqLevel'] = $_POST['txtNVQLevel'];

        
        //INSERT INTO `course`(`course_id`, `course_code`, `course_name`, `trade_name`, `course_type`, `batch`, `duration`, `nvq_level`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])
        $sql = "INSERT INTO course (course_id, course_code, course_name, trade_name, course_type, batch, duration, nvq_level) VALUES ('".$post_data['courseId']."','".$post_data['courseCode']."','".$post_data['courseName']."','".$post_data['tradeName']."','".$post_data['courseType']."','".$post_data['batch']."','".$post_data['duration']."','".$post_data['nvqLevel']."')";
        $result = mysqli_query($connection,$sql);

        if ($result) {
            echo "<div class='alert alert-success'>New course added successfully</div>";
            header("location: /tec/courses.php");
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
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="css/floating-action-button.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>    
    <title>Add Course</title>
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
                Create New Course
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
                    <div class="mb-3">
                        <label for="txtCourseId" class="form-label">Course Id</label>
                        <input type="text" class="form-control" id="txtCourseId" name="txtCourseId" placeholder="CID23">
                    </div>
                    <div class="mb-3">
                        <label for="txtCourseCode" class="form-label">Course Code</label>
                        <input type="text" class="form-control" id="txtCourseCode" name="txtCourseCode" placeholder="BSC 04">
                    </div>
                    <div class="mb-3">
                        <label for="txtCourseName" class="form-label">Course Name</label>
                        <input type="text" class="form-control" id="txtCourseName" name="txtCourseName">
                    </div>
                    <div class="mb-3">
                        <label for="txtTradeName" class="form-label">Trade Name</label>
                        <select class="form-select" class="form-control" id="txtTradeName" name="txtTradeName">
                            <option selected>Choose...</option>
                            <?php while ($items = mysqli_fetch_assoc($dropdown_result)) {?>
                                <option value="<?php echo $items['trade_name'] ?>"><?php echo $items['trade_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txtCourseType" class="form-label">Course Type</label>
                        <select class="form-select" id="txtCourseType" name="txtCourseType">
                            <option selected>Choose...</option> 
                            <option value="Full time">Full time</option>
                            <option value="Part time">Part time</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txtBatch" class="form-label">Batch No</label>
                        <input type="number" class="form-control" id="txtBatch" name="txtBatch" placeholder="1">
                    </div>
                    <div class="mb-3">
                        <label for="txtDuration" class="form-label">Course Duration</label>
                        <input type="text" class="form-control" id="txtDuration" name="txtDuration" placeholder="24 Months">
                    </div>
                    <div class="mb-3">
                        <label for="txtTrainingNo" class="form-label">Training No</label>
                        <input type="text" class="form-control" id="txtTrainingNo" name="txtTrainingNo" aria-describedby="nameHelp" placeholder="BA/00/BSC00/0/0000">
                    </div>
                    <div class="mb-3">
                        <label for="txtNVQLevel" class="form-label">NVQ Level</label>
                        <select class="form-select" id="txtNVQLevel" name="txtNVQLevel">
                            <option selected>Choose...</option> 
                            <option value="4">4</option>  
                            <option value="5">5</option>  
                            <option value="6">6</option>              
                        </select>
                    </div>
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <input type="submit" class="btn btn-primary" id="btnCreate" name="btnCreate" value="Create"/>
                    </div> 
                </form>
                <!--end registartion form-->
            </div>
        </div>
        <!--end form card-->
    </div>
    <?php include('footer.php') ?>
</body>
</html>