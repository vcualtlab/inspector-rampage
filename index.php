<?php get_header(); ?>

			<div class="content">

				<div class="inner-content">

					<main class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post();

							$rampage = get_post_meta( $post->ID, 'rampage' )[0];

							?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

								<header class="article-header">
									<h1 class="h2 entry-title"><a href="<?php echo $rampage[site_url]; ?>" rel="bookmark" title="<?php echo $rampage[site_title]; ?>"><?php echo $rampage[site_title]; ?></a></h1>
								</header>

								<section class="entry-content">
									<div class="thumbnail">
										<?php if ( get_field( 'screenshot' ) ){
											$image = get_field('screenshot')[sizes]['inspector-rampage-thumb'];

											echo "<img src='$image' />";
										} else {
											echo "<img src='http://placebear.com/300/300' />";
										}
										?>
									</div>
									
									
									<p><strong>Title:</strong> <?php echo $rampage[site_title]; ?><br/>
									<strong>URL:</strong> <a href="<?php echo $rampage[site_url]; ?>"><?php echo $rampage[site_url]; ?></a><br/>
									<strong>Description:</strong> <?php echo $rampage[site_description]; ?><br/>
									<strong>Theme:</strong> <?php echo $rampage[theme]; ?><br/>
									<strong>Admin Email:</strong> <?php echo $rampage[admin_email]; ?><br/>

									<?php if ( $rampage[active_plugins] ) {
										echo "<strong>Active Plugins:</strong>";
										echo "<ul class='active-plugins'>";
											foreach( $rampage[active_plugins] as $plugin ){
												echo "<li>$plugin</li>";
											}
										echo "</ul>";
									} ?>
									</p>

								</section>

							</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


						</main>

				</div>

			</div>


<?php get_footer(); ?>
