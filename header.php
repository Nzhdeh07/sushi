<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">

    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/tailwind.css'; ?>">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/scss/style.css'; ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">


</head>
<body <?php body_class('flex flex-col min-h-screen'); ?>>


<?php wp_body_open(); ?>
<?php get_template_part('module/header'); ?>
