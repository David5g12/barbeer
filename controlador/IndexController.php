<?php
require_once('modelo/IndexModel.php');
class IndexController{
    private $IndexModel;
    function __construct(){
        $this->IndexModel = new IndexModel();
    }

    public static function index(){
        require_once('vista/index.php');
    }
}
