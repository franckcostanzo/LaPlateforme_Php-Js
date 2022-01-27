<?php include('./service/functions.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a28e1208a7.js" crossorigin="anonymous"></script>  
</head>
<body>
    
    <?php include('./elements/header.php');?>   

    <main class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="col-md-9 bg-dark" id="gamePlan">

                    </div>
                    <div class="col-md-3 bg-primary" id="ladder">

                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('./elements/footer.php');?>

    
</body>
</html>