<?php

function is_logged_in()
{
    $ci = get_instance();
    if(!$ci->session->userdata('email')){
        redirect('login');
    }else{
        $role_id=$ci->session->userdata('role_id');
        $menu=$ci->uri->segment(1);

        $queryMenu=$ci->db->get_where('user_menu',['menu'=>$menu])->row_array();

        $menu_id=$queryMenu['id'];
        $userAccess=$ci->db->get_where('user_access_menu',[
            'role_id'=>$role_id,
            'menu_id'=>$menu_id
            ]);
        if($userAccess->num_rows()<1){
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id,$menu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id',$role_id);
    $ci->db->where('menu_id',$menu_id);
    $result = $ci->db->get('user_access_menu');

    if($result->num_rows()>0 ){
        return "checked='checked'";
    }

    /* atau dalam 1 query
    $ci->db->get_where('user_acces_menu',[
        'role_id'=>$role_id,
        'menu_id'=>$menu_id
    ]);
    */

}

function check_websetting($name)
{
    $ci = get_instance();
    $ci->db->where('is_active','1');
    $ci->db->where('name',$name);
    $result = $ci->db->get('web_setting');

    if($result->num_rows()>0 ){
        return "checked='checked'";
    }

    /* atau dalam 1 query
    $ci->db->get_where('user_acces_menu',[
        'role_id'=>$role_id,
        'menu_id'=>$menu_id
    ]);
    */

}

function is_registered_active()
{
    $ci = get_instance();
        $userRegistered=$ci->db->get_where('web_setting',[
            'name'=>'signup_member',
            'is_active'=>'1'
            ]);
        if($userRegistered->num_rows()<1){
            redirect('auth/blocked');
        }
}
function is_forgotpassword_active()
{
    $ci = get_instance();
        $userRegistered=$ci->db->get_where('web_setting',[
            'name'=>'forgot_password',
            'is_active'=>'1'
            ]);
        if($userRegistered->num_rows()<1){
            redirect('auth/blocked');
        }
}
?>