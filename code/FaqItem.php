<?php

use SilverStripe\ORM;
use SilverStripe\Forms;

class FaqItem extends ORM\DataObject
{
	private static $db = array( 
		"SortOrder" => "Int",
		"Question" => "Varchar(255)", 
		"Answer" => "HTMLText" 
	);
	
	private static $has_one = array(
		"FaqPage" => "FaqPage"
	); 
			
	private static $summary_fields = array(
		"Question" => "Question"
	);
	
	private static $default_sort = "SortOrder";
	
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->push( Forms\HiddenField::create('SortOrder',null,$fields->dataFieldByName('SortOrder')->Value()) );
		$this->extend('updateCMSFields',$fields);
		return $fields;
	}
	
	public function canCreate($member = null,$context=array()) { return true; }
	public function canDelete($member = null,$context=array()) { return true; }
	public function canEdit($member = null,$context=array()) { return true; }
	public function canView($member = null,$context=array()) { return true; }
}