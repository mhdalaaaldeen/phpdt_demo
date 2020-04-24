<?php
namespace App\Phpdtdemo;


class Edit extends \Phpdt\Ldt\Actions
{

	var $formview = 'myform';

	function initialize_form(){

		$items=$this->selectedItems();
		$this->initial_data=new \stdClass();
		if(count($items)==1)
		{

			$id=$items[0];
			$user = \DB::select('select * from mydemotable where id = ?', [$id])[0];
			$this->initial_data->username=(isset($this->request->username)) ? $this->request->username : $user->username;
			$this->initial_data->email=(isset($this->request->email)) ? $this->request->email : $user->email;
			$this->initial_data->firstname=(isset($this->request->firstname)) ? $this->request->firstname : $user->firstname;
			$this->initial_data->lastname=(isset($this->request->lastname)) ? $this->request->lastname : $user->lastname;

		}else{
			$this->initial_data->username='';
			$this->initial_data->email='';
			$this->initial_data->firstname='';
			$this->initial_data->lastname='';
		}
	}

	function after_submit_form(){

		$this->initial_data=new \stdClass();

		$this->initial_data->username=$this->request->username ;
		$this->initial_data->email=$this->request->email;
		$this->initial_data->firstname=$this->request->firstname;
		$this->initial_data->lastname=$this->request->lastname;

		if ($this->request->email=='')
		{
			$this->errors[]='* Email is required';

		}
		if ($this->request->username=='')
		{
			$this->errors[]='* Username is required';
		}
		if ($this->request->firstname=='')
		{
			$this->errors[]='* Firstname is required';
		}
		if ($this->request->lastname=='')
		{
			$this->errors[]='* Lastname is required';
		}

		if(empty($this->errors)){
			$items=$this->selectedItems();
			$affected=0;
			foreach ($items as $id){
				$affected+= \DB::table('mydemotable')
				               ->where('id', $id)
				               ->update([
					               'firstname' => $this->request->firstname,
					               'lastname' => $this->request->lastname,
					               'email' => $this->request->email,
					               'username' => $this->request->username
				               ]);
			}
			$this->print_message('The editing was successful, '.$affected.' affected rows ','success');
			$this->close(2000);
		}
	}



	static function bulk_button()
	{
		return  '<span class="btn btn-warning">Bulk Edit</span>';
	}

	static function row_button()
	{
		return  '<span class="btn btn-warning">Edit</span>';
	}

	static function can_do($record){
		return true;
	}
}
