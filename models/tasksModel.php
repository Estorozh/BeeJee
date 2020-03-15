<?php

    include_once ('models/DB.php');

    function getTasks($field,$sort) {
        $query = db_query("SELECT * FROM Tasks ORDER BY $field ".$sort);
        return $query->fetchAll();
    }

    function getTask_one($id) {
        $query = db_query("SELECT * FROM Tasks WHERE id_task=$id");
        return $query->fetch();
    }

    function addTask($author, $email, $task){
        $query = db_query(sprintf("INSERT INTO Tasks (author, email, task) VALUES ('%s', '%s', '%s')", $author, $email, $task));
      
        $db = db_connect();
        
        return $db->lastInsertId();
    }

    function updateTask($arrEdit) {
      extract($arrEdit);
      $query = db_query(sprintf("UPDATE Tasks SET email='%s', author='%s', task='%s', status='2' WHERE id_task='%s' ", xss($email), xss($author), xss($task), $id_task));
      reload();
    }

    function successTask($id) {
      $query = db_query(sprintf("UPDATE Tasks SET status='1' WHERE id_task='%s' ", $id));
      reload();
    }


    if(empty($_COOKIE['sort'])) {
      setcookie('sort','ASC', time()+3600*24, '/');
    }

    function changeSort() {
        ($_COOKIE['sort'] == "ASC") ?  setcookie('sort','DESC', time()+3600*24, '/') : setcookie('sort','ASC', time()+3600*24, '/');
        reload();
    }