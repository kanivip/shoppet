<?php
    class DiaChiModel extends DB{
        public function GetCity(){
            $qr = "SELECT * FROM devvn_tinhthanhpho";
            $rs = mysqli_query($this->con, $qr);
            $arr = [];
            while($row = mysqli_fetch_assoc($rs))
            {
                $arr1 = [
                    "matp" => $row["matp"],
                    "name" => $row["name"],
                    "type" => $row["type"],
                ];
                $arr[] = $arr1;
            }
            return json_encode($arr);
        }
        // lấy quận theo mã thành phố
        public function GetDistrictById($id){
            $qr = "SELECT * FROM devvn_quanhuyen Where matp = $id";
            $rs = mysqli_query($this->con, $qr);
            $arr = [];
            while($row = mysqli_fetch_assoc($rs))
            {
                $arr1 = [
                    "maqh" => $row["maqh"],
                    "name" => $row["name"],
                    "type" => $row["type"],
                ];
                $arr[] = $arr1;
            }
            return json_encode($arr);
        }
        //lấy xã theo mã quận
        public function GetXaById($id){
            $qr = "SELECT * FROM devvn_xaphuongthitran Where maqh = '$id'";
            $rs = mysqli_query($this->con, $qr);
            $arr = [];
            while($row = mysqli_fetch_assoc($rs))
            {
                $arr1 = [
                    "xaid" => $row["xaid"],
                    "name" => $row["name"],
                    "type" => $row["type"],
                ];
                $arr[] = $arr1;
            }
            return json_encode($arr);
        }

        public function GetNameXaById($id){
            $qr = "SELECT name FROM devvn_xaphuongthitran Where xaid = '$id'";
            $rs = mysqli_query($this->con, $qr);
            $arr;
            while($row = mysqli_fetch_assoc($rs))
            {
                $arr = [
                    "name" => $row["name"]
                ];
            }
            return json_encode($arr);
        }

        public function GetNameDistrictById($id){
            $qr = "SELECT name FROM devvn_quanhuyen Where maqh = '$id'";
            $rs = mysqli_query($this->con, $qr);
            $arr;
            while($row = mysqli_fetch_assoc($rs))
            {
                $arr = [
                    "name" => $row["name"]
                ];
            }
            return json_encode($arr);
        }

        public function GetNameCityById($id){
            $qr = "SELECT * FROM devvn_tinhthanhpho  Where matp = '$id'";
            $rs = mysqli_query($this->con, $qr);
            $arr;
            while($row = mysqli_fetch_assoc($rs))
            {
                $arr = [
                    "name" => $row["name"],
                ];
            }
            return json_encode($arr);
        }

        public function GetIdByNameCity($name){
            $qr = "SELECT * FROM devvn_tinhthanhpho  Where name = '$name'";
            $rs = mysqli_query($this->con, $qr);
            $arr;
            while($row = mysqli_fetch_assoc($rs))
            {
                $arr = [
                    "matp" => $row["matp"],
                ];
            }
            return json_encode($arr);
        }

        public function GetIdByNameDistrict($name){
            $qr = "SELECT * FROM devvn_quanhuyen  Where name = '$name'";
            $rs = mysqli_query($this->con, $qr);
            $arr;
            while($row = mysqli_fetch_assoc($rs))
            {
                $arr = [
                    "maqh" => $row["maqh"],
                ];
            }
            return json_encode($arr);
        }

        public function GetIdByNameXa($name){
            $qr = "SELECT * FROM devvn_xaphuongthitran  Where name = '$name'";
            $rs = mysqli_query($this->con, $qr);
            $arr;
            while($row = mysqli_fetch_assoc($rs))
            {
                $arr = [
                    "xaid" => $row["xaid"],
                ];
            }
            return json_encode($arr);
        }
    }
?>