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
            <?php include('header_public.php') ?>
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
                <div class="alignrigt">
                    <a class="btn btn-warning my-3" href="certificate.php?index=<?php echo $student_index?>">View Exam Results</a>
                </div>
            </div>            
        </div>        
    </div>
    <div class="space30"><p></p></div>

    <!-- Footer -->
    <?php include('footer.php') ?>
    <!-- Footer -->
</body>
</html>