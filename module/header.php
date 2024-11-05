<!--Шапка сайта-->
<div class="mb-0 py-1 px-2.5">
    <div class="container px-2.5  mx-auto">
        <div class="sm:flex xl:gap-10 grid grid-cols-1 gap-5  items-center justify-between ">

            <!-- Логотип-->
            <div class="flex items-center justify-center  cursor-pointer">
                <div class="logo">
                    <a href="<?php echo home_url(); ?>">
                        <img class="max-h-[65px]" src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png'; ?>"
                             alt="Logo">
                    </a>
                </div>
            </div>

            <!-- Поиск -->
            <?php get_search_form(); ?>


            <!-- Телефонный блок -->
            <div class="flex items-center space-x-1 sm:ml-auto justify-between text-2xl">
                <!-- Корзина -->
                <div data-fancybox="modal-basket"  data-src="#modal-basket" class="order-1 hover:scale-110 text-rose-500" style="padding-right: 20px;">
                    <img src="http://sushi.digitalgoweb.com/wp-content/uploads/2024/11/cart_14630569-2.png"
                         alt="Phone Icon"
                         class="w-7 h-7 filter invert sepia saturate-100 hue-rotate-[290deg] brightness-100 contrast-100"/>
                </div>


                <!-- Ссылка с телефоном -->
                <a href="tel:+375333333333" class="sm:order-1 flex items-center space-x-1">
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
                            <a href="<?php echo esc_url($navigation_item['link']); ?>"
                               class="whitespace-nowrap cursor-pointer">
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





