<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <header class="container px-2.5 py-4">
        <div class="flex items-center">
            <!-- Заголовок -->
            <h1 class="entry-title text-2xl font-bold" itemprop="name">
                <?php single_term_title(); ?>
            </h1>

            <!-- Хлебные крошки (Yoast SEO) -->
            <?php if (function_exists('yoast_breadcrumb')): ?>
                <div class="border-solid border border-gray-700 mx-2.5 p-2  rounded-3xl text-sm text-gray-600">
                    <?php yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">', '</p>'); ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Meta описание -->
        <div class="archive-meta text-gray-500 mt-2" itemprop="description">
            <?php if ('' != get_the_archive_description()) {
                echo esc_html(get_the_archive_description());
            } ?>
        </div>
    </header>
    <!--Рекомендуем -->
    <div class="container px-2.5 flex-1">
        <div class="flex flex-wrap my-2 ">
            <div class="w-full mx-auto flex-grow">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-8 md:gap-4">

                    <?php if (have_posts()) : while (have_posts()) : the_post();
                        // Получаем данные из ACF полей
                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $description = get_the_content();
                        $weight = get_field('weight');
                        $price = get_field('price');
                        $discount_price = get_field('discount-price');
                        $count = get_field('count');
                        $tags = get_the_terms(get_the_ID(), 'post_tag');

                        $tag_image_urls = []; // Массив для хранения URL изображений меток
                        if ($tags && !is_wp_error($tags)) {
                            foreach ($tags as $tag) {
                                $image_id = get_term_meta($tag->term_id, '_thumbnail_id', true);
                                $tag_image_urls[] = wp_get_attachment_image_url($image_id, 'full'); // Добавляем URL изображений в массив
                            }
                        }


                        ?>

                        <div class="py-2">
                            <div class="relative">
                                <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
                                    <img class="h-auto w-full rounded-t-lg" src="<?php echo esc_url($image_url); ?>"
                                         alt="<?php the_title(); ?>" loading="lazy">
                                </a>
                                <!-- Вывод изображения метки, если оно существует -->
                                <div class="absolute top-1 left-1 flex flex-wrap space-x-2">
                                    <?php foreach ($tag_image_urls as $tag_image_url): ?>
                                        <?php if ($tag_image_url): ?>
                                            <img src="<?php echo esc_url($tag_image_url); ?>"
                                                 class="w-10 h-10 rounded-full border-2 border-white z-10">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="product-info px-2.5">
                                <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
                                    <p class="text-[18px] font-medium mt-3.5"><?php the_title(); ?></p>
                                </a>
                                <p class="text-[14px] pt-2.5 text-black h-[calc(3*1.6rem)] overflow-hidden">
                                    <?php echo esc_html($description); ?>
                                </p>


                                <div class="price py-2.5">
                                    <p class="salePrice text-[14px] text-gray-300">
                                        <?php if ($discount_price): ?>
                                            <del class="text-[18px]"><?php echo esc_html($price); ?></del>
                                            руб.
                                        <?php else: ?>
                                            <del class="text-[18px]">&nbsp;</del>
                                        <?php endif; ?>
                                    </p>

                                    <div class="flex justify-between content-end">
                                    <span class="text-rose-500 text-[18px]"><span class="text-[24px]">
                                            <?php echo esc_html($discount_price ? $discount_price : $price); ?>
                                        </span> руб.</span>
                                        <div class="flex">
                                            <?php if ($weight): ?>
                                                <span class="text-gray-500 flex items-center "><?php echo esc_html($weight); ?> </span>
                                            <?php endif; ?>
                                            <?php if ($weight): ?>
                                                <span class="text-gray-500 flex items-center ">&nbsp;|&nbsp;<?php echo esc_html($count); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="order-button w-full bg-neutral-200 hover:bg-red-100 p-2 rounded-xl"
                                    data-fancybox
                                    data-src="#order-form"
                                    data-price="<?php echo esc_attr($discount_price ? $discount_price : $price); ?>"
                                    data-url="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
                                Заказать
                            </button>

                        </div>
                    <?php
                    endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php else : ?>
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
<?php endif; ?>


<?php get_template_part('module/widgetes/order-form', null, array()); ?>
<?php get_footer(); ?>