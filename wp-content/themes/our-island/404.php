<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package our-island
 */

get_header();
?>
<!-- This example requires Tailwind CSS v2.0+ -->
<!--
  This example requires updating your template:

  ```
  <html class="h-full">
  <body class="h-full">
  ```
-->
<div class="min-h-full flex flex-col">
  <main class="flex-grow mx-auto max-w-7xl w-full flex flex-col px-4 sm:px-6 lg:px-8">
    <div class="flex-shrink-0 my-auto py-16 sm:py-32">
      <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wide">404 error</p>
      <h1 class="mt-2 text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">Page not found</h1>
      <p class="mt-2 text-base text-gray-500">Sorry, we couldn’t find the page you’re looking for.</p>
      <div class="mt-6">
        <a href="<?php echo home_url(); ?>" class="text-base font-medium text-indigo-600 hover:text-indigo-500">Go back home<span aria-hidden="true"> &rarr;</span></a>
      </div>
    </div>
  </main>
</div>


<?php
get_footer();
