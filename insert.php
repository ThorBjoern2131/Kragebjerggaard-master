<?php
require "settings/init.php";

if(!empty($_post["data"])){
    $data = $_post["data"];

    $sql = "INSERT INTO produkter (prodNavn, prodBeskrivelse, prodPris, prodDato, prodimage, prodformat, prodgenre, prodforfatter, prodrate) values(:prodNavn, :prodBeskrivelse, :prodPris, :prodDato, :prodimage, :prodformat, :prodgenre, :prodforfatter, :prodrate)";
    $bind = [":prodNavn" => $data["prodNavn"], ":prodBeskrivelse" => $data["prodBeskrivelse"], ":prodPris" => $data["prodPris"], ":prodDato" => $data["prodDato"], ":prodimage" => $data["prodimage"], ":prodformat" => $data["prodformat"], ":prodgenre" => $data["prodgenre"], ":prodforfatter" => $data["prodforfatter"], ":prodrate" => $data["prodrate"]];

    $db->sql($sql, $bind, false);

    echo "Produktet er nu indsat. <a href='insert.php'>Indsæt et produkt mere</a>";
    exit;
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
    <meta property="og:locale" content="da_DK"/>

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tiny.cloud/1/e85fpf1qdgxg134gutu9ijitqque3zxk1rukhh9jvxvhc7y2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>

<form method="post" action="insert.php" enctype="multipart/form-data">
    <div class="row">

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="prodNavn">Produkt navn</label>
                <input class="form-control" type="text" name="data[prodNavn]" id="prodNavn" placeholder="" value="">
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="proPris">Produkt pris</label>
                <input class="form-control" type="number" step="0.1" name="data[proPris]" id="proPris" placeholder="" value="">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="prodBeskrivelse">Produkt beskrivelse</label>
                <textarea class="form-control" name="data[prodBeskrivelse]" id="prodBeskrivelse"></textarea>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="prodDato">Produkt udgivelse</label>
                <input class="form-control" type="number" step="0.1" name="data[prodDato]" id="prodDato" placeholder="" value="">
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="prodimage">Produkt billede</label>
                <input class="form-control" type="file" name="data[prodimage]" id="prodimage" placeholder="" value="">
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="prodformat">Produkt format</label>
                <input class="form-control" type="text" name="data[prodformat]" id="prodformat" placeholder="" value="">
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="prodgenre">Produkt genre</label>
                <input class="form-control" type="text" name="data[prodgenre]" id="prodgenre" placeholder="" value="">
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="prodforfatter">Produkt forfatter</label>
                <input class="form-control" type="text" name="data[prodforfatter]" id="prodforfatter" placeholder="" value="">
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="prodrate">Produkt rating</label>
                <input class="form-control" type="number" step="0.1" name="data[prodrate]" id="prodrate" placeholder="" value="">
            </div>
        </div>

        <div class="col-12 col-md-6 offset-md-6">
            <button class="form-control btn btn-primary" type="submit" id="btnSubmit">Opret produkt</button>
        </div>

    </div>
</form>


<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>











