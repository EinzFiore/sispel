<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class modelMenu extends CI_Model 
{
    function getSubmenu()
    {
        $query = "  SELECT `user_submenu`.*, `user_menu`.`menu`
                    FROM `user_submenu` JOIN `user_menu`
                    ON `user_submenu`.`menu_id` = `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }   
}



/* End of file filename.php */

