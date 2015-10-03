<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa_m extends MY_Model{
    public $_table = 'mahasiswa';
    public $primary_key = 'NIM';
    
    function dropdown_selected( $nimselected)
    {
        $key = $this->primary_key;
        $value= 'NAMAM';

        $this->trigger('before_dropdown', array( $key, $value ));

        if ($this->soft_delete && $this->_temporary_with_deleted !== TRUE)
        {
            $this->_database->where($this->soft_delete_key, FALSE);
            $this->_database->where('NIM', $nimselected);
        }

        $result = $this->_database->select(array($key, $value))
                           ->get($this->_table)
                           ->result();

        //$options = array();

        foreach ($result as $row)
        {
            $options[$row->{$key}] = $row->{$value};
        }

        $options = $this->trigger('after_dropdown', $options);

        return $options;
    }
} 
/* End of file .php */
/* Location: ./application/models/.php */
