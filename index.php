<?php

// Steg 1 - Ange lämpliga HTTP headers
// Läs mer här: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");

// Steg 2 - Skapa arrayer

$firstNames =
    ["Åsa", "Björn", "Marta", "Jacob", "Maja", "Erika", "Olle", "Lisah", "Freja", "Anna-Karin"];
$lastNames =
    ["Öberg", "Åhlund", "Pettersson", "Axellie", "Thunberg", "Ahlström", "Pettersson", "Silfwer", "Lantz Giraldo", "Thorell"];

// Steg 3 - Skapa 10 namn och spara dessa i en ny array

$names = array();

// 10 varv i denna loop!
for ($i = 0; $i < 10; $i++) {
    $name = array(
        "firstname" => $firstNames[rand(0, 9)],
        "lastname" => $lastNames[rand(0, 9)]
    );
    array_push($names, $name);
}

//TEST
// print_r($names);

// Steg 4 - Konvertera PHP-arrayen($names) till JSON

$json = json_encode(
    $names,
    JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
);

// json_encode — Returns the JSON representation of a value
// Läs mer här: http://php.net/manual/en/function.json-encode.php

//Steg 5 – Skicka JSON till klienten
echo $json;
// OBS!
// Ingen extra data får skickas till klienten,
// t.ex. HTML-kod