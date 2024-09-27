<!--Категории и Sidebar-->
<div class="container flex flex-wrap my-2 mb-8 px-2.5">
    <!--Категории-->
    <div class="w-full md:w-[75%] order-2 lg:order-1 mx-auto flex-grow">
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
            <?php
            $categories = get_terms(array(
                'taxonomy' => 'category',
                'hide_empty' => false,
                'exclude' => array(get_option('default_category')), // ID категории "Uncategorized"
            ));

            foreach ($categories as $index => $category) {
                $image_id = get_term_meta($category->term_id, '_thumbnail_id', true);
                $image_url = wp_get_attachment_image_url($image_id, 'full');

                $class = ($index === 0) ? 'col-span-2 row-span-2 relative' : ''; // 'relative' для позиционирования
                ?>
                <div class="<?php echo esc_attr($class); ?> relative">
                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                        <img class="w-full h-auto object-cover rounded-lg" src="<?php echo esc_url($image_url); ?>"
                             alt="">
                        <span class="absolute text-[16px] left-0 bottom-5 text-black px-[15px] py-2 bg-white rounded-[12px] bg-opacity-90">
                            <?php echo esc_html($category->name); ?>
                        </span>
                    </a>
                </div>
                <?php
            }
            ?>

        </div>
    </div>

    <!--Sidebar-->
    <div class="w-full lg:w-[25%] order-1 lg:order-2 lg:my-0 mt-2 mb-4 lg:pl-4">
        <ul class="flex flex-col gap-3 bg-gray-100 p-5 rounded-lg overflow-hidden">
            <?php
            $tags = get_terms(array(
                'taxonomy' => 'post_tag',
                'hide_empty' => false,
            ));

            if (!empty($tags) && !is_wp_error($tags)) {
                foreach ($tags as $tag) {
                    $image_id = get_term_meta($tag->term_id, '_thumbnail_id', true);
                    $image_url = wp_get_attachment_image_url($image_id, 'full');
                    ?>
                    <a class="flex gap-3 hover:text-rose-500"
                       href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                        <?php if ($image_url): ?>
                            <img class="w-6 h-6" src="<?php echo esc_url($image_url); ?>"
                                 alt="<?php echo esc_attr($tag->name); ?>"/>
                        <?php endif; ?>
                        <span><?php echo esc_html($tag->name); ?></span>
                    </a>
                    <?php
                }
            } else {
                echo '<p>No tags found.</p>';
            }
            ?>


        </ul>
    </div>
</div>

<!--Рекомендуем и Sidebar-->
<div class="container px-2.5">
    <h2 class="py-5 text-rose-500">Рекомендуем</h2>
    <div class="flex flex-wrap my-2 ">
        <!--Рекомендуем -->
        <div class="w-full md:w-[75%] order-2 md:order-1 mx-auto flex-grow">
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

        <!--Sidebar-->
        <div class="w-full md:w-[25%] order-1 md:order-2  hidden lg:flex pl-4">

            <ul class="flex flex-col gap-3">

                <?php $company_details = get_field('advertising', 'option'); ?>

                <!--Реклама ввиде Изображения-->
                <?php
                if (!empty($company_details['image'])):
                    ?>

                    <a class="flex gap-3" href="/catalog/its-hot/">
                        <img src="<?php echo esc_url($company_details['image']['url']); ?>"
                             alt="..."
                             class="rounded-lg overflow-hidden object-cover"/>
                    </a>
                <?php endif; ?>

                <!--Реклама ввиде блоков-->
                <?php if (!empty($company_details['info'])): ?>
                    <?php foreach ($company_details['info'] as $info_item): ?>
                        <div class="flex gap-3 bg-gray-100 p-5 rounded-lg overflow-hidden">
                            <?php if (!empty($info_item['img'])): ?>
                                <img src="<?php echo esc_url($info_item['img']['url']); ?>"
                                     alt="<?php echo esc_attr($info_item['title']); ?>"
                                     class="w-10 h-10 rounded-full"/>
                            <?php endif; ?>
                            <div>
                                <?php if (!empty($info_item['title'])): ?>
                                    <p class="text-[16px] "><?php echo esc_html($info_item['title']); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($info_item['text'])): ?>
                                    <p class="text-[14px] "><?php echo esc_html($info_item['text']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>


<!--Доп информация-->
<div class="container hidden md:flex mx-auto bg-gray-100 rounded-2xl p-12">
    <div class="w-[25%] mx-auto">
        <div class="w-[120px] h-[120px] mx-auto rounded-full overflow-hidden">
            <?php $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
            <img class="w-full h-full object-cover" src="<?php echo esc_url($image_url); ?>" alt="">
        </div>
    </div>
    <div class="flex flex-col w-[75%]">
        <h1 class="w-full text-center text-[40px] mb-2"><?php the_title(); ?></h1>
        <p class="font-light text-[15px]"><?php the_content(); ?></p>
    </div>
</div>