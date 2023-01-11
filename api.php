<?php
//Vi er nu på "api.php" hvor vi vil lave en API vi kan hente data og få data fra
//require (også kendt som include men har forskellen at require stopper scriptet
//mens include ikke stopper scriptet og kun afsender en advarsel
//require inkludere en specifik fil i vores script som her er "init.php"
require "settings/init.php";

//Vi vil gerne kunne gemme data som vi får fra andre systemer, så her starter vi med at lave en data variabel
//Det meste data vi vil modtage er json data, men det kan vi heldigvis afkode til en array som vi gør her
//For at hente dataen bruger vi file_get_content og angiver det skal være vores "php://input" som giver os alt dataen fra siden
//Tilsidst angiver vi at json_decode funktionen skal være "true", hvor vi laver en associative array
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

header('Content-Type: application/json; charset=utf-8');

//Her laver vi et password, først angiver vi en "if" som antager at hvis noget er rigtigt så køre den den bestemte kode
//Her ser den om den data som bliver hentet som her er password er lig med "KickPHP" og køre koden baseret på det
//"isset" benytter vi til at finde ud af om vores "data" variabel er givet en værdi
//Hvis værdien af "password" er "Krage" så vil den køre "if" scriptet

//Her laver vi en "sql" variabel, som vi sætter til at være alle vores produkter i vores database
//"SELECT stjerne" bruger vi til at vælge alt vores data
//"FROM" fortæller, hvor vi skal hente dataen fra
//"produkter" er navnet på vores database, hvor "FROM" angiver
//Vi benytter "WHERE 1=1" som gør at den vil tage alt den data hvor 1=1, som altid er rigtigt derfor tager den det hele

//Her laver en "bind" variabel med et array

if(isset($data["password"]) && $data["password"] == "KickPHP") {
    $sql = "SELECT * FROM produkter WHERE 1=1";
    $bind = [];

    //Vi angiver her mere data til vores "sql" baseret på vores database
    //Her angiver vi "prodNavn er lig med ":prodNavn" i vores "sql" fordi så kan vi benytte bind for bedre sikkerhed

    //Vi benytter en bind til at erstatte ":prodNavn" med "namesearch" (Bind binder altså ":prodNavn" til "nameSearch"

    if(!empty($data["nameSearch"])) {
        $sql .= " AND prodNavn LIKE CONCAT('%' :nameSearch '%') OR prodVare LIKE CONCAT('%' :nameSearch '%') OR prodId LIKE CONCAT('%' :nameSearch '%')";
        $bind [":nameSearch"] = $data["nameSearch"];
    }

    //Her kører vi vores "sql" funktion som angiver produkterne den finder i databasen "db"

    //Her laver vi en header der siger at der ikke var nogen fejl

    $sql .= " ORDER BY prodNavn ASC";

    $produkter = $db->sql($sql, $bind);
    header("HTTP/1.1 200 OK");

    //Her udskriver vi vores produkter i json format, så vi kalder vores data om produkter ved "json_encode"

    echo json_encode($produkter);

    //Her kalder vi en else som køre en kode, hvis vores "if's" ikke bliver opfyldt
    //Her bruger vi en header der siger der er en fejl(altså "password" er forkert)
    //Her laver vi en variabel "error" med en array og definere den som "errorMessage" der angiver den fejl der er sket

    //Vi vil gerne vise brugeren at deres password er forkert på siden derfor bruger vi "echo" som angiver data til hjemmesiden
    //Vi udskriver fejlen til vores bruger i json format, så vi benytter "json_encode" som kalder vores "error" array

} else {
    header("HTTP/1.1 401 Unauthorized");
    $error["errorMessage"] = "Din kodeord var forkert";
    echo json_encode($error);
}

?>