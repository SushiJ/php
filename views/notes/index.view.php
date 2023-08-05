<?php view('partials/header.php');
view('partials/nav.php');
view('partials/banner.php', [
  'heading' => 'My Notes'
]) ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <ul class="mb-4">
      <?php foreach ($notes as $note): ?>
        <li>
          <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
            <?= htmlspecialchars($note['title']) ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
    <a href="/notes/create" class="text-blue-700 hover:underline">Create new note &dash;&gt;</a>
  </div>
</main>
<?php view('partials/footer.php') ?>