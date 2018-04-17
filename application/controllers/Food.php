<?php

/**
 * Food Class
 * 
 * @category controller
 * @author Nicodemo Valerio <nicodemovalerio@gmail.com>
 * 
 */
class Food extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('food_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->helper('url');
        $data['food'] = $this->food_model->get_foods();
        $data['totals'] = $this->food_model->get_totals();
        $data['title'] = 'List of foods/ingredients';

        $this->load->view('templates/header', $data);
        $this->load->view('food/index', $data);
        $this->load->view('templates/footer', $data);
    }

    private function _set_rules()
    {
        $this->form_validation->set_rules('food', 'food',
                'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('carb', 'carbohydrates',
                'trim|required|numeric');
        $this->form_validation->set_rules('prot', 'proteins',
                'trim|required|numeric');
        $this->form_validation->set_rules('fat', 'fat', 'trim|required|numeric');
        $this->form_validation->set_rules('alcohol', 'alcohol',
                'trim|required|numeric');
    }

    public function insert()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Add a new food';
        //input field, name used in error message, rule
        $this->_set_rules();

        $this->load->view('templates/header', $data);
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('food/insert', $data);
        } else
        {
            $this->food_model->set_foods();
            $this->load->view('food/success');
        }
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        //input field, name used in error message, rule
        $this->_set_rules();

        $data['food'] = $this->food_model->get_foods($id);
        $data['title'] = 'Edit ' . $data['food']['food'];

        $this->load->view('templates/header', $data);
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('food/edit');
        } else
        {
            $this->food_model->update_foods($id);
            $this->load->view('food/success');
        }
        $this->load->view('templates/footer', $data);
    }

    public function delete($id)
    {
        $this->load->helper('url');
        $data['title'] = 'List of foods';
        $data['food'] = $this->food_model->get_foods();
        $data['totals'] = $this->food_model->get_totals();
        $this->food_model->delete($id);
        $this->load->view('templates/header', $data);
        $this->load->view('food/index');
        $this->load->view('templates/footer', $data);
    }

}
