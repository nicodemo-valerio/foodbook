<?php

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function view()
    {
        $this->load->helper('url');
        $data['title'] = 'Your profile';
        $this->load->view('templates/header', $data);
        $this->load->view('user/view', $data);
        $this->load->view('templates/footer', $data);
    }

    private function _update_session($user)
    {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['height'] = $user['height'];
        $_SESSION['weight'] = $user['weight'];
        $_SESSION['weight_goal'] = $user['weight_goal'];
        $_SESSION['max_weight'] = round(pow($_SESSION['height']/100, 2) * 22, 1);
        $_SESSION['bmi'] = round(($user['weight'] / (bcpow($user['height'] / 100,
                        2, 10))), 1);

        $_SESSION['max_kcal_male'] = round(pow($user['height'] / 100, 2) * 600);
        $_SESSION['max_kcal_female'] = round(pow($user['height'] / 100, 2) * 540);

        $_SESSION['days_to_bmi'] = round(($_SESSION['weight'] - $_SESSION['max_weight']) / 0.2);
        $_SESSION['date_of_bmi'] = $this->_add_days_to_date($_SESSION['days_to_bmi']);
        $_SESSION['days_to_goal'] = round(($user['weight'] - $user['weight_goal']) / 0.2);
        $_SESSION['date_of_goal'] = $this->_add_days_to_date($_SESSION['days_to_goal']);
    }

    private function _add_days_to_date($days)
    {
        $today = getdate();
        $date = date_create($today['year'] . '-' . $today['mon'] . '-' . $today['mday']);
        date_add($date, date_interval_create_from_date_string($days . " days"));
        return $date;
    }

    private function _unset_session()
    {
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['height']);
        unset($_SESSION['weight']);
        unset($_SESSION['weight_goal']);
        unset($_SESSION['bmi']);
        unset($_SESSION['max_weight']);
        unset($_SESSION['max_kcal_male']);
        unset($_SESSION['max_kcal_female']);
        unset($_SESSION['days_to_bmi']);
        unset($_SESSION['date_of_bmi']);
        unset($_SESSION['days_to_goal']);
        unset($_SESSION['date_of_goal']);
    }

    public function logout()
    {
        $this->load->helper('url');
        $this->_unset_session();
        $data['title'] = 'Sign in';
        $this->load->view('templates/header', $data);
        $this->load->view('user/view');
        $this->load->view('templates/footer');
    }

    public function sign_in()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email',
                'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password',
                'trim|required|alpha_numeric');
        $data['title'] = 'Sign in';
        $this->load->view('templates/header', $data);
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('user/sign_in', $data);
        }
        else
        {
            $user = $this->user_model->sign_in();
            if (isset($user))
            {
                $this->_update_session($user);
                $this->load->view('user/view');
            }
            else
            {
                $data['title'] = "Something's not right...";
                $data['error'] = "Ooops, you're email or password were wrong...";
                $this->load->view('user/error', $data);
            }
        }
        $this->load->view('templates/footer');
    }

    private function _set_rules()
    {
        $this->form_validation->set_rules('username', 'username',
                'trim|required|alpha_numeric');
        $this->form_validation->set_rules('password', 'password',
                'trim|required|alpha_numeric');
        $this->form_validation->set_rules('height', 'height',
                'trim|required|numeric');
        $this->form_validation->set_rules('weight', 'weight',
                'trim|required|numeric');
        $this->form_validation->set_rules('weight_goal', 'weight goal',
                'trim|numeric');
    }

    public function insert()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Sign up';
        //input field, name used in error message, rule
        $this->_set_rules();
        $this->form_validation->set_rules('email', 'email',
                'trim|required|valid_email|is_unique[user.email]');
        $this->load->view('templates/header', $data);
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('user/insert', $data);
        }
        else
        {
            $this->user_model->set_users();
            $this->load->view('user/success');
        }
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        //input field, name used in error message, rule
        $this->_set_rules();
        $this->form_validation->set_rules('email', 'email',
                'trim|required|valid_email');
        $data['user'] = $this->user_model->get_user($_SESSION['id']);
        $data['title'] = 'Edit ' . $data['user']['username'];
        $this->load->view('templates/header', $data);
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('user/edit');
        }
        else
        {
            $this->user_model->update_users($_SESSION['id']);
            $user = $this->user_model->get_user($_SESSION['id']);
            $this->_update_session($user);
            $this->load->view('user/view');
        }
        $this->load->view('templates/footer', $data);
    }

}
