<!-- Закрепленное меню для мобильных устройств -->
<div class="block md:hidden fixed bottom-0 left-0 w-full h-[7vh] bg-white   border-t-2 border-gray-400 border-solid 0 text-white z-50">
    <div class="grid grid-cols-4 h-full ">
        <!-- Первый элемент меню -->
        <!-- Первый элемент меню -->
        <a href="#" class="flex items-center justify-center text-center">
            <!-- Иконка занимает 50% от высоты родителя -->
            <i class="fas fa-bars fa-2x text-gray-500"></i>
        </a>
        <!-- Второй элемент меню -->
        <?php
        // Получаем массив настроек из ACF
        $mobile_menu = get_field('mobileMenu', 'option');

        // Проверяем, есть ли данные
        if ($mobile_menu) {
            // Извлекаем данные
            $icon_data = $mobile_menu['icon2'];
            $icon_link = $mobile_menu['icon_2_link'];
            $icon_data = $mobile_menu['icon3'];
            $icon_link = $mobile_menu['icon_3_link'];
            $icon_data = $mobile_menu['icon4'];
            $icon_link = $mobile_menu['icon_4_link'];

            // Получаем URL иконки
            $icon_url = isset($icon_data['url']) ? $icon_data['url'] : '';

            ?>
            <!-- Второй элемент меню -->
            <a href="<?php echo esc_url($icon_link); ?>" class="flex items-center justify-center text-center"">
            <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($icon_data['alt']); ?>"
                 class="w-8 h-8"> <!-- Используем изображение -->
            </a>
            <!-- Третий элемент меню -->
            <a href="<?php echo esc_url($icon_link); ?>" class="flex items-center justify-center text-center"">
            <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($icon_data['alt']); ?>"
                 class="w-8 h-8"> <!-- Используем изображение -->
            </a>
            <!-- Четвертый элемент меню -->
            <a href="<?php echo esc_url($icon_link); ?>" class="flex items-center justify-center text-center"">
            <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($icon_data['alt']); ?>"
                 class="w-8 h-8"> <!-- Используем изображение -->
            </a>
            <?php
        } else {
            echo 'Иконка или ссылка не найдены.';
        }

        ?>

    </div>
</div>
<?php if (wp_is_mobile()) : ?>
<?php endif; ?>