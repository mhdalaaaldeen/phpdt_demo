<?php

namespace App\Phpdtdemo;


class Datatable extends \Phpdt\Ldt\Datatable
{
	const PRIMARY = 'id';

	static function from(){
		return 'mydemotable';
	}


	static function orderBy(){
		return [
			['id','desc']
		];
	}

	static function respond_filters_autocomplete_username($search){

		$records=\DB::table('mydemotable')->where('username', 'like', '%'.$search.'%')->get();
		$d=[];
		foreach ($records as $record){
			$d[$record->username]=$record->username;
		}
		return parent::respond_filters_tag($d);
	}

	static function respond_filters_tag_email($search){

		$records=\DB::table('mydemotable')->where('email', 'like', '%'.$search.'%')->get();
		$d=[];
		foreach ($records as $record){
			$d[$record->email]='<'.$record->email.'> ';
		}
		return parent::respond_filters_tag($d);
	}

	static function firstname($r)
	{
		return '<a href="#">'.$r->firstname.'</a>';
	}


}
