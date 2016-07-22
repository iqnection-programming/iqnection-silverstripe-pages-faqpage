<?php

class FAQItem extends DataObject
{
	private static $db = array( 
		"SortOrder" => "Int",
		"Question" => "Varchar(255)", 
		"Answer" => "HTMLText" 
	);
	
	private static $has_one = array(
		"FAQPage" => "FAQPage"
	); 
			
	private static $summary_fields = array(
		"Question" => "Question"
	);
	
	private static $default_sort = "SortOrder";
	
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->push( new HiddenField('SortOrder',null,$fields->dataFieldByName('SortOrder')->Value()) );
		$this->extend('updateCMSFields',$fields);
		return $fields;
	}
	
	public function canCreate($member = null)
	{
		return true;
	}
	public function canDelete($member = null)
	{
		return true;
	}
	public function canEdit($member = null)
	{
		return true;
	}
	public function canView($member = null)
	{
		return true;
	}
}

class FAQPage extends Page
{
	private static $has_many = array(
		"FAQItems" => "FAQItem"
	);
	
	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.FAQItems', new GridField(
			'FAQItems', 
			'FAQ Items', 
			$this->FAQItems(), 
			GridFieldConfig_RecordEditor::create()->addComponents(				
				new GridFieldSortableRows('SortOrder'),
				new GridFieldPaginator(99)
		)));
		$this->extend('updateCMSFields',$fields);
		return $fields;
	}
}

class FAQPage_Controller extends Page_Controller
{
	public function init()
	{
		parent::init();
	}
}
