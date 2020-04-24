<?php

namespace App\Phpdtdemo;

class Add extends \Phpdt\Ldt\InsertAction {

	var $formview = 'myform';

	const INSERT_MODE = TRUE;

	function after_submit_form() {

		if ( $this->request->email == '' ) {
			$this->errors[] = '* Email is required';
		}
		if ( $this->request->username == '' ) {
			$this->errors[] = '* Username is required';
		}
		if ( $this->request->firstname == '' ) {
			$this->errors[] = '* Firstname is required';
		}
		if ( $this->request->lastname == '' ) {
			$this->errors[] = '* Lastname is required';
		}

		if ( empty( $this->errors ) ) {

			\DB::table( 'mydemotable' )->insert( [
				'username'  => $this->request->username,
				'lastname'  => $this->request->lastname,
				'firstname' => $this->request->firstname,
				'email'     => $this->request->email,
			] );
			$this->print_message( 'Record Added Successfully', 'success' );
			$this->close( 1000 );
		}



	}
	static function add_button(){
		return '<span class="btn btn-info"> <i class="fa fa-plus"></i> Add</span>';
	}

	static function can_do( $record ) {
		return TRUE;
	}
}
