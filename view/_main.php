<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BeeJee ToDo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="bg"></div>

  <header class="container-fluid">
    <div class="login row p-3 pl-5">
      <?php if($isAuth) : ?>
        <form action="" method="post" class="d-flex col-lg-12 justify-content-around">
          <span class="login-username">username: <?=$_COOKIE['username'] ?? '';?></span>
          <button name="logout" class="btn-logout btn btn-secondary" value='logout'>Logout</button>
        </form>
      <?php else :  ?>
        <form action="" id="auth" method="post" class="d-flex col-lg-12 justify-content-center">
          <input type="text" name="username" placeholder="username" class="pl-2">
          <input type="password" name="password" placeholder="password" class="pl-2">
          <input type="submit" value="Signin" class="btn btn-primary btn-signin">
        </form>
      <?php endif; ?>
    </div>
  </header>
  <main>
    <div class="settings container-fluid mt-3">
      <div class="item row col-lg-7">
        <?php if(empty($editTask)) :?>
          <form action="" id="settings__addItem" method="post" class="col-lg-9 col-md-12">
            <h4 class="text-center">Add task</h4>
            <div class="col-lg-6 col-xs-12">
              <p class="col-lg-12">Your email</p>
              <input type="text" name="email" placeholder="email" class="col-lg-12">
            </div>
            <div class="col-lg-5 col-xs-12">
              <p class="col-lg-12">Your name</p>
              <input type="text" name="author" placeholder="name" class="col-lg-12">
            </div>
            <p class="col-lg-12">Your task</p>
            <input type="text" name="task" placeholder="task" class="col-lg-11 col-xs-12">
            <input type="submit" name="addTask" value="Save task" class="btn-send btn btn-primary col-lg-4 mt-2">
          </form>

        <?php else : ?>
          <form action="" id="settings__editItem" method="post" class="col-lg-9 col-md-12">
            <h4 class="text-center text-danger">Edit task</h4>
            <div class="col-lg-6 col-xs-12">
              <p class="col-lg-12">Email</p>
              <input type="text" name="email" placeholder="email" class="col-lg-12" value="<?=$editTask['email'];?>">
            </div>
            <div class="col-lg-5 col-xs-12">
              <p class="col-lg-12">Name</p>
              <input type="text" name="author" placeholder="name" class="col-lg-12" value="<?=$editTask['author'];?>">
            </div>
            <p class="col-lg-12">Task</p>
            <input type="text" name="task" placeholder="task" class="col-lg-11 col-xs-12" value="<?=$editTask['task'];?>">
            <input type="hidden" name="id_task" value="<?=$editTask['id_task'];?>">
            <input type="submit" name="editTask" value="Update" class="btn-send btn btn-primary col-lg-4 mt-2">
          </form>
        <?php endif;?>

        <form action="" method="post" class="settings__sort col-lg-3  mt-3 pt-3">
          <h4 class="text-center">Sorting on</h4>
          <input type="submit" value="Author" name="sort" class="btn btn-primary col-lg-12 col-md-3">
          <input type="submit" value="Email" name="sort" class="btn btn-primary col-lg-12 col-md-3">
          <input type="submit" value="Status" name="sort" class="btn btn-primary col-lg-12 col-md-3">
        </form>
      </div>
    </div>

    <div class="items container-fluid mt-3">

      <?php if(count($tasks)>3) :?>
        <div class="row justify-content-center">
          <?=$paginator;?>
        </div>
      <?php endif; ?>    

    <div class="row justify-content-center">
        <?php for($i = 0; $i < $countTask; $i++) : 
          $num = $start + $i;
          if(isset($tasks[$num])) :?>
          <div class="item col-lg-10 mt-5 p-3 pl-5">
            <span class="author"><?=$tasks[$num]['author']?></span>
            <h4><?=$tasks[$num]['task'];?></h4>
            <span class="mail"><?=$tasks[$num]['email']?></span>
            
            <?php if($isAuth) : ?>
              <form method="post">
                <input type="submit" name="edit" class="btn-edit btn btn-primary" value="Edit task">
                <input type="hidden" name="numTask" value="<?=$tasks[$num]["id_task"]?>">
              </form>
              <form method="post">
                <input type="submit" name="ready" class="btn-ready btn btn-success" value="Success">
                <input type="hidden" name="numTask" value="<?=$tasks[$num]["id_task"]?>">
              </form>
            <?php endif; ?>

            <?php if($tasks[$num]['status']) : ?>
              <span class="status text-success">Success</span>
            <?php else :?>
              <span class="status text-danger">Waiting</span>
            <?php endif; ?>
            <?php if($tasks[$num]['edited']) {
              echo '<span class="edit text-info">Edited by admin</span>';
            } ?>

          </div>
          <?php endif;
        endfor; ?>
      </div>
    </div>

  <div class="modal <?php if(!empty($err) || !empty($msg)) {echo 'open';} ?>">
    <div class="modal-body">
      <span class="modal-close">&times;</span>
      <p class="modal-body-text">
        <?php
          if(!empty($err)) echo $err;
          if(!empty($msg)) echo $msg;
        ?>
      </p>
    </div>
    
  </div>

  <script src="assets/script.js"></script>
</body>
</html>