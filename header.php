<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">

    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/tailwind.css'; ?>">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/scss/style.css'; ?>">
	



</head>
<body <?php body_class('flex flex-col min-h-screen '); ?>>


<!-- Скрытое модальное окно -->
<div style="display: none;">
    <div id="modalContent" class="w-[65vw] h-[55vh] p-5 rounded-xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 h-full w-full">
            <div class="rounded-xl overflow-hidden">
                <img class="w-full h-full object-cover rounded-xl"
                     src="<?php echo get_field('mdc', 'option')['mdc-img']['url'] ?>" alt="Радио UNISTAR 23"
                     loading="lazy">
            </div>
            <div class="p-4 flex items-center">
                <div>
                    <h2 class="text-lg sm:xl md:text-2xl lg:text-3x xl:text-3xl mb-6 font-bold text-rose-500 text-center"><?php echo get_field('mdc', 'option')['mdc-title'] ?></h2>
                    <p class="mt-2 text-center text-lg md:text-xl" style="user-select: text;"><?php echo get_field('mdc', 'option')['mdc-text'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php wp_body_open(); ?>
<?php get_template_part('module/header'); ?>
<?php get_template_part('module/mobileMenu', null, array()); ?>
