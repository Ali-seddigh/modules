<?php
class model_adminpanel extends Model {

    private $user;

    function __construct() {

        parent::__construct();
    }

    function getUserInfo() {
        $user = $this->user;
        $sql = 'select * from tbl_admin';
        $result = $this->doSelect($sql,[$user],1);
        return $result;
    }

    function editAdminProfile($data) {

        $name = $data['name'];
        $family = $data['family'];
        $phone = $data['phone'];
        $birthday = $data['birthday'];
        $address = $data['address'];
        $telegramid = $data['telegramid'];
        $skillname = $data['skillname'];
        $instagramid = $data['instagramid'];
        $linkinid = $data['linkinid'];
        $gmailid = $data['gmailid'];
        $user = $data['user'];
        $password = $data['password'];


        $userid = $this->user;

        $sql = 'update tbl_admin set name=?,family=?,phone=?,birthday=?,address=?,telegramid=?,skillname=?,instagramid=?,linkinid=?,gmailid=?,user=?,password=?';
        $params= array($name,$family,$phone,$birthday,$address,$telegramid,$skillname,$instagramid,$linkinid,$gmailid,$user,$password);
        $this->doQuery($sql,$params);
    }


    function setadminskill($data) {

        $titleskill = $data['titleskill'];
        $rankskill = $data['rankskill'] . '%';
        $colorskill = '';
        $versionskill = $data['versionskill'];
        $lastchange = date("Y/m/d");

        if (40 >= $rankskill) {
            $colorskill = 'bg-danger';
        }
        if (41 <= $rankskill && 65 >= $rankskill) {
            $colorskill = 'bg-warning';
        }
        if (66 <= $rankskill) {
            $colorskill = 'bg-success';
        }

        $sql = "insert into tbl_skill (titleskill , rankskill , colorskill , versionskill , lastchange) VALUES (?,?,?,?,?)";
        $params = array($titleskill,$rankskill,$colorskill,$versionskill,$lastchange);
        $this->doQuery($sql,$params);
    }


    function getAdminSkill() {
        $sql = "select * from tbl_skill";
        $result = $this->doSelect($sql,[]);
        return $result;
    }


    function getMassage() {

        $sql = "select * from tbl_text";
        $result = $this->doSelect($sql,[]);
        return $result;
    }

    function deleteSkill($ids) {

        $ids = implode(',', $ids);
        $sql = "delete from tbl_skill where id IN (". $ids. ") ";
        $this->doQuery($sql);
    }

    function setCertCollege($data) {

        $titilecertcollege = $data['titilecertcollege'];
        $collegename = $data['collegename'];
        $datecertcollege = $data['datecertcollege'];

        $sql = "insert into tbl_certification_college (collegetitle , collegename  , collegedate) VALUES (?,?,?)";
        $params = array($titilecertcollege,$collegename,$datecertcollege);
        $this->doQuery($sql,$params);
    }

    function setCertPlus($data) {

        $titilecertcollege = $data['titilecertplus'];
        $namecertplus = $data['namecertplus'];
        $datecertplus = $data['datecertplus'];

        $sql = "insert into tbl_certification_plus (certtitle  , programming , certdate) VALUES (?,?,?)";
        $params = array($titilecertcollege,$namecertplus,$datecertplus);
        $this->doQuery($sql,$params);
    }

    function getCertCollege() {

        $sql = "select * from tbl_certification_college";
        $result = $this->doSelect($sql,[]);
        return $result;
    }

    function getCertPlus() {

        $sql = "select * from tbl_certification_plus";
        $result = $this->doSelect($sql, []);
        return $result;
    }

    function deleteCertCollege($ids) {

        $ids = implode(',', $ids);
        $sql = "delete from tbl_certification_college where id IN (". $ids. ") ";
        $this->doQuery($sql);
    }

    function deleteCertPlus($ids) {

        $ids = implode(',', $ids);
        $sql = "delete from tbl_certification_Plus where id IN (". $ids. ") ";
        $this->doQuery($sql);
    }

    function setBiography($data) {

        $text = $data['textbio'];

        $sql = "update tbl_biography set text=?";
        $params = array($text);
        $this->doSelect($sql,$params);
    }



}

?>