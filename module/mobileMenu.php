<!-- Закрепленное меню для мобильных устройств -->
<div class="block md:hidden fixed bottom-0 left-0 w-full h-[7vh] bg-white border-t-2 border-gray-400 border-solid 0 text-white z-50">
    <div class="grid grid-cols-4 h-full">
        <!-- Первый элемент меню -->
        <a href="#" id="menu-toggle" class="flex items-center justify-center text-center">
            <!-- Иконка занимает 50% от высоты родителя -->
            <i class="fas fa-bars fa-2x text-gray-500"></i>
        </a>

        <!-- Модальное окно -->
        <div id="modal-menu" class="fixed inset-0 bg-white bg-opacity-90 hidden z-50">
            <div class="relative w-full h-full flex bg-white">
                <button id="close-modal" class="absolute top-5 right-5 text-black">
                    <i class="fa-solid fa-xmark fa-lg" style="color: #000000;"></i>
                </button>
                <div class="flex flex-col gap-4 m-7 text-black text-2xl">
                    <!-- Навигация категорий продуктов -->
                    <?php
                    // Получаем основные категории
                    $categories = get_terms(array(
                        'taxonomy' => 'category',
                        'hide_empty' => true,
                        'parent' => 0, // Только родительские категории
                        'exclude' => array(get_option('default_category')), // Исключаем категорию "Uncategorized"
                    ));

                    foreach ($categories as $category) {
                        $category_link = get_category_link($category->term_id);
                        ?>
                        <div>
                        <!-- Выводим основную категорию -->
                        <a href="<?php echo esc_url($category_link); ?>" class="whitespace-nowrap">
                            <?php echo esc_html($category->name); ?>
                        </a>

                        <?php
                        // Получаем подкатегории для текущей категории
                        $subcategories = get_terms(array(
                            'taxonomy' => 'category',
                            'hide_empty' => false,
                            'parent' => $category->term_id, // Получаем только дочерние категории
                        ));

                        if (!empty($subcategories)) {
                            echo '<div class="flex flex-col mt-3 gap-3 font-light text-[18px]">';
                            foreach ($subcategories as $subcategory) {
                                $subcategory_link = get_category_link($subcategory->term_id);
                                ?>
                                <!-- Выводим подкатегории -->
                                <a href="<?php echo esc_url($subcategory_link); ?>" class="whitespace-nowrap">
                                    <?php echo esc_html($subcategory->name); ?>
                                </a>
                                <?php
                            }
                            echo '</div> '; // Закрываем блок подкатегорий
                        }
                        echo '</div> ';
                    }
                    ?>
                </div>
            </div>
        </div>


        <?php
        // Получаем массив настроек из ACF
        $mobile_menu = get_field('mobileMenu', 'option');

        if ($mobile_menu) {
            $menu_items = [
                'icon2' => 'icon_2_link',
                'icon3' => 'icon_3_link',
                'icon4' => 'icon_4_link'
            ];

            foreach ($menu_items as $icon_key => $link_key) {
                if (!empty($mobile_menu[$icon_key]) && !empty($mobile_menu[$link_key])) {
                    $icon_data = $mobile_menu[$icon_key];
                    $icon_link = $mobile_menu[$link_key];
                    $icon_url = isset($icon_data['url']) ? $icon_data['url'] : '';

                    ?>
                    <!-- Элемент меню -->
                    <a href="<?php echo esc_url($icon_link); ?>" class="flex items-center justify-center text-center">
                        <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($icon_data['alt']); ?>"
                             class="w-8 h-8">
                    </a>
                    <?php
                }
            }

        } else {
            echo 'Иконки или ссылки не найдены.';
        }
        ?>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var menuToggle = document.getElementById('menu-toggle');
        var modalMenu = document.getElementById('modal-menu');
        var closeModal = document.getElementById('close-modal');

        // Открытие модального окна
        menuToggle.addEventListener('click', function (e) {
            e.preventDefault();
            modalMenu.classList.add('active');
            document.body.classList.add('modal-open'); // Отключаем прокрутку страницы
        });

        // Закрытие модального окна по нажатию на крестик
        closeModal.addEventListener('click', function () {
            modalMenu.classList.remove('active');
            document.body.classList.remove('modal-open'); // Включаем прокрутку страницы
        });

        // Закрытие модального окна при нажатии за его пределами
        window.addEventListener('click', function (e) {
            if (e.target == modalMenu) {
                modalMenu.classList.remove('active');
                document.body.classList.remove('modal-open'); // Включаем прокрутку страницы
            }
        });
    });

</script>
