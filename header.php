<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">

    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/tailwind.css'; ?>">

</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>
<?php get_template_part('module/header'); ?>
