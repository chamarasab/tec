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
    <title>About SRM System</title>
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
                        <a class="nav-link" href="results.php">Results</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--end navbar-->

    <div class="container pt-4">
        <!--header card-->
        <div class="card mt-5">
        <div class="card-header">
                Project Details
            </div>
            <div class="card-body p-2 mx-auto" style="width: 75%";>
                <div class="row">
                    <table class="table table-hover">
                    <tbody>
                        <tr><th scope="row">Project Name</th>       <td>Student Result Management (SRM) System</td></tr>
                        <tr><th scope="row">Version</th>            <td>1.0.0</td></tr>
                        <tr><th scope="row">License</th>            <td>Free</td></tr>
                        <tr><th scope="row">Description</th>        <td>Issuing examination results online to the DTET students</td></tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end header card-->

        <!--developers card-->
        <div class="card my-3">
            <div class="card-header">
                Project Development Team
            </div>
            <div class="card-body p-4 mx-auto">
            <div class="row">
                    <!--dev1 card-->
                    <div class="card mx-3 p-3" style="width: 18rem;">
                        <img src="images/dev1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Chamara Ekanayake</h5>
                            <p class="card-text">Student<br>MIT/FGS/SUSL<br>Reg No: 2112091004</p>
                            <a href="https://vle.sab.ac.lk/user/profile.php" class="btn btn-warning">View Profile</a>
                        </div>
                    </div>
                    <!--end dev1 card-->
                    <!--dev1 card-->
                    <div class="card mx-3 p-3" style="width: 18rem;">
                        <img src="images/dev2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Shamika Isurinda</h5>
                            <p class="card-text">Student<br>MIT/FGS/SUSL<br>Reg No: 2112091015</p>
                            <a href="#" class="btn btn-success">View Profile</a>
                        </div>
                    </div>
                    <!--end dev1 card-->
                    <!--dev1 card-->
                    <div class="card mx-3 p-3" style="width: 18rem;">
                        <img src="images/dev3.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Sachith Dissanayake</h5>
                            <p class="card-text">Student<br>MIT/FGS/SUSL<br>Reg No: 2112091013</p>
                            <a href="#" class="btn btn-danger">View Profile</a>
                        </div>
                    </div>
                    <!--end dev1 card-->
                </div>
            </div>
        </div>
        <!--end developers card-->
    </div>

    <?php include('footer.php') ?>
</body>
</html>