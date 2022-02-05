<?php
    include 'dbconnection.php';

    //$offset = 0;

    $select_query = "SELECT * FROM course";// LIMIT $offset,10";

    $select_result = mysqli_query($connection,$select_query);
?>
<?php
    if (isset($_POST['Search'])) {
        $search = $_POST['txtSearch'];
        $search_query = "SELECT * FROM course WHERE course_id LIKE '%".$search."%' OR course_code LIKE '".$search."%' OR course_name LIKE '".$search."%' OR trade_name LIKE '".$search."%' OR course_type LIKE '%".$search."%' OR batch LIKE '".$search."%' OR duration LIKE '".$search."%' OR nvq_level LIKE '".$search."%'";
        $select_result = mysqli_query($connection,$search_query);
        if ($select_result) {
            //echo '<div class="mx-5 alert alert-primary fixed-bottom alert-dismissible" data-dismiss="alert">Student Found</div>';
        } else {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>No Student Found</div>";
        }
        $_POST=array();
    }
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
    <script src="js/bootstrap.min.js"></script>
    <title>Courses</title>
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
                        <a class="nav-link active" href="courses.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="results.php">Results</a>
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
            <div class="card-header">
                Find a course
            </div>
            <div class="card-body p-4">
                <!--serch form-->
                <div class="col-6 mx-auto">
                    <form method="POST">
                        <div class="input-group">
                            <input class="bg-light form-control border-0 small" type="text" placeholder="Search for course" name="txtSearch"/>
                            <input class="btn btn-primary py-0" type="submit" name = "Search" value="Search"></input>
                        </div>
                    </form>
                    <form method="POST">
                        <div class="input-group mt-3">
                            <select class="form-select bg-light border-0 small" name="txtSearch">
                                <option selected>Search by course</option> 
                                <?php while ($items = mysqli_fetch_assoc($dropdown_result)) {?>
                                    <option value="1"><?php echo $items['course_code'] ?></option>
                                <?php } ?>
                            </select>
                            <!--<input class="bg-light form-control border-0 small" type="text" placeholder="Search for students" name="txtSearch2"/>-->
                            <input class="btn btn-primary py-0" type="submit" name = "Search" value="Search"></input>
                        </div>
                    </form>
                </div>
                <!--end serch form-->
            </div>
        </div>
        <!--end search card-->
        <div class="card my-3">
            <div class="card-header">
                Course Details
            </div>
            <div class="card-body">
                <!--table-->
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Trade Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Duration</th>
                            <th scope="col">NVQ</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php While($record = mysqli_fetch_assoc($select_result)){ ?>
                            <tr>
                                <td> <?php echo $record['course_id'] ?></td>
                                <td> <?php echo $record['course_code']; ?> </td>
                                <td> <?php echo $record['course_name']; ?> </td>
                                <td> <?php echo $record['trade_name']; ?> </td>
                                <td> <?php echo $record['course_type']; ?> </td>
                                <td> <?php echo $record['batch']; ?> </td>
                                <td> <?php echo $record['duration']; ?> </td>
                                <td> <?php echo $record['nvq_level']; ?> </td>
                                <td style="text-align:right"> 
                                    <a href="delete.php?id=<?php echo $record['course_code']?>" class="btn btn-danger">Delete</a>
                                </td>
                                <td style="text-align:right">
                                    <a href="update.php?id=<?php echo $record['course_code']?>" class="btn btn-warning">Update</a>
                                </td>
                            </tr>  
                        <?php } ?>
                    </tbody>
                </table>
                </div>
                <!--table end-->
            </div>
        </div>
    </div>
</body>
</html>