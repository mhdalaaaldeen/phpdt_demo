<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Demo extends Controller {

	//

	function demo(Request $request) {

		$dt = new \App\Phpdtdemo\Datatable( //Columns
		[
			'id' => 'ID',
			'username' => 'Username',
			'email' => 'Email',
			'firstname' => 'Firstname',
			'lastname'  => 'Lastname',
		] );


		$dt->set_checkbox(true);

		$dt->addfilter('username','text','Username','like');
		$dt->addfilter('username','autocomplete','Username','like');
		$dt->addfilter('email','tag','Email','in');


		$dt->addaction(['name'=>'Add','class'=>'\App\Phpdtdemo\Add']);
		$dt->addaction(['name'=>'Edit','class'=>'\App\Phpdtdemo\Edit']);
		$dt->addaction(['name'=>'Confirm','class'=>'\App\Phpdtdemo\Confirm']);
		$dt->addaction(['name'=>'Mylinkaction','class'=>'\App\Phpdtdemo\Link']);

        return $dt->display( 'myblade', $request );



	}
}
