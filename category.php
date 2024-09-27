<?php get_header(); ?>
<header class="header">
    <h1 class="entry-title" itemprop="name"><?php single_term_title(); ?></h1>
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
    <div class="archive-meta" itemprop="description"><?php if ('' != get_the_archive_description()) {
            echo esc_html(get_the_archive_description());
        } ?></div>
</header>


<!--Рекомендуем и Sidebar-->
<div class="container px-2.5">
    <div class="flex flex-wrap my-2 ">
        <!--Рекомендуем -->
        <div class="w-full mx-auto flex-grow">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-8 md:gap-4">

                <?php
                $args = array(
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        // Получаем данные из ACF полей
                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $description = get_the_content();
                        $weight = get_field('weight');
                        $price = get_field('price');
                        $discount_price = get_field('discount-price');
                        $count = get_field('count');

                        ?>

                        <div class="py-2">
                            <img class="h-auto w-full rounded-t-lg" src="<?php echo esc_url($image_url); ?>"
                                 alt="<?php the_title(); ?>">
                            <div class="product-info px-2.5">
                                <p class="text-[18px] font-medium mt-3.5"><?php the_title(); ?></p>
                                <p class="text-[14px] pt-2.5 text-black h-[calc(3*1.6rem)] overflow-hidden">
                                    <?php echo esc_html($description); ?>
                                </p>


                                <div class="price py-2.5">
                                    <p class="salePrice text-[14px] text-gray-300">
                                        <?php if ($discount_price): ?>
                                            <del class="text-[18px]"><?php echo esc_html($discount_price); ?></del>
                                            руб.
                                        <?php else: ?>
                                            <del class="text-[18px]">&nbsp;</del>
                                        <?php endif; ?>
                                    </p>


                                    <div class="flex justify-between content-end">
                                        <span class="text-rose-500 text-[18px]"><span
                                                    class="text-[24px]"><?php echo esc_html($price); ?></span> руб.</span>
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
                            <button class="bg-neutral-100 w-full hover:bg-red-100 p-2 rounded-2xl">Заказать</button>
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


<?php get_footer(); ?>



