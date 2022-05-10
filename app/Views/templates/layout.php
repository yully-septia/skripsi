<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blank - Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('windmill-admin/assets/css/tailwind.output.css'); ?>" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer ></script>
    <script src="<?= base_url('windmill-admin/assets/js/init-alpine.js'); ?>"></script>
    <?= $this->renderSection('head'); ?>
  </head>
  <body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}" >
    <!-- Sidebar -->
    <?= $this->include('templates/sidebar'); ?>
      <div class="flex flex-col flex-1">
        <!-- Header -->
        <?= $this->include('templates/header'); ?>
        <main class="h-full pb-16 overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-6 mx-auto grid">
            <?= $this->renderSection('content'); ?>
          </div>
        </main>
      </div>
    </div>
    <?= $this->renderSection('script'); ?>
  </body>
</html>
