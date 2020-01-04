<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/dist/favicon-32x32.png">
    <title><?php echo $array["page"]; ?></title>
    <link type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link type="text/css" href="/dist/css/work.css" rel="stylesheet">

    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">   

</head>

<body>
<div id="wrapper">
    <?php       
        if($array["page"] == 'home')
            include __DIR__ . '/../home.php';     
    ?>
</div>
<script src="/vendor/jquery/jquery.min.js"></script>
</body>
</html>
