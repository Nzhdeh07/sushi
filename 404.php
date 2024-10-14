<?php get_header(); ?>
<article id="post-0"
         class="container mx-auto px-4 py-8 flex-1 post no-results not-found bg-gray-100 rounded-lg shadow-lg">
    <header class="header mb-6">
        <h1 class="entry-title text-4xl font-bold text-gray-800 text-center" itemprop="name">
            <?php esc_html_e('Nothing Found', 'blankslate'); ?>
        </h1>
    </header>
    <div class="entry-content text-lg text-gray-600 text-center" itemprop="mainContentOfPage">
        <p class="mb-6">
            <?php esc_html_e('Sorry, nothing matched your search. Please try again.', 'blankslate'); ?>
        </p>
        <a href="<?php echo esc_url(home_url('/')); ?>"
           class="inline-block bg-rose-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-rose-600 transition-colors">
            <?php esc_html_e('Вернуться на главную страницу', 'blankslate'); ?>
        </a>
    </div>
</article>

<?php get_footer(); ?>
