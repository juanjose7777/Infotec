<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Agencia/model/RegBdModel.php';


class RegBdController
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new BD();
    }
    // Generales
    public function TbSeg()
    {
        $data = $this->MODEL->TbSeg();
        if ($data) {
            include $_SERVER['DOCUMENT_ROOT'] . '/Agencia/views/Layouts/tbSeg.php';
        } else {
            echo 'No Querys Aún';
        }
    }
}
// Crear instancia del controlnor
$controller = new RegBdController();

if (isset($_POST['funcion'])) {
    call_user_func(array(new RegBdController, $_POST['funcion']));
}
