<div class="mb-0 py-1">
    <div class="container mx-auto">
        <div class="flex xl:gap-10 gap-5  items-center">

            <!-- Логотип-->
            <div class="flex items-center">
                <div class="logo">
                    <a href="<?php echo home_url(); ?>">
                        <img class="max-h-[65px]" src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png'; ?>" alt="Logo">
                    </a>
                </div>
            </div>


            <!-- Выподающее меню "Информация" -->
            <button id="dropdownDefaultButton"
                    class="inline-flex text-black hover:text-rose-500 font-medium text-[16px] px-5 py-2.5 text-center items-center"
                    type="button">
                <svg class="w-4 h-4 m-2 ms-3 fill-rose-500" viewBox="0 0 510 510" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M280.5,382.5h-51v-153h51V382.5z M280.5,178.5h-51v-51h51V178.5z"></path>
                </svg>
                Информация
            </button>


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
            <div class="flex items-center  space-x-1 ml-auto text-2xl">
                <!-- Изображение телефона -->
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/phone.png'; ?>" alt="Phone Icon"
                     class="w-6 h-6"/>
                <!-- Номер телефона -->
                <span class="text-gray-500 ">+375 (33) 333-33-33</span>
            </div>
        </div>
    </div>
</div>


<!-- Навигация категорий продуктов -->
<div class="product-categories-container mb-0  border-t border-gray-300 border-solid">
    <div class="container mx-auto">
        <div class="flex overflow-x-auto py-[15px]">
            <nav class="w-full">
                <ul class="flex space-x-4">
                    <li><a href="/catalog/sety/" class="whitespace-nowrap">Сеты</a></li>
                    <li><a href="/catalog/sushi-i-rolly/" class="whitespace-nowrap">Суши и роллы</a></li>
                    <li><a href="/catalog/wok/" class="whitespace-nowrap">WOK</a></li>
                    <li><a href="/catalog/lanch-menyu/" class="whitespace-nowrap">Ланч-меню</a></li>
                    <li><a href="/catalog/goryachie-blyuda/" class="whitespace-nowrap">Горячее и салаты</a></li>
                    <li><a href="/catalog/deserty/" class="whitespace-nowrap">Десерты</a></li>
                    <li><a href="/catalog/napitki/" class="whitespace-nowrap">Напитки</a></li>
                    <li><a href="/catalog/sousy/" class="whitespace-nowrap">Соусы и гарнир</a></li>
                    <li><a href="/catalog/sertifikaty/" class="whitespace-nowrap">Сертификаты</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

