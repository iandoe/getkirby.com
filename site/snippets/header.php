<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <link rel="dns-prefetch" href="//fonts.googleapis.com">
  <?php echo css('http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,400italic|Source+Code+Pro:400') ?>

  <?php echo css(array(
    'assets/css/kirby.min.css',
    'assets/css/site.min.css'
  )) ?>

  <?php if($page->isHomePage()): ?>
  <title><?php echo html($page->headline()) ?> | <?php echo html($site->title()) ?></title>
  <?php else: ?>
  <title><?php echo html($page->title()) ?> | <?php echo html($site->title()) ?></title>
  <?php endif ?>

  <?php if($page->description() != ''): ?>
  <meta name="description" content="<?php echo html($page->description()) ?>" />
  <?php else: ?>
  <meta name="description" content="<?php echo html($site->description()) ?>" />
  <?php endif ?>

  <link rel="icon" href="<?php echo url('assets/images/favicon.png') ?>" type="image/png" />
  <link rel="apple-touch-icon" href="<?php echo url('assets/images/apple-touch-icon.png') ?>" />
  <meta name="apple-mobile-web-app-title" content="<?php echo html($site->title()) ?>">
  <link rel="alternate" type="application/rss+xml" href="<?php echo url('feed') ?>" title="<?php echo html($site->title()) ?> Blog Feed" />

  <?php if(server::get('SERVER_NAME') == 'getkirby.com'): ?>
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-431401-11']);
    _gaq.push(['_setDomainName', 'getkirby.com']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>
  <?php endif ?>

</head>
<body class="<?php e(c::get('stage'), 'stage ') ?><?php echo str_replace('.', '-', $page->template()) ?>">

  <!--[if lte IE 9]>
  <div class="browserupdate">
    You are using an obsolete browser which can harm your experience and cause security trouble. Please <a href="http://browsehappy.com/" target="_blank">update your browser!</a>
  </div>
  <![endif]-->

  <?php if(c::get('stage')) snippet('message') ?>

  <?php if($page->isHomePage()): ?>

  <header class="site-header" role="banner">
    <div class="site">
      <a class="logo" href="<?php echo url() ?>">Kirby</a>
      <?php snippet('menu') ?>
      <section class="slider">
        <div class="slider-track">
          <?php foreach($page->children()->find('hero')->images() as $slide): ?>
          <figure title="<?php echo $slide->caption() ?>">
            <img src="<?php echo $slide->url() ?>">
          </figure>
          <?php endforeach ?>
        </div>
        <nav class="slider-nav">
          <a class="slider-prev" href="#"><span>&lsaquo;</span></a>
          <a class="slider-next" href="#"><span>&rsaquo;</span></a>
        </nav>
      </section>
      <section class="intro">
        <h1 class="alpha with-beta">Kirby is a file&#8209;based&nbsp;CMS</h1>
        <p class="beta">Easy&nbsp;to&nbsp;setup. Easy&nbsp;to&nbsp;use. Flexible&nbsp;as&nbsp;hell.</p>
        <a class="btn-white" href="<?php echo url('try') ?>">Download v2</a>
      </section>
    </div>
  </header>

  <div class="site">

  <?php else: ?>

  <div class="site">

    <header class="site-header" role="banner">
      <a class="logo" href="<?php echo url() ?>">Kirby</a>
      <?php snippet('menu') ?>
    </header>

  <?php endif ?>
