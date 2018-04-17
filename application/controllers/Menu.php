<?php

class Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');
        $data['title'] = 'Your menus';
        if (isset($_SESSION['id']))
        {
            $data['menus'] = $this->menu_model->get_menus($_SESSION['id']);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($menu_id)
    {
        $this->load->helper('url');
        $data['title'] = 'Menu of the day';
        if (isset($menu_id) && isset($_SESSION['id']))
        {
            $data['selected_menu'] = $this->menu_model->get_menus($_SESSION['id'],
                    $menu_id);
            $data['totals'] = $this->menu_model->get_totals($_SESSION['id'],
                    $menu_id);
        }
        if (isset($data['selected_menu'][0]['menu']))
        {
            $data['title'] = $data['selected_menu'][0]['menu'];
        }
        $this->load->view('templates/header', $data);
        $this->load->view('menu/view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function insert()
    {
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->_set_rules();
        $data['title'] = 'New menu of the day';
        //add logic for current user id
        $data['meals'] = $this->menu_model->get_meals($_SESSION['id']);
        $this->load->view('templates/header', $data);
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('menu/insert', $data);
        }
        else
        {
            $data['id'] = $this->menu_model->set_menus();
            $this->load->view('menu/success', $data);
        }
        $this->load->view('templates/footer');
    }

    public function edit($menu_id)
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->_set_rules();
        $data['menu'] = $this->menu_model->get_menus($_SESSION['id'], $menu_id);
        $data['title'] = $data['menu'][0]['menu'];
        //add logic for current user id
        $data['meals'] = $this->menu_model->get_meals($_SESSION['id']);
        $this->load->view('templates/header', $data);
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('menu/edit', $data);
        }
        else
        {
            $this->menu_model->update($menu_id);
            $data['id'] = $menu_id;
            $this->load->view('menu/success', $data);
        }
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->load->helper('url');
        $this->menu_model->delete($id);
        $data['title'] = 'Menus';
        if (isset($_SESSION['id']))
        {
            $data['menus'] = $this->menu_model->get_menus($_SESSION['id']);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer', $data);
    }

    private function _set_rules($is_edit = FALSE)
    {
        $this->form_validation->set_rules('name', 'Name',
                'trim|required|regex_match[/^[A-Za-z0-9]*[ \t\r\n\v\f]*[,.:;]*/]');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('description', 'Description',
                'trim|regex_match[/^[A-Za-z0-9]*[ \t\r\n\v\f]*[,.:;]*/]');
        $this->form_validation->set_rules('user-id', 'User id',
                'required|integer');
        $this->form_validation->set_rules('number-of-meals', 'Number of meals',
                'required|integer|greater_than[0]',
                array('greater_than' => 'You must select at least one meal from the list.'));
        $this->form_validation->set_rules('number-of-deleted-meals',
                'Number of deleted meals', 'integer');
        //Allowed 30 meals for menu
        for ($x = 1; $x < 30; $x++)
        {
            $this->form_validation->set_rules('meal-id-' . $x, 'meal id ' . $x);
            if ($is_edit)
            {
                $this->form_validation->set_rules('deleted-meal-id-' . $x,
                        'deleted meal id ' . $x);
            }
        }
    }

}
