<?php
class model_index extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function getSkill() {

        $sql = 'SELECT * FROM tbl_skill';
        $result = $this->doSelect($sql,[]);
        return $result;

    }

    function getCertPlus() {
        $sql = 'SELECT * FROM tbl_certification_plus';
        $result = $this->doSelect($sql,[]);
        return $result;
    }

    function getCertCollege() {
        $sql = 'SELECT * FROM tbl_certification_college';
        $result = $this->doSelect($sql,[]);
        return $result;
    }


    function getForm ($data) {

        $name = $data['name'];
        $phone = $data['phone'];
        $email = $data['email'];
        $website = $data['website'];
        $text = $data['text'];
        $date = date('Y/m/d');
        $ip = '';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }

        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

            $sql = "insert into tbl_text (name , phone , email , website , text , date , ip) VALUES (?,?,?,?,?,?,?)";
            $params = array($name,$phone,$email,$website,$text,$date,$ip);
            $this->doQuery($sql,$params);
    }

    function getBiography() {

        $sql = "select * from tbl_biography ";
        $result = $this->doSelect($sql,[],1);
        return $result;
    }




}


?>













