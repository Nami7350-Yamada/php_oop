<?php
    // require_once 'Models/Todo.php';
    // require_once 'function.php';
    require_once('function.php');
    require_once('Models/Todo.php');

    //Todoクラスのインスタンス化
    $todo = new Todo();

    //DBからデータを全件取得
    $tasks = $todo->all();

    // echo '<pre>';
    // var_dump($tasks);
    // exit();
?>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> -->
  <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
</head>

<body>

<header class="px-5 bg-info">
    <nav class="navbar navbar-dark">
        <a href="index.php" class="navbar-brand"><h1>TODO LIST</h1></a>
        <div class="justify-content-end">
            <div class="text-light">
                Namiko Yamada
</div>
        </div>
    </nav>
</header>
<img src="assets/images/beach-2.jpg" class="img-fluid" alt="Responsive image">
<!-- <img src="assets/images/architecture-bird-s-eye-view-building-exterior-2703519.jpg" alt="街" class="img-thumbnail"> -->
<main class="container py-5">
    <section>
        <form class="form-row justify-content-center" action="create.php" method="POST">
            <div class="col-10 col-md-6 py-2">
                <input type="text" class="form-control" placeholder="ADD TODO" name="task">
            </div>
            <div class="py-2 col-md-3 col-10">
                <button type="submit" class="col-12 btn btn-danger">ADD</button>
            </div>
        </form>
    </section>
    <section class="mt-5">
  <table class="table table-hover">
      <thead>
        <tr class="bg-info text-light">
            <th class=>TODO</th>
            <th>DUE DATE</th>
            <th>STATUS</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
      </thead>
      <tbody>
        <!--ここ以下後ほど繰り返し処理する-->
        <?php foreach ($tasks as
$task):?>
  <tr>
    <td><?php echo h($task['name']); ?></td>
    <td><?php echo h($task['due_date']); ?></td>
    <td>NOT YET</td>
    <td>
        <a class="text-dark" href="edit.php?id=<?php echo h($task['id']); ?>"><i class="material-icons">
flight_takeoff</i></a>
    </td>
    <td>
        <a class="text-danger" href="delete.php?id=<?php echo h($task['id']); ?>"><i class="material-icons">
flight_land</i></a>
    </td>
  </tr>
  <?php endforeach; ?>
      </tbody>
  </table>
</section>

</main>


</body>
</html>