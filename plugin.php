<?php

// Plugin Name: Gatling.io Documentation Sitemap Plugin
// Plugin URI: https://github.com/gatling/gatling.io-sitemap-plugin
// Description: Adds documentation sitemap to Yoast SEO sitemap index
// Version: 1.0
// Date: May 07, 2021
// Author: Gatling Corp

function gatling_docs_sitemap_index($sitemap_custom_items) {
  $home_url = get_home_url();
  $sitemap = "docs/sitemap.xml";
  $sitemap_file = ABSPATH . $sitemap;

  $time = null;
  if (file_exists($sitemap_file)) {
    $time = filemtime($sitemap_file);
  } else {
    $time = time();
  }
  $lastmod = date('Y-m-d\TH:i:s+00:00', $time);

  $item = <<<XML
        <sitemap>
                <loc>$home_url/$sitemap</loc>
                <lastmod>$lastmod</lastmod>
        </sitemap>

XML;
  return $sitemap_custom_items . $item;
}

add_action('wpseo_sitemap_index', 'gatling_docs_sitemap_index');
