<?php

class Destination extends DataObject {

    private static $db = array (
        'Name' => 'Varchar',
        'StartTime' => 'Date',
        'EndTime' => 'Date',
        'Budget' => 'Currency',
        'Transportation' => 'Varchar',
        'ActivityDescription' => 'Varchar'
    );

    private static $has_one = array (
        'Trip' => 'Trip'
    );

    public function getCMSfields() {
        $fields = parent::getCMSFields();
	    // $fields->addFieldToTab('Root.Content',new CheckboxField('CustomProperty'));
	    return $fields;
    }

}