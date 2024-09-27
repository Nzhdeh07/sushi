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
            <form role="search" method="get" class="w-full max-w-72 rounded-3xl mx-auto overflow-hidden hidden md:block" action="<?php echo esc_url(home_url('/')); ?>">
                <div class="flex">
                    <div class="relative w-full">
                        <input type="text" name="s" id="voice-search"
                               class="bg-neutral-200 text-gray-900 text-sm w-full p-2.5 border-none focus:outline-none"
                               placeholder="Поиск..." required/>
                        <button type="submit"
                                class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-rose-500">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Поиск</span>
                        </button>
                    </div>
                </div>
            </form>

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




