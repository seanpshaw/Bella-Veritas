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
<body class="<?php print $classes; ?> <?php if ($primary_links || $navigation) { print ' with-navigation'; } ?>"> 

  <?php if ($primary_links): ?>
    <div id="skip-to-nav"><a href="#main-menu"><?php print t('Jump to Navigation'); ?></a></div>
  <?php endif; ?>

  <div id="page-wrapper">
	<div id="page" class=""><div id="page-inner" class="clearfix">

			<?php if($primary_links){ ?>      
        <div id="primary-navigation-wrapper">
    	    <div id="primary-navigation" class="container-16 clearfix">
    				<div class="primary-navigation-inner clearfix">
                <?php print $main_menu; ?>
    				</div>
    			</div>
    		</div>
	    <?php } ?>

    <div id="main-wrapper" class="" >
      <div id="main-wrapper-inner" class="container-16 clearfix">
         <div id="main" class="clearfix column <?php print ns('grid-16', $sidebar_first, 4, $sidebar_second, 6) . ' ' . ns('push-4', !$sidebar_first, 4); ?>">

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
				  <div id="footer-inner">

  		  		<div class="grid-6 prefix-1 footer-left">
      	      <?php if ($logo): ?>
      	          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
      	      <?php endif; ?>		  		
      	    </div>

  		  		<div class="grid-9 footer-right">
  		        <div id="credits"></div>
  		  		</div>

  		      <?php // print $footer; ?>
          </div> <!-- /#footer-inner -->
		    </div> <!-- /#footer -->
		  </div> <!-- /#footer-wrapper -->
	  <?php endif; ?>
	</div> <!--  /#page -->
  </div> <!-- /#page-wrapper -->

  <?php print $page_closure; ?>

  <?php print $closure; ?>
  
  <?php print $ga_tracking_code; ?>

</body>
</html>