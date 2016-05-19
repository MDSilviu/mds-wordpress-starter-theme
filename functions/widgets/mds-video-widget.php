<?php
class MDS_Video_Widget extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'mds_video_widget',
            __( 'MDS Video Widget', 'hantor' ),
            array(
                'classname'   => 'mds_video_widget',
                'description' => __( 'Widget to display videos.', 'hantor' )
            )
        );
        
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        extract( $args );

        $title      = apply_filters( 'widget_title', $instance['title'] );
        $image_url    = $instance['image_url'];
        $mp4_url   = $instance['mp4_url'];
        $webm_url   = $instance['webm_url'];

        echo $before_widget;

        if ( $title ) {
            echo $before_title . $title . $after_title;
        }
        $modal = '<div class="mds-video-modal modal fade in" id="' .str_replace("_", "-", $widget_id).'" aria-hidden="true">';
            $modal .= '<div class="modal-dialog video-modal">';
                $modal .= '<div class="modal-content" style="z-index:9999;">';
                    $modal .= '<div class="modal-header bbc">';
                        $modal .= '<button type="button" class="close rr mds-close-video-widget" data-video="#' .str_replace("_", "-", $widget_id).'" data-dismiss="modal" aria-hidden="true">×</button>';
                        $modal .= '</div>';
                    $modal .= '<div class="modal-body">';
                        $modal .= '<video id="' .str_replace("_", "-", $widget_id).'-video" class="video-js vjs-big-play-centered" controls preload="auto" poster="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-setup="{}">';
                            $modal .= '<source src="'.$mp4_url.'" type="video/mp4">';
                            $modal .= '<source src="'.$webm_url.'" type="video/webm">';
                            $modal .= '</video>';
                        $modal .= '</div>';
                    $modal .= '</div>';
                $modal .= '</div>';
            $modal .= '</div>';

        $video = '<div class="mds-video-container">';
            $video .= '<img src="'.$image_url.'" class="mds-widget-image">';
            $video .= '<div class="play_container">';
                $video .= '<a class="mds-play-video-widget" href="#' .str_replace("_", "-", $widget_id).'"  data-toggle="modal" >';
                    $video .= '<div class="play-img"></div>';
                    $video .= '</a>';
                $video .= '</div>';
            $video .= '</div>';
        echo $modal;
        echo $video;
        echo $after_widget;

    }


    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['image_url'] = strip_tags( $new_instance['image_url'] );
        $instance['mp4_url'] = strip_tags( $new_instance['mp4_url'] );
        $instance['webm_url'] = strip_tags( $new_instance['webm_url'] );

        return $instance;

    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {

        $title      = esc_attr( $instance['title'] );
        $image_url    = esc_attr( $instance['image_url'] );
        $mp4_url    = esc_attr( $instance['mp4_url'] );
        $webm_url    = esc_attr( $instance['webm_url'] );
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('image_url'); ?>"><?php _e('Image URL:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('image_url'); ?>" name="<?php echo $this->get_field_name('image_url'); ?>" type="text" value="<?php echo $image_url; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('mp4_url'); ?>"><?php _e('.MP4 URL:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('mp4_url'); ?>" name="<?php echo $this->get_field_name('mp4_url'); ?>" type="text" value="<?php echo $mp4_url; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('webm_url'); ?>"><?php _e('.WEBM URL:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('webm_url'); ?>" name="<?php echo $this->get_field_name('webm_url'); ?>" type="text" value="<?php echo $webm_url; ?>" />
        </p>
        <?php
    }

}

