<?php require('partials/header.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <ul class="mb-10">
      <?php foreach ($notes as $key => $note) : ?>
        <li>
          <a href="/note?id=<?php echo $note['id'] ?>" class="text-blue-500 underline">
            <?php htmlspecialchars($note['body']) ?>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
    <a href="/notes/create" class="bg-green-200 px-4 py-2 rounded hover:bg-green-100 hover:border shadow hover:shadow-none">Create Note</a>
  </div>
</main>

<?php require('partials/footer.php') ?>