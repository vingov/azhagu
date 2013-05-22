<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>



<div id="wrapper"> <!-- wrapper starts here -->

  <div id="header-wrapper"> <!-- Header-wrapper starts here-->
    <!-- Branding -->
    <div id="branding">
      <div id="site-logo">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>
      </div>
      
       <?php if ($site_name || $site_slogan): ?>
        <div id="name-and-slogan">
            <?php if ($site_name): ?>
            <?php if ($title): ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
             <?php else: /* Use h1 when the content title is empty */ ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
            <?php endif; ?>
            <?php endif; ?>

             <?php if ($site_slogan): ?>     
              <span id="site-slogan"><?php print $site_slogan; ?></span>
            <?php endif; ?>            
    
        </div>
    
      <?php endif; ?>

       <?php print render($page['header']); ?>
    </div>      

    <!-- Navigation -->
    <?php if ($main_menu): ?>
      <div id="main-menu" class="navigation">
        <nav>
          <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')))); ?>
        </nav>
      </div>
    <?php endif; ?>

  </div> <!-- Header-wrapper ends here -->

  <div id="content-wrapper"> <!-- content-wrapper starts here -->
    <div id="primary">
      <!-- content -->
      <section id="content">
        <div class="content">
        
        <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
        <a id="main-content"></a>
        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <header>
          <div class="title-meta">
            <?php print render($title_prefix); ?>
            <?php if ($title): ?><h2 class="title" id="page-title"><?php print $title; ?></h2><?php endif; ?>
            <?php print render($title_suffix); ?>
        </div>
        </header>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>

        </div>
      </section>
      <!-- sidebar first -->
      <?php if ($page['sidebar_first']): ?>
      <aside id="sidebar-first">
        <?php print render($page['sidebar_first']); ?>
      </aside>
      <?php endif; ?>
    </div>
  </div><!-- content-wrapper ends here -->

  <footer id="footer-wrapper"> <!-- footer-wrapper starts here -->
    <div class='footer-region-first'>
      <div class="footer-first">
        <h2 class="title">Social Block</h2>
        <ul>
          <li class="first-icon"><a href="#">Facebook</a></li>
          <li class="second-icon"><a href="#">Twitter</a></li>  
          <li class="third-icon"><a href="#">Google Plus</a></li>
          <li class="fourth-icon"><a href="#">Pintrest</a></li>
          <li class="fifth-icon"><a href="#">RSS</a></li>         
        </ul>
      </div>
      <div class="footer-second">
        <h2 class="title">Footer Second Block</h2>
        <p>Consequat nisl pneum praemitto. Caecus letalis nobis. Abigo aliquip at brevitas camur commoveo scisco sit volutpat.</p>
      </div>
      <div class="footer-third">
        <h2 class="title">Footer Third Block</h2>
        <p>Consequat nisl pneum praemitto. Caecus letalis nobis. Abigo aliquip at brevitas camur commoveo scisco sit volutpat.</p>
      </div>
    </div>
    <div class='footer-region-second'>
      <p>Copyright</p>
    </div>
  </footer><!-- footer-wrapper ends here -->



</div> <!-- wrapper ends here -->

