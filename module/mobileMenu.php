<div class="block md:hidden fixed bottom-0 left-0 w-full h-[7vh] bg-white border-t-2 border-gray-400 border-solid z-50">
    <div class="grid grid-cols-4 h-full">
        <!-- Первый Элемент меню -->
        <a href="#modal-menu" data-fancybox class="flex items-center justify-center text-center">
            <i class="fas fa-bars fa-2x text-gray-500"></i>
        </a>

        <!-- Дополнительные элемент меню -->
        <?php
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
        }
        ?>
    </div>
</div>


<!-- Модальное окно (скрыто по умолчанию, откроется через Fancybox) -->
<div style="display: none;" id="modal-menu" class="w-full h-full bg-white">
    <div class="flex flex-col p-5">
        <button data-fancybox-close class="self-end text-black text-3xl">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="flex flex-col gap-4 text-black text-2xl">
            <?php
            // Получаем основные категории
            $categories = get_terms(array(
                'taxonomy' => 'category',
                'hide_empty' => false,
                'parent' => 0,
                'exclude' => array(get_option('default_category')),
            ));

            foreach ($categories as $category) {
                $category_link = get_category_link($category->term_id);
                ?>
                <div>
                    <a href="<?php echo esc_url($category_link); ?>" class="whitespace-nowrap">
                        <?php echo esc_html($category->name); ?>
                    </a>
                </div>
                <?php
            } ?>
        </div>
    </div>
</div>
