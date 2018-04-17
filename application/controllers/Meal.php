<?php

class Meal extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('meal_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');
        if (isset($_SESSION['id']))
        {
            $data['meals'] = $this->meal_model->get_meals($_SESSION['id']);
        }
        $data['title'] = 'List of meals';
        $this->load->view('templates/header', $data);
        $this->load->view('meal/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($meal_id = NULL)
    {
        $this->load->helper('url');
        $data['meal'] = $this->meal_model->get_meals($_SESSION['id'], $meal_id);
        $data['meal_recipes'] = $this->meal_model->get_meal_recipes($_SESSION['id'],
                $meal_id);
        $data['meal_foods'] = $this->meal_model->get_meal_foods($_SESSION['id'],
                $meal_id);
        $data['totals'] = $this->meal_model->get_totals($meal_id,
                $_SESSION['id'], $data['meal']['portions']);
        $data['title'] = $data['meal']['name'];
        $this->load->view('templates/header', $data);
        $this->load->view('meal/view', $data);
        $this->load->view('templates/footer', $data);
    }

    private function _set_rules($is_edit = FALSE)
    {
        //input field, name used in error message, rule
        $this->form_validation->set_rules('name', 'Name',
                'trim|required|regex_match[/^[A-Za-z0-9]*[ \t\r\n\v\f]*[,.:;]*/]');
        $this->form_validation->set_rules('portions', 'Portions',
                'required|integer|greater_than[0]');
        $this->form_validation->set_rules('user-id', 'User id',
                'required|integer');
        $this->form_validation->set_rules('number-of-recipes',
                'Number of recipes', 'required|integer');
        //Allowed 30 recipes for meal
        for ($x = 1; $x < 30; $x++)
        {
            $this->form_validation->set_rules('recipe-id-' . $x,
                    'recipe id ' . $x);
            if ($is_edit)
            {
                $this->form_validation->set_rules('deleted-recipe-id-' . $x,
                        'Deleted recipe id ' . $x);
            }
        }
        $this->form_validation->set_rules('number-of-ingredients',
                'Number of ingredients', 'required');
        $this->form_validation->set_rules('description', 'Description',
                'trim|regex_match[/^[A-Za-z0-9]*[ \t\r\n\v\f]*[,.:;]*/]');
        //Allowed 30 ingredients for recipe, change as required
        for ($x = 1; $x < 30; $x++)
        {
            $this->form_validation->set_rules('food-id-' . $x, 'food id ' . $x);
            $this->form_validation->set_rules('quantity-' . $x,
                    'quantity ' . $x, 'trim|numeric');
        }
    }

    public function insert()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = "Create a new meal";
        $data['foods'] = $this->meal_model->get_foods();
        $data['recipes'] = $this->dbhelper->get_recipes($_SESSION['id']);

        $this->_set_rules();

        $this->load->view('templates/header', $data);
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('meal/insert');
        }
        else
        {
            $data['id'] = $this->meal_model->set_meals();
            $this->load->view('meal/success', $data);
        }
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = "Edit meal";
        $data['meal'] = $this->meal_model->get_meals($_SESSION['id'], $id);
        $data['meal_foods'] = $this->meal_model->get_meal_foods($_SESSION['id'],
                $id);
        $data['meal_recipes'] = $this->meal_model->get_meal_recipes($_SESSION['id'],
                $id);
        $data['foods'] = $this->meal_model->get_foods();
        $data['recipes'] = $this->meal_model->get_recipes($_SESSION['id']);

        $this->_set_rules(TRUE);

        $this->load->view('templates/header', $data);
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('meal/edit');
        }
        else
        {
            $this->meal_model->update($id);
            $data['id'] = $id;
            $this->load->view('meal/success', $data);
        }
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->load->helper('url');
        $data['title'] = 'List of meals';
        if (isset($_SESSION['id']))
        {
            $data['meals'] = $this->meal_model->get_meals($_SESSION['id']);
        }
        $this->meal_model->delete($id);
        $this->load->view('templates/header', $data);
        $this->load->view('meal/index', $data);
        $this->load->view('templates/footer', $data);
    }

}
