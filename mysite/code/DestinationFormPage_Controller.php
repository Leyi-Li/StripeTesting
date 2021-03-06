<?php

class DestinationFormPage_Controller extends Page_Controller {
    private static $allowed_actions = [
        'DestinationForm',
        'handleDestination'
    ];

    public function DestinationForm() {
        $transportations = ['Walk', 'Bike', 'Car', 'Train', 'Bus', 'Boat', 'Subway', 'Plane'];
        $destinationID = $this->request->getVar('destinationID');
        
        $form = Form::create(
            $this,
            __FUNCTION__,
            FieldList::create(
                TextField::create('Name', '')
                    ->setAttribute('Placeholder', 'Name*'),
                DateField::create('StartTime', '')
                    ->setAttribute('Placeholder', 'Start Time*')
                    ->setConfig('showcalendar', true),
                DateField::create('EndTime', '')
                    ->setAttribute('Placeholder', 'End Time*')
                    ->setConfig('showcalendar', true),
                CurrencyField::create('Budget', '')
                    ->setAttribute('Placeholder', 'Budget'),
                DropdownField::create('Transportations','Transportations')
                    ->setEmptyString('--any--')                   
                    ->setSource($transportations),
                TextareaField::create('ActivityDescription', '')
                    ->setAttribute('Placeholder', 'Activity Description*'),
                DropdownField::create('TripID','Trip',[], $this->request->getVar('tripID'))
                    ->setEmptyString('--any--')                   
                    ->setSource(Trip::get()->map()),
                HiddenField::create('DestinationID', 'DestinationID', $destinationID)

            ),
            FieldList::create(
                FormAction::create('handleDestination','Submit'),
                FormAction::create('handleDelete','Delete')
            ),
            RequiredFields::create('Name', 'StartTime', 'EndTime')
        );

        if($destinationID > 0){
            $form->loadDataFrom(Destination::get()->byID($destinationID)); 
        }

        return $form;
    }

    /**
     * @param Form $form 
     */
    public function handleDestination($data, $form){
        if($data['DestinationID']){
            $destination = Destination::get()->byID($data['DestinationID']);
            $form->sessionMessage('Destination Changes Saved', 'good');
        }else{
            $destination = Destination::create();
            $form->sessionMessage('New Destination Created', 'good');
        }
        $form->saveInto($destination);
        $destination->write();

        return $this->redirectBack();
    }

    public function handleDelete($data, $form){
        if($data['DestinationID']){
            $destination = Destination::get()->byID($data['DestinationID']);
            $destination->delete();
            $form->sessionMessage('Destination Deleted', 'good');
        }else{
            return $this->redirectBack();
        }
        return $this->redirect('/');
    }
}