<?php

// require_once 'Models/Todo.php';
require_once('Models/Todo.php');

//入力されたデータを変数taskに保存
$task = $_POST['task'];

$todo = new Todo();


// 新しいタスクを作成1105(作成したIDを取得)
$latestId = $todo->create($task);

// 最新のタスクを取得1105
$latestTask = $todo->get($latestId);

// 最新のタスクをjson形式にして通信もとに返す
echo json_encode($latestTask);
// header('Location: index.php');
