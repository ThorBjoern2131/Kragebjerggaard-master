<?php
require "settings/init.php";

$produkter = $db->sql("SELECT * FROM produkter");

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
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <!-- Sikrer den vises korrekt på mobil, tablet mv. ved at tage ift. skærmstørrelse - bliver brugt til responsive websider -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>

<nav class="navbar navbar-expand-lg bg-light" style="height: 4rem">
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

<div class="container">

    <div class="produkter p-3 m-3">
        <div class="filter">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <input type="search" class="form-control nameSearch" placeholder="søg">
                </div>
            </div>
            <br>

            <div class="items"></div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col 6 col-md-3 offset-md-3"><br>
        <img src="images/Velkommen.png" class="align-content-center" alt="Her skulle være et fint velkomstbillede!">
    </div>

    <div class="col-3 col-md-3"><br><br><br>
        <h5 style="text-align: center; color: #146c43">Velkommen til</h5>
        <h3 style="text-align: center; color: #146c43">Kragebjerggård</h3>
        <p style="text-align: center; color: #146c43">Vi er en gårdbutik, der sælger landbrugsvare. Vi dyrker selv vores afgrøder og triver den året rundt</p>
        <div class="col-6 col-md-6 offset-3"><br>
            <button class="form-control btn-sm btn-success" type="submit" id="btnsubmit">Vores produkter</button>
        </div>
    </div>


    <div class="col-6 col-md-3 offset-md-3"><br><br><br>
        <h5 style="text-align: center; color: #146c43">Kragebjerggårds</h5>
        <h3 style="text-align: center; color: #146c43">Historie</h3>
        <p style="text-align: center; color: #146c43">Erik og Lisa startede gårdbutikken i 1964, hvorefter de siden har udvidet butikken og fået ansatte til hjælp af
            plejelse af afgrøder og salg.</p>
        <div class="col-6 col-md-6 offset-3"><br>
            <button class="form-control btn-sm btn-success" type="submit" id="btnsubmit">Læs mere</button>
        </div>
    </div>
    <div class="col 6 col-md-3"><br>
        <img src="images/Historie.jpg" class="picture" alt="Her skulle være et fint velkomstbillede!">
    </div>

    <div class="col 6 col-md-3 offset-md-3"><br>
        <img src="images/Produkter.jpg" class="img-rounded" style="width: 400px; height: 270px" alt="Her skulle være et fint velkomstbillede!">
    </div>
    <div class="col-3 col-md-3">
        <br><br>
        <h2 style="text-align: center; color: #146c43">Produkter</h2>
        <p style="text-align: center; color: #146c43">Vi sælger flere former og variationer af økologiske friluftsgrøntsager og mælkeprodukter</p>
        <div class="col-6 col-md-6 offset-3"><br>
            <button class="form-control btn-sm btn-success" type="submit" id="btnsubmit">Vores produkter</button>
        </div>
    </div>

    <div class="col-3 col-md-3 offset-3">
        <br><br>
        <h2 style="text-align: center; color: #146c43">Økologi</h2>
        <p style="text-align: center; color: #146c43">Vores varer er alle økologiske og dyrker i ren økologi, og har fået økologi mærket tildelt</p>
        <div class="col-6 col-md-6 offset-3"><br>
            <button class="form-control btn-sm btn-success" type="submit" id="btnsubmit">Læs mere</button>
        </div>
    </div>
    <div class="col 6 col-md-3"><br>
        <img src="images/Økologi.jpg" class="img-rounded" alt="Her skulle være et fint velkomstbillede!">
    </div>

    <div class="col 6 col-md-3 offset-md-3"><br>
        <img src="images/SenesteNyt.jpg" class="img-rounded" alt="Her skulle være et fint velkomstbillede!"> <br>
    </div>
    <div class="col-3 col-md-3">
        <br><br>
        <h2 style="text-align: center; color: #146c43">Seneste Nyt</h2>
        <p style="text-align: center; color: #146c43">Vi har fået hjælp af Viksen A/S til opsætning af et helt nyt drivhus til at afprøve nye metoder på nogen af vores grøntsager</p>
        <div class="col-6 col-md-6 offset-3"><br>
            <button class="form-control btn-sm btn-success" type="submit" id="btnsubmit">Vores produkter</button>
        </div>
    </div>


    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function myFunction(x) {
            x.classList.toggle("change");
        }
    </script>

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


    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function myFunction(x) {
            x.classList.toggle("change");
        }
    </script>


    <script type="module">
        import produkter from "./butik.js";

        const butik = new produkter();
        butik.init();

    </script>

</body>
</html>
