<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];


$errors = [];

if (!Validator::email($email)) {
  $errors['email'] = "Please provide valid email.";
}

if (!Validator::string($password)) {
  $errors['password'] = "Password can not be empty.";
}



if (empty($errors)) {
  $user = $db->query('select * from users where email = :email', [
    'email' => $email
  ])->find();

  if (!empty($user) && password_verify($password, $user['password'])) {
    login($user);
    header('location:/');
    exit;
  }else {
    $errors['email'] = "Credential didn't match.";
  }
}

if (!empty($errors)) {
  return view('session/create.view.php', [
    'errors' => $errors
  ]);
}