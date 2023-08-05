<?php

use Internal\App;
use Internal\Database;
use Internal\Validator;

$db = App::container()->resolve(Database::class);
App::container()->resolve(Validator::class);

$errors = [];


$title = trim($_POST['title']);
$note = trim($_POST['note']);
$user_id = $_SESSION['user']['user_id'];

if (Validator::isNull($title)) {
    $errors['title'] = 'Title is required';
}

if (Validator::isLongerThan($title, 120)) {
    $errors['title'] = 'Title can\'t be more than 120';
}

if (Validator::isNull($note)) {
    $errors['note'] = 'Note is required';
}

if (Validator::isLongerThan($note, 240)) {
    $errors['note'] = 'Content can\'t be more than 240';
}

if (!empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => 'Create note',
        'errors' => $errors
    ]);
}

$db->query(
    'INSERT INTO notes(title, note, user_id) VALUES (:title, :note, :id)',
    [
        'title' => $title,
        'note' => $note,
        'id' => $user_id

    ]
);
header('location: /notes');
exit();