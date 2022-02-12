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
                Developer details
            </div>
            <div class="card-body p-4 mx-auto">
                <div class="row">
                    <!--dev1 card-->
                    <div class="card mx-3 p-3" style="width: 18rem;">
                        <img src="images/dev1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Chamara Ekanayake</h5>
                            <p class="card-text">User Interface designed, Contributed to design front-end HTML/CSS and back-end PHP.</p>
                            <a href="https://vle.sab.ac.lk/user/profile.php" class="btn btn-warning">MIT Reg : 2112091004</a>
                        </div>
                    </div>
                    <!--end dev1 card-->
                    <!--dev1 card-->
                    <div class="card mx-3 p-3" style="width: 18rem;">
                        <img src="images/dev4.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Shamika Isurinda</h5>
                            <p class="card-text">Managing whole the project work, Contributed to managing all levels of project manager, resource finder and architect.</p>
                            <a href="#" class="btn btn-success">MIT Reg : 2112091015</a>
                        </div>
                    </div>
                    <!--end dev1 card-->
                    <!--dev1 card-->
                    <div class="card mx-3 p-3" style="width: 18rem;">
                        <img src="images/dev3.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Sachith Dissanayake</h5>
                            <p class="card-text">Database designer, Contributed to sketch the flow of the system, database design and structure of the system.</p>
                            <a href="#" class="btn btn-danger">MIT Reg : 2112091013</a>
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