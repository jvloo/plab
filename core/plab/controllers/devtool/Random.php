<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Random extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Return Unused ID
	 *
	 * @method unused_id
	 * @param  [type]    $column [description]
	 * @param  [type]    $table  [description]
	 * @return [type]    [description]
	 */
	public function unused_id($column = '', $table = '')
	{
		$min = 1000;
		$max = 4294967295;

		$random_unique_int = mt_rand($min, $max);

		// Make sure the random user_id isn't already in use
		/*$query = $this->db->where($column, $random_unique_int);
		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			$query->free_result();

			// If the random user_id is already in use, try again
			return $this->unused_id($column, $table);
		}*/

		$this->load->library('encryption', [
			'cipher' => 'des'
		]);
		echo $this->encryption->encrypt(1);

	}

}
