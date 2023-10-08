<?php
class model_adminlogin extends Model {



    function __construct() {

        parent::__construct();

    }


    function cheakUserAdmin($form) {

        $user = $form['username'];
        $password = $form['password'];

        $sql = "select * from tbl_admin";
        $params = array();
        $result = $this->doSelect($sql,$params);

        $userSql = $result[0]['user'];
        $passwordSql = $result[0]['password'];

        echo '<pre>';
        print_r($result);
        echo '</pre>';

        if ($user === $userSql && $password === $passwordSql) {

            Model::sessionInit();
            Model::sessionSet('user',$result[0]['id']);
            header('location:'.URL.'adminpanel');
        }

        else {

            header('location:'.URL.'adminlogin');
        }


    }


}