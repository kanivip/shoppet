<?php
class LoaiSPModel extends DB{
    public function GetLoaiSP(){
        $sql = "select MaLoai from loaisp";
        $rs = mysqli_query($this->con,$sql);
        $arr = [];
        while($row = mysqli_fetch_assoc($rs))
        {
            $arr[] = $row['MaLoai'];
        }
        return json_encode($arr);
    }
    public function GetLoaiSPMenuLeft(){
        $sql = "SELECT TenLoai,loaisp,COUNT(tensp) as soluong
        FROM `loaisp` JOIN sanpham on MaLoai = loaisp
        GROUP BY loaisp";
        $rs = mysqli_query($this->con,$sql);
        $arr = [];
        while($row = mysqli_fetch_assoc($rs))
        {
            $arr[] = array(
                "ten" => $row['TenLoai'],
                "loai" => $row['loaisp'],
                "soluong" => $row['soluong']
            );
        }
        return json_encode($arr);
    }
}

?>