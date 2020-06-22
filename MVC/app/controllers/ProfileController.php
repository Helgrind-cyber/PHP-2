<?php
namespace App\Controllers;
class ProfileController {
    function getProfile() {
        $name = "Quan";
        $age = "24";
        $address = "Nam Dinh Province";
        include_once './app/views/home/profile.php';
    }
}
