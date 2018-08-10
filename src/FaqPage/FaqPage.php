<?php

namespace IQnection\FaqPage;

use SilverStripe\Forms;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class FaqPage extends \Page
{
	private static $table_name = 'FaqPage';
	
	private static $has_many = array(
		"FaqItems" => Model\FaqItem::class
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


