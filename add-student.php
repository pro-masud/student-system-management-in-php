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
                <div class="col-sm-10 offset-sm-2">
                    <a class="btn btn-dark" href="index.php">All Students</a>
                    <div class="card w-75 p-5">
                        <h2>Add New Students</h2>
                        <div class="card-body">
                           <form action="" method="">
                                <label for="name" class="form-label">Full Name</label>
                                <input name="name" type="text" class="form-control" id="name">

                                <label for="email" class="form-label">Email</label>
                                <input name="email" type="text" class="form-control" id="email">

                                <label for="cell" class="form-label">Cell</label>
                                <input name="cell" type="text" class="form-control" id="cell">

                                <label for="age" class="form-label">Age</label>
                                <input name="age" type="text" class="form-control" id="age">

                                <label for="gander" class="form-label">Gander</label><br>
                                <input type="radio" name="ganger" id="male" value="male"><label for="male">Male</label>
                                <input type="radio" name="ganger" id="female" value="female"><label for="female">Female</label><br><br>
                                
                                <label for="address" class="form-label">Location</label>
                                <select class="form-control" name="location" id="">
                                    <option value="">-- Select --</option>
                                    <option value="haripur">Haripur</option>
                                    <option value="Chawrangi bazar">Chawarangi Bazar</option>
                                    <option value="pahargong">Pahargong</option>
                                    <option value="kamalpukur">Kamalpukur</option>
                                    <option value="ranisonkol">Ranisongkol</option>
                                </select>

                                <label for="image" class="form-label">Cell</label>
                                <input name="image" type="file" class="form-control" id="image"><br>

                                <input class="btn btn-info" name="submit" type="submit" value="Add New">
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