<?php
namespace App\Phpdtdemo;


class Confirm extends \Phpdt\Ldt\Actions
{


	function after_submit_form(){


			$items=$this->selectedItems();
			$affected=0;
			foreach ($items as $id){
				$affected+= \DB::table('mydemotable')
				               ->where('id', $id)
				               ->delete();
			}
			$this->print_message('the record has been deleted  successfully, '.$affected.' deleted rows ','success');
			$this->close(1000);

	}


	static function bulk_button()
	{
		return  '<span class="btn btn-danger">Bulk Delete</span>';
	}

	static function row_button()
	{
		return  '<span class="btn btn-danger">Delete</span>';
	}

	static function can_do($record){
		return true;
	}
}
