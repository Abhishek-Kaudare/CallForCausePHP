<?php

class Events extends Controller
{

    public function __construct()
    {
        $this->eventModel = $this->model('Event');
        $this->userModel = $this->model('User');
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

        $data = [
            'event' => $event,
            'user' => $user,
        ];
        if (empty($data['event'])) {
            redirect('pages/index');
        } else {
          echo '<pre>';
          print_r($data);
          die();
            // Load View
            $this->view('events/eventView', $data);

        }

    }
    public function new_event()
    {
        // Check if logged in
        // if (!($this->isLoggedIn())) {
        //     redirect('pages/index');
        // }

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
            if (empty($data['event_title_err']) && empty($data['venue_err']) && empty($data['date_err']) && empty($data['details_err']) ) {
                // SUCCESS - Proceed to insert
                $data['usr_id'] = $_SESSION['user_id'];
                // echo '<pre>';
                // print_r($data);
                // die();

                //Execute
                $exec = $this->petitionModel->new_petition($data);
                if ($exec) {
                    // Redirect to petition display
                    echo '<pre>';
                    print_r($exec);
                    die();
                    redirect('pages/index');
                } else {
                    die('Something went wrong');
                }

            } else {

                // Load View
                $this->view('petitions/petitionForm', $data);
            }

        } else {
            $data = [
                'title' => '',
                'target_authority' => '',
                'target_date' => '',
                'target_votes' => '',
                'description' => '',
                'category_id' => '',
                'images' => '',
                'youtube_url' => '',
                'usr_id' => '',
                'title_err' => '',
                'target_authority_err' => '',
                'target_date_err' => '',
                'target_votes_err' => '',
                'description_err' => '',
                'category_id_err' => '',
                'images_err' => '',
                'youtube_url_err' => '',
                'dropdown' => '',
            ];

            $categories = $this->categoryModel->getCategories();

            $categories_dropdown = "<option value='' selected disabled>Select</option>";
            foreach ($categories as $cat) {
                $categories_dropdown .= "<option value='" . $cat->category_id . "'>" . $cat->title . "</option>";
            }
            // echo '<pre>';
            // print_r($categories_dropdown);
            // die();
            $data['dropdown'] = $categories_dropdown;

            $this->view('petitions/petitionForm', $data);
        }

    }

    public function uploadImage($image)
    {

        if (isset($image) && $image["error"] == 0) {
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $image["name"];
            $filetype = $image["type"];
            $filesize = $image["size"];

            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed)) {
                return false;
            }
            $filename = substr(sha1(mt_rand()), 9, 19) . '.' . $ext;

            // Verify file size - 5MB maximum
            $maxsize = 5 * 1024 * 1024;
            if ($filesize > $maxsize) {
                return false;
            }

            // Verify MYME type of the file
            if (in_array($filetype, $allowed)) {

                move_uploaded_file($image["tmp_name"], "app/storage/images/" . $filename);
                return $filename;

            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function get_youtube_video_id($video_id)
    {

        // Did we get a URL?
        if (false !== filter_var($video_id, FILTER_VALIDATE_URL)) {

            // http://www.youtube.com/v/abcxyz123
            if (false !== strpos($video_id, '/v/')) {
                list(, $video_id) = explode('/v/', $video_id);
            }

            // http://www.youtube.com/watch?v=abcxyz123
            else {
                $video_query = parse_url($video_id, PHP_URL_QUERY);
                parse_str($video_query, $video_params);
                $video_id = $video_params['v'];
            }

        }

        return $video_id;

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
