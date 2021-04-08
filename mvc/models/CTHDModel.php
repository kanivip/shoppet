<?php 
    class CTHDModel extends DB{
        
        public function Insert($id_hd,$GH)
        {
            $dem = 0;
            foreach($GH as $key => $value)
            {
                $ten=$value['TenSP'];
                $sl=$value['SoLuong'];
                $gia=$value['GiaSP'];
                $sql = "insert into chitiethd(id_hd, idsp, tensp, soluong, gia)
                values ('$id_hd','$key', '$ten','$sl','$gia')";
                mysqli_query($this->con,$sql);
                $dem += mysqli_affected_rows($this->con);
            }
            if(count($GH)==$dem)
                return json_encode(true);
                else
                return json_encode(false);
        }

        public function DeleteDetailBill($idhd){
            $sql = "DELETE FROM chitiethd WHERE id_hd = $idhd";
            $rs = mysqli_query($this->con,$sql);
            $kq = false;
            if(mysqli_affected_rows($this->con)>0)
                $kq = true;
            return json_encode($kq);
        }
    }
?>