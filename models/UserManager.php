<?php
include_once "PDO.php";

function GetOneUserFromId($id)
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM user WHERE id = $id");
  return $response->fetch();
}

function GetAllUsers()
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM user ORDER BY nickname ASC");
  return $response->fetchAll();
}

function GetUserIdFromUserAndPassword($login, $password)
{
  global $PDO;
  $prepareRequest = $PDO->prepare("select * from user where nickname=:nickname and password=: id = $id");
  $prepareRequest->execute(
    array(
      "nickname" => $login,
      "password" => $password
    )
  );
  $users = $preparedRequest->festchall();
  if (count($users) == 1) {
    $user = $users[0];
    return $user['id'];
  } else {
    return -1; //on retourne -1 car on est sur qu'il n'y auras pas d'id négatif.
  }
}
