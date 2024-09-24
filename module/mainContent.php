<!--Категории и Sidebar-->
<div class="container flex flex-wrap my-2 mb-8 px-2.5">
    <!--Категории-->
    <div class="w-full md:w-[75%] order-2 md:order-1 mx-auto flex-grow">
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
            <?php
            $categories = get_terms(array(
                'taxonomy' => 'category',
                'hide_empty' => true,
                'exclude' => array(get_option('default_category')), // ID категории "Uncategorized"
            ));

            foreach ($categories as $index => $category) {
                $image_id = get_term_meta($category->term_id, '_thumbnail_id', true);
                $image_url = wp_get_attachment_image_url($image_id, 'full');

                $class = ($index === 0) ? 'col-span-2 row-span-2 relative' : ''; // 'relative' для позиционирования
                ?>
                <div class="<?php echo esc_attr($class); ?> relative">
                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                        <img class="h-full rounded-lg" src="<?php echo esc_url($image_url); ?>" alt="">
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
    <div class="w-full md:w-[25%] order-1 md:order-2  pl-4">
        <ul class="flex flex-col gap-3 bg-gray-100 p-5 rounded-lg overflow-hidden">
            <a class="flex gap-3 hover:text-rose-500" href="/catalog/its-hot/">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/product-badges/vegetarian.png'; ?>"
                     alt="Peppe Icon"
                     class="w-6 h-6"/>
                <span>Новинка</span>
            </a>
            <a class="flex gap-3 hover:text-rose-500" href="/catalog/its-hot/">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/product-badges/vegetarian.png'; ?>"
                     alt="Peppe Icon"
                     class="w-6 h-6"/>
                <span>Не сырая рыба</span>
            </a>
            <a class="flex gap-3 hover:text-rose-500" href="/catalog/its-hot/">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/product-badges/vegetarian.png'; ?>"
                     alt="Peppe Icon"
                     class="w-6 h-6"/>
                <span>Классика</span>
            </a>
            <a class="flex gap-3 hover:text-rose-500" href="/catalog/its-hot/">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/product-badges/vegetarian.png'; ?>"
                     alt="Peppe Icon"
                     class="w-6 h-6"/>
                <span>Много сыра</span>
            </a>

            <a class="flex gap-3 hover:text-rose-500" href="/catalog/its-hot/">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/product-badges/vegetarian.png'; ?>"
                     alt="Peppe Icon"
                     class="w-6 h-6"/>
                <span>Детям</span>
            </a>
            <a class="flex gap-3 hover:text-rose-500" href="/catalog/its-hot/">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/product-badges/vegetarian.png'; ?>"
                     alt="Peppe Icon"
                     class="w-6 h-6"/>
                <span>Популярное</span>
            </a>
            <a class="flex gap-3 hover:text-rose-500" href="/catalog/its-hot/">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/product-badges/vegetarian.png'; ?>"
                     alt="Peppe Icon"
                     class="w-6 h-6"/>
                <span>Акция</span>
            </a>
            <a class="flex gap-3 hover:text-rose-500" href="/catalog/its-hot/">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/product-badges/vegetarian.png'; ?>"
                     alt="Peppe Icon"
                     class="w-6 h-6"/>
                <span>Большой размер</span>
            </a>

            <a class="flex gap-3 hover:text-rose-500" href="/catalog/its-hot/">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/product-badges/vegetarian.png'; ?>"
                     alt="Peppe Icon"
                     class="w-6 h-6"/>
                <span>Вегетарианское</span>
            </a>

            <a class="flex gap-3 hover:text-rose-500" href="/catalog/its-hot/">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/product-badges/pepper.png'; ?>"
                     alt="Peppe Icon"
                     class="w-6 h-6"/>
                <span>Острое</span>
            </a>

        </ul>
    </div>
</div>

<!--Рекомендуем и Sidebar-->
<div class="container px-2.5">
    <h2 class="py-5 text-rose-500">Рекомендуем</h2>

    <div class="flex flex-wrap my-2">
        <!--Рекомендуем -->
        <div class="w-full md:w-[75%] order-2 md:order-1 mx-auto flex-grow">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-8 md:gap-4">
                <div class="py-2">
                    <img class="h-auto w-full rounded-t-lg"
                         src="<?php echo get_stylesheet_directory_uri() . '/img/food.jpg'; ?>" alt="">
                    <div class="product-info px-2.5">
                        <p class="text-[18px] font-medium mt-3.5">Креветория сет</p>
                        <p class="text-[14px] pt-2.5 text-black">Калифориня сурими маки, Куросаки маки, Изумитай фреш
                            маки, Сурими мурукай маки, Фреш маки</p>
                        <div class="price py-2.5">
                            <p class="salePrice text-[14px] text-gray-300">
                                <del class="text-[18px]">79.99</del>
                                руб.
                            </p>
                            <div class="flex justify-between content-end">
                                <span class="text-rose-500 text-[18px]"><span
                                            class="text-[24px]">79.99</span> руб.</span>
                                <span class="text-gray-500 flex items-center ">1116г | 40шт.</span>
                            </div>
                        </div>
                    </div>
                    <button class="bg-neutral-100 w-full hover:bg-red-100 p-2 rounded-2xl">Заказать</button>
                </div>
                <div class="py-2">
                    <img class="h-auto w-full rounded-t-lg"
                         src="<?php echo get_stylesheet_directory_uri() . '/img/food.jpg'; ?>" alt="">
                    <div class="product-info px-2.5">
                        <p class="text-[18px] font-medium mt-3.5">Креветория сет</p>
                        <p class="text-[14px] pt-2.5 text-black">Калифориня сурими маки, Куросаки маки, Изумитай фреш
                            маки, Сурими мурукай маки, Фреш маки</p>
                        <div class="price py-2.5">
                            <p class="salePrice text-[14px] text-gray-300">
                                <del class="text-[18px]">79.99</del>
                                руб.
                            </p>
                            <div class="flex justify-between content-end">
                                <span class="text-rose-500 text-[18px]"><span
                                            class="text-[24px]">79.99</span> руб.</span>
                                <span class="text-gray-500 flex items-center ">1116г | 40шт.</span>
                            </div>
                        </div>
                    </div>
                    <button class="bg-neutral-100 w-full  p-1.5 rounded-2xl">Заказать</button>
                </div>
                <div class="py-2">
                    <img class="h-auto w-full rounded-t-lg"
                         src="<?php echo get_stylesheet_directory_uri() . '/img/food.jpg'; ?>" alt="">
                    <div class="product-info px-2.5">
                        <p class="text-[18px] font-medium mt-3.5">Креветория сет</p>
                        <p class="text-[14px] pt-2.5 text-black">Калифориня сурими маки, Куросаки маки, Изумитай фреш
                            маки, Сурими мурукай маки, Фреш маки</p>
                        <div class="price py-2.5">
                            <p class="salePrice text-[14px] text-gray-300">
                                <del class="text-[18px]">79.99</del>
                                руб.
                            </p>
                            <div class="flex justify-between content-end">
                                <span class="text-rose-500 text-[18px]"><span
                                            class="text-[24px]">79.99</span> руб.</span>
                                <span class="text-gray-500 flex items-center ">1116г | 40шт.</span>
                            </div>
                        </div>
                    </div>
                    <button class="bg-neutral-100 w-full  p-1.5 rounded-2xl">Заказать</button>
                </div>
                <div class="py-2">
                    <img class="h-auto w-full rounded-t-lg"
                         src="<?php echo get_stylesheet_directory_uri() . '/img/food.jpg'; ?>" alt="">
                    <div class="product-info px-2.5">
                        <p class="text-[18px] font-medium mt-3.5">Креветория сет</p>
                        <p class="text-[14px] pt-2.5 text-black">Калифориня сурими маки, Куросаки маки, Изумитай фреш
                            маки, Сурими мурукай маки, Фреш маки</p>
                        <div class="price py-2.5">
                            <p class="salePrice text-[14px] text-gray-300">
                                <del class="text-[18px]">79.99</del>
                                руб.
                            </p>
                            <div class="flex justify-between content-end">
                                <span class="text-rose-500 text-[18px]"><span
                                            class="text-[24px]">79.99</span> руб.</span>
                                <span class="text-gray-500 flex items-center ">1116г | 40шт.</span>
                            </div>
                        </div>
                    </div>
                    <button class="bg-neutral-100 w-full  p-1.5 rounded-2xl">Заказать</button>
                </div>
                <div class="py-2">
                    <img class="h-auto w-full rounded-t-lg"
                         src="<?php echo get_stylesheet_directory_uri() . '/img/food.jpg'; ?>" alt="">
                    <div class="product-info px-2.5">
                        <p class="text-[18px] font-medium mt-3.5">Креветория сет</p>
                        <p class="text-[14px] pt-2.5 text-black">Калифориня сурими маки, Куросаки маки, Изумитай фреш
                            маки, Сурими мурукай маки, Фреш маки</p>
                        <div class="price py-2.5">
                            <p class="salePrice text-[14px] text-gray-300">
                                <del class="text-[18px]">79.99</del>
                                руб.
                            </p>
                            <div class="flex justify-between content-end">
                                <span class="text-rose-500 text-[18px]"><span
                                            class="text-[24px]">79.99</span> руб.</span>
                                <span class="text-gray-500 flex items-center ">1116г | 40шт.</span>
                            </div>
                        </div>
                    </div>
                    <button class="bg-neutral-100 w-full  p-1.5 rounded-2xl">Заказать</button>
                </div>
                <div class="py-2">
                    <img class="h-auto w-full rounded-t-lg"
                         src="<?php echo get_stylesheet_directory_uri() . '/img/food.jpg'; ?>" alt="">
                    <div class="product-info px-2.5">
                        <p class="text-[18px] font-medium mt-3.5">Креветория сет</p>
                        <p class="text-[14px] pt-2.5 text-black">Калифориня сурими маки, Куросаки маки, Изумитай фреш
                            маки, Сурими мурукай маки, Фреш маки</p>
                        <div class="price py-2.5">
                            <p class="salePrice text-[14px] text-gray-300">
                                <del class="text-[18px]">79.99</del>
                                руб.
                            </p>
                            <div class="flex justify-between content-end">
                                <span class="text-rose-500 text-[18px]"><span
                                            class="text-[24px]">79.99</span> руб.</span>
                                <span class="text-gray-500 flex items-center ">1116г | 40шт.</span>
                            </div>
                        </div>
                    </div>
                    <button class="bg-neutral-100 w-full  p-1.5 rounded-2xl">Заказать</button>
                </div>
                <div class="py-2">
                    <img class="h-auto w-full rounded-t-lg"
                         src="<?php echo get_stylesheet_directory_uri() . '/img/food.jpg'; ?>" alt="">
                    <div class="product-info px-2.5">
                        <p class="text-[18px] font-medium mt-3.5">Креветория сет</p>
                        <p class="text-[14px] pt-2.5 text-black">Калифориня сурими маки, Куросаки маки, Изумитай фреш
                            маки, Сурими мурукай маки, Фреш маки</p>
                        <div class="price py-2.5">
                            <p class="salePrice text-[14px] text-gray-300">
                                <del class="text-[18px]">79.99</del>
                                руб.
                            </p>
                            <div class="flex justify-between content-end">
                                <span class="text-rose-500 text-[18px]"><span
                                            class="text-[24px]">79.99</span> руб.</span>
                                <span class="text-gray-500 flex items-center ">1116г | 40шт.</span>
                            </div>
                        </div>
                    </div>
                    <button class="bg-neutral-100 w-full  p-1.5 rounded-2xl">Заказать</button>
                </div>
                <div class="py-2">
                    <img class="h-auto w-full rounded-t-lg"
                         src="<?php echo get_stylesheet_directory_uri() . '/img/food.jpg'; ?>" alt="">
                    <div class="product-info px-2.5">
                        <p class="text-[18px] font-medium mt-3.5">Креветория сет</p>
                        <p class="text-[14px] pt-2.5 text-black">Калифориня сурими маки, Куросаки маки, Изумитай фреш
                            маки, Сурими мурукай маки, Фреш маки</p>
                        <div class="price py-2.5">
                            <p class="salePrice text-[14px] text-gray-300">
                                <del class="text-[18px]">79.99</del>
                                руб.
                            </p>
                            <div class="flex justify-between content-end">
                                <span class="text-rose-500 text-[18px]"><span
                                            class="text-[24px]">79.99</span> руб.</span>
                                <span class="text-gray-500 flex items-center ">1116г | 40шт.</span>
                            </div>
                        </div>
                    </div>
                    <button class="bg-neutral-100 w-full  p-1.5 rounded-2xl">Заказать</button>
                </div>
                <div class="py-2">
                    <img class="h-auto w-full rounded-t-lg"
                         src="<?php echo get_stylesheet_directory_uri() . '/img/food.jpg'; ?>" alt="">
                    <div class="product-info px-2.5">
                        <p class="text-[18px] font-medium mt-3.5">Креветория сет</p>
                        <p class="text-[14px] pt-2.5 text-black">Калифориня сурими маки, Куросаки маки, Изумитай фреш
                            маки, Сурими мурукай маки, Фреш маки</p>
                        <div class="price py-2.5">
                            <p class="salePrice text-[14px] text-gray-300">
                                <del class="text-[18px]">79.99</del>
                                руб.
                            </p>
                            <div class="flex justify-between content-end">
                                <span class="text-rose-500 text-[18px]"><span
                                            class="text-[24px]">79.99</span> руб.</span>
                                <span class="text-gray-500 flex items-center ">1116г | 40шт.</span>
                            </div>
                        </div>
                    </div>
                    <button class="bg-neutral-100 w-full  p-1.5 rounded-2xl">Заказать</button>
                </div>
            </div>

        </div>
        <!--Sidebar-->
        <div class="w-full md:w-[25%] order-1 md:order-2  hidden lg:flex pl-4">
            <ul class="flex flex-col gap-3">
                <a class="flex gap-3" href="/catalog/its-hot/">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/img/sayonora.png'; ?>"
                         alt="Peppe Icon"
                         class="rounded-lg overflow-hidden"/>
                </a>
                <div class="flex gap-3 bg-gray-100 p-5 rounded-lg overflow-hidden">

                    <img src="<?php echo get_stylesheet_directory_uri() . '/img/product-badges/vegetarian.png'; ?>"
                         alt="Peppe Icon"
                         class="w-10 h-10"/>
                    <div>
                        <p class="text-[16px] ">Быстро</p>
                        <p class="text-[14px] ">Время доставки заказа: от 30 миннут</p>
                    </div>
                </div>
                <div class="flex gap-3 bg-gray-100 p-5 rounded-lg overflow-hidden">

                    <img src="<?php echo get_stylesheet_directory_uri() . '/img/product-badges/vegetarian.png'; ?>"
                         alt="Peppe Icon"
                         class="w-10 h-10"/>
                    <div>
                        <p class="text-[16px] ">Быстро</p>
                        <p class="text-[14px] ">Время доставки заказа: от 30 миннут</p>
                    </div>
                </div>
                <div class="flex gap-3 bg-gray-100 p-5 rounded-lg overflow-hidden">

                    <img src="<?php echo get_stylesheet_directory_uri() . '/img/product-badges/vegetarian.png'; ?>"
                         alt="Peppe Icon"
                         class="w-10 h-10"/>
                    <div>
                        <p class="text-[16px] ">Быстро</p>
                        <p class="text-[14px] ">Время доставки заказа: от 30 миннут</p>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</div>


<!--Доп информация-->
<div class="container hidden md:flex mx-auto bg-gray-100 rounded-2xl p-12">
    <div class="w-[25%] mx-auto">
        <div class="w-[120px] h-[120px] mx-auto rounded-full overflow-hidden">
            <img class="w-full h-full object-cover"
                 src="<?php echo get_stylesheet_directory_uri() . '/img/food.jpg'; ?>" alt="">
        </div>
    </div>
    <div class="flex flex-col w-[75%]">
        <h1 class="w-full text-center text-[40px] mb-2">Ресторан Японской кухни Sushi House</h1>
        <p class=" text-[15px]">Команда Sushi House работает на рынке доставки суши, роллов и других блюд японской кухни
            уже более
            15
            лет, и все эти годы главным для нас является любовь и признание наших Гостей.</p>
        <p class="font-light text-[15px]">
            Оформите заказ на быструю доставку суши и роллов по телефону 7440 или онлайн заказ на сайте и мы доставим
            его
            Вам на дом или в офис в любое удобное место и время. В случае изменения адреса доставки после того как заказ
            был
            оформлен и подтвержден оператором, так же если по факту доставки Гость отсутствует по указанному в заказе
            адресу
            более 5 минут, то курьер уезжает на следующий заказ и в этих ситуациях взымается дополнительная плата в
            размере
            7-14 рублей. С подробной информацией о стоимости зонах и условиях быстрой доставки можно ознакомиться на
            странице Доставка. В ПТ и СБ заказ половинок порций роллов не доступен.
            Оформляя заказ в нашем заведении, Вы соглашаетесь с условиями публичной оферты.</p>
    </div>
</div>