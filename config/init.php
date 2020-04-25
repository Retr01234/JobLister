<?php
// Start Session
session_start();

// Config File
require_once 'config.php'; // Importing the Config File

// Include Helpers
require_once 'helpers/system_helper.php'; // Importing the System Helper File

// Autoloading all classes
function __autoload($class_name){
  require_once 'lib/'.$class_name. '.php'; // Importing classes, so whatever classname is...import it.
}