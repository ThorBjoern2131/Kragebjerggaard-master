<?php
require "settings/init.php";

$data = json_decode(file_get_contents('php://input'), true);

/*
 * password: Skal udfyldes og være KickPHP
 * nameSearch: Valgfri
 */

/*
 $header = "HTTP/1.1 400 Bad Request"; // Sending malformed data results in a 400 Bad Request response.
 $header = "HTTP/1.1 401 Unauthorized"; // Trying to accsess to the API without authentication results in a 401 Unauthorized response.
 $header = "HTTP/1.1 404 Not Found"; // Not Found
 $header = "HTTP/1.1 405 Method Not Allowed"; // Trying to use a method on a route for which it is not implemented results in a 405 Method Not Allowed
 $header = "HTTP/1.1 422 Unprocessable Entity"; // Sending invalid data results in a 422 Unprocessable Entity response.

 $header = "HTTP/1.1 200 OK"; // Getting a resource or a collection resources results in a 200 OK response.
 $header = "HTTP/1.1 201 Created"; // Creating a resource results in a 201 Created response.
 $header = "HTTP/1.1 204 No Content"; // Updating or deleting a resource results in a 204 No Content response.
*/

//Vi laver en header der angiver at vi arbejder med en "json fil" og at vi benytter charset utf8
header('Content-Type: application/json; charset=utf-8');

//Her laver vi et password, først angiver vi en "if" som antager at hvis noget er rigtigt så køre den den bestemte kode
//Her ser den om den data som bliver hentet som her er password er lig med "KickPHP" og køre koden baseret på det
//"isset" benytter vi til at finde ud af om vores "data" variabel er givet en værdi
//Hvis værdien af "password" er "Krage" så vil den køre "if" scriptet
if(isset($data["password"]) && $data["password"] == "Krage") {

//Her laver vi en "sql" variabel, som vi sætter til at være alle vores produkter i vores database
//"SELECT stjerne" bruger vi til at vælge alt vores data
//"FROM" fortæller, hvor vi skal hente dataen fra
//"produkter" er navnet på vores database, hvor "FROM" angiver
//Vi benytter "WHERE 1=1" som gør at den vil tage alt den data hvor 1=1, som altid er rigtigt derfor tager den det hele
    $sql = "SELECT * FROM produkter WHERE 1=1";
//Her laver en "bind" variabel med et array
    $bind = [];

//Her laver vi endnu en "if" som kører, hvis vi får "nameSearch data" og den ikke er tom
    if(!empty($data["nameSearch"])) {
//Vi angiver her mere data til vores "sql" baseret på vores database
//Her angiver vi "prodNavn er lig med ":prodNavn" i vores "sql" fordi så kan vi benytte bind for bedre sikkerhed
        $sql .= " AND prodNavn = :prodNavn ";
//Vi benytter en bind til at erstatte ":prodNavn" med "namesearch" (Bind binder altså ":prodNavn" til "nameSearch"
        $bind [":prodNavn"] = $data["nameSearch"];
    }

//Her kører vi vores "sql" funktion som angiver produkterne den finder i databasen "db"
    $produkter = $db->sql($sql, $bind);
//Her laver vi en header der siger at der ikke var nogen fejl
    header("HTTP/1.1 200 OK");

//Her udskriver vi vores produkter i json format, så vi kalder vores data om produkter ved "json_encode"
    echo json_encode($produkter);


//Her kalder vi en else som køre en kode, hvis vores "if's" ikke bliver opfyldt
} else {
//Her bruger vi en header der siger der er en fejl(altså "password" er forkert)
    header("HTTP/1.1 401 Unauthorized");
//Her laver vi en variabel "error" med en array og definere den som "errorMessage" der angiver den fejl der er sket
    $error["errorMessage"] = "Dit kodeord var forkert";
//Vi vil gerne vise brugeren at deres password er forkert på siden derfor bruger vi "echo" som angiver data til hjemmesiden
//Vi udskriver fejlen til vores bruger i json format, så vi benytter "json_encode" som kalder vores "error" array
    echo json_encode($error);
}

?>