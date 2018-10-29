<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        // session_start();

        //Include Google client library
        require_once '../../social_login/src/Google_Client.php';
        require_once '../../social_login/src/contrib/Google_Oauth2Service.php';

        /*
         * Configuration and setup Google API
         */
        $this->clientId = '408210557250-4gogk0tiekrtnj279katnac9sl9c7j5a.apps.googleusercontent.com'; //Google client ID
        $this->clientSecret = 'GKlhaWwbtp8wW5x1bBYK5i6J'; //Google client secret
        $this->redirectURL = 'http://localhost/CallForCause/users/google_auth'; //Callback URL

        //Call Google API
        $this->gClient = new Google_Client();
        $this->gClient->setApplicationName('CallForCause');
        $this->gClient->setClientId($this->clientId);
        $this->gClient->setClientSecret($this->clientSecret);
        $this->gClient->setRedirectUri($this->redirectURL);

        $this->google_oauthV2 = new Google_Oauth2Service($this->gClient);

    }

    public function login()
    {
        // Check if logged in
        if ($this->isLoggedIn()) {
            redirect('pages/index');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // PROCESS FORM
            // Sanitize POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'psw' => trim($_POST['psw']),
                'email_err' => '',
                'psw_err' => '',
                'bh' => '',
            ];
            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            }
            // Validate password
            if (empty($data['psw'])) {
                $data['psw_err'] = 'Please enter a password.';
            }
            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['psw_err'])) {
                // SUCCESS - Proceed to insert

                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['psw']);

                if ($loggedInUser) {
                    // User Authenticated!
                    $this->createUserSession($loggedInUser);

                } else {
                    $data['psw_err'] = 'Password incorrect.';
                    $data['bh'] = true; // Changing Box Height

                    // Load View
                    $this->view('users/login', $data);
                }

            } else {
                $data['bh'] = true; // Changing Box Height
                // Load View
                $this->view('users/login', $data);
            }

        } else {
            // INIT DATA

            $data = [
                'email' => '',
                'psw' => '',
                'email_err' => '',
                'psw_err' => '',
            ];

            // Load View
            $this->view('users/login', $data);
        }
    }

    public function signup()
    {
        // Check if logged in
        if ($this->isLoggedIn()) {
            redirect('pages/index');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // PROCESS FORM
            // Sanitize POST
            $authUrl = $this->gClient->createAuthUrl();
            $google = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '">';

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'psw' => trim($_POST['psw']),
                'cpsw' => trim($_POST['cpsw']),
                'name_err' => '',
                'email_err' => '',
                'psw_err' => '',
                'cpsw_err' => '',
                'bh' => '',
                'google' => $google,
            ];
            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            } else {
                // Check Email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken.';
                }
            }
            // Validate name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter a name';
            }

            // Validate password
            if (empty($data['psw'])) {
                $data['psw_err'] = 'Please enter a password.';
            } elseif (strlen($data['psw']) < 6) {
                $data['psw_err'] = 'Password must have atleast 6 characters.';
            }

            // Validate confirm password
            if (empty($data['cpsw'])) {
                $data['cpsw_err'] = 'Please confirm password.';
            } else {
                if ($data['psw'] != $data['cpsw']) {
                    $data['cpsw_err'] = 'Password do not match.';
                }
            }

            // Make sure errors are empty
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['psw_err']) && empty($data['cpsw_err'])) {
                // SUCCESS - Proceed to insert

                // Hash Password
                $data['psw'] = password_hash($data['psw'], PASSWORD_DEFAULT);

                //Execute
                if ($this->userModel->register($data)) {
                    // Redirect to login
                    flash('register_success', 'You are now registered and can log in');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }

            } else {
                $data['bh'] = true; // Changing Box Height
                // Load View
                $this->view('users/register', $data);
            }

        } else {
            // INIT DATA

            $authUrl = $this->gClient->createAuthUrl();
            $google = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '">';

            $data = [
                'name' => '',
                'email' => '',
                'psw' => '',
                'cpsw' => '',
                'name_err' => '',
                'email_err' => '',
                'psw_err' => '',
                'cpsw_err' => '',
                'google' => $google,
            ];

            // Load View
            $this->view('users/register', $data);
        }
    }

    public function google_auth()
    {
        if (isset($_GET['code'])) {
            $this->gClient->authenticate($_GET['code']);
            $_SESSION['token'] = $this->gClient->getAccessToken();
            header('Location: ' . filter_var($this->redirectURL, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['token'])) {
            $this->gClient->setAccessToken($_SESSION['token']);
        }

        if ($this->gClient->getAccessToken()) {
            //Get user profile data from google
            $gpUserProfile = $this->google_oauthV2->userinfo->get();

            //Insert or update user data to the database
            $gpUserData = array(
                'oauth_provider' => 'google',
                'oauth_uid' => $gpUserProfile['id'],
                'name' => $gpUserProfile['name'],
                'email' => $gpUserProfile['email'],
                'picture' => $gpUserProfile['picture'],
            );
            $result = $this->userModel->checkUser($gpUserData);
            if ($result) {
                $this->createUserSession($result);
            } else {
                die('Something went wrong');
            }
            echo '<pre>';
            print_r($_SESSION);
            print_r($gpUserData);
            print_r($gpUserProfile);
            die();

        }

    }

    // Create Session With User Info
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->usr_id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        // print_r($_SESSION);die();

        redirect('pages/index');
    }

    // Logout & Destroy Session
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);

        session_destroy();
        redirect('users/login');
    }

    // Check Logged In
    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    // encode url
    public function myUrlEncode($string)
    {
        $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
        $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
        return str_replace($entities, $replacements, urlencode($string));
    }

}
