<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Process extends CI_Model
{

    function __construct()
	{

		parent::__construct();
        $this->load->database();

		
		
	}


    function data_insert($table, $data)
    {
        $this->db->insert($table, $data);
       // exit('test');
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->insert_id();
        }
        else
        {
            return FALSE;
        }

    }


    function data_update($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->update_id();
        }
        else
        {
            return FALSE;

        }
    }

    function data_delete($table, $where)
    {
        $this->db->delete($table, $where);
        if( $this->db->affected_rows() > 0)
        {
            return $this->db->affected_rows();

        }
        else
        {
            return FALSE;
        }
    }
function data_get($table, $where)
{
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($where);
    $query = $this->db->get();
    //echo $query;
    //exit;
    if($query->num_rows() > 0)
    {
        
		
        // $query->row_array();
        $result = array(

            'nrows'=> $query->num_rows(),
            'row'=> $query->row(),
            'result'=> $query->result(),
            'result_array'=> $query->result_array()
            
        );
        return $result;

    }
    else
    {
       
        return FALSE;
    }
   
}
}





?>