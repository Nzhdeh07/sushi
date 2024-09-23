<!--Баннер-->
<div class="container my-1 mx-auto flex-grow">
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Блок Карусель -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Первый элемент -->
            <div class="duration-700 ease-in-out" data-carousel-item>
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/banner_1.jpg'; ?>"
                     class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>

            <!-- Второй элемент -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/docs/images/carousel/carousel-2.svg"
                     class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>

        <div class="absolute bottom-7 end-7 z-30 flex space-x-2">
            <!-- Новый элемент слева от кнопок -->
            <div class="flex items-center">
            </div>

            <!-- Кнопка "Назад" -->
            <button type="button"
                    class="flex items-center justify-center w-12 h-12 rounded-full bg-neutral-400 bg-opacity-95 hover:bg-opacity-60 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
        <span class="inline-flex items-center justify-center">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
            </button>

            <!-- Кнопка "Вперед" -->
            <button type="button"
                    class="flex items-center justify-center w-12 h-12 rounded-full bg-neutral-400 bg-opacity-95 hover:bg-opacity-60 cursor-pointer group focus:outline-none"
                    data-carousel-next>
        <span class="inline-flex items-center justify-center">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
            </button>
        </div>

    </div>
</div>