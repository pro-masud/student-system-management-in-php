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
    <title>Human Appeal</title>
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

    <div class="login-form">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a class="btn btn-dark" href="add-student.php">Add New Student</a>
                    <div class="card py-5 px-2">
                        <h3>Student Info</h3>
                        <div class="card-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input name="search" class="btn btn-outline-danger" placeholder="Name/Address/etc" type="text">
                                <input name="search-btn" class="btn btn-primary btn-sm" value="Search" type="submit">
                            </form>
                            <table class="w-100 align-middle table text-center table-striped student-t">
                               <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Cell</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Gander</th>
                                        <th scope="col">Photos</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Status</th>
                                    </tr>
                               </thead>
                               <tbody class="table-striped">
                                <?php 
                                
                                    $search = '';
                                    if(isset($_POST['search-btn'])){
                                    $search = $_POST['search'];
                                    }

                                    //all student select here to data base
                                    $sql = "SELECT * FROM  students WHERE student_name LIKE '%$search%' ";
                                    $allStudentData = $connection -> query($sql);

                                
                                    $i = 1;
                                    while( $singleData = $allStudentData -> fetch_assoc() ):
                                ?>
                                    <tr>
                                        <td><?php echo $i; $i++; ?></td>
                                        <td><?php echo $singleData['student_name']; ?></td>
                                        <td><?php echo $singleData['student_email']; ?></td>
                                        <td><?php echo $singleData['student_cell']; ?></td>
                                        <td><?php echo $singleData['student_age']; ?></td>
                                        <td><?php echo $singleData['student_location']; ?></td>
                                        <td><?php echo $singleData['student_gander']; ?></td>
                                        <td><img class="user-img" src="./studentuploadimage/<?php echo $singleData['student_img']; ?>" alt=""></td>
                                        <td><a class="btn btn-info btn-sm" href="viwe.php?student_id=<?php echo $singleData['student_id']; ?>">Viwe</a><a class="btn btn-warning btn-sm" href="edite.php?student_id=<?php echo $singleData['student_id']; ?>">Edite</a><a  id='delete-btn' class="btn btn-danger btn-sm" href="delete.php?student_id_d=<?php echo $singleData['student_id']; ?>">Delete</a></td>
                                        <td><?php echo $singleData['status']; ?></td>
                                    </tr>
                                <?php endwhile; ?>   
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


   

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
        $('a#delete-btn').click(function(){
            let message = confirm('You Are Confirm To Delete Now');
            if( message == true ){
                return true;
            }else{
                return false;
            }
        });
    </script>
</body>
</html>