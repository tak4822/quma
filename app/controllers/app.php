<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    static function is_mobile()
    {
        $userAgents = array(
        'iPhone', // iPhone
        'iPod', // iPod touch
        'Android.*mobile', // 1.5+ Android** Only mobile
        'Windows.*Phone', // *** Windows Phone
        'dream', // Pre 1.5 Android
        'CUPCAKE', // 1.5+ Android
        'blackberry9500', // Storm
        'blackberry9530', // Storm
        'blackberry9520', // Storm v2
        'blackberry9550', // Storm v2
        'blackberry9800', // Torch
        'webOS', // Palm Pre Experimental
        'incognito', // Other iPhone browser
        'webmate', // Other iPhone browser
        );
        $pattern = '/' . implode('|', $userAgents) . '/i';
        return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
    }

    public function current_template() {
        global $post;  
        if (is_front_page()) return 'frontpage';
        if ($post->ID === 1592 || $post->ID === 1594 || $post->ID === 1596 || $post->ID === 1598 ) return 'contact';
        if ($post->ID === 1304 || $post->ID === 35 || $post->ID === 41 || $post->ID === 1906 ) return 'events'; // single page under eents page
        if (is_single()) return 'singles';
        if (is_404()) return '404';

        return 'others';
    }

    function works_posts_picked() {
        
        $args = array(
            'post_type' => 'works',
            'meta_key' => 'is-picked',
            'meta_value' => 'picked!',
        );

        return new WP_Query( $args );
    }    

    function works_posts_not_picked() {
        
        $args = array(
            'post_type' => 'works',
            'meta_key' => 'is-picked',
            'meta_value' => 'no',
            'paged' => get_query_var('paged'),
        );
        return new WP_Query( $args );
    }    

    function interviews_posts() {
        $args = array(
            'post_type' => 'interviews',
            'paged' => get_query_var('paged'),
        );
        return new WP_Query( $args );
    }

    static function getTitle() {
        // $post = get_queried_object();
        // if ( is_front_page() ) {
        //     return 'Canarie';
        // } else if ( is_single() ) {
        //     return $post->post_title . '｜Canarie';
        // } else if (is_author()) {
        //     return 'Canarie メンバー | ' . get_the_author();
        // } else if (is_category()) {
        //     return 'Canarie カテゴリー | '. get_the_archive_title();
        // } else if (is_tag()) {
        //     return 'Canarie タグ | ' . get_the_archive_title();
        // } else if (is_search()) {
        //     return sprintf(__('Canarie 検索結果：%s', 'sage'), get_search_query());
        // } else if (is_archive()) {
        //     return get_the_archive_title();
        // } else {
        //     return get_the_title();
        // }
        return "QUMA";
    }

    static function getDescription() {
        // if ( is_single() ) {
        //     return get_post_meta(get_the_ID(), 'short_description', true);
        // } else {
        //     return 'カナダのリアルを伝えるメディアサイト';
        // }

        return "東京で暮らしをつくるリノベーション。QUMAはリノベーションを通して、あなたらしい暮らしを一緒につくります。街選びから物件探し、設計・施工までじっくりと、とことんお付き合いさせてください。";
    }

    static function getImage() {
        if (is_single()) {
            $post_ID = get_queried_object()->ID;
            return get_the_post_thumbnail_url($post_ID, 'large_thumb');
          } else {
            return null;
          }
    }

    static function getType(){
        if (is_single()) {
            return 'article';
        } else {
            return 'website';
        }
    }

    static function getUrl()
  {
    global $post;
    if (is_front_page()) {
      return 'https://quma.co.jp';
    } else {
      return get_page_link(get_queried_object_id());
    }
  }

}
