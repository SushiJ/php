<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
            alt="Your Company">
        </div>
        <div class="ml-10 flex items-baseline space-x-4">
          <a href="/"
            class="<?= uriIs("/") ? "bg-gray-900 text-white" : "" ?> text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Home</a>
          <a href="/about"
            class="<?= uriIs("/about") ? "bg-gray-900 text-white" : "" ?> text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">About</a>
          <?php if ($_SESSION['user'] ?? false): ?>
            <a href="/notes"
              class="<?= uriIs("/notes") ? "bg-gray-900 text-white" : "" ?> text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Notes</a>
          <?php endif; ?>
        </div>
      </div>
      <div class="ml-10 flex items-baseline space-x-4">
        <?php if ($_SESSION['user'] ?? false): ?>
          <form action="/signout" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <button class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Sign
              out</button>
          </form>
        <?php else: ?>
          <a href="/signup"
            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Sign
            up</a>
          <a href="/signin"
            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Sign
            in</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>