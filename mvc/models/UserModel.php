<?php
class UserModel extends DB{
    public function checkUsername($un){
        $sql = "select * from user
        where username= '$un' ";
        $kq = false;
        $rs = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($rs)>0)
            $kq = true;
        return json_encode($kq);
    }
    public function insertUser($un,$pass){
        $sql = "insert into user(username,password)
        values('$un','$pass') ";
        $kq = false;
        $rs = mysqli_query($this->con,$sql);
        if(mysqli_affected_rows($this->con)>0)
            $kq = true;
        return json_encode($kq);
    }
    public function Login($un,$pass){
        $sql = "select * from user
        where username='$un' and password ='$pass' ";
        $kq = false;
        $rs = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($rs)>0)
            $kq = true;
        return json_encode($kq);
    }
    public function checkAdmin($un){
        $sql = "SELECT * from user
        where username= '$un' and typeuser = '1' ";
        $kq = false;
        $rs = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($rs)>0)
            $kq = true;
        return json_encode($kq);
    }
}
?>