<? get_header(); ?>

<? if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
    }
} ?>

<?
get_template_part('template-parts/content', 'list');

?>

<? get_footer(); ?>