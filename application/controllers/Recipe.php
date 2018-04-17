<?php

class Recipe extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('recipe_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');
        if (isset($_SESSION['id']))
        {
            $data['recipes'] = $this->recipe_model->get_recipes($_SESSION['id']);
        }
        $data['title'] = 'Your recipes';
        $this->load->view('templates/header', $data);
        $this->load->view('recipe/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($id)
    {
        $this->load->helper('url');
        $data['totals'] = $this->recipe_model->get_recipe($_SESSION['id'], $id);
        if (empty($data['totals']))
        {
            show_404();
        }
        $data['title'] = $data['totals']['name'];
        $this->load->view('templates/header', $data);
        $this->load->view('recipe/view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function insert()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'New recipe';
        $data['foods'] = $this->recipe_model->get_foods();
        $this->_set_rules();

        $this->load->view('templates/header', $data);
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('recipe/insert');
        }
        else
        {
            $data['id'] = $this->recipe_model->set_recipes();
            $this->load->view('recipe/success', $data);
        }
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->_set_rules();
        $data['totals'] = $this->recipe_model->get_recipe($_SESSION['id'], $id);
        $data['totals']['foods'] = $this->recipe_model->get_foods();
        $data['title'] = $data['totals']['name'];
        $this->load->view('templates/header', $data);
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('recipe/edit');
        }
        else
        {
            $this->recipe_model->update_recipes($id);
            $data['id'] = $id;
            $this->load->view('recipe/success', $data);
        }
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->load->helper('url');
        if (isset($_SESSION['id']))
        {
            $data['recipes'] = $this->recipe_model->get_recipe_foods($_SESSION['id']);
        }
        $data['title'] = 'List of recipes';
        $this->recipe_model->delete($id);
        $this->load->view('templates/header', $data);
        $this->load->view('recipe/index', $data);
        $this->load->view('templates/footer', $data);
    }

    private function _set_rules()
    {
        //input field, name used in error message, rule
        $this->form_validation->set_rules('name', 'Name',
                'trim|required|regex_match[/^[A-Za-z0-9]*[ \t\r\n\v\f]*[,.:;]*/]');
        $this->form_validation->set_rules('portions', 'Portions',
                'trim|required|integer|greater_than[0]',
                array('greater_than' => 'The number of portions must be greater than 0.'));
        $this->form_validation->set_rules('weight', 'Final weight',
                'trim|numeric');
        $this->form_validation->set_rules('number-of-ingredients',
                'Number of ingredients', 'required|integer|greater_than[0]',
                array('greater_than' => 'You must select at least one ingredient from the list.'));
        $this->form_validation->set_rules('instructions', 'Instructions',
                'trim|regex_match[/^[A-Za-z0-9]*[ \t\r\n\v\f]*[,.:;]*/]');
        $this->form_validation->set_rules('user-id', 'User id',
                'required|integer');
        //Allowed 30 ingredients for recipe, change as required
        for ($x = 0; $x < 30; $x++)
        {
            $this->form_validation->set_rules('food-id-' . $x, 'food-id-' . $x);
            $this->form_validation->set_rules('quantity-' . $x,
                    'quantity-' . $x, 'trim|numeric');
        }
    }

}
