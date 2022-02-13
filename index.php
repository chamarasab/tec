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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/ico">
    <script src="js/bootstrap.min.js"></script>
    <title>Exam Results - Department of Technical Education</title>
</head>
<body>

    <img class="img-fluid wdfull" src="images/01.jpg" alt="Header image">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">&nbsp;</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">DTET </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">NVQ Results</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                </ul>
            </div>
        </nav>
    </div>
     

    <div class="container pt-4">
        <!--search card-->
        <div class="card mt-5">
            <div class="card-body p-4">
                <!--serch form-->
                <h5 class="text-center">FIND YOUR EXAM RESULTS HERE</h5> 
                <div class="col-6 mx-auto">
                    <form method="POST">
                        <div class="input-group">
                            <input class="bg-light form-control border-1 small" type="text" placeholder="Index number" name="txtSearch"/>
                            <input class="btn btn-primary py-0" type="submit" name = "Search" value="Search"></input>
                        </div>
                    </form>
                </div>
                <!--end serch form-->
            </div>
        </div>
        <!--end search card-->

        <div class="card mt-3">
            <div class="card-header">
                Student details
            </div>
            <div class="card-body">
                <div class="ccard my-0  mx-auto">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr><td>Index : </td><td> <?php echo $student_index ?></td></tr>
                                <tr><td>NIC : </td><td> <?php echo $student_nic; ?></td></tr>
                                <tr><td>Name : </td><td> <?php echo $student_name; ?></td></tr>                                
                                <tr><td>Course : </td><td> <?php echo $course_name; ?></td></tr><!--
                                <tr><td>Course Type: </td><td> <?php echo $course_type; ?></td></tr>
                                <tr><td>Course Duration: </td><td> <?php echo $course_duration; ?></td></tr>
                                <tr><td>NVQ Level: </td><td> <?php echo $course_nvq; ?></td></tr>-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="fd-grid gap-2 alignrigt">
            <a class="btn btn-warning my-3" href="certificate.php?index=<?php echo $student_index?>">View Exam Results</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
    <section class="space10">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold mb-4">
                    <i class="fas fa-gem me-3"></i>SRM System
                </h6>
                <p>Student Result Management(SRM) System, Using this simple application you can find your results of the theoritical exam conducted by Department of 
                    Technical Education and Training.</p>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
                    <p><a href="www.dtet.gov.lk/en" class="text-reset">Department of Technical Education and Training</a></p>
                    <p><a href="www.nvq.gov.lk" class="text-reset">Tertiary and Vocational Education Commission</a></p>
                    <p><a href="www.mis.dtet.gov.lk" class="text-reset">Management Information System</a></p>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-md-0 mb-4">
                <h6 class="text-uppercase fw-bold mb-4">Contact Us</h6>
                    <p><i class="fas fa-home me-3"></i>No 557, Olcott Mawatha, Colombo 10</p>
                    <p><i class="fas fa-envelope me-3"></i>info@dtet.gov.lk</p>
                    <p><i class="fas fa-phone me-3"></i>071 199 7111</p>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">© 2022 Copyright. <a class="text-reset fw-bold" href="about.php">MIT219_G6</a>
    </div>
    </footer>
    <!-- Footer -->
</body>
</html>