<?php

class Database{
  // Private Properties
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $dbname = DB_NAME;

  private $dbh; // DB Handler
  private $error; // DB Error
  private $stmt; // DB Statement

  //Constructor
  public function __construct(){
    // Set DSN
    $dsn = 'mysql:host='. $this->host .';dbname='. $this->dbname; // Can use any DB with PDO e.g. PostSQL
  
    // Set Options
    $options = array(
      PDO::ATTR_PERSISTENT => true, // Persisting Connection
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Error Mode
    );

    // Creating PDO Instance
    try{ // Tries to run the connection, and if error it catches the exception
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $options); // Placing Constructor DSN, Username, Password
    } catch(PDOException $e) { // If there is an error, whatever the error is, we place it into this->error property
      $this->error = $e->getMessage();
    }
  }

  // Query Method
  public function query($query){
    $this->stmt = $this->dbh->prepare($query);
  }

  // Method to bind values
  public function bind($param, $value, $type = null){
    if(is_null($type)) { //If is null, and pass in type (default)
      switch(true){
        case is_int ( $value ) : $type = PDO::PARAM_INT; // If its an integer then set it to param_int
        break;
        case is_bool ( $value ) : $type = PDO::PARAM_BOOL; // If its a boolean then set it to param_bool
        break;
        case is_null ( $value ) : $type = PDO::PARAM_NULL; // If its null then set it to param_null
        break;
        default :
          $type = PDO::PARAM_STR; // By default its a string (if none of the above)
      }
    }
    $this->stmt->bindValue($param, $value, $type); // Going after the if statement above
  }

  // Execute Function
  public function execute(){
    return $this->stmt->execute();
  }

  // Fetching data and returning as a result set
  public function resultSet(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ); // Fetching all as an object
  }

  public function single(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }
}