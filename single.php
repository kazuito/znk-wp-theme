<?php get_header(); ?>
<div id="content" <?php column_class(); ?>>
	<div id="inner-content" class="wrap cf">
		<main id="main" class="m-all t-2of3 d-5of7 cf">
			<?php
			if (have_posts()) :
				while (have_posts()) :
					the_post();
			?>
					<article id="entry" <?php post_class('cf'); ?>>
						<?php
						get_template_part('parts/single/entry-header'); //タイトルまわり
						get_template_part('parts/single/entry-content'); //本文まわり
						get_template_part('parts/single/entry-footer'); //記事フッターまわり
						comments_template(); //コメント
						insert_json_ld(); //構造化データ
						?>
					</article>
					<?php get_template_part('parts/single/prev-next-entry'); //前後の記事へのリンク
					?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part('content', 'not-found'); //コンテンツが見つからない場合
				?>
			<?php endif; ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<div class="tw-fixed tw-bottom-3 tw-left-3 tw-right-3 tw-z-[999] sm:tw-w-fit sm:tw-ml-auto">
	<a href="https://store.zenkyoen.com?utm_source=zenkyoen-media&utm_medium=banner&utm_id=article-page-floating-button&utm_content=floating-button-bottom" target="_blank" class="tw-flex tw-items-center tw-gap-2 tw-py-2 tw-px-4 tw-bg-blue-600 tw-text-white tw-rounded-xl tw-no-underline tw-shadow-lg hover:tw-scale-[1.02] active:tw-scale-95 tw-transition-all hover:tw-no-underline tw-animate-pop-appear">
		<div class="tw-h-5 tw-w-5">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
				<path stroke="none" d="M0 0h24v24H0z" fill="none" />
				<path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
				<path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
				<path d="M17 17h-11v-14h-2" />
				<path d="M6 5l14 1l-1 7h-13" />
			</svg>
		</div>
		<span class="tw-text-base tw-font-bold tw-truncate">
			京都旅行ならお土産・体験通販の禅京園
		</span>
	</a>
</div>
<?php get_footer(); ?>
<?php //アクセス数をカウント：人気記事ウィジェットのため
if (!is_bot() && !is_user_logged_in()) {
	sng_set_post_views(get_the_ID());
} ?>
