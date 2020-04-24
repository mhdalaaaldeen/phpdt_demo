<?php
namespace App\Phpdtdemo;


class Link extends \Phpdt\Ldt\Actions
{
	static function row_link($id,$actionclass)
	{
		return  ' <a target="_blank" href="#Alaa" class="btn btn-success">Link</a> ';
	}
	static function can_do($record){
		return true;
	}
}
