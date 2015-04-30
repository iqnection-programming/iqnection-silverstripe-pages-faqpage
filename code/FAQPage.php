<?
	class FAQItem extends DataObject
	{
		private static $db = array( 
			"SortOrder" => "Int",
			"Question" => "Varchar(255)", 
			"Answer" => "HTMLText" 
		);
		
		private static $default_sort = "SortOrder";
		
		private static $has_one = array(
			"FAQPage" => "FAQPage"
		); 		
		
        public function getCMSFields()
        {
			return new FieldList(
				new TextField("Question", "Question:"),
				new HTMLEditorField("Answer", "Answer:")
			);
        }
		
		private static $summary_fields = array(
			"Question" => "Question"
		);
		
	}
	
	class FAQPage extends Page
	{
		
		private static $has_many = array(
			"FAQItems" => "FAQItem"
		);
		
		public function getCMSFields()
		{
			$fields = parent::getCMSFields();
			$faqs_config = GridFieldConfig::create()->addComponents(				
				new GridFieldSortableRows('SortOrder'),
				new GridFieldToolbarHeader(),
				new GridFieldAddNewButton('toolbar-header-right'),
				new GridFieldSortableHeader(),
				new GridFieldDataColumns(),
				new GridFieldPaginator(10),
				new GridFieldEditButton(),
				new GridFieldDeleteAction(),
				new GridFieldDetailForm()				
			);
			$fields->addFieldToTab('Root.Content.FAQItems', new GridField('FAQItems','FAQ Items',$this->FAQItems(),$faqs_config));
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