<?php //記事タイトルまわりのテンプレート ?>
<?php 
if(current_user_can("manage_options") && function_exists("pll_get_post_translations")): 
$translationsCount = count(pll_get_post_translations(get_the_id()));
?>
<div style="padding: 1rem">
	<div style="background: black; color: white; font-weight: bold; padding: 0 4px; border-radius: 4px; width: fit-content;">
		<?php echo $translationsCount ?><small>言語</small>
	</div>
</div>
<?php endif; ?>
<header class="article-header entry-header">
	<?php
		breadcrumb(); //パンくず
	?>
    <h1 class="entry-title single-title"><?php the_title(); //タイトル?></h1>
	<p class="entry-meta vcard dfont">
		<?php if(!get_option('remove_pubdate')):?>
	       	<time class="pubdate entry-time" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y/m/d'); ?></time>
	       	<?php if(get_the_modified_date('Ymd') > get_the_date('Ymd')): ?>
	       		<time class="updated entry-time" datetime="<?php echo get_the_modified_date('Y-m-d'); ?>"><?php echo get_the_modified_date('Y/m/d'); ?></time>
       	<?php endif; endif; ?>
    </p>
<?php if (has_post_thumbnail() && !get_option('no_eyecatch')) : //アイキャッチ画像 ?>
	<p class="post-thumbnail"><?php the_post_thumbnail( array(700, 400) ); ?></p>
	<?php endif; ?>
	<?php //FABボタン
		if(!get_option('no_fab')) :
	?>
  	<input type="checkbox" id="fab">
	  <label class="fab-btn <?php if(get_option('extended_fab')){ echo 'extended-fab main-c'; } else { echo 'accent-bc';} ?>" for="fab"><i class="fa fa-share-alt"></i></label>
	  <label class="fab__close-cover" for="fab"></label>
	  <!--FABの中身-->
	  <div id="fab__contents">
		 <div class="fab__contents-main dfont">
		    <label class="close" for="fab"><span></span></label>
		    <p class="fab__contents_title">SHARE</p>
		  	<?php if (has_post_thumbnail()) : //サムネイルあり?>
		  		<div class="fab__contents_img" style="background-image: url(<?php echo featured_image_src('thumb-520'); ?>);">
		  		</div>
		  	<?php endif; ?>
		  	<?php insert_social_buttons('fab');?>
	  	</div>
	  </div>
	<?php endif; //END FABボタン?>
	<?php if(get_option('open_fab')) insert_social_buttons('belowtitle');//通常のボタン ?>
</header>
