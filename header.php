<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part( 'template-parts/header/head' );?>
<body>
<div id="wrapper">
    <header id="header" class="l-header ">
        <div class="l-container">
            <?php
                include TEMPLATEPATH .'/template-parts/header/logo.php';
                include TEMPLATEPATH .'/template-parts/header/utility.php';
            ?>
        </div>
        <?php require_once TEMPLATEPATH .'/template-parts/header/gnav.php'; ?>
        <?php get_search_form();?>
    </header>
<?php echo $_SERVER['REMOTE_HOST']; ?>
    <main class="l-main">
