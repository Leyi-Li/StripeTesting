<?php

class DestinationFormPage_Controller extends Page_Controller {
    private static $allowed_actions = [
        'DestinationForm',
        'handleDestination'
    ];

    public function DestinationForm() {
        $transportations = ['Walk', 'Bike', 'Car', 'Train', 'Bus', 'Boat', 'Subway', 'Plane'];

        $form = Form::create(
            $this,
            __FUNCTION__,
            FieldList::create(
                TextField::create('Name', '')
                    ->setAttribute('Placeholder', 'Name*'),
                DateField::create('StartTime', '')
                    ->setAttribute('Placeholder', 'Start Time*'),
                DateField::create('EndTime', '')
                    ->setAttribute('Placeholder', 'End Time*'),
                CurrencyField::create('Budget', '')
                    ->setAttribute('Placeholder', 'Budget'),
                DropdownField::create('Transportations','Transportations')
                    ->setEmptyString('--any--')                   
                    ->setSource($transportations),
                TextareaField::create('ActivityDescription', '')
                    ->setAttribute('Placeholder', 'Activity Description*')
            ),
            FieldList::create(
                FormAction::create('handleDestination','Post Destination')
            )
        );
        return $form;
    }

    /**
     * @param Form $form 
     */
    public function handleDestination($data, $form){
        $destination = $Destination::create();
        // $destination->Name = $data['Name'];
        // $destination->StartTime = $data['StartTime'];
        // $destination->EndTime = $data['EndTime'];
        // $destination->Budget = $data['Budget'];
        // $destination->Transportations = $data['Transportations'];
        // $destination->ActivityDescription = $data['ActivityDescription'];
        $form->saveInto($destination);
        $form->sessionMessage('New Destination Created', 'good');

        return $this->redirectBack();
    }
}