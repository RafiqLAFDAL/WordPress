<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <?php the_title(); ?>
        <P>
            <img src="<?php the_post_thumbnail_url(); ?> " alt="" style="width: 100% ; heigth:100%">
        </P>
        <?php the_content(); ?>
        <?php endwhile ?>
    </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>