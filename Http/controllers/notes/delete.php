<?php

use Internal\App;
use Internal\Database;

$db = App::container()->resolve(Database::class);

$id = $_POST['id'];

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $id])->fetchOrFail();

if ($note['user_id'] !== $_SESSION['user']['user_id']) {
    abort(403);
}

$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $id
]);

header('location: /notes');
exit();