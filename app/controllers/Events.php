<?php

class Events extends Controller
{

    public function __construct()
    {
        $this->eventModel = $this->model('Event');
        $this->userModel = $this->model('User');
        $this->attendesModel = $this->model('Attendees');
    }

    public function index()
    {
        $data = [];
        $this->view('petitions/eventList');
    }

    public function show($id)
    {
        $event = $this->eventModel->getEventById($id);
        $user = $this->userModel->getUserById($event->usr_id);
        $venue = str_replace(" ", "+", $event->venue);

        $data = [
            'event' => $event,
            'user' => $user,
            'venue' => $venue,
        ];
        if (empty($data['event'])) {
            redirect('pages/index');
        } else {
            // Load View
            $this->view('events/eventView', $data);

        }

    }
    public function new_event()
    {
        // Check if logged in
        if (!($this->isLoggedIn())) {
            flash('register_success', 'Login to make a event');
            redirect('users/login');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // PROCESS FORM
            // Sanitize POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'event_title' => trim($_POST['event_title']),
                'venue' => trim($_POST['venue']),
                'date' => trim($_POST['date']),
                'details' => trim($_POST['details']),
                'usr_id' => '',
                'venue_err' => '',
                'date_err' => '',
                'details_err' => '',
                'event_title_err' => '',
            ];

            // Validate title
            if (empty($data['event_title'])) {
                $data['event_title_err'] = 'Please enter a Title';
            }

            // Validate target_authority
            if (empty($data['venue'])) {
                $data['venue_err'] = 'Please enter an Venue';
            }

            // Validate target_date
            if (empty($data['date'])) {
                $data['date_err'] = 'Please enter a Targeted Date';
            }

            // Validate target_votes
            if (empty($data['details'])) {
                $data['details_err'] = 'Please enter Targeted Votes';
            }

            // Make sure errors are empty
            if (empty($data['event_title_err']) && empty($data['venue_err']) && empty($data['date_err']) && empty($data['details_err'])) {
                // SUCCESS - Proceed to insert
                $data['usr_id'] = $_SESSION['user_id'];
                // echo '<pre>';
                // print_r($data);
                // die();

                //Execute
                $exec = $this->eventModel->new_event($data);
                if ($exec) {
                    // Redirect to petition display

                    redirect('events/show/' . $exec);
                } else {
                    die('Something went wrong');
                }

            } else {

                // Load View
                $this->view('events/eventForm', $data);
            }

        } else {
            $data = [
                'event_title' => '',
                'venue' => '',
                'date' => '',
                'details' => '',
                'usr_id' => '',
                'venue_err' => '',
                'date_err' => '',
                'details_err' => '',
                'event_title_err' => '',
            ];

            $this->view('events/eventForm', $data);
        }

    }

    public function edit($id)
    {
        // Check if logged in
        if (!($this->isLoggedIn())) {
            redirect('pages/index');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // PROCESS FORM
            // Sanitize POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'event_title' => trim($_POST['event_title']),
                'venue' => trim($_POST['venue']),
                'date' => trim($_POST['date']),
                'details' => trim($_POST['details']),
                'usr_id' => '',
                'venue_err' => '',
                'date_err' => '',
                'details_err' => '',
                'event_title_err' => '',
            ];

            // Validate title
            if (empty($data['event_title'])) {
                $data['event_title_err'] = 'Please enter a Title';
            }

            // Validate target_authority
            if (empty($data['venue'])) {
                $data['venue_err'] = 'Please enter an Venue';
            }

            // Validate target_date
            if (empty($data['date'])) {
                $data['date_err'] = 'Please enter a Targeted Date';
            }

            // Validate target_votes
            if (empty($data['details'])) {
                $data['details_err'] = 'Please enter Targeted Votes';
            }

            // Make sure errors are empty
            if (empty($data['event_title_err']) && empty($data['venue_err']) && empty($data['date_err']) && empty($data['details_err'])) {
                // SUCCESS - Proceed to insert
                $data['usr_id'] = $_SESSION['user_id'];
                // echo '<pre>';
                // print_r($data);
                // die();
                // if($data['usr_id']) ==
                //Execute
                $exec = $this->eventModel->eventEdit($data);
                if ($exec) {
                    // Redirect to petition display

                    redirect('pages/show/' . $id);
                } else {
                    die('Something went wrong');
                }

            } else {

                // Load View
                $this->view('events/eventEdit', $data);
            }

        } else {
            $event = $this->eventModel->getEventById($id);
            if ($event->usr_id = $_SESSION['user_id']) {
                $data = [
                    'id' => $event->event_id,
                    'event_title' => $event->event_title,
                    'venue' => $event->venue,
                    'date' => $event->date,
                    'details' => $event->details,
                    'usr_id' => $event->usr_id,
                    'venue_err' => '',
                    'date_err' => '',
                    'details_err' => '',
                    'event_title_err' => '',
                ];
            }

            $this->view('events/eventEdit', $data);
        }

    }

   
    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
}
