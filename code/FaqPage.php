<?php

use SilverStripe\Forms;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class FaqPage extends Page
{
	private static $has_many = array(
		"FaqItems" => "FaqItem"
	);
	
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.FaqItems', Forms\GridField\GridField::create(
			'FaqItems', 
			'FAQ Items', 
			$this->FaqItems(), 
			$config = Forms\Gridfield\GridFieldConfig_RecordEditor::create(99)->addComponents(				
				new GridFieldSortableRows('SortOrder')
		)));
		$this->extend('updateCMSFields',$fields);
		return $fields;
	}
}


