<?php get_header(); ?>


<h1>Voir tous les appartements</h1>

<?php if (have_posts()) : ?>
    <div class="row">
        <?php while (have_posts()) : the_post(); ?>

            <div class="col-sm-4">
               <?php get_template_part('parts/card', 'post'); ?>
            </div>
        <?php endwhile ?>
    </div>
    <?php posts_nav_link(); ?>


<?php else : ?>

    <h1>pas d'articl</h1>

<?php endif; ?>

<?php get_footer(); ?>