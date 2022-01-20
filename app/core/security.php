<?php
if(!isset($_SESSION['userid'])){
    header("location: " . ROOT . "login");
}