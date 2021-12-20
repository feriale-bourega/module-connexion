<?php
function estconnect(){
    if (isset($_SESSION['login'])){
        $estconnect = true;
        return $estconnect;
    }
}
function nestpasconnect() {
    if (!isset($_SESSION['login'])){
        $noconnect = true;
        return $noconnect;
    }
   }

function estadmin() {
    if (isset($_SESSION['login'])){
        if ($_SESSION['login'] == 'admin')  {
            $admin = true;
            return $admin;
        }
        else {
            $admin = false;
            return $admin;
        }
    }
}
?>