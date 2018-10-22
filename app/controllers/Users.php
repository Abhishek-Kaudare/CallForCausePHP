<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
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
                // echo '<pre>';
                // echo 'log';
                // print_r($loggedInUser);
                // die();

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
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'uname' => trim($_POST['uname']),
                'psw' => trim($_POST['psw']),
                'cpsw' => trim($_POST['cpsw']),
                'name_err' => '',
                'email_err' => '',
                'psw_err' => '',
                'cpsw_err' => '',
                'uname_err' => '',
                'bh' => '',
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
            // Validate username
            if (empty($data['uname'])) {
                $data['uname_err'] = 'Please enter a username';
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
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['psw_err']) && empty($data['cpsw_err']) && empty($data['uname_err'])) {
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

            $data = [
                'name' => '',
                'email' => '',
                'uname' => '',
                'psw' => '',
                'cpsw' => '',
                'name_err' => '',
                'uname_err' => '',
                'email_err' => '',
                'psw_err' => '',
                'cpsw_err' => '',
            ];

            // Load View
            $this->view('users/register', $data);
        }
    }

    // Create Session With User Info
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->usr_id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_uname'] = $user->uname;
        // print_r($_SESSION);die();


        redirect('pages/index');
    }

    // Logout & Destroy Session
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_uname']);

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
}
