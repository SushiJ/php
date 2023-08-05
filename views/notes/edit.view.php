<?php view("partials/header.php");
view("partials/nav.php");
view(
    "partials/banner.php",
    [
        'heading' => 'Edit note',
    ]
) ?>
<main>
    <div class="mx-auto max-w-7xl py-6 px-2 sm:px-6 lg:px-8">
        <div class="pb-8">
            <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500">&lt; Go back</a>
        </div>
        <div class="grid place-items-center max-w-2xl mx-auto">
            <form class="min-w-full space-y-10 border border-gray-900/10 p-4" method="POST" action="/notes/update">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <div
                            class="rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                            <input type="text" name="title" id="title" autocomplete="title" required
                                value="<?= $note['title'] ?>"
                                class="border-0 w-full bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                placeholder="Title...">
                        </div>
                    </div>
                    <?php if (isset($errors['title'])): ?>
                        <p class="text-red-500 text-xs">
                            <?= $errors['title'] ?>
                        </p>
                    <?php endif; ?>
                    <p class="text-xs text-gray-500 text-end mt-1">Max characters 120</p>
                </div>
                <div>
                    <label for="note" class="block text-sm font-medium leading-6 text-gray-900">Note</label>
                    <div class="mt-2">
                        <textarea id="note" name="note" rows="6" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $note['note'] ?? '' ?></textarea>
                    </div>
                    <?php if (isset($errors['note'])): ?>
                        <p class="text-red-500 text-xs">
                            <?= $errors['note'] ?>
                        </p>
                    <?php endif; ?>
                    <p class="text-xs text-gray-500 text-end mt-1">Max characters 240</p>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-4">
                    <a href="/notes"
                        class="text-sm py-2 px-3 font-semibold text-gray-900 hover:bg-gray-300 bg-gray-200 rounded-md">Cancel</a>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php view("partials/footer.php") ?>