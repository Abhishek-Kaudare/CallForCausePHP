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
        $url = "http://localhost/php_rest_one-master/api/post/initial_events.php";
        $pet_data = json_decode(file_get_contents($url), true);
        // echo '<pre>';
        // print_r($pet_data);
        // die();
        $events = "";

        for ($x = 1; $x < $pet_data['number']; $x++) {
            $event = $pet_data['data'];
            // card start
            $event_start = "<div class='blog-card'><div class='meta'>";
            // image
            $image = "<div class='photo' style='background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)'></div>";
            // author details
            $user = $this->userModel->getUserById($event[$x]['usr_id']);
            // date
            $date = $event[$x]['event_time'];
            // detail list start + end
            $details = "<ul class='details'><li class='author'><a href='#'>" . $user->name . "</a></li><li class='date'>" . $date . "</li></ul></div>";
            // title
            $title = "<div class='description'><h1>" . $event[$x]['title'] . "</h1>";
            // venue
            $venue = "<h2><strong>Venue: </strong> " . $event[$x]['venue'] . "</h2>";
            // description
            $description = substr($event[$x]['details'], 0, 175);
            $desc = "<p>" . $description . "...</p>";
            // Read more
            $link = "<p class='read-more'><a href='" . URLROOT . "/events/show/" . $event[$x]['id'] . "'>Read More</a></p>";
            // end
            $end = "</div></div>";
            $events .= $event_start . $image . $details . $title . $venue . $desc . $link . $end;
        };
        $this->view('events/eventList', $events);
    }

    public function account(){
        if (!($this->isLoggedIn())) {
            flash('register_success', 'Login to check account');
            redirect('users/login');
        }
        $url = "http://localhost/php_rest_one-master/api/post/initial_events.php";
        $pet_data = json_decode(file_get_contents($url), true);
        // echo '<pre>';
        // print_r($pet_data);
        // die();
        $events = "";
        

        for ($x = 1; $x < $pet_data['number']; $x++) {
            $event = $pet_data['data'];
            if($event[$x]['usr_id']==$_SESSION['user_id']){// card start
            $event_start = "<div class='blog-card'><div class='meta'>";
            // image
            $image = "<div class='photo' style='background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)'></div>";
            // author details
            $user = $this->userModel->getUserById($event[$x]['usr_id']);
            // date
            $date = $event[$x]['event_time'];
            // detail list start + end
            $details = "<ul class='details'><li class='author'><a href='#'>" . $user->name . "</a></li><li class='date'>" . $date . "</li></ul></div>";
            // title
            $title = "<div class='description'><h1>" . $event[$x]['title'] . "</h1>";
            // venue
            $venue = "<h2><strong>Venue: </strong> " . $event[$x]['venue'] . "</h2>";
            // description
            $description = substr($event[$x]['details'], 0, 175);
            $desc = "<p>" . $description . "...</p>";
            // Read more
            $link = "<p class='read-more'><a href='" . URLROOT . "/events/show/" . $event[$x]['id'] . "'>Read More</a></p>";
            // Edit
            $link2 = "<p class='read-more'><a style='color:blue;' href='" . URLROOT . "/events/edit/" . $event[$x]['id'] . "'>Edit</a></p>";
            // Edit
            $link3 = "<p class='read-more'><a style='color:red;' href='" . URLROOT . "/events/delete/" . $event[$x]['id'] . "'>Delete</a></p>";
            // end
            $end = "</div></div>";
            $events .= $event_start . $image . $details . $title . $venue . $desc . $link . $link2 . $link3 . $end;}
        };
        if(strlen($events) == 0){
            $events= "<h1>Create a new event-No event created</h1>";
        }
        $this->view('pages/account', $events);

    }

    public function delete($id){
        $this->eventModel->delete($id);
        $this->account();
    }   

    public function show($id)
    {
        $event = $this->eventModel->getEventById($id);
        $user = $this->userModel->getUserById($event->usr_id);
        $venue = str_replace(" ", "+", $event->venue);
        
        if($this->isLoggedIn()){
            $datas=[
            'id' => $id,
            'usr_id' => $_SESSION['user_id']
        ];
        if( $this->attendesModel->getAttendeeById($datas)){
            $res = true;
        }else{
            $res = false;
        }
        }else{
            $res = false;

        }
        
        $data = [
            'event' => $event,
            'user' => $user,
            'venue' => $venue,
            'res' => $res
        ];
        echo '<pre>';
        print_r($data);
        die();
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

    public function attend()
    {
        if (is_ajax()) {
            if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
                $action = $_POST["action"];
                switch ($action) { //Switch case for value of action
                    case "register":$this->register();
                        break;
                }
            }
        }

    }
    //Function to check if the request is an AJAX request
    public function is_ajax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    public function register($id)
    {
       // Check if logged in
        if (!($this->isLoggedIn())) {
            flash('register_success', 'Login to register');
            redirect('users/login');
        }
        
        $event = $this->eventModel->getEventById($id);

        $data=[
            'id' => $id,
            'total_registered' => $event->total_registered + 1,
            'usr_id' => $_SESSION['user_id']
        ];
        if( !$this->attendesModel->getAttendeeById($data)){
            $x=$this->eventModel->register($data);
            $y=$this->attendesModel->attend($data);
            $this->show($id);
        }
        $this->show($id);

        
        

        
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
