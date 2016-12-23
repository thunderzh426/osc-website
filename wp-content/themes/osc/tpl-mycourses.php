<?php
/*
  Template Name: My Courses
 */
get_header();
?>
<!-- blog title -->
<div class="homepage_nav_title section innerbg" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <div class="index_titles blog single pageh"><?php the_title(); ?></div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<!-- blog title ends -->
<div class="blog_pages_wrapper default_bg">
    <div class="container">
        <div class="row">
			<!-- sidebar -->
            <div class="col-md-12">
                <?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$my_orders_columns = apply_filters( 'woocommerce_my_account_my_orders_columns', array(
	'order-number'  => __( 'Order', 'woocommerce' ),
	'order-date'    => __( 'Date', 'woocommerce' ),
	'order-status'  => __( 'Status', 'woocommerce' ),
	'order-total'   => __( 'Total', 'woocommerce' ),
	'order-actions' => '&nbsp;',
) );

$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
	'numberposts' => $order_count,
	'meta_key'    => '_customer_user',
	'meta_value'  => get_current_user_id(),
	'post_type'   => wc_get_order_types( 'view-orders' ),
	'post_status' => array_keys( wc_get_order_statuses() )
) ) );

if ( $customer_orders ) : ?>

	<h2><?php echo apply_filters( 'woocommerce_my_account_my_orders_title', __( 'My Courses', 'woocommerce' ) ); ?></h2>
	<form action="/index.php/liveroom/" id="liveForm" method="post">
		<input type="hidden" name="code" id="code" value="">
	<table class="shop_table shop_table_responsive my_account_orders">
		<thead>
			<tr>

				<th><span class="nobr">Code</span></th>
				<th><span class="nobr">Courses Name</span></th>
				<th><span class="nobr">Order Number</span></th>
				<th><span class="nobr">Order Status</span></th>
				<th><span class="nobr">Purchased At</span></th>
				<th>Course Link</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ( $customer_orders as $customer_order ) :
				$order      = wc_get_order( $customer_order );
				$item_count = $order->get_item_count();
				$order_item = $order->get_items();
				$status = $order->get_status();
				?>
				
				<?php foreach ( $order_item as $item_key => $item ) : ?>
				<?php   $product = $order->get_product_from_item( $item ) ?>
				<tr class="order">
					<td>
						<?php echo $product->get_sku() ;?>
					</td>
					<td>
						<?php echo $product->get_title() ;?>
					</td>
					<td>
						<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
									<?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?>
								</a>
					</td>
						
					<td>
						<?php echo $status ;?>
					</td>
					<td>
						<time datetime="<?php echo date( 'Y-m-d', strtotime( $order->order_date ) ); ?>" title="<?php echo esc_attr( strtotime( $order->order_date ) ); ?>"><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></time>

					</td>
					<td>
						<?php if ( 'completed' === $status ) : ?>
							<button class="startCourse" id="<?php echo $product->get_sku() ;?>">Start Course</button>
						<?php endif; ?>
					</td>
				</tr>
				
				<?php endforeach; ?>
				
			<?php endforeach; ?>
		</tbody>
	</table>
</form>
<?php endif; ?>
            </div>
        </div>
        <div class="clear"></div>
        <div style="padding:20px;"></div>
    </div>
</div>
<script type="text/javascript">
$(function(){
	$(".startCourse").click(function(){
		var code =$(this).attr('id');
		$("#code").val(code);
		$("#liveForm").submit();
		//window.location.href = '/liveroom?code='+code;
	});
})
</script>
<?php get_footer(); ?>

