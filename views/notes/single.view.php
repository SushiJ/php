<?php view("partials/header.php");
view("partials/nav.php");
view("partials/banner.php", ['heading' => $note['title']]) ?>
<main>
    <div class="mx-auto max-w-7xl py-6 px-2 sm:px-6 lg:px-8">
        <a href="/notes" class="text-blue-500">&lt; Go back</a>
        <p class="my-2">
            <?= htmlspecialchars($note['note']) ?>
        </p>
        <div class="flex">
            <a href="/notes/edit?id=<?= $note['id'] ?>"
                class="text-sm py-2 px-3 mr-2 font-semibold text-gray-900 hover:bg-gray-300 bg-gray-200 rounded-md">Edit</a>
            <form method="POST">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <input type="hidden" name="_method" value="DELETE">
                <button class="px-3 py-2 text-sm bg-red-600 hover:bg-red-500 text-white rounded">Delete</button>
            </form>
        </div>
    </div>
</main>
<?php view("partials/footer.php") ?>