<?php
    include 'dbconnection.php';

    //$offset = 0;

    //$select_query = "SELECT * FROM result";// LIMIT $offset,10";

    //$select_result = mysqli_query($connection,$select_query);
    
?>
<?php
    $student_index=$_GET['index'];
    $student;
    
    $search_query = "SELECT * FROM `result` INNER JOIN subject ON result.subject_id = subject.subject_id  WHERE index_no LIKE '%".$student_index."%'";
    $select_result = mysqli_query($connection,$search_query);

    $student = mysqli_fetch_assoc($select_result); //results
    $student_index = $student['index_no'];

    if ($select_result) {
        //echo '<div class="mx-5 alert alert-primary fixed-bottom alert-dismissible" data-dismiss="alert">Student Found</div>';
    } else {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>No Student Found</div>";
    }
    
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Results</title>
</head>
<body>
    <!--navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Technical College</a>
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
                    <!--<li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>-->
                </ul>
            </div>
        </div>
    </nav>
    <!--end navbar-->

    <div class="container pt-4">
        <!--header card-->
        <div class="card mt-5">
            <!--<div class="card-header">
                Find a student
            </div>-->
            <div class="card-body p-4 mx-auto">
                <center>
                <img class="img-thumbnail" src="images/Logo.png" alt="Logo" >
                <p class="fs-5">කාර්මික අධ්‍යාපන හා පුහුණු කිරීමේ දෙපාර්තමේන්තුව <br/> 
                    தொழில்நுட்பக் கல்வி மற்றும் பயிற்சித் துறை<br/>
                    Department of Technical Education and Training 
                </p>
                </center>
            </div>
        </div>
        <!--end header card-->

        <!--student card-->
        <div class="card mt-3">
            <div class="card-header">
                Student details
            </div>
            <div class="card-body">
                <!--internal card-->
                <div class="card my-0  mx-auto"> 
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
                <!--end internal card-->
            </div>
        </div>
        <!--end student card-->

        <!--result card-->
        <div class="card my-3">
            <div class="card-header">
                Result details
            </div>
            <div class="card-body p-4">
                <!--table-->
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Subject Code</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php While($record = mysqli_fetch_assoc($select_result)){ ?>
                                <tr>
                                    <td> <?php echo $record['subject_id'] ?></td>
                                    <td> <?php echo $record['subject_name']; ?> </td>
                                    <td> <?php echo $record['results']; ?> </td>
                                </tr>  
                            <?php } ?>
                    </tbody>
                </table>
                </div>
                <!--table end-->
            </div>
        </div>
        <!--end result card-->
        <button class="btn btn-warning mb-3 d-print-none" onclick="window.print()">Print Certificate</button>
    </div>
</body>
</html>