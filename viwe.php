<?php 
    include_once"./function.php";
    require_once"./apps/connection.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student management system</title>
    <!-- fonts-awosame -->
    <link rel="stylesheet" href="./css/all.css">
    <!-- Main style file -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- Main style file -->
    <link rel="stylesheet" href="./css/style.css">
     <!-- Main style file -->
     <link rel="stylesheet" href="./css/responsive.css">
</head>
<body>

    <?php 

        if( $_GET['student_id'] ){
            $singleStudentData = $_GET['student_id'];
        }

        $sql = "SELECT * FROM students WHERE student_id = '$singleStudentData' ";
       $data =  $connection -> query($sql);

       $single_data = $data -> fetch_assoc();
    
    
    ?>


    <div class="login-form">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <a class="btn btn-dark" href="index.php">All Students</a>
                    <div class="card w-75 p-5">
                        <h2>Viwe Student Profile</h2>
                        <div class="card-header">
                            <img style="display:block; margin:0 auto;" class="w-50" src="./studentuploadimage/<?php echo  $single_data['student_img'];?>" alt="profile">
                        </div>
                        <div class="card-body">
                           <table class="table table-striped">
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo  $single_data['student_name'];?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo  $single_data['student_email'];?></td>
                                </tr>
                                <tr>
                                    <td>Cell</td>
                                    <td><?php echo  $single_data['student_cell'];?></td>
                                </tr>
                                <tr>
                                    <td>Age</td>
                                    <td><?php echo  $single_data['student_age'];?></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td><?php echo  $single_data['student_gander'];?></td>
                                </tr>
                                <tr>
                                    <td>Location</td>
                                    <td><?php echo  $single_data['student_location'];?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><?php echo  $single_data['status'];?></td>
                                </tr>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


   

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>