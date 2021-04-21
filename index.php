<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");

$female = ["Åsa", "Lotta", "Greta", "Amanda", "Marta", "Maja", "Nina", "Erika", "Deepthi", "Inna"];
$male = ["Robin", "Mahmud", "Kevin", "Sebastian", "Gustaf", "Björn", "Erik", "Dragan", "Özgur", "Dino"];
$lastNames = ["Johnsson", "Hedlund", "Al Hakim", "Gedda", "Basele", "Carlson", "Bernadotte", "Wonder", "Richie", "Olsson"];

for ($i = 0; $i < 10; $i++) {
    $random = rand(0, 1);
    $firstNames = $random ? $female : $male;
    $firstName = $firstNames[rand(0, 9)];
    $lastName = $lastNames[rand(0, 9)];
    $search = 'åäöÅÄÖ';
    $replace = 'aaoAAO';
    $fi = substr(strtr($firstName, $search, $replace), 0, 2);
    $las = substr(strtr(str_replace(' ', '', $lastName), $search, $replace), 0, 3);
    $email = strtolower($fi . $las) . '@example.com';

    $names[] = array(
        "firstname" => $firstName,
        "lastname" => $lastName,
        "gender" => $random ? "female" : "male",
        "age" => rand(1, 100),
        "email" => $email
    );
}

echo json_encode($names, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
