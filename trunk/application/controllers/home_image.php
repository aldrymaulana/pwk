<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home_image
 *
 * @author aulia
 */
class home_image extends CI_Controller {

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_image($image_slider) {
        $this->db->select('*');
        $this->db->from('gamber');
        return $this->db - get();
    }

}

