<?php get_header(); ?>
<div id="container" class="content-wrapper">
	<div class="content clearfix">
		<div class="head-wrapper home-head-wrapper clearfix">
			<?php $loop = new WP_Query( array('pagename' => 'live')); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post();?>
			<?php  
			$post_status_page = get_post_status();
			if($post_status_page == live){ ?>
			<a href="<?php the_permalink(); ?>" class="now-live-wrapper">
				<h3>GLFtv Live on Air.</h3> <p>Jetzt ansehen!</p>
			</a>
			<?php } ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php wp_reset_query(); ?>
		<div class="head home-head left-section">
			<?php $loop = new WP_Query( array('page_id' => '670')); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post();?>
			<?php 
			$page_headline = get_field('page_headline');
			?>
			<h1>GLFtv</h1>
			<?php 
			echo $page_headline;
			?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php wp_reset_query(); ?>
	</div>
	<div class="head home-head right-section">
		<div>
			<?php $loop = new WP_Query( array('pagename' => 'live')); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post();?>
			<p>Nächste</p><p> Live-Sendung</p> <p><strong>
			<?php 
			$localyzedate = date_i18n("d. F", strtotime(get_field('date_next_live_stream')));
			echo $localyzedate;
			?>
		</strong> um 19 Uhr</p>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<?php wp_reset_query(); ?>
	<!---datum einfügen!-->
</div>
<div class="head-some-wrapper home-some-wrapper">
	<a href="https://www.facebook.com/GLFCampusTV" class="fb-btn" target="_blank"></a>
	<a href="https://twitter.com/glftv" class="tw-btn" target="_blank"></a>
	<a href="https://www.youtube.com/channel/UCIz_AoYLqsKMZjuCPQyTVig" class="yt-btn" target="_blank"></a>
