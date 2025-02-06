<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


function yearbook_name($id)
{
    $d = & get_instance();
    $row= $d->db->get_where('yearbook', array('id' => $id ))->row_array();
    return $row['yearbook_name'];
}

