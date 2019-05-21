<?php

class WP_REST_Page_Controller extends WP_REST_Controller {

	/**
	 * WP_REST_Team_Controller constructor.
	 */
	public function __construct() {
		add_action('rest_api_init', array($this, 'register_routes'));
	}

	/**
	 * Register the routes for the objects of the controller.
	 */
	public function register_routes() {
		$namespace = 'mds_starter_theme';
		$base      = 'page';
		register_rest_route($namespace, '/' . $base . '/(?P<name>[a-zA-Z0-9-]+)', array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array($this, 'get_item'),
				'permission_callback' => array($this, 'get_items_permissions_check'),
				'args'                => $this->get_collection_params(),
			),
		));
	}

	/**
	 * Get a page item
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 *
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_item($request) {
		$requested_page_name = $request->get_param('name');
		$page_content        = $this->get_page_content($requested_page_name);

		if (is_wp_error($page_content)) {
			return $page_content;
		}

		$response = rest_ensure_response($page_content);

		return $response;
	}

	public function get_page_content($page_name) {
		$error   = new WP_Error('rest_article_invalid_slug', __('Page not found.'), array('status' => 404));
		$page_id = $this->get_id_by_page_name($page_name);

		if (!$page_id) {
			return $error;
		}

		$page_content = $this->parse_page_content($page_id);

		if (!$page_content) {
			return $error;
		}

		return $page_content;
	}

	public function parse_page_content($page_id) {
		$content_blocks = array();
		$page_template = get_page_template_slug($page_id);

		if ($page_template === 'page-templates/faq-template.php') {
			$page_content = carbon_get_post_meta($page_id, 'faq_content');
		} else {
			$page_content = carbon_get_post_meta($page_id, 'page_content');;
		}

		if ($page_content) {
			foreach ($page_content as $key => $block) {
				$block_type = $block['_type'];
				unset($block['_type']);

				$block_content = array(
					'type' => $block_type,
					'content' => $block,
				);

				array_walk_recursive($block_content, array($this, 'format_content'));

				array_push($content_blocks, $block_content);
			}
		}

		return $content_blocks;
	}

	private function format_content(&$item, $key) {
		$format_keys = array('text', 'intro', 'response');

		if (in_array($key, $format_keys)) {
			$item = apply_filters('the_content', $item);
		}
	}

	public function get_id_by_page_name($page_name) {
		$page_selector = 'route_' . $page_name;
		$page_id       = carbon_get_theme_option($page_selector);

		return $page_id;
	}

	/**
	 * Check if a given request has access to get items
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 *
	 * @return WP_Error|bool
	 */
	public function get_items_permissions_check($request) {
		return true;
	}

	/**
	 * Get the query params for collections
	 *
	 * @return array
	 */
	public function get_collection_params() {
		return array();
	}
}

$static_pages_route = new WP_REST_Page_Controller();