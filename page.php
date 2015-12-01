<?php get_header(); ?>
<body>
<div id="wrapper">
<?php get_template_part('navigation'); ?>
	<div id="contentbox">
		<div id="allbox">
				<?php 
				if (have_posts()) : // WordPress ループ
					while (have_posts()) : the_post(); // 繰り返し処理開始 ?>

							<?php the_content(); ?>
					<?php 
					endwhile; // 繰り返し処理終了		
				else : // ここから記事が見つからなかった場合の処理 ?>
						<div id="contentbox">
							<h2>記事はありません</h2>
							<p>お探しの記事は見つかりませんでした。</p>
						</div>
				<?php
				endif;
				?>
	   </div>

	</div>
</div>

<?php get_footer(); ?>
