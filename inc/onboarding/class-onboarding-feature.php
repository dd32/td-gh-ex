<?php
/**
 * The file that describes the onboarding feature
 *
 * @package agncy
 */

/**
 * The class that describes the onboarding feature
 */
class AgncyOnboardingFeature {

	/**
	 * The title of this feature
	 *
	 * @var string
	 */
	private $title;

	/**
	 * The description of this feature
	 *
	 * @var string
	 */
	private $description;

	/**
	 * The tier required to access this feature
	 *
	 * @var string
	 */
	private $tier;

	/**
	 * An URL to an image to describe the feature
	 *
	 * @var string
	 */
	private $image;

	/**
	 * The link target for the button of this feature
	 *
	 * @var string
	 */
	private $link_target;

	/**
	 * The label for the link button
	 *
	 * @var string
	 */
	private $link_label;

	/**
	 * The priority of this feature. (Default 10, lower = more important)
	 *
	 * @var int
	 */
	private $priority;

	/**
	 * If the feature is live or coming soon
	 *
	 * @var bool
	 */
	private $coming_soon;

	/**
	 * The button constructor
	 *
	 * @param array $args The button arguments.
	 */
	public function __construct( $args ) {
			$args = wp_parse_args(
				$args,
				array(
					'title'       => '',
					'description' => '',
					'tier'        => 'free',
					'image'       => '',
					'link_target' => '',
					'link_label'  => '',
					'priority'    => 10,
					'coming_soon' => false,
				)
			);

			$this->set_title( $args['title'] );
			$this->set_description( $args['description'] );
			$this->set_tier( $args['tier'] );
			$this->set_image( $args['image'] );
			$this->set_link_target( $args['link_target'] );
			$this->set_link_label( $args['link_label'] );
			$this->set_priority( $args['priority'] );
			$this->set_coming_soon( $args['coming_soon'] );

	}

	/**
	 * Set the feature title
	 *
	 * @param string $title The feature title.
	 */
	public function set_title( $title ) {
		$this->title = $title;
	}

	/**
	 * Set the feature description
	 *
	 * @param string $description The feature description.
	 */
	public function set_description( $description ) {
		$this->description = $description;
	}

	/**
	 * Set the required tier
	 *
	 * @param string $tier The required tier (default: free).
	 */
	public function set_tier( $tier ) {
		$this->tier = $tier;
	}

	/**
	 * Set the image url
	 *
	 * @param string $image The image url.
	 */
	public function set_image( $image ) {
		$this->image = $image;
	}

	/**
	 * Set the link link_target
	 *
	 * @param string $link_target The link target.
	 */
	public function set_link_target( $link_target ) {
		$this->link_target = $link_target;
	}

	/**
	 * Set the link label
	 *
	 * @param string $link_label The link label.
	 */
	public function set_link_label( $link_label ) {
		$this->link_label = $link_label;
	}

	/**
	 * Set the feature priority
	 *
	 * @param int $priority The feature priority.
	 */
	public function set_priority( $priority ) {
		$this->priority = intval( $priority );
	}

	/**
	 * Set the feature priority
	 *
	 * @param bool $coming_soon The feature priority.
	 */
	public function set_coming_soon( $coming_soon ) {
		$this->coming_soon = (bool) $coming_soon;
	}

	/**
	 * Check if this feature is part of this tier
	 *
	 * @return boolean If this feature is active in this tier.
	 */
	private function is_active() {
		if ( 'free' === $this->tier ) {
			return true;
		} else {
			return agncy_fs()->is_premium() && agncy_fs()->is_plan( $this->tier );
		}
	}

	/**
	 * Render the feature markup
	 *
	 * @return string The feature markup
	 */
	public function render() {

		$feature_classes = array( 'the_feature' );

		if ( ! $this->is_active() ) {
			$feature_classes[] = 'is_not_active';
			$image_link        = admin_url( 'themes.php?page=agncy-welcome_page-pricing' );
		} else {
			$image_link = $this->link_target;
		}

		$feature_html  = '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 feature-wrapper">';
		$feature_html .= '<div class="' . implode( ' ', $feature_classes ) . '">';

		if ( ! $this->is_active() ) {
			// The feature tier badge.
			$feature_html .= '<span class="feature-tier ' . $this->tier . ' ">' . $this->tier . '</span>';
		}

		// The feature image.
		if ( $this->image ) {
			$feature_html .= '<div class="image">';
			$feature_html .= '<a href="' . $image_link . '">';
			$feature_html .= '<img class="screenshot" src="' . $this->image . '">';
			$feature_html .= '</a>';
			$feature_html .= '</div>';
		}

		// The feature title.
		$feature_html .= '<h3 class="feature_title">' . $this->title . '</h3>';

		// The feature description.
		$feature_html .= '<div class="feature_desc">' . apply_filters( 'the_content', $this->description ) . '</div>';

		// The feature button.
		if ( $this->coming_soon ) {
			$feature_html .= '<div class="feature_button">';
			$feature_html .= '<a class="btn tertiary soon" href="#soon">' . __( 'Coming Soon', 'agncy' ) . '</a>';
			$feature_html .= '</div>';
		} elseif ( $this->is_active() && $this->link_target && $this->link_label ) {
			$feature_html .= '<div class="feature_button">';
			$feature_html .= '<a class="btn primary" href="' . $this->link_target . '">' . $this->link_label . '</a>';

			$feature_html .= '</div>';
		} else {
			$feature_html .= '<div class="feature_button">';
			$feature_html .= '<a class="btn tertiary upgrade" href="' . admin_url( 'themes.php?page=agncy-welcome_page-pricing' ) . '">' . __( 'Upgrade now', 'agncy' ) . '</a>';
			$feature_html .= '</div>';
		}

		$feature_html .= '</div>';
		$feature_html .= '</div>';

		return $feature_html;
	}

}
