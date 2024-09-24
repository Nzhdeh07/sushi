<div class="mb-0 py-1 px-2.5">
    <div class="container mx-auto">
        <div class="flex xl:gap-10 gap-5  items-center">

            <!-- Логотип-->
            <div class="flex items-center">
                <div class="logo">
                    <a href="<?php echo home_url(); ?>">
                        <img class="max-h-[65px]" src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png'; ?>"
                             alt="Logo">
                    </a>
                </div>
            </div>


            <!-- Выпадающее меню "Информация" -->
            <div class="relative hidden md:block  text-left">
                <button id="dropdownDefaultButton"
                        class="inline-flex  hover:text-rose-500  font-medium text-[16px] px-5 py-2.5 text-center items-center"
                        type="button" onclick="toggleDropdown()">
                    <svg class="w-4 h-4 m-2 ms-3 fill-rose-500" viewBox="0 0 510 510" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M280.5,382.5h-51v-153h51V382.5z M280.5,178.5h-51v-51h51V178.5z"></path>
                    </svg>
                    Информация
                </button>

                <div id="information" class="absolute z-50  mt-2 w-48 rounded-lg bg-white shadow-lg  hidden">
                    <div class=" ring-1 ring-black ring-opacity-5">
                        <nav>
                            <ul class="popover-nav">
                                <li><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="/dostavka/">Доставка</a></li>
                                <li><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="/akcii/">Акции</a></li>
                                <li><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="/blog/">Блог</a></li>
                                <li><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="/news/">Новости</a></li>
                                <li><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="/vakansii/">Вакансии</a></li>
                                <li><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="/contacts/">Контакты</a></li>
                                <li><a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="/karta-sayta/">Карта сайта</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>


            <!-- Поиск -->
            <form class="w-full max-w-72 rounded-3xl overflow-hidden hidden lg:block">
                <div class="flex">
                    <div class="relative w-full">
                        <input type="text" id="voice-search"
                               class="bg-neutral-200 text-gray-900 text-sm  w-full p-2.5 border-none  focus:outline-none"
                               placeholder="Поиск..." required/>
                        <button type="submit"
                                class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-rose-500 ">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
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
                    <span class="text-gray-500">+375 (33) 333-33-33</span>
                </a>
            </div>

        </div>
    </div>
</div>


<!-- Навигация категорий продуктов -->
<div class="product-categories-container  hidden md:block  mb-0 px-2.5 border-t border-gray-300 border-solid">
    <div class="container mx-auto">
        <div class="flex overflow-x-auto py-[15px]">
            <nav class="w-full">
                <ul class="flex space-x-4">
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'category',
                        'hide_empty' => true,
                        'exclude' => array(get_option('default_category')), // ID категории "Uncategorized"
                    ));
                    foreach ($categories as $category) {
                        $category_link = get_category_link($category->term_id);
                        ?>
                        <li>
                            <a href="<?php echo esc_url($category_link); ?>" class="whitespace-nowrap">
                                <?php echo esc_html($category->name); ?>
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



<script>
    function toggleDropdown() {
        const infoDropdown = document.getElementById('information');
        const dropdownsButton = document.getElementById('dropdownDefaultButton');
        infoDropdown.classList.toggle('hidden');
        dropdownsButton.classList.add('text-rose-500');
    }

    // Закрытие меню при клике вне его
    window.onclick = function(event) {
        if (!event.target.matches('#dropdownDefaultButton')) {
            const dropdowns = document.getElementById('information');
            const dropdownsButton = document.getElementById('dropdownDefaultButton');
            if (!dropdowns.classList.contains('hidden')) {
                dropdowns.classList.add('hidden');
                dropdownsButton.classList.remove('text-rose-500');
            }
        }
    }
</script>
