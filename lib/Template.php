<?php 
class Template {
  // Path To Template
  protected $template;

  // Variables passed in
  protected $vars = array();

  // Constructor
  public function __construct($template){ //Takes in the path variable $template
    $this->template = $template; // Setting it to the actual property
  }

  public function __get($key){ // Get function to get the template variables & this will take in a key
    return $this->vars[$key]; 
  }

  public function __set($key, $value){ // Setting the key & value
    $this->vars[$key] = $value;
  }

  public function __toString(){ // ToString so we can use it as a string
    extract($this->vars); // Extracting variable so we can use single variable instead of key value in the template. If we set $template->$name; then we can just use $name
    chdir(dirname($this->template)); // Changing directory
    ob_start(); // Start a buffer

    include basename($this->template); // Include Template Path

    return ob_get_clean(); // Get current buffer contents and delete current output buffer
  }
}