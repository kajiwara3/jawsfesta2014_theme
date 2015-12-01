<?php get_header(); ?>

<body id="itembody">
<div id="wrapper">
<div id="container">
<?php get_sidebar(); ?>


		<div id="mainbox">
<h2 class="event_title">イベント</h2>
<?php query_posts( 'post_per_page=-1&' . $query_string ); ?>

<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

		<h3 class="eventitem"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="eventdate"><?php the_time('Y/m/d'); ?></p>
		<div class="eventbox">
			<?php the_content(); ?>
			<?php the_post_thumbnail(); ?>
		</div>

<?php endwhile; endif; ?>

    <!-- pager -->
    <?php if ( $wp_query -> max_num_pages > 1 ) : ?>
    <div class="navigation">
    <div class="alignleft"><?php next_posts_link('« 前の記事へ'); ?></div>
    <div class="plinkright"><?php previous_posts_link('次の記事へ »'); ?></div>
    </div>
    <?php endif; ?>
    <!-- /pager -->

<!-- ?php if(function_exists('wp_pagenavi')) {
    wp_pagenavi();
} ? -->

	</div>
</div></div>
<?php get_footer(); ?>
