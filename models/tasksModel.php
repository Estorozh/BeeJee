<?php

    function getTasks($field,$sort) {
        setSort();
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
        
        //reload();
    }

    function updateTask($arrEdit) {
      extract($arrEdit);
      $query = db_query(sprintf("UPDATE Tasks SET email='%s', author='%s', task='%s', edited=1 WHERE id_task='%s' ", xss($email), xss($author), xss($task), $id_task));
      reload();
    }

    function successTask($id) {
      $query = db_query(sprintf("UPDATE Tasks SET status=1 WHERE id_task='%s' ", $id));
      reload();
    }

    function setSort() {
      if(empty($_COOKIE['sort']) || empty($_COOKIE['sortField'])) {
        echo 'БЫЛИ ПУСТЫЕ КУКИ И Я ИХ ЗАПОЛНИЛ';
        setcookie('sort','ASC', time()+3600*24, '/');
        setcookie('sortField','author', time()+3600*24, '/');
        reload();
      }
    }

    function typeSort() {
        ($_COOKIE['sort'] == "ASC") ?  
          setcookie('sort','DESC', time()+3600*24, '/') : 
          setcookie('sort','ASC', time()+3600*24, '/');
        setcookie('sortField',$_POST['sort'], time()+3600*24,'/');
        reload();
    }
