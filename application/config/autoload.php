<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array(
    'database', 
    'email', 
    'session', 
    'upload'
);
$autoload['drivers'] = array();
$autoload['helper'] = array(
    'url', 
    'form', 
    'file', 
    'string', 
    'array', 
    'download'
);
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array(
    'Aluno_Model',
    'Ano_Model', 
    'Anolectivo_Model',
    'Busca_Model',
    'Classe_Model',
    'Cursos_Model', 
    'Disciplina_Model',
    'Encarregados_Model',
    'Funcionario_Model',
    'Matricula_Model',
    'Periodo_Model', 
    'Professor_Model',
    'Sala_Model', 
    'Select_Dinamico_Model', 
    'Turma_Model', 
    'Turmas_Model', 
    'Utilizador_Model',
    'Sessao_Model'
);