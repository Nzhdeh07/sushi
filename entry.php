<div class="flex-1 container px-2.5 mt-16">
    <article
            id="post-<?php the_ID(); ?>" <?php post_class('md:flex p-2.5 bg-white rounded-lg shadow-lg overflow-hidden mb-4'); ?>>
        <div href="<?php the_permalink(); ?>" class="lg:w-[35%] w-full rounded-3xl overflow-hidden">
            <?php if (has_post_thumbnail()) : ?>

                <div class="relative">
                    <img class="h-auto w-full object-cover"
                         src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
                         alt="<?php the_title(); ?>">

                    <div class="absolute top-1 left-1 flex flex-wrap space-x-2">
                        <?php
                        $tags = get_the_terms(get_the_ID(), 'post_tag'); // Получаем теги поста

                        if ($tags && !is_wp_error($tags)) {
                            foreach ($tags as $tag) {
                                // Получаем ID изображения, связанного с тегом
                                $image_id = get_term_meta($tag->term_id, '_thumbnail_id', true);
                                $image_url = wp_get_attachment_image_url($image_id, 'full');

                                if ($image_url) { ?>
                                    <img src="<?php echo esc_url($image_url); ?>"
                                         class="w-10 h-10 rounded-full border-2 border-white z-10">

                                <?php }
                            }
                        }
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="flex flex-col justify-between px-4 mt-4 lg:mt-0 lg:w-[65%]">
            <h2 class="text-3xl font-bold"><?php the_title(); ?></h2>
            <p class="text-gray-600 h-[calc(3*1.6rem)] overflow-hidden mt-2"><?php echo wp_kses_post(get_the_content()); ?></p>

            <div class="price mt-2">
                <?php
                $discount_price = get_field('discount-price');
                $price = get_field('price');
                $weight = get_field('weight');
                $count = get_field('count');
                ?>
                <div class="flex space-x-3 items-end">
                    <p class="text-gray-400 text-lg">
                        <?php if ($discount_price): ?>
                            <del><?php echo wp_kses_post($discount_price); ?> руб.</del>
                        <?php endif; ?>
                    </p>
                    <p class="text-rose-500 text-2xl"><?php echo wp_kses_post($price); ?> руб.</p>
                    <div class="flex">
                        <?php if ($weight): ?>
                            <span class="text-gray-500 flex items-center "><?php echo wp_kses_post($weight); ?></span>
                        <?php endif; ?>
                        <?php if ($weight): ?>
                            <span class="text-gray-500 flex items-center ">&nbsp;|&nbsp;<?php echo wp_kses_post($count); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="flex items-center flex-wrap mt-4">
                <button class="bg-neutral-200 mr-4 hover:bg-red-100 p-2 rounded-xl" onclick="window.history.back();">
                    &larr; Вернуться обратно
                </button>
                <button class="order-button bg-neutral-200 hover:bg-red-100 p-2 rounded-xl" data-fancybox data-src="#order-form" 
									data-productId="<?php echo get_the_ID(); ?>"
                                    data-price="<?php echo esc_attr($discount_price ? $discount_price : $price); ?>"
                                    data-url="<?php echo esc_url(get_permalink(get_the_ID())); ?>"
									data-ptitle="<?php the_title(); ?>">Заказать
                </button>
				  
			
            </div>
        </div>
    </article>


    <div class="pt-8">
        <h2 class="py-5 text-2xl">Вам понравится:</h2>
        <div class="flex flex-wrap my-2">
            <!--Рекомендуем -->
            <div class="w-full md:w-[75%] order-2 md:order-1 mx-auto flex-grow">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-8 md:gap-4">
                    <?php
                    $categories = wp_get_post_categories(get_the_ID());

                    // Параметры для WP_Query
                    $args = array(
                        'category__in' => $categories,
                        'post__not_in' => array(get_the_ID()),
                        'posts_per_page' => 3,
                        'orderby' => 'rand',
                        'ignore_sticky_posts' => 1
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            $description = get_the_excerpt();
                            $weight = get_field('weight');
                            $price = get_field('price');
                            $discount_price = get_field('discount-price');
                            $count = get_field('count');
                            $tags = get_the_terms(get_the_ID(), 'post_tag');

                            $tag_image_urls = [];
                            if ($tags && !is_wp_error($tags)) {
                                foreach ($tags as $tag) {
                                    $image_id = get_term_meta($tag->term_id, '_thumbnail_id', true);
                                    $tag_image_urls[] = wp_get_attachment_image_url($image_id, 'full');
                                }
                            }
                            ?>
                            <div class="py-2">
                                <div class="relative">
                                    <a href="<?php the_permalink(); ?>">
                                        <img class="h-auto w-full rounded-t-lg" src="<?php echo esc_url($image_url); ?>"
                                             alt="<?php the_title_attribute(); ?>">
                                    </a>
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
                                    <a href="<?php the_permalink(); ?>">
                                        <p class="text-[18px] font-medium mt-3.5"><?php the_title(); ?></p>
                                    </a>
                                    <p class="text-[14px] pt-2.5 text-black h-[calc(3*1.6rem)] overflow-hidden">
                                        <?php echo wp_kses_post($description); ?>
                                    </p>

                                    <div class="price py-2.5">
                                        <p class="salePrice text-[14px] text-gray-300">
                                            <?php if ($discount_price): ?>
                                                <del class="text-[18px]"><?php echo wp_kses_post($price); ?></del>
                                                руб.
                                            <?php else: ?>
                                                <del class="text-[18px]">&nbsp;</del>
                                            <?php endif; ?>
                                        </p>

                                        <div class="flex justify-between content-end">
                                    <span class="text-rose-500 text-[18px]"><span class="text-[24px]">
                                            <?php echo wp_kses_post($discount_price ? $discount_price : $price); ?>
                                        </span> руб.</span>
                                            <div class="flex">
                                                <?php if ($weight): ?>
                                                    <span class="text-gray-500 flex items-center "><?php echo wp_kses_post($weight); ?> </span>
                                                <?php endif; ?>
                                                <?php if ($weight): ?>
                                                    <span class="text-gray-500 flex items-center ">&nbsp;|&nbsp;<?php echo wp_kses_post($count); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <button class="order-button w-full bg-neutral-200 hover:bg-red-100 p-2 rounded-xl"
                                    data-productId="<?php echo get_the_ID(); ?>"
                                    data-price="<?php echo esc_attr($discount_price ? $discount_price : $price); ?>"
								    data-img="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
									data-ptitle="<?php the_title(); ?>">
                                Добавить в корзину
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
</div>


<?php get_template_part('module/widgetes/order-form', null, array()); ?>
