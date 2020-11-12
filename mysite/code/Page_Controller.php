<?php

class Page_Controller extends ContentController
{
    /**
     * An array of actions that can be accessed via a request. Each array element should be an action name, and the
     * permissions or conditions required to allow the user to access it.
     *
     * <code>
     * array (
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
     * );
     * </code>
     *
     * @var array
     */
    private static $allowed_actions = array(
    );

    public function init()
    {
        parent::init();
        // You can include any CSS or JS required by your project here.
        // See: http://doc.silverstripe.org/framework/en/reference/requirements
    }

    public function trips(){
        return Trip::get();
    }

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

    public function handleDestination($data, $form){
        $destination = $Destination::create();
        $destination->Name = $data['Name'];
        $destination->StartTime = $data['StartTime'];
        $destination->EndTime = $data['EndTime'];
        $destination->Budget = $data['Budget'];
        $destination->Transportations = $data['Transportations'];
        $destination->ActivityDescription = $data['ActivityDescription'];

        $form->sessionMessage('New Destination Created', 'good');

        return $this->redirectBack();
    }


}

