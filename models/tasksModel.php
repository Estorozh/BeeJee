<?php

  include_once ('models/DB.php');

    function getTasks($field, $sort = "DESC") {
        $query = db_query(sprintf("SELECT * FROM Tasks ORDER BY %s %s", $field, $sort));
        return $query->fetchAll();
    }

    function addTask($author, $email, $task){
      $query = db_query(sprintf("INSERT INTO Tasks (author, email, task) VALUES ('%s', '%s', '%s')", $author, $email, $task));
    
      $db = db_connect();
      return $db->lastInsertId();
    }
    
    function getTask_one() {
      echo 'hello';
    }