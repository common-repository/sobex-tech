<?php
class SobexTechAjaxFilterResponse {
	/**
	 * determine response success status
	 * @var boolean
	 */
	public $result = false;

	/**
	 * error message for description reason of failure
	 * @var string
	 */
	public $error_message = '';

	/**
	 * error code for reason of failure
	 * @var string
	 */
	public $error_code = 0;

	/**
	 * message for show to user after success of operation
	 * @var string
	 */
	public $success_message = '';

	/**
	 * user defined additional data and fields for response
	 * @var array
	 */
	public $data = [];

	/**
	 * @param string $name
	 * @param mixed $value
	 */
	public function addData( $name, $value ) {
		$this->data[ $name ] = $value;
	}

	/**
	 * @param null|boolean $status
	 * @param string $message
	 * @param int $error_code
	 */
	public function send( $status = null, $message = '', $error_code = 0 ) {
		// is status parameter set?
		if ( ! is_null( $status ) ) { // yes
			// set response status
			$response = [
				'result' => $status
			];

			// is status ok(true)?
			if ( $status ) { // yes
				// set response success message
				$response['success_message'] = $message;
			} else { // no
				// set response error message
				$response['error_message'] = $message;
				// set response error code
				$response['error_code'] = $error_code;
			}
		} else { // no
			// set response status
			$response = [
				'result' => $this->result,
			];

			// is status ok(true)?
			if ( $this->result ) {
				// set response success message
				$response['success_message'] = $this->success_message;
			} else {
				// set response error message
				$response['error_message'] = $this->error_message;
				// set response error code
				$response['error_code'] = $this->error_code;
			}
		}

		// add additional data to response
		foreach ( $this->data as $key => $value ) {
			$response[ $key ] = $value;
		}

		// set headers for output format to json
		header( 'Content-Type: application/json;charset=utf-8' );

		// send response to output in json format
		echo json_encode( $response, JSON_UNESCAPED_UNICODE );

		// exit from execution
		exit();
	}
}