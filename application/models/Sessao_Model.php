<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sessao_Model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    function validate($nome_user, $password)
    {
      $this->db->where('nome_user', $nome_user);
      $this->db->where('password', md5($password));
      $result = $this->db->get('funcionario',1);
      return $result;
    }
}