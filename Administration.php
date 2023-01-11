<?php
require "settings/init.php";

if(!empty($_post["data"])){
    $data = $_post["data"];
    $file = $_FILES;

    if(!empty($file["prodImage"]["tmp_name"])){
        move_uploaded_file($file["prodImage"]["tmp_name"], "uplads/" . basename($file["prodImage"]["name"]));
    }

    $sql = "INSERT INTO produkter (prodNavn, prodBeskrivelse, prodPris, prodAmount, prodImage, prodVare,) 
            values(:prodNavn, :prodBeskrivelse, :prodPris, :prodAmount, :prodImage, :prodVare";
    $bind = [":prodNavn" => $data["prodNavn"],
             ":prodBeskrivelse" => $data["prodBeskrivelse"],
             ":prodPris" => $data["prodPris"],
             ":prodAmount" => $data["prodAmount"],
             ":prodImage" => (!empty($file["prodImage"]["tmp_name"])) ? $file["prodImage"]["name"] : NULL,
             ":prodVare" => $data["prodVare"]];

    $db->sql($sql, $bind, false);

    echo "Produktet er nu indsat. <a href='Administration.php'>Indsæt et produkt mere</a>";

}
?>


<!-- Instruktion til webbrowser om at vi kører HTML5 -->
<!DOCTYPE html>

<!-- html starter og slutter hele dokumentet / lang=da: Fortæller siden er på dansk -->
<html lang="da">

<!-- I <head> har man opsætning - det ser brugeren ikke, men det fortæller noget om siden -->
<head>
    <!-- Sætter tegnsætning til utf-8 som bl.a. tillader danske bogstaver -->
    <meta charset="utf-8">

    <!-- Titel som ses oppe i browserens tab mv. -->
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
    <meta property="og:locale" content="da_DK"/>
    <!-- Sikrer man kan benytte CSS ved at tilkoble en CSS fil -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <!-- Sikrer den vises korrekt på mobil, tablet mv. ved at tage ift. skærmstørrelse - bliver brugt til responsive websider -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body style="background-color: #fffbf0;">

<nav class="navbar navbar-expand-lg" style="height: 4rem; background-color: lightgreen;">
    <div class="container-fluid">
        <a class="navbar-brand" style="font-family: 'Baskerville Old Face'" href="index.php">Kragebjerggård</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="404.php">Gården</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Kontakt os</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Administration.php">Administration</a>
                </li>
            </ul>
        </div>
</nav>

<div class="insertTabel" style="">
    <form method="post" action="Administration.php" enctype="multipart/form-data">
        <div class="row" style="margin-top: 25px">

            <div class="col-12 col-md-4 offset-2">
                <div class="form-group">
                    <label for="prodNavn">Produkt navn</label>
                    <input class="form-control" type="text" name="data[prodNavn]" id="prodNavn" placeholder="" value="">
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="prodVare">Produkt type</label>
                    <input class="form-control" type="text" name="data[prodVare]" id="prodVare" placeholder="" value="">
                </div>
            </div>

            <div class="col-12 col-md-4 offset-2" style="margin-top: 25px">
                <div class="form-group">
                    <label for="prodPris">Produkt pris</label>
                    <input class="form-control" type="number" step="0.1" name="data[prodPris]" id="prodPris" placeholder="" value="">
                </div>
            </div>


            <div class="col-12 col-md-4" style="margin-top: 25px">
                <div class="form-group">
                    <label for="prodAmount">Produkt mængde</label>
                    <input class="form-control" type="number" step="0.1" name="data[prodAmount]" id="prodAmount" placeholder="" value="">
                </div>
            </div>

            <div class="col-12 col-md-8 offset-2" style="margin-top: 25px">
                 <div class="form-group">
                     <label for="prodBeskrivelse">Produkt beskrivelse</label>
                     <textarea class="form-control" name="data[prodBeskrivelse]" id="prodBeskrivelse"></textarea>
                </div>
            </div>

            <div class="col-12 col-md-8 offset-2" style="margin-top: 25px">
                <div class="form-group">
                    <label for="prodImage">Produkt billed</label>
                    <input class="form-control" type="file" name="data[prodImage]" id="prodImage" placeholder="" value="">
                </div>
            </div>
        

        </div>
    
        <div class="row" style="margin-top: 50px">

            <div class="col-12 col-md-3 offset-md-4">

                <button class="form-control btn btn-primary" type="submit" id="btnSubmit">Tilføj produkt</button>

            </div>

        </div>
    </form>
</div>

<br><br>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 offset-md-1 mb-2" style="text-align: center">
                <h5 class="text-uppercase">Kragebjerggård</h5>

                <ul class="list-unstyled">
                    <li>
                        <p>Kragebjerggård er en gård fyldt med store smil samt massere af glæde og du skal være mere end velkommen til at komme forbi.</p>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 offset-md-1 mb-2" style="text-align: center">
                <h5 class="text-uppercase">Social Media</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="404.php" style="text-decoration: none; color: white"><i class="fa-brands fa-facebook"></i> Kragebjerggaard</a>
                    </li>
                    <li>
                        <a href="404.php" style="text-decoration: none; color: white"><i class="fa-brands fa-instagram"></i> Kragebjerggaard</a>
                    </li>
                    <li>
                        <a href="404.php" style="text-decoration: none; color: white"><i class="fa-brands fa-twitter"></i> Kragebjerggaard</a>
                    </li>
                    <li>
                        <a href="404.php" style="text-decoration: none; color: white"><i class="fa-brands fa-tiktok"></i> Kragebjerggaard</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 offset-md-1" style="text-align: center">
                <h5 class="text-uppercase">Kontakt</h5>

                <ul class="list-unstyled">
                    <li>
                        <p><i class="fas fa-house"></i> 4296 Nyrup, Kragebjerggaard 1</p>
                    </li>
                    <li>
                        <p><i class="fas fa-phone"></i> +45 64 27 36 96</p>
                    </li>
                    <li>
                        <p><i class="fas fa-envelope"></i> Kragebjerg@gaard.com</p>
                    </li>
                    <li>
                        <p><i class="fas fa-clock"></i> 08:00 - 15:00</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>













    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>
</body>
</html>
