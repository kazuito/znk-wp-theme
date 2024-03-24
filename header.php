<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1 ,viewport-fit=cover" />
  <meta name="msapplication-TileColor" content="<?php echo get_theme_mod('main_color', '#6bb6ff'); ?>">
  <meta name="theme-color" content="<?php echo get_theme_mod('main_color', '#6bb6ff'); ?>">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <script type="application/ld+json">{"@context": "https://schema.org","@type": "WebSite","name": "禅京園","alternateName": "ZENKYOEN","url": "https://www.zenkyoen.com/"}</script>

  <!-- Detect AdBlocker -->
  <script async src="https://fundingchoicesmessages.google.com/i/pub-9195551442108164?ers=1" nonce="Czccwt4PeH9gKSfB3wY3Lg"></script>
  <script nonce="Czccwt4PeH9gKSfB3wY3Lg">
    (function() {
      function signalGooglefcPresent() {
        if (!window.frames['googlefcPresent']) {
          if (document.body) {
            const iframe = document.createElement('iframe');
            iframe.style = 'width: 0; height: 0; border: none; z-index: -1000; left: -1000px; top: -1000px;';
            iframe.style.display = 'none';
            iframe.name = 'googlefcPresent';
            document.body.appendChild(iframe);
          } else {
            setTimeout(signalGooglefcPresent, 0);
          }
        }
      }
      signalGooglefcPresent();
    })();
  </script>

  <!-- Cursor Effect -->
  <script type="module">
    import {
      emojiCursor
    } from "https://unpkg.com/cursor-effects@latest/dist/esm.js";
    new emojiCursor({
      emoji: ["🍵", "🌸", "⛩️", "🏮", "🍣", "🍜", "🍡", "🌸", "🌸"]
    })
  </script>

  <?php wp_head(); //削除禁止 
  ?>
</head>

<body <?php body_class(); ?>>
  <div id="container">
    <header class="header<?php if (get_option('center_logo_checkbox')) echo ' header--center'; ?>">
      <?php if (wp_is_mobile() && is_active_sidebar('nav_drawer')) : //ナビドロワー 
      ?>
        <div id="drawer">
          <input type="checkbox" id="drawer__input" class="drawer--unshown">
          <label id="drawer__open" for="drawer__input"><i class="fa fa-bars"></i></label>
          <label class="drawer--unshown" id="drawer__close-cover" for="drawer__input"></label>
          <div id="drawer__content">
            <div class="drawer__title dfont">MENU<label class="close" for="drawer__input"><span></span></label></div>
            <?php dynamic_sidebar('nav_drawer'); ?>
          </div>
        </div>
      <?php endif; //END ナビドロワー 
      ?>
      <div id="inner-header" class="wrap cf tw-flex tw-items-center">
        <?php //ロゴまわり
        $title_tag = (is_home() || is_front_page()) ? 'h1' : 'p'; //トップページのみタイトルをh1に
        ?>
        <<?php echo $title_tag; ?> id="logo" class="h1 dfont" >
          <span class="v-hidden"><?php bloginfo("name"); ?></span>
          <a href="<?php echo home_url(); ?>">
            <?php $logo = esc_url(get_option('logo_image_upload'));
            if ($logo) { ?>
              <img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>">
            <?php }
            if (!get_option('onlylogo_checkbox')) bloginfo('name'); ?>
          </a>
        </<?php echo $title_tag; ?>>
        <?php //END ロゴまわり
        //PC用ヘッダーナビ
        if (has_nav_menu('desktop-nav')) {
          echo '<nav class="desktop-nav clearfix">';
          wp_nav_menu(array(
            'container' => false,
            'theme_location' => 'desktop-nav',
            'depth' => 2,
            'fallback_cb' => ''
          ));
          echo '</nav>';
        } //END PC用ヘッダーナビ 
        ?>

      <?php //モバイル用ナビ
      if (wp_is_mobile() && has_nav_menu('mobile-nav')) {
        echo '<nav class="mobile-nav">';
        wp_nav_menu(array(
          'container' => false,
          'theme_location' => 'mobile-nav',
          'depth' => 1,
          'fallback_cb' => ''
        ));
        echo '</nav>';
      } //END モバイル用ナビ 
      ?>
  
		<div class="lang-switcher-wrapper" style="margin-left: auto;" >
			<select name="znk-lang-switcher" id="znk-lang-switcher" style="margin-bottom: 0; cursor: pointer; color: white; background-color: transparent;">
		  <?
			$translations = pll_the_languages(array("raw"=>1));
			foreach($translations as $lang=>$item) { ?>
				<option value="<? echo $item['url'] ?>" <? if($lang===pll_current_language()) echo "selected" ?>>
 					<? echo $item["name"]; ?>
				</option>
			<? } ?>
			</select>
		</div>
    </div>
	<script>
			  $("#znk-lang-switcher").on("change", (e)=>{
				  const url = $(e.target).val();
				  window.location.href = url;
			  })
		</script>
    </header>
    <?php if (get_option('header_info_text')) { //お知らせ欄
      echo '<div class="header-info"><a href="' . get_option('header_info_url') . '">' . get_option('header_info_text') . '</a></div>';
    } ?>
