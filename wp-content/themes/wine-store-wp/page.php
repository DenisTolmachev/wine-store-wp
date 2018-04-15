<?php get_header(); ?>
    <div class="main-heading">
        <h1>hello world, мазафака!!</h1>
    </div>
    <section>
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </section>
<?php get_footer(); ?>