<?php

function semperfi_open_graph_protocol() {?>

<!-- Semper Fi - Open Graph Protocol - Begin -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="WordPress Security Fundamentals: How to Not Get Hacked" />
    <meta property="og:description" content="WordPress has made great strides in its effort to democratize publishing, making the ability to publish content on the web accessible to a very large number of people all over the world. Today, it powers roughly 28% of the websites on the web making it the most widely used platform in the world by far &hellip;" />
    <meta property="og:url" content="https://deliciousbrains.com/wordpress-security-fundamentals/" />
    <meta property="og:site_name" content="Delicious Brains" />
    <meta property="article:tag" content="WordPress" />
    <meta property="article:tag" content="Security" />
    <meta property="article:section" content="Uncategorized" />
    <meta property="article:published_time" content="2017-10-24T10:03:38-03:00" />
    <meta property="og:image:secure_url" content="https://cdn.deliciousbrains.com/content/uploads/2017/10/24004243/db-WPSecurityFundamentals.jpg" />
    <meta property="og:image:width" content="2500" />
    <meta property="og:image:height" content="1214" />
<!-- Semper Fi - Open Graph Protocol - End -->

<?php }

if (open_graph_protocol_display) add_action('wp_head','semperfi_open_graph_protocol');