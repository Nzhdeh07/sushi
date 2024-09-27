<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<footer id="footer" role="contentinfo">
    <div class="container mx-auto my-4 px-2.5 pb-[10vh]">
        <div class="flex flex-col justify-center ">
            <div class="flex  py-2  flex-wrap justify-center space-x-2">
                <!--  Иконки социальных сетей -->
                <?php
                $socialMedia = get_field('socialMedia', 'option'); ?>
                <?php if (!empty($socialMedia['vk'])): ?>  <!-- ВКонтакте -->
                    <a href="<?php echo esc_url($socialMedia['vk']); ?>"
                       class="flex items-center justify-center w-7 h-7 rounded-full bg-gray-300 text-gray-500 hover:bg-rose-500 hover:text-white transition"
                       target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-vk"></i>
                    </a>
                <?php endif; ?>
                <?php if (!empty($socialMedia['facebook'])): ?>  <!-- Facebook -->
                    <a href="<?php echo esc_url($socialMedia['facebook']); ?>"
                       class="flex items-center justify-center w-7 h-7 rounded-full bg-gray-300 text-gray-500 hover:bg-rose-500 hover:text-white transition"
                       target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                <?php endif; ?>

                <?php if (!empty($socialMedia['instagram'])): ?> <!-- Instagram -->
                    <a href="<?php echo esc_url($socialMedia['instagram']); ?>"
                       class="flex items-center justify-center w-7 h-7 rounded-full bg-gray-300 text-gray-500 hover:bg-rose-500 hover:text-white transition"
                       target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-instagram"></i>
                    </a>
                <?php endif; ?>

                <?php if (!empty($socialMedia['youtube'])): ?> <!-- YouTube -->
                    <a href="<?php echo esc_url($socialMedia['youtube']); ?>"
                       class="flex items-center justify-center w-7 h-7 rounded-full bg-gray-300 text-gray-500 hover:bg-rose-500 hover:text-white transition"
                       target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-youtube"></i>
                    </a>
                <?php endif; ?>

                <?php if (!empty($socialMedia['tiktok'])): ?> <!-- TikTok -->
                    <a href="<?php echo esc_url($socialMedia['tiktok']); ?>"
                       class="flex items-center justify-center w-7 h-7 rounded-full bg-gray-300 text-gray-500 hover:bg-rose-500 hover:text-white transition"
                       target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-tiktok"></i>
                    </a>
                <?php endif; ?>
            </div>
            <!-- Инфо -->
           <?php $company_details = get_field('company_details', 'option');
           if (!empty($company_details)): ?>
            <div class="flex py-2 justify-center items-center md:text-left text-center">
                <p class="text-[12px] "><?php echo $company_details; ?>?></p>
            </div>
            <?php endif; ?>
        </div>

    </div>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>