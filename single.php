<?php get_header(); ?>
<body>
<div id="wrapper">
<?php get_template_part('navigation'); ?>
	<div id="contentbox">
		<div id="allbox">
				<?php 
				if (have_posts()) : // WordPress ループ
					while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
					<h3 class="eventitem"><?php the_title(); ?></h3>
					<p class="eventdate">更新日：<?php the_time('Y/m/d'); ?></p>
					<div class="eventbox">
							<?php the_content(); ?>
							<?php the_post_thumbnail(); ?>
					    <!-- pager -->

					</div>
    <div class="navigation">
    <div class="alignleft"><?php next_post_link('%link','« 前の記事へ'); ?></div>
    <div class="plinkright"><?php previous_post_link('%link','次の記事へ »'); ?></div>
    </div>
					
					<?php 
					endwhile; // 繰り返し処理終了		
				else : // ここから記事が見つからなかった場合の処理 ?>
							<h2>記事はありません</h2>
							<p>お探しの記事は見つかりませんでした。</p>
				<?php
				endif;
				?>

	   </div>

	</div>
</div>

<?php get_footer(); ?>
