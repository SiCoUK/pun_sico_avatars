<?php
/**
 * sico_bbcode functions
 *
 * @copyright Copyright (C) 2013 Simon Corless
 * @package sico_bbcode
 */

if (!defined('FORUM'))
    die();

function select_gravatar()
{
    global $forum_config, $lang_sico_avatar, $forum_user, $forum_page;
    
    // Show the gravatar
    ?>
    <div class="ct-set set<?php echo ++$forum_page['item_count'] ?>">
        <div class="ct-box">
            <h3 class="hn ct-legend"><?php echo $lang_sico_avatar['Gravatar'] ?></h3>
            <p class="avatar-demo"><span><?php echo get_gravatar($forum_user['email']); ?></span></p>
            <p><a href="http://www.gravatar.com/"><?php echo $lang_sico_avatar['Setup Gravatar'] ?></a></p>
        </div>
    </div>
    <?
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source http://gravatar.com/site/implement/images/php/
 */
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = true, $atts = array() ) {
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}