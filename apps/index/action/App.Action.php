<?php
class AppAction extends Action{
    function init(){
        session_start();
        if(!isset($_SESSION['uid'])){
            header("Location:/login");
            exit();
        }
    }
}

