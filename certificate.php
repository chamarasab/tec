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
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/ico">
    <script src="js/bootstrap.min.js"></script>
    <title>Print Certificate - SRM System</title>
</head>
<body>    
    <img class="img-fluid wdfull d-print-none" src="images/01.jpg" alt="Header image">
    <div class="container d-print-none">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">&nbsp;</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php include('header_public.php') ?>
        </nav>
    </div>

    <div class="container pt-4">
        <p>&nbsp;</p>
        <div class="card mt-3">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-center d-none d-print-block printbox">
                        <img class="printlogo" src="images/Title.png" alt="Logo">
                    </div>
                    <div class="space10"></div>
                    <h3 class="printtitle">Final Examination Results - 2021</h3>
                    <div class="space10"></div>
                    <!--student details-->
                    <table class="table table-responsive 0table-sm">
                        <tbody class="printtable">
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
                    <!--Results table-->
                    <table class="table table-responsive 0table-sm printtable">
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
                    <!--Print button-->
                    
                </div> 
                <div class="alignrigt">
                    <button class="btn btn-success mb-3 d-print-none" href="index.php">Back</button>
                    <button class="btn btn-warning mb-3 d-print-none" onclick="window.print()">Print</button>
                <div>          
        </div>        
    </div>
    </div>
    <div class="space30 d-print-none"><p></p></div>
    <?php include('footer.php') ?>
</body>
</html>