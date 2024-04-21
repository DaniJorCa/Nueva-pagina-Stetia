<?php

function check_contact_form(){
    require_once ('php/models/form_model.php');
    require_once('php/models/clases.php');
    check_contact_form_fields($_POST);
} 

function check_register_form(){
    require_once ('php/models/form_model.php');
    require_once('php/models/clases.php');
    check_register_form_fields($_POST);
} 


 
?>