</div>
</div>
</div>
<div class="slider-wrapper flexslider clearfix">
	<ul class="slides"> <!-- Bei slides Bedingungen zu Sendung Beitrag oder default einfügen !-->
		<?php $loop = new WP_Query( array('post_type' => 'slider', 'posts_per_page' => 7)); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post();
		?>
		<?php 
		$field_slider_type = get_field_object('slider_type');
		$slider_type = $field_slider_type[value];
		switch($slider_type){
			case 'clip':?>
			<li class="clip-slide">	
				<?php break;
				case 'broadcast':?>
				<li class="broadcast-slide">
					<?php break;
					case 'default': ?>
					<li class="default-slide">
						<?php break;
					}
					?>
					<?php
					$sliderimg['l'] = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'slider_l');
					$sliderimg['m'] = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'slider_m');
					$sliderimg['s'] = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), 'slider_s');
					?>

					<?php
					$output = '<figure class="responsive" data-media="';
					$output .= $sliderimg['s'][0];
					$output .= '" data-media640="';
					$output .= $sliderimg['m'][0];
					$output .= '" data-media900="';
					$output .= $sliderimg['l'][0];
					$output .= '"><noscript><img src="';
					$output .= $sliderimg['s'][0];
					$output .= '" alt="Bild"></noscript></figure>';
					echo $output;
					?>
					<div class="flex-caption clearfix">
						<h2 class="slider-headline">
							<?php
							if (strlen($post -> post_title) > 55) {
								echo substr(the_title($before = '', $after = '', FALSE), 0, 55) . '...';
							} else {
								the_title();
							}
							?>
						</h2>
						<div class="slider-subheadline">
							<?php
							if (strlen($post -> post_content) > 80) {
								echo substr(strip_tags($post -> post_content), 0, 80) . '...';
							} else {
								$content = get_the_content();
								echo $content;
							}
							?>
							<div class="block-link-wrapper">
								<?php
								$link_broadcast = get_field('link_broadcast');
								$link_clip = get_field('link_clip');
								$link_default = get_field('link_default');
								$linktext = get_field('link_text');
								if ($link_broadcast){
									?>
									<a href="<?php echo $link_broadcast; ?>" class="slider-capt-link text-link text-link-block"> <?php echo $linktext; ?></a>
									<?php
								}
								if ($link_clip){
									?>
									<a href="<?php echo $link_clip; ?>" class="slider-capt-link text-link text-link-block"> <?php echo $linktext; ?></a>
									<?php 
								}
								if ($link_default){ ?>
								<a href="<?php echo $link_default; ?>" class="slider-capt-link text-link text-link-block"> <?php echo $linktext; ?></a>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</li>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php wp_reset_query(); ?>
	</ul>
</div>
<div class="tile-wrapper home-tile-wrapper clearfix"> <!-- bitte Inhalte kontrollieren !-->
	<div class="headline-wrapper">
		<h2>Unsere neuesten Videos</h2>
	</div>
	<ul class="bxslider">	
		<?php $loop = new WP_Query( array('post_type' => 'startseite', 'posts_per_page' => 15)); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post();
		?>
		<?php
		$kacheltyp_feld = get_field('kacheltyp', false, true);
		$kacheltyp_array = get_field_object($kacheltyp_feld);
		$kacheltyp = $kacheltyp_array[name];
		?>
		<?php
		if ($kacheltyp == "sendung") {
			$sendung_home = get_field('sendung-startseite'); 
			$sendung_home_ID = $sendung_home->ID;
			$sendungs_permalink_home = get_permalink($sendung_home_ID);
			$sendungs_titel_home = get_the_title($sendung_home_ID);
			?>
			<li>
				<a href="<?php echo $sendungs_permalink_home; ?>"  class="tile teaser-tile broadcast-teaser-tile" >
					<?php
					$sendung_img_id = get_post_thumbnail_id($sendung_home_ID);
					$tile_img['s'] = wp_get_attachment_image_src($sendung_img_id, 'kachel');
					$tile_img['m'] = wp_get_attachment_image_src($sendung_img_id, 'thema_m');
					?>
					<figure class="teaser-tile-img responsive" data-media="<?php echo $tile_img['m'][0]; ?>" data-media480="<?php echo $tile_img['s'][0]; ?>">
						<noscript><img src="<?php echo $tile_img['s'][0]; ?>" alt="Bild"></noscript>
					</figure>
					<div class="tile-text-layer">
						<div class="extra-info-wrapper">
							<p class="text extra-info-text date-text">
								<?php 
								$localyzedate = date_i18n("d. F Y", strtotime(get_field('sendungsdatum',$sendung_home_ID)));
								echo $localyzedate;
								?>
							</p>
							<span class="teaser-tile-play-icon"></span>
						</div>
						<h3 class="tile-title">
							<?php

							if(strlen($sendungs_titel_home)>40) {
								echo substr($sendungs_titel_home,0,40).'...';
							} else {
								echo $sendungs_titel_home;
							}
							?>
						</h3>
					</div>
				</a>
			</li>		
			<?php } ?>
			<?php 
			if ($kacheltyp == "beitrag") {
				$beitrag_home = get_field('beitrag-startseite'); 
				$beitrag_home_ID = $beitrag_home->ID;
				$beitrags_permalink_home = get_permalink($beitrag_home_ID);
				$beitrags_titel_home = get_the_title($beitrag_home_ID);
				$beitrags_category_home = get_the_category($beitrag_home_ID);
				?>		
				<li>
					<div class="tile teaser-tile clip-teaser-tile">
						<a href="<?php echo $beitrags_permalink_home; ?>"  class="tile-link"> 
							<?php
							$beitrag_img_id = get_post_thumbnail_id($beitrag_home_ID);
							$tile_img['s'] = wp_get_attachment_image_src($beitrag_img_id, 'kachel');
							$tile_img['m'] = wp_get_attachment_image_src($beitrag_img_id, 'thema_m');
							?>
							<figure class="teaser-tile-img responsive" data-media="<?php echo $tile_img['m'][0]; ?>" data-media480="<?php echo $tile_img['s'][0]; ?>">
								<noscript><img src="<?php echo $tile_img['s'][0]; ?>" alt="Bild"></noscript>
							</figure>
						</a>
						<div class="tile-text-layer">
							<div class="extra-info-wrapper">
								<?php 
								if($beitrags_category_home[0]){
									$page_beitraege = get_page_by_title('Beiträge');
									$pageID_beitraege = $page_beitraege -> ID;
									$permalink_beitraege = get_permalink($pageID_beitraege);
									?>
									<form class="category_detail" method="post" action="<?php echo $permalink_beitraege; ?>">
										<label for="cat"><a class="extra-info-text cat-link"><?php echo $beitrags_category_home[0]->cat_name; ?></a></label>
										<input type="hidden" name="cat" class="cat" value="<?php echo $beitrags_category_home[0]->slug; ?>">
									</form>
									<?php
								}
								?>
								<span class="teaser-tile-play-icon"></span>
							</div>
							<a href="<?php echo $beitrags_permalink_home; ?>"  class="tile-title-link">
								<h3 class="tile-title">
									<?php
									if (strlen($beitrags_titel_home) > 45) {
										echo substr($beitrags_titel_home, 0, 45) . '...';
									} else {
										echo $beitrags_titel_home;
									}
									?>
								</h3>
							</a>
						</div>
					</div>
				</li>
				<?php } ?>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<?php wp_reset_query(); ?>
		</ul>
	</div>
	<div class="clearfix">
		<div class="home-teaser-wrapper home-blog-wrapper">
			<?php $loop = new WP_Query( array('page_id' => '670')); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post();?>
			<?php 
			$blog_teaser_headline = get_field('blog_teaser_headline'); 
			$blog_headline = get_field('blog_headline'); 
			$blog_text = get_field('blog_text'); 
			$blog_link = get_field('blog_link'); 
			?>
			<div  class="headline-wrapper">
				<h2><?php echo $blog_teaser_headline;?></h2>
			</div>
			<div class="home-blog-content home-blog-left"></div>
			<div class="home-blog-content home-blog-right">
				<h3><?php echo $blog_headline;?></h3>
				<p class="text"><?php echo $blog_text;?></p>
				<div class="block-link-wrapper"><a href="<?php echo $blog_link;?>" class="text-link text-link-block">Zum Blog</a></div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php wp_reset_query(); ?>
	</div>
	<div class="home-teaser-wrapper home-social-wrapper">
		<div  class="headline-wrapper">
			<h2>GLFtv Social</h2>
		</div>
		<div class="home-social-content">
					<!-- Einbindung Wordpress Social Stream Plugin: Generiert Stream aus allen angegebenen Social Media Kanälen
					Wird im WP-Backend unter Einstellung > Social Stream konfiguriert -->
					<div>
						<?php
					echo do_shortcode('[dc_social_feed id="711"]');	// Wandelt Shortcode in PHP-Code um
					?>	
				</div>
				<!--Ende Social Stream -->
			</div>
		</div>
	</div>
	<div class="home-teaser-wrapper topic-teaser-wrapper clearfix">
		<?php $loop = new WP_Query( array('page_id' => '670')); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post();?>
		<?php 
		$thema_headline = get_field('thema_headline'); 
		$thema_text = get_field('thema_text');
		?>
		<div class="topic-teaser-content topic-teaser-left">
			<h2><?php echo $thema_headline;?></h2>
			<p class="text"><?php echo $thema_text;?></p>
			<div class="btn-wrapper cta-btn-wrapper">
				<a href="http://glftv.de/themen/#add_topic_overlay" class="cta-btn">Thema vorschlagen</a> <!-- Thema vorschlagen verlinken !-->
			</div>
		</div>
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
	<div class="topic-teaser-content topic-teaser-right">
		<h3>Die Themen mit den meisten Likes</h3>
		<?php
		$page = get_page_by_title('Themen');
		$pageID = $page -> ID;
		$pageLink = get_page_link($pageID);
		?>
		<a href=" <?php echo $pageLink;?>" class="text-link">Alle Themen</a><!-- Themen verlinken !-->
		<div class="tile-wrapper topic-tile-wrapper clearfix">
			<?php
			$loop = new WP_Query(array(
				'post_status' => 'publish',
				'post_type' => 'themen',
				'posts_per_page' => 3,
				'meta_key' => 'facebook_likes',
				'orderby' => 'meta_value_num',
				'order' => 'DESC'
				));
				?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<a href="<?php the_permalink();?>"  class="tile teaser-tile topic-teaser-tile">  <!-- Inhalte einfügen !-->
					<?php if(has_post_thumbnail()){?>
					<?php
					$themen_img_id = get_post_thumbnail_id($post -> ID);
					$tile_img['s'] = wp_get_attachment_image_src($themen_img_id, 'kachel');
					$tile_img['m'] = wp_get_attachment_image_src($themen_img_id, 'thema_m');
					?>
					<figure class="teaser-tile-img" data-media="<?php echo $tile_img['m'][0]; ?>" data-media480="<?php echo $tile_img['s'][0]; ?>">
						<noscript><img src="<?php echo $tile_img['s'][0]; ?>" alt="Bild"></noscript>
					</figure>
					<?php } else{ ?>
					<figure class="teaser-tile-img" data-media="<?php bloginfo('template_directory');?>/img/thema_m.png" data-media480="<?php bloginfo('template_directory');?>/img/thema_s.png">
						<noscript><img src="<?php bloginfo ('template_directory'); ?>/img/thema_s.png" alt="Bild"></noscript>
					</figure>
					<?php } ?>
					<div class="tile-text-layer">
						<div class="extra-info-wrapper">
							<p class="text extra-info-text fb-likes-text">
								<?php
								echo intval(getFacebookLikes(get_permalink(get_the_ID()))) . ' Likes';
								?>
							</p></div>
							<h3 class="tile-title">
								<?php 
								$topic_title = get_the_title();
								echo $topic_title;
								?>
							</h3>
						</div> 
					</a>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
	<div class="home-foot-wrapper">
		<h2 class="headline-centred">Die GLFtv Magazine:</h2>
		<div class="magazines-wrapper clearfix">
			<div class="magazine">
				<a href="" class="tvs"></a>
			</div>
			<div class="magazine">
				<a href="" class="hd-camp"></a>
			</div>
			<div class="magazine">
				<a href="" class="yt"></a>
			</div>
		</div>
	</div>
</div>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>