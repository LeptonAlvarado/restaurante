<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class platillos extends MY_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->ValidarInicioSesion();
            $this->load->library('pagination');
            $this->load->model('mod_platillos');
        }
        public function index()
        {
            $pagina = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $params['response'] = $this->session->flashdata('response');

            $params['registros'] = $this->mod_platillos->Listado($pagina);
            //var_dump($params['registros']);
            //echo "asda";
            $params['totalRegistros'] = $this->mod_platillos->Total();
            if($params['registros']){                
                $config = $this->ConfigurarPaginacion(
                    base_url().'Platillos/Index',
                    $params['totalRegistros']
                );
                $this->pagination->initialize($config);
                $params["links"] = $this->pagination->create_links();
            }
           // echo $this->db->last_query();
            

            $this->load->view('Shared/header');
                  $this->load->view('Platillos/Listado', $params);
            $this->load->view('Shared/footer');
        }

        // ELimina un Platillo
        public function Eliminar($id)
        {
            $this->session->set_flashdata(
                'response', $this->mod_platillos->Eliminar($id)
            );

            redirect('Platillos/Index', 'refresh');
        }

        // Muetsra el formulario para crear op modificar un platillo
        public function Formulario($id = 0)
        {
            $params['response'] = $this->session->flashdata('response');
            $params['platillo'] = $this->mod_platillos->Obtener($id);
            //$params['ingrediente'] = $this->mod_platillos->Ingrediente($nombre)
            if(!$params['platillo']){
                $params['platillo'] =  new stdClass();
                $params['platillo']->pa_id = 0;
                $params['platillo']->pa_nombre = '';
                $params['platillo']->pa_descripcion = '';
                $params['platillo']->pa_precio = '';
                $params['platillo']->pa_id_tipo_comida = '';
                //$params['ingrediente']->in_nombre = '';
            }

            $this->load->view('Shared/header');
                $this->load->view('Platillos/Formulario', $params);
            $this->load->view('Shared/footer');
        }

        // Guarda la información de un ingrediente
        public function Guardar()
        {
            $response = array(
                'done' => false,
                'message' => 'Llene todos los campos solicitados'
            );

            if (
                $this->input->post('pa_nombre')
                &&
                $this->input->post('pa_descripcion')
                &&
                $this->input->post('pa_precio')
                &&
                $this->input->post('pa_id_tipo_comida')
            ){
                $response = $this->mod_platillos->Guardar();
            }

            $this->session->set_flashdata('response', $response);
            redirect('Ingrediente/Index','refresh');
        }

        //Obtener ingredientes

    }