<?php
  // Redirect to Page
  function redirect($page = FALSE, $message = NULL, $message_type = NULL) { // Redirect takes a page, which is false by default and null message/message type
    if (is_string ($page)) { // If page is in string then display page location
      $location = $page;
    } else {
      $location = $_SERVER ['SCRIPT_NAME']; // If not then display server script name
    }

    // Checking for Message
    if ($message != NULL) {
      // Set Message
      $_SESSION['message'] = $message;
    }

    // Taking Message and Message Type and placing them into session variables

    // Checking for Type
    if ($message_type != NULL) {
      // Set Message Type
      $_SESSION['message_type'] = $message_type;
    }

    // Redirect
    header ('Location: '.$location); // We are taking a path and redirecting using header
    exit;
  }

  // Display Message
  function displayMessage(){
    if (!empty($_SESSION['message'])){ // If Message session is not empty
      // Assign Message Variable
      $message = $_SESSION['message'];

      if (!empty($_SESSION['message_type'])){ // If message_type session is not empty
        // Assign Type Variable
        $message_type = $_SESSION['message_type']; // Assign Message Type variable
        // Create Ouput
        if ($message_type == 'error') {
          echo '<div class="alert alert-danger">' . $message . '</div>'; // Error
        } else {
          echo '<div class="alert alert-success">' . $message . '</div>'; // Success
        }
      }
      // Unset Message
      unset($_SESSION['message']);
      unset($_SESSION['message_type']);
    } else {
      echo '';
    }
  }