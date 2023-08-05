<?php

use Internal\App;
use Internal\Database;

$db = App::container()->resolve(Database::class);

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_GET['id']])->fetchOrFail();

if ($note['user_id'] !== $_SESSION['user']['user_id']) {
    abort(403);
}

view(
    "notes/edit.view.php",
    [
        'errors' => [],
        'note' => $note
    ]
);