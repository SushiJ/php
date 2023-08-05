<?php

use Internal\App;
use Internal\Database;
use Internal\Validator;

$db = App::container()->resolve(Database::class);
App::container()->resolve(Validator::class);


$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_POST['id']])->fetchOrFail();

if ($note['user_id'] !== $_SESSION['user']['user_id']) {
    abort(403);
}

$title = trim($_POST['title']);
$content = trim($_POST['note']);

$errors = [];

if (Validator::isNull($title)) {
    $errors['title'] = 'Title is required';
}

if (Validator::isLongerThan($title, 120)) {
    $errors['title'] = 'Title can\'t be more than 120';
}

if (Validator::isNull($content)) {
    $errors['note'] = 'Note is required';
}

if (Validator::isLongerThan($content, 240)) {
    $errors['note'] = 'Content can\'t be more than 240';
}

$note['note'] = $content;

if (!empty($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query(
    'UPDATE notes SET title = :title, note = :note WHERE id = :id',
    [
        'title' => $title,
        'note' => $note['note'],
        'id' => $_POST['id']

    ]
);

header('location: /notes');
exit();