<?php
/**
 * File for all the shortcodes for the theme
 *
 */

//function mds_video_shortcode( $atts , $content = null ) {
//    
//    extract( shortcode_atts(
//            array(
//                'mp4_url' => '',
//                'webm_url' => '',
//            ), $atts )
//    );
//    $mds_id = uniqid ('mds_');
//
//    $modal = '<div class="mds-video-modal modal fade in" id="'.$mds_id.'" aria-hidden="true">';
//    $modal .= '<div class="modal-dialog video-modal">';
//    $modal .= '<div class="modal-content">';
//    $modal .= '<div class="modal-header bbc">';
//    $modal .= '<button type="button" class="close rr mds-close-video-widget" data-video="#'.$mds_id.'" data-dismiss="modal" aria-hidden="true">×</button>';
//    $modal .= '</div>';
//    $modal .= '<div class="modal-body">';
//    $modal .= '<video id="'.$mds_id.'-video" class="video-js vjs-big-play-centered" controls preload="auto" poster="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-setup="{}">';
//    $modal .= '<source src="'.$mp4_url.'" type="video/mp4">';
//    $modal .= '<source src="'.$webm_url.'" type="video/webm">';
//    $modal .= '</video>';
//    $modal .= '</div>';
//    $modal .= '</div>';
//    $modal .= '</div>';
//    $modal .= '</div>';
//    
//    $video  = '<a class="mds-short-video" href="#' .$mds_id.'"  data-toggle="modal" >';
//    $video .=  do_shortcode( $content );
//    $video .= '</a>';
//
//    $video  .= '<a class="mds-phone-video" href="' .$mp4_url.'" target="_blank" >';
//    $video .=  do_shortcode( $content );
//    $video .= '</a>';
//
//    return $modal .  $video;
//
//}
//add_shortcode( 'mds_video', 'mds_video_shortcode' );


