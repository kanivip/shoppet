<?php
    Class HoaDonModel extends DB{

        function Insert($user,$dc,$sdt,$ten,$ngay,$tongtien)
        {
            $sql = "insert into hoadon(username_hd,diachi, sdt, hoten, ngaydat, tongtien)
            values ('$user', '$dc', '$sdt','$ten','$ngay','$tongtien')";
            mysqli_query($this->con,$sql);
            return mysqli_insert_id($this->con);
        }
        public function Update($idhd,$dc,$tt,$sdt,$ten,$trangthai){
            $sql = "UPDATE `hoadon` SET `diachi`='$dc',`sdt`='$sdt',`hoten`='$ten',
            `tongtien`=$tt,`TrangThai`='$trangthai' WHERE id_hd = $idhd";
            $rs = mysqli_query($this->con,$sql);
            $kq = false;
            if(mysqli_affected_rows($this->con)>0)
                $kq = true;
                return json_encode($kq);
        }
        function SelectAll()
        {
            $qr = "SELECT * FROM hoadon";
            $rs = mysqli_query($this->con, $qr);
            $arr = [];
            while($row = mysqli_fetch_assoc($rs))
            {
                $arr1 = [
                    "idhd" => $row["id_hd"],
                    "username" => $row["username_hd"],
                    "diachi" => $row["diachi"],
                    "sdt" => $row["sdt"],
                    "hoten" => $row["hoten"],
                    "tongtien" => $row["tongtien"],
                    "TrangThai" => $row["TrangThai"],
                ];
                $arr[] = $arr1;
            }
            return json_encode($arr);
        }
        


        public function GetBillById($id){
            $qr = "SELECT * FROM hoadon WHERE id_hd = $id";
            $rs = mysqli_query($this->con, $qr);
            $arr = [];
            while($row = mysqli_fetch_assoc($rs))
            {
                $a = explode(",",$row["diachi"]);
                $arr1 = array(
                    "idhd" => $row["id_hd"],
                    "username" => $row["username_hd"],
                    "tp" => $a[0],
                    "qh" => $a[1],
                    "xp" => $a[2],
                    "sn" => $a[3],
                    "sdt" => $row["sdt"],
                    "hoten" => $row["hoten"],
                    "tongtien" => $row["tongtien"],
                    "TrangThai" => $row["TrangThai"],
                );
                $arr[] = $arr1;
            }
            return json_encode($arr);
        }

        public function DeleteBill($idhd){
            $sql = "DELETE FROM hoadon WHERE id_hd = $idhd";
            $rs = mysqli_query($this->con,$sql);
            $kq = false;
            if(mysqli_affected_rows($this->con)>0)
                $kq = true;
            return json_encode($kq);
        }

        public function GetBillPaid() {
            $kq = 0;
            $sql = "SELECT COUNT(id_hd) as dathanhtoan FROM hoadon WHERE TrangThai = 'đã thanh toán'";
            $rs = mysqli_query($this->con, $sql);
            while ($row = mysqli_fetch_assoc($rs)) {
                $kq = $row['dathanhtoan'];
            }
            return json_encode($kq);
        }

        public function GetSumTotalMoneyPaid() {
            $kq = 0;
            $sql = "SELECT sum(tongtien) as toanbotien FROM `hoadon` WHERE TrangThai = 'đã thanh toán'";
            $rs = mysqli_query($this->con, $sql);
            while ($row = mysqli_fetch_assoc($rs)) {
                $kq = $row['toanbotien'];
            }
            return json_encode($kq);
        }

        public function GetCountTotalBill() {
            $kq = 0;
            $sql = "SELECT COUNT(id_hd) as total FROM hoadon";
            $rs = mysqli_query($this->con, $sql);
            while ($row = mysqli_fetch_assoc($rs)) {
                $kq = $row['total'];
            }
            return json_encode($kq);
        }

        public function GetBillLimit10($start,$num){
            $qr = "SELECT * FROM `hoadon`LIMIT $start,$num";
            $rs = mysqli_query($this->con, $qr);
            $arr = [];
            while($row = mysqli_fetch_assoc($rs))
            {
                $arr1 = [
                    "idhd" => $row["id_hd"],
                    "username" => $row["username_hd"],
                    "diachi" => $row["diachi"],
                    "sdt" => $row["sdt"],
                    "hoten" => $row["hoten"],
                    "tongtien" => $row["tongtien"],
                    "TrangThai" => $row["TrangThai"]
                ];
                $arr[] = $arr1;
            }
            return json_encode($arr);
        }

        public function SelectBillLimit($col,$num,$key){
            $key = "%".$key."%";
            $qr = "SELECT * FROM `hoadon` WHERE $col like N"."'$key' ORDER BY $col  LIMIT $num";
            $rs = mysqli_query($this->con, $qr);
            $arr = [];
            while($row = mysqli_fetch_assoc($rs))
            {
                $arr1 = [
                    "idhd" => $row["id_hd"],
                    "username" => $row["username_hd"],
                    "diachi" => $row["diachi"],
                    "sdt" => $row["sdt"],
                    "hoten" => $row["hoten"],
                    "tongtien" => $row["tongtien"],
                    "TrangThai" => $row["TrangThai"]
                ];
                $arr[] = $arr1;
            }
            return json_encode($arr);
        }

    }
?>