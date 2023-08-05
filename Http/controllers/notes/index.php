<?php

use Internal\App;
use Internal\Database;

$db = App::container()->resolve(Database::class);

$notes = $db->query(
    "SELECT * FROM notes WHERE user_id = :user_id",
    [
        'user_id' => $_SESSION['user']['user_id']
    ]
)->fetchAll();

view(
    "notes/index.view.php",
    [
        'heading' => 'My notes',
        'notes' => $notes
    ]
);