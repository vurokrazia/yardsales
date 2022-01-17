<?
$args = array(
    'post_type' => array("producto"),
    'posts_per_page' => -1
);
$products = new WP_Query($args); ?>

<div class="container-fluid gx-5">
    <? if ($products->have_posts()) {
        $products->the_post(); ?>
        <div class="productos__container">
            <div class="productos__card">
            <? the_post_thumbnail() ?>

                <div class="producto__caption">
                    <div class="productos__desc">
                        <a class="producto__link" href="<? the_permalink() ?>">
                            <h4 class="productos__titulo"><? the_title() ?></h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <? } ?>
</div>