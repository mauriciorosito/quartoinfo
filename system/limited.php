<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class Limited {

    public function __construct() {
        session_start();
    }

    public function check($permission) {
        if (!isset($_SESSION['limited']) ||
                !in_array($_SESSION['limited'], $permission)) {
            if (isset($_SESSION['counter'])) {
                if ($_SESSION['counter'] > 3) {
                    //header('location: http://www.screaminggoatpiano.com');
                }
                $_SESSION['counter'] ++;
            } else {
                $_SESSION['counter'] = 0;
            }
            
            echo "<pre>";
            print_r($_SESSION);
            die;
            //header('location: index.php');
        }
    }

}
