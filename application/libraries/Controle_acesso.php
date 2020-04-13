<?php

class Controle_acesso {

    public function controlar()
    {
        $CI = &get_instance();
        $utilizador = $CI->session->userdata("nome_funcionario");
        if(empty($utilizador))
        {
            redirect('/');
        }
    }
}