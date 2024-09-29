<?php

require_once "./vendor/autoload.php";
require_once "./src/Activity.php"; // Is dit de juiste manier? Als ik een namespace maak werkt het niet

//use src\Activity;

$activity = new Activity();

echo $activity->getActivity();