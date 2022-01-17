<? get_header(); ?>

<? if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6"><? the_content();  ?></div>
                <div class="col-12 col-md-6"><? the_post_thumbnail('large') ?></div>
            </div>
        </div>
<?
    }
} ?>
<? get_footer(); ?>