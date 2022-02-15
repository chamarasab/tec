<?php
    $connection = mysqli_connect('localhost','root','','tec');
?>
<?php
    $student_index = 0;
    $student_name = "";
    $student_nic = "";
    $course_name = "";
    $course_code = "";
    $course_type = "";
    $course_duration = "";
    $course_nvq = "";
    $subject_count = 0;

    if (isset($_POST['Search'])) {
        $search = $_POST['txtSearch'];
        $search_query = "SELECT student.index_no,student.name,student.nic,course.course_name,course.course_code,course.course_type,course.duration,course.nvq_level FROM student INNER JOIN course ON student.course_code=course.course_code WHERE student.index_no='".$search."'";
        $search_result = mysqli_query($connection,$search_query);
        if ($search_result) {
            if (mysqli_num_rows($search_result) > 0) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Student Found</div>";
                while ($items = mysqli_fetch_assoc($search_result)) {
                    $subject_count += 1;
                    $student_index = $items['index_no'];
                    setDefaultIndex($student_index);
                    $student_name = $items['name'];
                    $student_nic = $items['nic'];
                    $course_name = $items['course_name'];
                    $course_code = $items['course_code'];
                    $course_type = $items['course_type'];
                    $course_duration = $items['duration'];
                    $course_nvq = $items['nvq_level'];
                }
            } else {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No Student Found</div>";
            }
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".mysql_error()."</div>";
        }
        $_POST=array();
    }

    function setDefaultIndex(int $student_index)
    {
        $connection = mysqli_connect('localhost','root','','tec'); //😑
        $setdefault_query = "ALTER TABLE result ALTER index_no SET DEFAULT '$student_index';";
        $setdefault_result = mysqli_query($connection,$setdefault_query);
    }
?>

<?php

    if (isset($_POST['save_multiple_data'])) {
        $subject = $_POST['subject'];
        $mark = $_POST['mark'];

        foreach ($subject as $key => $value) {
            //echo $value . " - " . $mark[$key];
            
            $insert_query = "INSERT INTO result(subject_id, results) VALUES('$value','$mark[$key]')";
            $result = mysqli_query($connection,$insert_query);
        }

        if ($result) {
            $_SESSION['status'] = "Multiple data inserted successfully";
            header("Location: results.php");
            exit(0);
        } else {
            $_SESSION['status'] = "Multiple data insert failed !";
            header("Location: results.php");
            exit(0);
        }
        
    }
?>

<?php 
    //retrieving subjects detais for result entering table
    $subject_query = "SELECT subject.subject_id,subject.subject_name FROM `subject` WHERE subject.course_code = '".$course_code."'";
    $subject_result = mysqli_query($connection,$subject_query);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="css/floating-action-button.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/ico">
    <script src="js/bootstrap.min.js"></script>
    <title>Exam Results - SRM System</title>
</head>
<body>
    <!--navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Results Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-2">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="students.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="courses.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="results.php">Results</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>-->
                </ul>
            </div>
        </div>
    </nav>
    <!--end navbar-->

    <div class="container pt-4">
        <!--search card-->
        <div class="card mt-5">
            <!--<div class="card-header">
                Find a student
            </div>-->
            <div class="card-body p-4">
                <!--serch form-->
                <div class="col-6 mx-auto">
                    <form method="POST">
                        <div class="input-group">
                            <input class="bg-light form-control border-1 small" type="text" placeholder="Search for student" name="txtSearch"/>
                            <input class="btn btn-primary py-0" type="submit" name = "Search" value="Search"></input>
                        </div>
                    </form>
                </div>
                <!--end serch form-->
            </div>
        </div>
        <!--end search card-->

        <!--student card-->
        <div class="card mt-3 mb-5">
            
            <div class="card-body">
                <!--internal card 1-->
                <div class="card my-0  mx-auto"> 
                    <div class="card-header">
                        Student details
                    </div>
                    <div class="card-body p-4">
                        <!--student details table-->
                        <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Index : </td>
                                    <td> <?php echo $student_index ?></td>
                                </tr>
                                <tr>
                                    <td>Name : </td>
                                    <td> <?php echo $student_name; ?></td>
                                </tr>
                                <tr>
                                    <td>NIC : </td>
                                    <td> <?php echo $student_nic; ?></td>
                                </tr>
                                <tr>
                                    <td>Course : </td>
                                    <td> <?php echo $course_name; ?></td>
                                </tr>
                                <tr>
                                    <td>Course Code: </td>
                                    <td> <?php echo $course_code; ?></td>
                                </tr>
                                <tr>
                                    <td>Course Type: </td>
                                    <td> <?php echo $course_type; ?></td>
                                </tr>
                                <tr>
                                    <td>Course Duration: </td>
                                    <td> <?php echo $course_duration; ?></td>
                                </tr>
                                <tr>
                                    <td>NVQ Level: </td>
                                    <td> <?php echo $course_nvq; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <!--end student details table-->
                    </div>
                </div>
                <!--end internal card 1-->
                <!--internal card 2-->
                <div class="card mt-3  mx-auto"> 
                    <div class="card-header">
                        Result details
                    </div>
                    <div class="card-body p-4">
                        <!--result details table-->
                        <form action="" method="post">
                            <?php
                                $i = 0;
                                if ($subject_result) {
                                    if (mysqli_num_rows($subject_result) > 0) {
                                        while ($items = mysqli_fetch_assoc($subject_result)) {
                                            $i++;
                            ?>
                            <div class="main-form mt-3 border-bottom">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            
                                            <input type="text"  value="<?php echo $items['subject_id']; ?>" class="form-control mb-1 border-0" name="subject[]" required placeholder="Enter Subject">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="">
                                            <p><?php echo $items['subject_name'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            
                                            <input type="text" class="form-control mb-1" name="mark[]" required placeholder="Enter Mark" value="AB">
                                        </div>
                                    </div>
                                    <!--<div class="col-md-4">
                                        <div class="form-group ">
                                            <br/>
                                            <button type="button" class="remove-btn btn btn-danger mb-1">Remove</button>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                            <?php } } }?>
                            <div class="paste-new-forms">

                            </div>

                            <button type="submit" name="save_multiple_data" class="btn btn-primary mt-1">Submit Multiple Data</button>
                        </form>
                        <!--end student details table-->
                    </div>
                </div>
                <!--end internal card-->
            </div>
        </div>
        <!--end student card-->
 

    </div>

    <?php //include('footer.php') ?>
</body>
</html>