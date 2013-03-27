<?php wp_get_header(); ?>
<?php global $product, $woocommerce ?>
<div class="art-content-layout">
    <div class="art-content-layout-row">
      <?php include (TEMPLATEPATH . '/sidebar1.php'); ?>

      <div class="art-layout-cell art-content">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="art-post">
              <div class="art-post-tl"></div>
              <div class="art-post-tr"></div>
              <div class="art-post-bl"></div>
              <div class="art-post-br"></div>
              <div class="art-post-tc"></div>
              <div class="art-post-bc"></div>
              <div class="art-post-cl"></div>
              <div class="art-post-cr"></div>
              <div class="art-post-cc"></div>
              <div class="art-post-body" style="padding: 0">
                <div class="art-post-inner art-article">

                  <div class="art-postcontent">
                      <!-- article-content -->

                      <table style="width: 100%">
                        <tr>
                          <td style="width: 20%; border: none"><?php woocommerce_template_loop_product_thumbnail() ?></td>
                          <td style="width: 60%; border: none; vertical-align: middle">

                            <h2 class="art-postheader">
                              <?php the_title(); ?>
                              <?php if ( $product->enable_dimensions_display()  && $product->has_weight()): ?>
                                (<?php echo $product->get_weight() . ' ' . get_option('woocommerce_weight_unit'); ?>)
                              <?php endif ?>
                            </h2>

                            <?php
                            echo the_content();

                            $attributes = $product->get_attributes();

                            if ( empty( $attributes ) && ( ! $product->enable_dimensions_display() || ( ! $product->has_dimensions() && ! $product->has_weight() ) ) ) return;
                            ?>

                            <?php if ( $product->enable_dimensions_display() ) : ?>

                              <?php if ($product->has_dimensions()) : ?>
                                  <strong>Dimensiuni:</strong> <?php echo $product->get_dimensions(); ?>
                              <?php endif; ?>

                            <?php endif; ?>
                          </td>

                          <td style="width: 20%; border: none; vertical-align: middle; text-align: center">
                            <div class="">
                                <p style="font-size: 14px;">Preț: <?php echo $product->get_price_html(); ?></p>

                                <form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" method="post" enctype='multipart/form-data'>
                                  <span class="art-button-wrapper">
                                    <span class="l"> </span>
                                    <span class="r"> </span>
                                    <button type="submit" class="button art-button">Adaugă în coș</button>
                                  </span>
                                </form>
                            </div>
                          </td>
                        </tr>
                      </table>

                      <!-- /article-content -->
                  </div>
                  <div class="cleared"></div>

                </div>

              <div class="cleared"></div>
              </div>
          </div>

        <?php endwhile; ?>

      <?php endif; ?>

      </div>
      <?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
    </div>
</div>
<div class="cleared"></div>

<?php wp_get_footer(); ?>