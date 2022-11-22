<?php
session_start();
include "functions.php";

activityLog($_SESSION['id'],"Logged Out");






session_destroy();

header('location: ../index.php');


?>