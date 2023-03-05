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

    if( isset($_GET['student_id'])){
       $dbid_url = $_GET['student_id'];
    }

    



     if( isset($_POST['update_submit'])){

        $name = filter_input(INPUT_POST,'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING);
        $cell = filter_input(INPUT_POST,'cell', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST,'age', FILTER_SANITIZE_STRING);

        
       
        // gander select here
        if(isset($_POST['gander'])){
            $gander = $_POST['gander']['0'];
        }

        $location = filter_input(INPUT_POST,'location', FILTER_SANITIZE_STRING);

        $photos = $_FILES['image']['tmp_name'];
       

        if(  $name != empty('') || $email != empty('') || $cell != empty('') || $age != empty('') || $gander != empty('') || $location != empty('') ){
            $message = "<p class='alert alert-warning alert-dismissible fade show' role='alert'> Plasee Put Your Data Here ! <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></p>";
        }elseif( filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $message = "<p class='alert alert-warning alert-dismissible fade show' role='alert'> Email Is Invalied ! <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></p>";
        }elseif( $age < 18 || $age > 100 ){
            $message = "<p class='alert alert-warning alert-dismissible fade show' role='alert'> You Are Not A Memeber This Apps ! <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></p>";
        }else{
            
                $sql = "UPDATE students SET 
                        student_name = '$name',
                        student_email ='$email',
                        student_cell ='$cell',
                        student_age ='$age',
                        student_gander ='$gander',
                        student_location ='$location' WHERE student_id = '$dbid_url'
                    ";
                $connection -> query($sql);
                $message = "<p class='alert alert-success alert-dismissible fade show' role='alert'> Student Data Update Successfully ! <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></p>";
        }
    }

?>
    <div class="login-form">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <a class="btn btn-dark" href="index.php">All Students</a>
                    <div class="card w-75 p-5">
                        <h2>Update Student Information</h2>
                        <div class="card-body">
                            <?php 
                            
                            $sql = "SELECT * FROM students WHERE student_id = '$dbid_url'";

                            $dbId = $connection -> query($sql);
                            $singleData = $dbId -> fetch_assoc();
                            
                            
                            
                            if(isset($message)){
                                        echo  $message;
                                    } 
                                ?>
                           <form action="<?php echo $_SERVER['PHP_SELF']; ?>?student_id=<?php  echo $dbid_url; ?>" method="POST" enctype="multipart/form-data">
                                <label for="name" class="form-label">Full Name</label>
                                <input value="<?php echo  $singleData['student_name']; ?>" name="name" type="text" class="form-control" id="name">

                                <label for="email" class="form-label">Email</label>
                                <input value="<?php echo  $singleData['student_email']; ?>" name="email" type="eamil" class="form-control" id="email">

                                <label for="cell" class="form-label">Cell</label>
                                <input value="<?php echo  $singleData['student_cell']; ?>" name="cell" type="text" class="form-control" id="cell">

                                <label for="age" class="form-label">Age</label>
                                <input value="<?php echo  $singleData['student_age']; ?>" name="age" type="text" class="form-control" id="age">

                                <label for="gander" class="form-label">Gander</label><br>
                                <input <?php if( $singleData['student_gander'] == 'male'){ echo "checked"; } ?> type="radio" name="gander[]" id="male" value="male" <?php checkRadio('male'); ?> ><label for="male">Male</label>
                                <input <?php if( $singleData['student_gander'] == 'female'){ echo "checked"; } ?> type="radio" name="gander[]" id="female" value="female" <?php checkRadio('female'); ?>><label for="female">Female</label><br><br>
                                
                                <label for="address" class="form-label">Location</label>
                                <select class="form-control" name="location">
                                    <option  value="">--Select--</option>   
                                    <option <?php if( $singleData['student_location'] == 'haripur' ){ echo $selected = 'selected'; } ?> value="haripur">Haripur</option>   
                                    <option <?php if( $singleData['student_location'] == 'chawarangi bazar' ){ echo $selected = 'selected'; } ?> value="chawarangi bazar">Chawarangi Bazar</option>                  
                                    <option <?php if( $singleData['student_location'] == 'pahargong' ){ echo $selected = 'selected'; } ?> value="pahargong">Pahargong</option>                  
                                    <option <?php if( $singleData['student_location'] == 'kamalpukur' ){ echo $selected = 'selected'; } ?> value="kamalpukur">Kamalpukur</option>                                   
                                    <option <?php if( $singleData['student_location'] == 'ranisonkol' ){ echo $selected = 'selected'; } ?> value="ranisonkol">ranisonkol</option>                                                                   
                                </select>

                                <img style="height: 300px; margin-top:20px;" class="w-100" src="./studentuploadimage/<?php echo  $singleData['student_img']; ?>" alt="">
                                <label for="image" class="form-label">Photos</label>
                                <input value="" name="image" type="file" class="form-control" id="image"><br>

                                <input class="btn btn-info" name="update_submit" type="submit" value="Update Data">
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


   

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>