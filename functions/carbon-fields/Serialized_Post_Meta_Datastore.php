<?php

use Carbon_Fields\Field\Field;
use Carbon_Fields\Datastore\Datastore;

/**
 * Stores serialized values in the database
 */
class Serialized_Post_Meta_Datastore extends Datastore {

	/**
	 * Initialization tasks for concrete datastores.
	 **/
	public function init() {

	}

	protected function get_key_for_field( Field $field ) {
		$key = '_' . $field->get_base_name();
		return $key;
	}

	/**
	 * Load the field value(s)
	 *
	 * @param Field $field The field to load value(s) in.
	 * @return array
	 */
	public function load( Field $field ) {
		$key = $this->get_key_for_field( $field );
		$value = get_post_meta( $this->get_object_id(), $key, true );

		if (!$value) {
			return null;
		}
		return $value;
	}

	/**
	 * Save the field value(s)
	 *
	 * @param Field $field The field to save.
	 */
	public function save( Field $field ) {
		if ( ! empty( $field->get_hierarchy() ) ) {
			return; // only applicable to root fields
		}
		$key = $this->get_key_for_field( $field );
		$value = $field->get_full_value();
		if ( is_a( $field, '\\Carbon_Fields\\Field\\Complex_Field' ) ) {
			$value = $field->get_value_tree();
		}

		if ( ! add_post_meta( $this->get_object_id(), $key, $value, TRUE ) ) {
			update_post_meta( $this->get_object_id(), $key, $value );
		}
	}

	/**
	 * Delete the field value(s)
	 *
	 * @param Field $field The field to delete.
	 */
	public function delete( Field $field ) {
		if ( ! empty( $field->get_hierarchy() ) ) {
			return; // only applicable to root fields
		}
		$key = $this->get_key_for_field( $field );
		delete_post_meta( $this->get_object_id(), $key );
	}
}