<?php
/*
Plugin Name: PMN Music Player
Plugin URI: http://neildixon.com/
Description: Insert PMN artist player using [brackets] method. 

Author: Neil Dixon
Version: 1.1
Author URI: http://neildixon.com
Plugin URI: http://neildixon.com/wordpress-plugins/
*/
function pmn_generate_tags($artist, $orientation, $width, $height, $background='#333333') {
	$tag  = '<!-- start insertion by MevioPMNPlayer code, neildixon.com -->';
	$tag .= '<div id="pmnplayer'.$artist.'" class="pmnplayer">';
    $tag .= "<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000'codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0'width='$width'height='$height'id='$orientation$artist'align='middle'><param name='allowScriptAccess' value='always' /><param NAME='FlashVars' VALUE='artist_id=$artist'/><param name='allowFullScreen' value='false' /><param name='movie' value='http://www.mevio.com/widgets/$orientation.swf?a' /><param name='quality' value='high' /><param name='bgcolor' value='$background' /><embed src='http://www.mevio.com/widgets/$orientation.swf?a'quality='high' FlashVars='artist_id=$artist'bgcolor='$background'width='$width'height='$height'name='$orientation$artist'align='middle'allowScriptAccess='always' allowFullScreen='false'type='application/x-shockwave-flash'pluginspage='http://www.macromedia.com/go/getflashplayer' /></object>";
	$tag  .= '</div><!-- END insertion by MevioPMNPlayer, neildixon.com -->';
	$script_tags = $tag;
    return $script_tags;
}

function pmn_podshow_replace($artist, $type, $background='333333') {
	$orientation = 'audioplayercontainer';
	$height = '359';
	$width = '615';
	// check for tall shape
	if($type == 'vertical') 
	{ 
		$orientation .= '_vertical';
		$height = '408';
		$width = '330';
	}
	
	// make sure the background value is nex and has a #
	if (!strstr( $background, '#')) { $background = '#'.$background; }
	$tags = pmn_generate_tags($artist, $orientation, $width, $height, $background);

	return $tags;
}

function pmn_podshow_post($the_content) {

	if(strpos($the_content, "[pmn=")!==FALSE) { // Check whether any Youtube brackets are present to prevent any unnecessary preg_matching
		
		preg_match_all("/\[pmn=([0-9]{2,10})(&|&amp;)(vertical|supersize|horizontal)\]/", $the_content, $matches, PREG_SET_ORDER); // match all podshow references and sort them into a nice array
		
		foreach($matches as $match) { // Go through matches and replace them
			$the_content = preg_replace("/\[pmn=([0-9]{1,10})(&|&amp;)(vertical|supersize|horizontal)\]/", pmn_podshow_replace($match[1], $match[3]), $the_content, 1);
		}
	} 
    return $the_content;
   
}
add_filter('the_content', 'pmn_podshow_post');
add_filter('the_excerpt','pmn_podshow_post');

?>
