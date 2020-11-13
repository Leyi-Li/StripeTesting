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
        'Trip' => 'Trip',
        'DestinationFormPage' => 'DestinationFormPage'
    );

    public function getCMSfields() {
        $fields = parent::getCMSFields();
	    // $fields->addFieldToTab('Root.Content',new CheckboxField('CustomProperty'));
	    return $fields;
    }

    public function getEditUrl() {
        return '/new-destination/?destinationID='.$this->ID;
    }

}