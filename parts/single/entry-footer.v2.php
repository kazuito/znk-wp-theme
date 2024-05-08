<footer class="tw-py-10 tw-mb-40 tw-bg-zinc-100 tw-mt-10 tw-space-y-6">
  <?php if (get_the_category()) : ?>
    <div class="tw-px-4">
      <h2 class="tw-text-zinc-300 tw-text-2xl tw-font-bold">
        CATEGORIES
      </h2>
      <div class="tw-flex tw-gap-x-3 tw-gap-y-0 tw-flex-wrap tw-mt-2">
        <?php
        foreach (get_the_category() as $category) : ?>
          <a href="<?php echo get_category_link($category->term_id); ?>" class="tw-text-black tw-font-semibold">
            <?php echo $category->name; ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif ?>
  <?php if (get_the_tags()) : ?>
    <div class="tw-px-4">
      <h2 class="tw-text-zinc-300 tw-text-2xl tw-font-bold">
        TAGS
      </h2>
      <div class="tw-flex tw-gap-x-3 tw-gap-y-0 tw-flex-wrap tw-mt-2">
        <?php
        foreach (get_the_tags() as $tag) : ?>
          <a href="<?php echo get_tag_link($tag->term_id); ?>" class="tw-text-black tw-font-semibold">
            #<?php echo $tag->name; ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>
  <div class="">
    <h2 class="tw-px-4 tw-text-zinc-300 tw-text-2xl tw-font-bold">
      RELATED POSTS
    </h2>

    <div class="tw-flex tw-flex-col tw-gap-1 tw-mt-2">
      <?php
      $related_posts = get_posts(array(
        'posts_per_page' => 3,
        'post__not_in' => array(get_the_ID()),
        'category__in' => wp_get_post_categories(get_the_ID()),
        'orderby' => 'rand'
      ));

      foreach ($related_posts as $post) : setup_postdata($post); ?>
        <a href="<?php the_permalink(); ?>" class="tw-flex tw-gap-1 tw-bg-white">
          <div class="tw-relative tw-m-2 tw-rounded-md tw-w-24 tw-h-20 tw-overflow-hidden tw-shrink-0">
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
          </div>
          <div class="tw-text-black tw-py-3 tw-pr-4 tw-pl-0 tw-font-semibold tw-leading-snug">
            <?php the_title(); ?>
          </div>
        </a>
      <?php endforeach;
      wp_reset_postdata(); ?>
    </div>
</footer>
