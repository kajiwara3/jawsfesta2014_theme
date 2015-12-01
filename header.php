<!doctype html>
<html>
<head>
<?php wp_head(); ?>
<meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW">
<meta charset="UTF-8">
<meta http-equiv="content-language" content="ja">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title('',true); ?><?php if(wp_title('',false)) { ?> | <?php } ?><?php bloginfo('name'); ?></title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/default.css">
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slide.js"></script>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr.js"></script>
<![endif]-->
<script>
    $(function(){
        $(".globNav-toggle").on("click", function() {
            $(this).next().slideToggle();
        });
    });
</script>

</head>
