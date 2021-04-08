<?php
class SanPhamModel extends DB{
    public function SanPham(){
        $qr = "SELECT * FROM sanpham";
        $rs = mysqli_query($this->con, $qr);
        $arr = [];
        while($row = mysqli_fetch_assoc($rs))
        {
            $arr1 = [
                "idsp" => $row["idSP"],
                "loai" => $row["LoaiSP"],
                "ten" => $row["TenSP"],
                "anh" => $row["AnhSP"],
                "gia" => $row["GiaSP"],
                "soluong" => $row["SoLuong"],
                "noidung" => $row["NoiDung"],
                "ngaythem" => $row["ngaythem"],
            ];
            $arr[] = $arr1;
        }
        return json_encode($arr);
    }

    public function GetSanPhamLimit10($start,$num){
        $qr = "SELECT * FROM `sanpham`LIMIT $start,$num";
        $rs = mysqli_query($this->con, $qr);
        $arr = [];
        while($row = mysqli_fetch_assoc($rs))
        {
            $arr1 = [
                "idsp" => $row["idSP"],
                "loai" => $row["LoaiSP"],
                "ten" => $row["TenSP"],
                "anh" => $row["AnhSP"],
                "gia" => $row["GiaSP"],
                "soluong" => $row["SoLuong"],
                "noidung" => $row["NoiDung"],
                "ngaythem" => $row["ngaythem"],
            ];
            $arr[] = $arr1;
        }
        return json_encode($arr);
    }

    public function GetCountTotalSaleProduct() {
        $kq = 0;
        $sql = "SELECT count(idSP) as tong FROM `sanpham` WHERE giamgia > 0 ";
        $rs = mysqli_query($this->con, $sql);
        while ($row = mysqli_fetch_assoc($rs)) {
            $kq = $row['tong'];
        }
        return json_encode($kq);
    }

    public function GetSanPhamSaleLimit10($start,$num){
        $qr = "SELECT idSP,TenSP,LoaiSP,GiaSP,giamgia  FROM `sanpham` where giamgia>0 LIMIT $start,$num";
        $rs = mysqli_query($this->con, $qr);
        $arr = [];
        while($row = mysqli_fetch_assoc($rs))
        {
            $arr1 = [
                "idsp" => $row["idSP"],
                "loai" => $row["LoaiSP"],
                "ten" => $row["TenSP"],
                "gia" => $row["GiaSP"],
                "giamgia" =>$row["giamgia"]
            ];
            $arr[] = $arr1;
        }
        return json_encode($arr);
    }

    public function GetProductPriceLow($loai) {
        $qr = "SELECT idSP,LoaiSP,GiaSp,AnhSP,TenSP FROM `sanpham` WHERE LoaiSP = '$loai' ORDER by GiaSP LIMIT 3 ";
        $rs = mysqli_query($this->con, $qr);
        $arr = [];
        while($row = mysqli_fetch_assoc($rs))
        {
            $arr1 = [
			    "idsp" => $row["idSP"],
                "ten" => $row["TenSP"],
                "anh" => $row["AnhSP"],
            ];
            $arr[] = $arr1;
        }
        return json_encode($arr);
    }
    public function GetProductBySpecies($loai) {
        $qr = "SELECT * FROM `sanpham` WHERE LoaiSP = '$loai' ORDER BY ngaythem DESC";
        $rs = mysqli_query($this->con, $qr);
        $arr = [];
        while($row = mysqli_fetch_assoc($rs))
        {
            $arr1 = [
                "idsp" => $row["idSP"],
                "loai" => $row["LoaiSP"],
                "ten" => $row["TenSP"],
                "anh" => $row["AnhSP"],
                "gia" => $row["GiaSP"],
                "soluong" => $row["SoLuong"],
                "noidung" => $row["NoiDung"],
                "giamgia" => $row["giamgia"]
            ];
            $arr[] = $arr1;
        }
        return json_encode($arr);
    }

