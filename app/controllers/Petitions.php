<?php

class Petitions extends Controller
{

    public function __construct()
    {
        $this->categoryModel = $this->model('Category');
        $this->petitionModel = $this->model('Petition');
        $this->userModel = $this->model('User');

    }
    public function index()
    {
        $url = "http://localhost/php_rest_one-master/api/post/initial_petitions.php";
        $data = json_decode(file_get_contents($url), true);

        $this->view('petitions/petitionList');
    }

    public function show($id)
    {
        $petition = $this->petitionModel->getPetitionById($id);
        $category = $this->categoryModel->getCategoryById($petition->category_id);
        $user = $this->userModel->getUserById($petition->usr_id);
        $video = $this->get_youtube_video_id($petition->youtube_url);
        $petition->youtube_url = $video;

        $data = [
            'petition' => $petition,
            'category' => $category,
            'user' => $user,
        ];

        // Load View
        $this->view('petitions/petitionView', $data);

    }
    public function new_petition()
    {
        // Check if logged in
        if (!($this->isLoggedIn())) {
            flash('register_success', 'Login to make a petition');
            redirect('users/login');

        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // PROCESS FORM
            // Sanitize POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // echo '<pre>';
            // print_r($_POST);
            // print_r($_FILES);
            // die();
            $data = [
                'title' => trim($_POST['title']),
                'target_authority' => trim($_POST['target_authority']),
                'target_date' => trim($_POST['target_date']),
                'target_votes' => trim($_POST['target_votes']),
                'description' => trim($_POST['description']),
                'category_id' => trim($_POST['category_id']),
                'images' => '',
                'youtube_url' => trim($_POST['youtube_url']),
                'usr_id' => '',
                'title_err' => '',
                'target_authority_err' => '',
                'target_date_err' => '',
                'target_votes_err' => '',
                'description_err' => '',
                'category_id_err' => '',
                'images_err' => '',
                'youtube_url_err' => '',
            ];

            // Validate title
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter a Title';
            }

            // Validate target_authority
            if (empty($data['target_authority'])) {
                $data['target_authority_err'] = 'Please enter an Targeted Authority';
            }

            // Validate target_date
            if (empty($data['target_date'])) {
                $data['target_date_err'] = 'Please enter a Targeted Date';
            }

            // Validate target_votes
            if (empty($data['target_votes'])) {
                $data['target_votes_err'] = 'Please enter Targeted Votes';
            }

            // Validate description
            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter a Description';
            }

            // Validate category_id
            if (empty($data['category_id'])) {
                $data['category_id_err'] = 'Please select a Category';
            }

            // echo '<pre>';
            // print_r($_FILES['images']);
            // die();

            $result = $this->uploadImage();
            $data['images'] = $result['images'];
            $categories = $this->categoryModel->getCategories();

            if (empty($data['category_id_err'])) {
                $categories_dropdown = "<option value='' selected disabled>Select</option>";
            } else {
                $categories_dropdown = "<option value='' disabled>Select</option>";
            }

            $categories_dropdown = "<option value='' selected disabled>Select</option>";
            foreach ($categories as $cat) {
                if ($cat->category_id == $data['category_id']) {
                    $selected = " selected";
                } else {
                    $selected = "";
                }

                $categories_dropdown .= "<option value='" . $cat->category_id . "'" . $selected . ">" . $cat->title . "</option>";
            }

            $data['dropdown'] = $categories_dropdown;

            // Make sure errors are empty
            if (empty($data['title_err']) && empty($data['target_authority_err']) && empty($data['target_date_err']) && empty($data['target_votes_err']) && empty($data['description_err']) && empty($data['images_err']) && empty($data['youtube_url_err'])) {
                // SUCCESS - Proceed to insert
                $data['usr_id'] = $_SESSION['user_id'];
                // echo '<pre>';
                // print_r($data);
                // die();

                //Execute
                $exec = $this->petitionModel->new_petition($data);
                if ($exec) {
                    // Redirect to petition display
                    // echo '<pre>';
                    // print_r($exec);
                    // die();
                    redirect('petitions/show/' . $exec);
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

    public function uploadImage()
    {
        // File upload configuration
        $targetDir = "C:/xampp/htdocs/CallForCause/public/storage/images/";
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        $data = [
            'images_err' => '',
            'images' => '',
        ];

        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
        if (!empty(array_filter($_FILES['images']['name']))) {
            foreach ($_FILES['images']['name'] as $key => $val) {
                // File upload path
                $fileName = basename($_FILES['images']['name'][$key]);

                $targetFilePath = $targetDir . $fileName;

                // Check whether file type is valid
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                $newFileName = substr(sha1(mt_rand()), 9, 19) . '.' . $fileType;
                $targetFilePath = $targetDir . $newFileName;
                $data['images'] = $newFileName;
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES['images']["tmp_name"][$key], $targetFilePath)) {
                        // Image db insert sql
                        $insertValuesSQL .= "('" . $fileName . "', NOW()),";
                    } else {
                        $statusMsg .= $_FILES['images']['name'][$key] . ', ';
                    }
                } else {
                    $statusMsg .= $_FILES['images']['name'][$key] . ', ';
                }
            }

        }
        $data['images_err'] = $statusMsg;
        return $data;
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
