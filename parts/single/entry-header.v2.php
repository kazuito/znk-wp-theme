<header>
  <div class="tw-h-40 tw-overflow-hidden tw-relative">

    <?php
    if (get_the_post_thumbnail()) {
      the_post_thumbnail("large", array(
        "class" => "tw-w-full tw-h-full tw-object-cover tw-object-center"
      ));
    } else {
    ?>
      <img src="<?php echo znk_asset_url("images/default-thumbnail.jpg"); ?>" alt="<?php the_title() ?>" class="tw-w-full tw-h-full tw-object-cover tw-object-center">
    <?php

    }
    ?>
    <div class="tw-absolute tw-left-3 -tw-bottom-0.5 tw-px-3 tw-py-2 tw-bg-white tw-rounded-t-lg">
      <div class="tw-flex tw-items-center tw-text-sm tw-font-bold tw-gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
          <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
          <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
        </svg>
        <?php
        $categories = get_the_category();
        $cat = $categories[0];

        if ($cat->parent != 0) :
          $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));

          foreach ($ancestors as $ancestor) :
        ?>
            <svg class="tw-text-zinc-400" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M9 6l6 6l-6 6" />
            </svg>
            <div>
              <?php echo get_cat_name($ancestor) ?>
            </div>
        <?php
          endforeach;
        endif;
        ?>
        <svg class="tw-text-zinc-400" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M9 6l6 6l-6 6" />
        </svg>
        <div>
          <?php echo get_cat_name($cat->term_id) ?>
        </div>
      </div>
    </div>
  </div>
  <h1 class="tw-px-3 tw-my-5 tw-leading-tight tw-text-2xl tw-text-black tw-font-semibold">
    <?php the_title() ?>
  </h1>
</header>
