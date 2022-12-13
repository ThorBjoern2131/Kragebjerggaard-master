<?php

require "settings/init.php";

if(!empty($_POST["data"])){
    $data = $_POST["data"];

    $sql = "INSERT INTO DATABASE (DATABASE) VALUES(:DATABASE)";
    $bind = [":DATABASE" => $data["DATABASE"]];

    $db->sql( $sql, $bind, false);

    echo "DATABASE data insendt <a href='insert.php'>Vil du tilføje flere?</a>";
}

?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Kragebjerggård</title>

    <!-- Metatags der fortæller at søgemaskiner er velkommen, hvem der udgiver siden og copyright information -->
    <meta name="description" content="Kragebjerggård">
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">
    <meta name="keywords" content="Kragebjerggård,">
    <meta property="og:title" content="Kragebjerggård"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://www.Kragebjerggård.dk"/>
    <meta property="og:image" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:locale" content="da_DK"

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tiny.cloud/1/e85fpf1qdgxg134gutu9ijitqque3zxk1rukhh9jvxvhc7y2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>

<form method="post" action="insert.php">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="DATABASE">DATABASE</label>
                <input class="form-control" type="text" name="data[DATABASE]" id="DATABASE" placeholder="DATABASE" value="">
            </div>
        </div>
    </div>

</form>



<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>
</body>
</html>











