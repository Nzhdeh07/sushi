<!--Шапка сайта-->
<div class="mb-0 py-1 px-2.5">
    <div class="container px-2.5  mx-auto">
        <div class="flex xl:gap-10 gap-5  items-center justify-between ">

            <!-- Логотип-->
            <div class="flex items-center cursor-pointer">
                <div class="logo">
                    <a href="<?php echo home_url(); ?>">
                        <img class="max-h-[65px]" src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png'; ?>"
                             alt="Logo">
                    </a>
                </div>
            </div>

            <!-- Поиск -->
            <?php get_search_form( ); ?>

            <!-- Телефонный блок -->
            <div class="flex items-center space-x-1 ml-auto text-2xl">
                <!-- Ссылка с телефоном -->
                <a href="tel:+375333333333" class="flex items-center space-x-1">
                    <!-- Изображение телефона -->
                    <img src="<?php echo get_stylesheet_directory_uri() . '/img/phone.png'; ?>" alt="Phone Icon"
                         class="w-6 h-6"/>
                    <!-- Номер телефона -->

                    <span class="text-gray-500 text-[22px]"><?php echo get_field('phoneNumber', 'option'); ?> </span>
                </a>
            </div>

        </div>
    </div>
</div>


<!-- Навигация -->
<div class="product-categories-container  hidden md:block  mb-0  border-t border-gray-300 border-solid">
    <div class="container px-2.5 ">
        <div class="flex overflow-x-auto py-[15px]">
            <nav class="w-full">
                <ul class="flex space-x-4">
                    <?php
                    $navigation = get_field('navigation', 'option');
                    foreach ($navigation as $navigation_item) {
                        ?>
                        <li>
                            <a href="<?php echo esc_url($navigation_item['link']); ?>" class="whitespace-nowrap cursor-pointer">
                                <?php echo esc_html($navigation_item['title']); ?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>




