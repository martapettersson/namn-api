<?php

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");

$lastNames =
    ["Öberg", "Åhlund", "Pettersson", "Axellie", "Thunberg", "Ahlström", "Pettersson", "Silfwer", "Lantz Giraldo", "Thorell"];

$female = ["Åsa", "Marta", "Maja", "Erika", "Lisah", "Freja", "Anna-Karin", "Nina", "Amanda", "Inna"];

$male = ["Björn", "Gustaf", "Jacob", "Erik", "Dragan", "Olle", "Dino", "Mahmud", "Axel", "Antonio"];

$names = array();

for ($i = 0; $i < 10; $i++) {
    $random = rand(0, 1);
    $firstNames = $random ? $female : $male;

    $firstname = $firstNames[rand(0, 9)];
    $lastname = $lastNames[rand(0, 9)];
    $email = mb_strtolower(mb_substr($firstname, 0, 2, 'UTF-8') . mb_substr($lastname, 0, 3, 'UTF-8'), 'UTF-8') . "@example.com";

    $search = array('å', 'ä', 'ö');
    $replace = array('a', 'a', 'o');
    $email = str_replace($search, $replace, $email);

    $name = array(
        "firstname" => $firstname,
        "lastname" => $lastname,
        "gender" => $random ? "female" : "male",
        "age" => rand(1, 100),
        "email" => $email
    );
    array_push($names, $name);
}

$json = json_encode(
    $names,
    JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
);

echo $json;
