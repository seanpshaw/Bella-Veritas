<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>

  <meta name="description" content="<?php print $seo_description; ?>" /> 
  <meta name="keywords" content="<?php print $seo_keywords; ?>" />  
  
  <link rel="stylesheet" href="/<?php echo path_to_theme(); ?>/styles/<?php echo $tenseconds_style; ?>/styles.css" type="text/css" />	
  
</head>
<body class="<?php print $classes; ?>">

  <?php if ($primary_links): ?>
    <div id="skip-to-nav"><a href="#main-menu"><?php print t('Jump to Navigation'); ?></a></div>
  <?php endif; ?>

  <div id="page-wrapper"><div id="page" class="clearfix"><div id="page-inner" class="clearfix">
  
    <div id="header-wrapper">
			<div id="header" class="container-16 clearfix"><div class="header-inner clearfix"><div class="section clearfix column">
				<div id="name-and-logo" class="column grid-9 alpha">
	      <?php if ($logo): ?>
	          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
	      <?php endif; ?>

	      <?php if ($site_name): ?>
	          <?php if ($title): ?>
	            <div id="site-name"><strong>
	              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
	            </strong></div>
	          <?php else: /* Use h1 when the content title is empty */ ?>
	            <h1 id="site-name">
	              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
	            </h1>
	          <?php endif; ?>
	      <?php endif; ?>
				</div>
	      <div id="site-meta" class="clearfix column grid-7 omega">
	        <?php if ($site_slogan): ?>
	          <div id="site-slogan" class=""><?php print $site_slogan; ?></div>
	        <?php endif; ?>


	        <?php if ($phone): ?>
	          <div id="header-phone" class=""><?php print $phone; ?></div>
	        <?php endif; ?>

	        <?php if ($link): ?>
	          <?php print $link; ?>
	        <?php endif; ?>
	      </div>

	      <?php print $header; ?>

	    </div>
    
    </div></div></div> <!-- /.section, /#header, /#header-wrapper  -->

			<?php if($primary_links){ ?>      
        <div id="primary-navigation-wrapper">
    	    <div id="primary-navigation" class="container-16 clearfix">
    				<div class="primary-navigation-inner clearfix">
                <?php print $main_menu; ?>
    				</div>
    			</div>
    		</div>
	    <?php } ?>
      
      
    <?php if ($featured_content): ?>    
      <div id="featured-wrapper" class="" >
        <div id="featured-wrapper-inner" class="container-16 clearfix">
          <?php print $featured_content; ?>
        </div>
      </div>
    <?php endif; ?>

    <div id="main-wrapper" class="" >
      <div id="main-wrapper-inner" class="container-16 clearfix">
         <div id="main" class="clearfix <?php if ($primary_links || $navigation) { print ' with-navigation'; } ?> column <?php print ns('grid-16', $sidebar_first, 4, $sidebar_second, 6) . ' ' . ns('push-4', !$sidebar_first, 4); ?>">

          <div id="content" class="column"><div class="section">

            <?php if ($mission): ?>
              <div id="mission"><?php print $mission; ?></div>
            <?php endif; ?>

            <?php print $highlight; ?>

            <?php print $breadcrumb; ?>
            <?php if ($title): ?>
              <h1 class="title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print $messages; ?>
            <?php if ($tabs): ?>
              <div class="tabs"><?php print $tabs; ?></div>
            <?php endif; ?>
            <?php print $help; ?>

            <?php print $content_top; ?>
      
            <div id="content-area">
              <?php print $content; ?>
            </div>

            <?php print $content_bottom; ?>

            <?php if ($feed_icons): ?>
              <div class="feed-icons"><?php print $feed_icons; ?></div>
            <?php endif; ?>

          </div></div> <!-- /.section, /#content -->

          <?php if ($primary_links || $navigation): ?>
      
            <div id="navigation"><div class="section clearfix">
              <?php print $themed_primary_links; ?>
              <?php print $navigation; ?>

            </div></div> <!-- /.section, /#navigation -->
          <?php endif; ?>

        </div> <!-- /#main -->
        
        <?php if ($sidebar_first): ?>
          <div id="sidebar_first-wrapper" class="">
            <div id="sidebar-first" class="column sidebar region grid-4 <?php print ns('pull-12', $sidebar_second, 6); ?>">
              <?php print $sidebar_first; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($sidebar_second): ?>
          <div id="sidebar_second_wrapper" class="">
            <div id="sidebar_second" class="column sidebar region grid-6">
              <?php print $sidebar_second; ?>
            </div>
          </div>
        <?php endif; ?>
        
      </div> <!-- /#main-wrapper-inner -->
    </div> <!-- /#main-wrapper -->




    </div> <!-- /#page-inner -->
	  <?php if ($footer || $footer_message || $secondary_links || $address_raw || $credits): ?>
	    <div id="footer-wrapper">	
				<div id="footer" class="container-16 clearfix clear">
		      <?php if ($primary_links || $navigation): ?>
		        <div id="navigation"><div class="section clearfix">
		          <?php if($primary_links){
		            print $regular_primary_links; 
		          }?>
		          <?php print $navigation; ?>

		        </div></div> <!-- /.section, /#navigation -->
		      <?php endif; ?>

		      <?php if($secondary_links){
		        print $regular_secondary_links; 
		      }?>
		  		<div class="grid-8 footer-left">
		  			<div id="address_raw"><?php print $address_raw; ?></div>
		        <div id="phone"><?php print $phone; ?></div>
		  		</div>

		  		<div class="grid-8 footer-right">
		  			<?php if ($footer_message): ?>
		          <div id="footer-message"><?php print $footer_message; ?></div>
		        <?php endif; ?>
		        <div id="credits"><?php print $credits; ?></div>
		  		</div>

		      <?php // print $footer; ?>

		    </div> <!-- /#footer -->
		  </div> <!-- /#footer-wrapper -->
	  <?php endif; ?>
  </div> <!-- /#page -->
  


  </div> <!--  /#page-wrapper -->

  <?php print $page_closure; ?>

  <?php print $closure; ?>
  
  <?php print $ga_tracking_code; ?>


</body>
</html>