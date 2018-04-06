<i class="fas fa-calendar"></i>
<time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
<?php if ( is_callable( array( 'Pageviews', 'get_placeholder' ) ) ) {
$placeholder = Pageviews::get_placeholder( $post->ID );
echo '<i class="fas fa-eye"></i>'.$placeholder ;
} ?>
