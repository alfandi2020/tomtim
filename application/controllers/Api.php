<?php

defined('BASEPATH') or exit('No direct script access allowed');
require 'formatbytesbites.php';
// require_once __DIR__ . '/vendor/autoload.php';

use \RouterOS\Client;

use \RouterOS\Query;
class Api extends CI_Controller
{
    protected $client;
    public function __construct()
    {
        parent::__construct();
        
        // $this->load->library('Pdf');
        // ob_start();
        // $this->load->model('M_admin');
        // $this->load->helper(array('form', 'url'));
        // $this->load->library(array('form_validation', 'Routerosapi'));
        // //cek jika user blm login maka redirect ke halaman login
        // if ($this->session->userdata('username', 'nama') != true) {
        //     $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Maaf anda belum login !</div>');
        //     redirect('Auth');
        // }
    }
    function config_routeros()
    {
        return new Client([
            'host' => '103.155.198.12',
            'user' => 'pandi',
            'pass' => 'betulsekali',
            'port' => 8228,
        ]);
    }
        function test_api()
        {
      
            // $config = \RouterOS::config([
            //     'host' => '103.155.198.12',
            //     'user' => 'pandi',
            //     'pass' => 'betulsekali',
            //     'port' => 8228,
            // ]);
      

        // Create "where" Query object for RouterOS
        //add ppp user
        // $query =
        //     (new Query('/ppp/secret/add'))
        //         ->equal('name','fandi2')
        //         ->equal('password','123')
        //         ->equal('profile', '10Mbps');
        $client = $this->config_routeros();
        $query =
            (new Query('/ppp/secret/set'))
                ->equal('.id', '1')  // Gunakan ID spesifik, atau
                // ->equal('name', 'fandi')  // Identifikasi berdasarkan nama
                ->equal('password', 'abc');
                // ->equal('password', '123')
                // ->equal('profile', '10Mbps');

        // Send query and read response from RouterOS
        $response = $client->query($query)->read();
        echo json_encode($response, JSON_PRETTY_PRINT);
        }
    function get_profile()
    {

    }
}