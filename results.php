<?php
    include 'dbconnection.php';

    //$offset = 0;

    $select_query = "SELECT * FROM result";// LIMIT $offset,10";

    $select_result = mysqli_query($connection,$select_query);
?>
<?php
    $student_index=21160;
    $student;
    if (isset($_POST['Search'])) {
        $search = $_POST['txtSearch'];
        //$search_query = "SELECT * FROM result WHERE index_no LIKE '%".$search."%' ";
        $search_query = "SELECT * FROM `result` INNER JOIN subject ON result.subject_id = subject.subject_id  WHERE index_no LIKE '%".$search."%'";
        $select_result = mysqli_query($connection,$search_query);

        $student = mysqli_fetch_assoc($select_result); //results
        $student_index = $student['index_no'];

        if ($select_result) {
            //echo '<div class="mx-5 alert alert-primary fixed-bottom alert-dismissible" data-dismiss="alert">Student Found</div>';
        } else {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>No Student Found</div>";
        }
        $_POST=array();
    }

    
    //$select_student_query = "SELECT * FROM student WHERE index_no = '".$student_index."'";
    $select_student_query = "SELECT * FROM `student` INNER JOIN course ON student.course_code = course.course_code INNER JOIN subject ON course.course_code=subject.course_code WHERE index_no = '".$student_index."'";
    $student_result = mysqli_query($connection,$select_student_query);

    $student = mysqli_fetch_assoc($student_result); //info

    $student_name = $student['name'];
    $student_nic = $student['nic'];
    $course_name = $student['course_name'];
    $course_type = $student['course_type'];
    $course_duration = $student['duration'];
    $course_nvq = $student['nvq_level'];
?>

<?php
    //include 'dbconnection.php';
    $dropdown_query = "SELECT DISTINCT(course_code) FROM course";

    $dropdown_result = mysqli_query($connection,$dropdown_query);
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
            <a class="navbar-brand title" href="#">Student Results Management System</a>
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
        <div class="card mt-3">
            <div class="card-header">
                Student details
            </div>
            <div class="card-body">
                <div class="ccard my-0  mx-auto">
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
                </div>
            </div>

        </div>
        <!--end student card-->
        <div class="fd-grid gap-2">
            <a class="btn btn-warning my-3" href="certificate.php?index=<?php echo $student_index?>">View Exam Results</a>
        </div>

        <!--floating button-->
        <a href="addresult.php" class="float btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Course">
            <i class="fa fa-plus my-float"></i>
        </a>
        <!--end floating button-->
    </div>

    <?php include('footer.php') ?>
</body>
</html>