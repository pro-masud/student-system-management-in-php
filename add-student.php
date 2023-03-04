<?php 
    include_once"./function.php";
    require_once"./apps/connection.php";
    $submit = filter_input(INPUT_POST,'submit', FILTER_SANITIZE_STRING);

    // selected add student form one selected here option now
    $studentOptions = ['Haripur','Chawarangi Bazar','Pahargong','Kamalpukur','ranisonkol'];

    // this form validation here
    if( isset($submit)){

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
       

        if(  $name != empty('') || $email != empty('') || $cell != empty('') || $age != empty('') || $gander != empty('') || $location != empty('') || $photos != empty('') ){
            $message = "<p class='alert alert-warning alert-dismissible fade show' role='alert'> Plasee Put Your Data Here ! <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></p>";
        }elseif( filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $message = "<p class='alert alert-warning alert-dismissible fade show' role='alert'> Email Is Invalied ! <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></p>";
        }elseif( $age < 18 || $age > 100 ){
            $message = "<p class='alert alert-warning alert-dismissible fade show' role='alert'> You Are Not A Memeber This Apps ! <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></p>";
        }else{
            $data = studentImageUpload($_FILES['image'], './student-upload-image/', ['png','jpg','jpeg'], [
                'type' => 'image',
                'file_name' => 'JavaScript',
                'fname'     => $name,
                'lname'     => $location,
            
            ]);

            $photo = $data['file_name'];



            if( !empty($data['mess'])){
                $message= $data['mess'];
            }else{
                $sql = "INSERT INTO students (student_name , student_email, student_cell, student_age, student_gander, student_location, student_img, status) VALUES ('$name','$email','$cell','$age','$gander',' $location','$photo','active')";
                $connection -> query($sql);
                $message = "<p class='alert alert-success alert-dismissible fade show' role='alert'> Student Data Insert Successfully ! <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></p>";
            }
        }
    }
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

    <div class="login-form">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <a class="btn btn-dark" href="index.php">All Students</a>
                    <div class="card w-75 p-5">
                        <h2>Add New Students</h2>
                        <div class="card-body">
                            <?php if(isset($message)){
                                    echo  $message;
                                } 
                            ?>
                           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                                <label for="name" class="form-label">Full Name</label>
                                <input value="<?php if( isset($name)){ echo $name;} ?>" name="name" type="text" class="form-control" id="name">

                                <label for="email" class="form-label">Email</label>
                                <input value="<?php if( isset($email)){ echo $email;} ?>" name="email" type="eamil" class="form-control" id="email">

                                <label for="cell" class="form-label">Cell</label>
                                <input value="<?php if( isset($cell)){ echo $cell;} ?>" name="cell" type="text" class="form-control" id="cell">

                                <label for="age" class="form-label">Age</label>
                                <input value="<?php if( isset($age)){ echo $age;} ?>" name="age" type="text" class="form-control" id="age">

                                <label for="gander" class="form-label">Gander</label><br>
                                <input type="radio" name="gander[]" id="male" value="male" <?php checkRadio('male'); ?> ><label for="male">Male</label>
                                <input type="radio" name="gander[]" id="female" value="female" <?php checkRadio('female'); ?>><label for="female">Female</label><br><br>
                                
                                <label for="address" class="form-label">Location</label>
                                <select value="" class="form-control" name="location" id="">
                                    <option value="">-- Select --</option>
                                    <?php studentOptionBox($studentOptions); ?>
                                    
                                </select>

                                <label for="image" class="form-label">Cell</label>
                                <input value="" name="image" type="file" class="form-control" id="image"><br>

                                <input class="btn btn-info" name="submit" type="submit" value="Add Student">
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