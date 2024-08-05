<?php

$db = new PDO('sqlite:my_db.db');

//var_dump($db);

//$stmt = $db->prepare('insert into users (name, pass, created_at) values (?, ?, ?)');
//$stmt->execute(['Вася', 'test_pass2', date('Y-m-d H:i:s', time() - 3600 * 24 * 30)]);
//var_dump($db->lastInsertId());

//$stmt = $db->prepare('update users set pass = ?');
//$stmt->execute([password_hash('123', PASSWORD_DEFAULT)]);
//var_dump($stmt->rowCount());

$stmt = $db->prepare('delete from users where id = ?');
$stmt->execute([2]);
var_dump($stmt->rowCount());

$stmt = $db->prepare('select * from users where created_at between ? and ?');
$stmt->execute([
    date('Y-m-d H:i:s', time() - 3600 * 24 * 31),
    date('Y-m-d H:i:s', time()),
    ]);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($users);
