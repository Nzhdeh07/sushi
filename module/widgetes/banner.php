<!-- Баннер -->
<div class="container my-1 px-2.5">
    <!-- Swiper -->
    <div class="swiper mySwiper rounded-2xl">
        <div class="swiper-wrapper">

            <?php
            $banner = get_field('banner', 'option');
            foreach ($banner as $banner_item) {
                ?>
                 <a class="swiper-slide" href="<?php echo esc_url($banner_item['link']); ?>">
                        <img src="<?php echo esc_url($banner_item['image']['url']); ?>"
                             class="absolute h-full w-full block" alt="...">
                 </a>
                <?php
            }
            ?>
        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>



<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
        },
    });
</script>
