<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function is_loged_in() {
    $CI =& get_instance();
    if(!$CI->session->userdata('logged_in')){
        $CI->session->set_userdata('last_page', current_url());
        redirect('/authentication', 'refresh');
    }
}
function can_access($param) {
    $CI =& get_instance();
    $i=0;
    $can_access=FALSE;
    while ($CI->session->userdata('access'.$i)) {
        foreach ($CI->session->userdata('access'.$i) as $value) {
            if($param==$value){
                $can_access=TRUE;
            }
        }
        $i++;
    }
    return $can_access;
}
function print_session($position) {
    $CI =& get_instance();
    echo $position;
    echo '<br>';
    echo '<br>';
        print_r($CI->session->userdata('logged_in'));
    echo '<br>';
    echo '<br>';
    echo '<br>';
    print_r($CI->session->userdata('access'));
    $i=0;
    while ($CI->session->userdata('access'.$i)) {
        $access= $CI->session->userdata('access'.$i);
        echo 'access'.$i.'= ';
        echo '<br>';
        print_r($access);
        echo '<br>';
        echo '<br>';
        $i++;

    }
}