    public function InsertProduct($loai,$ten,$anh,$gia,$sl,$nd,$ngaythem){
        $sql = "insert into sanpham(LoaiSP,TenSP,AnhSP,GiaSP,SoLuong,NoiDung,ngaythem)
        values('$loai','$ten','$anh',$gia,$sl,'$nd','$ngaythem')";
        $rs = mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_affected_rows($this->con))
            $kq = mysqli_affected_rows($this->con);
        return $kq;
    }

    public function DeleteProduct($idsp){
        $sql = "DELETE FROM sanpham WHERE idSP = $idsp";
        $rs = mysqli_query($this->con,$sql);
        if(mysqli_affected_rows($this->con))
            $kq = mysqli_affected_rows($this->con);
        return $kq;
    }

    public function UpdateProduct($id,$loai,$ten,$anh,$gia,$sl,$nd,$ngaythem){
        if($anh==null)
            $sql = "UPDATE sanpham SET LoaiSP='$loai', TenSP='$ten', GiaSP=$gia, SoLuong=$sl, NoiDung='$nd', ngaythem='$ngaythem'
            WHERE idSP = $id";
        else
            $sql = "UPDATE sanpham SET LoaiSP='$loai', TenSP='$ten', AnhSP='$anh', GiaSP=$gia, SoLuong=$sl, NoiDung='$nd', ngaythem='$ngaythem'
            WHERE idSP = $id";
        $rs = mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_affected_rows($this->con))
            $kq = mysqli_affected_rows($this->con);
        return $kq;
    }

    public function GetProductById($idsp){
        $qr = "SELECT * FROM sanpham WHERE idSP = $idsp";
        $rs = mysqli_query($this->con, $qr);
        $arr = [];
        while($row = mysqli_fetch_assoc($rs))
        {
            $arr1 = array(
                "idsp" => $row["idSP"],
                "loai" => $row["LoaiSP"],
                "ten" => $row["TenSP"],
                "anh" => $row["AnhSP"],
                "gia" => $row["GiaSP"],
                "soluong" => $row["SoLuong"],
                "noidung" => $row["NoiDung"],
                "ngaythem" => $row["ngaythem"],
                "giamgia" => $row["giamgia"]
            );
            $arr[] = $arr1;
        }
        return json_encode($arr);
    }
    public function SearchProduct($str)
    {
        if(!empty($str) && isset($str))
        {
            (string)$str = (string)$str;
            $str = mysqli_real_escape_string($this->con,$str);
            $sql = " SELECT * from sanpham
                    where TenSP like '%$str%' ";
            $rs = mysqli_query($this->con,$sql);
            $arr = [];
            while($row = mysqli_fetch_assoc($rs))
            {
                $arr1 = array(
                    "idsp" => $row["idSP"],
                    "loai" => $row["LoaiSP"],
                    "ten" => $row["TenSP"],
                    "anh" => $row["AnhSP"],
                    "gia" => $row["GiaSP"],
                    "soluong" => $row["SoLuong"],
                    "noidung" => $row["NoiDung"],
                    "ngaythem" => $row["ngaythem"],
                );
                $arr[] = $arr1;
            }
            return json_encode($arr);
        }else
        return null;
    }

    public function GetSumProduct() {
        $kq = 0;
        $sql = "SELECT SUM(SoLuong) AS tong FROM `sanpham`";
        $rs = mysqli_query($this->con, $sql);
        while ($row = mysqli_fetch_assoc($rs)) {
            $kq = $row['tong'];
        }
        return json_encode($kq);
    }

    public function GetCountAddProductByMonth($month) {
        $kq = 0;
        $sql = "SELECT COUNT(idSP) as spdathem FROM `sanpham` WHERE MONTH(ngaythem) = $month";
        $rs = mysqli_query($this->con, $sql);
        while ($row = mysqli_fetch_assoc($rs)) {
            $kq = $row['spdathem'];
        }
        return json_encode($kq);
    }

    public function GetSumMoneyProduct() {
        $kq = 0;
        $sql = "SELECT sum(GiaSP*SoLuong) as tongtien FROM `sanpham`";
        $rs = mysqli_query($this->con, $sql);
        while ($row = mysqli_fetch_assoc($rs)) {
            $kq = $row['tongtien'];
        }
        return json_encode($kq);
    }

    public function GetCountTotalProduct() {
        $kq = 0;
        $sql = "SELECT COUNT(idSP) as total FROM sanpham";
        $rs = mysqli_query($this->con, $sql);
        while ($row = mysqli_fetch_assoc($rs)) {
            $kq = $row['total'];
        }
        return json_encode($kq);
    }

    public function GetProductPopularComment(){
        $qr = "SELECT COUNT(TenSP) as luotbl,TenSP,LoaiSP,avg(bl.NgoiSao) as star 
        FROM `sanpham` AS sp join binhluan AS bl on sp.idsp = bl.id_SP
        GROUP by idSP
        ORDER BY luotbl desc
        LIMIT 5";
        $rs = mysqli_query($this->con, $qr);
        $arr = [];
        while($row = mysqli_fetch_assoc($rs))
        {
            $arr1 = array(
                "TenSP" => $row["TenSP"],
                "loai" => $row["LoaiSP"],
                "star" => $row["star"]
            );
            $arr[] = $arr1;
        }
        return json_encode($arr);
    }

    public function UpdateSaleProductById($id,$sale){
        $sql = "UPDATE sanpham SET giamgia='$sale'
            WHERE idSP = '$id'";
        $rs = mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_affected_rows($this->con)>0)
            $kq = true;
        return json_encode($kq);
    }

    public function UpdateSaleProductByName($name,$sale){
        $sql = "UPDATE sanpham SET giamgia='$sale'
            WHERE TenSP = '$name'";
        $rs = mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_affected_rows($this->con)>0)
            $kq = true;
        return json_encode($kq);
    }

    public function UpdateSaleProductBySpecies($loai,$sale){
        $sql = "UPDATE sanpham SET giamgia='$sale'
            WHERE LoaiSP = '$loai'";
        $rs = mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_affected_rows($this->con)>0)
            $kq = true;
        return json_encode($kq);
    }

    public function UpdateSaleProductByPrice($start,$end,$sale){
        $sql = "UPDATE sanpham SET giamgia='$sale'
            WHERE GiaSP BETWEEN $start AND $end ";
        $rs = mysqli_query($this->con,$sql);
        $kq = false;
        if(mysqli_affected_rows($this->con)>0)
            $kq = true;
        return json_encode($kq);
    }

    public function SelectNameLimit($col,$num,$key){
        $key = "%".$key."%";
        $qr = "SELECT TenSP,idSP FROM `sanpham` WHERE $col like N"."'$key' ORDER BY TenSP  LIMIT $num";
        $rs = mysqli_query($this->con, $qr);
        $arr = [];
        while($row = mysqli_fetch_assoc($rs))
        {
            $arr1 = [
                "idsp" => $row["idSP"],
                "ten" => $row["TenSP"],
            ];
            $arr[] = $arr1;
        }
        return json_encode($arr);
    }

    public function SelectAllLimit($col,$num,$key){
        $key = "%".$key."%";
        $qr = "SELECT * FROM `sanpham` WHERE $col like N"."'$key' ORDER BY $col  LIMIT $num";
        $rs = mysqli_query($this->con, $qr);
        $arr = [];
        while($row = mysqli_fetch_assoc($rs))
        {
            $arr1 = [
                "idsp" => $row["idSP"],
                "loai" => $row["LoaiSP"],
                "ten" => $row["TenSP"],
                "anh" => $row["AnhSP"],
                "gia" => $row["GiaSP"],
                "soluong" => $row["SoLuong"],
                "noidung" => $row["NoiDung"],
                "ngaythem" => $row["ngaythem"],
                "giamgia" =>$row["giamgia"]
            ];
            $arr[] = $arr1;
        }
        return json_encode($arr);
    }

    public function SelectAllLimitSale($col,$num,$key){
        $key = "%".$key."%";
        $qr = "SELECT idSP,LoaiSP,TenSP,GiaSP,giamgia FROM `sanpham` WHERE $col like N"."'$key' and giamgia>0 ORDER BY $col  LIMIT $num";
        $rs = mysqli_query($this->con, $qr);
        $arr = [];
        while($row = mysqli_fetch_assoc($rs))
        {
            $arr1 = [
                "idsp" => $row["idSP"],
                "loai" => $row["LoaiSP"],
                "ten" => $row["TenSP"],
                "gia" => $row["GiaSP"],
                "giamgia" =>$row["giamgia"]
            ];
            $arr[] = $arr1;
        }
        return json_encode($arr);
    }

}
?>