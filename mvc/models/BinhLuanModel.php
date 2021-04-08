<?php
    Class BinhLuanModel extends DB{
        public function Insert($idsp,$user,$datenow,$content,$star){
            $sql = "INSERT INTO binhluan(username_bl, id_SP, noidung, NgayDang, NgoiSao)
             VALUES('$user', $idsp, '$content', '$datenow', $star )";
            $rs = mysqli_query($this->con,$sql);
            $kq = false;
            if(mysqli_affected_rows($this->con)>0)
                $kq = mysqli_affected_rows($this->con);
            return json_encode($kq);
        }

        public function Update($datenow,$content,$star,$user){
            $sql = "UPDATE binhluan SET
             noidung ='$content', NgayDang = '$datenow', NgoiSao = $star WHERE username_bl = '$user' ";
            $rs = mysqli_query($this->con,$sql);
            $kq = false;
            if(mysqli_affected_rows($this->con)>0)
                $kq = mysqli_affected_rows($this->con);
            return json_encode($kq);
        }

        public function CheckUserComment($user,$idsp){
            $sql = "SELECT * FROM binhluan WHERE username_bl = '$user' and id_SP = $idsp ";
            $rs = mysqli_query($this->con,$sql);
            $kq= false;
            if(mysqli_num_rows($rs)>0)
                $kq = true;
            return json_encode($kq);
        }

        public function SelectAll($idsp){
            $sql = "SELECT * FROM binhluan WHERE id_SP = $idsp  ORDER BY NgayDang DESC";
            $rs = mysqli_query($this->con,$sql);
            $arr = [];
            while( $row = mysqli_fetch_assoc($rs))
               {
                   $arr1 = [
                       "user" => $row['username_bl'],
                        "idsp" => $row['id_SP'],
                        "nd" =>$row['noidung'],
                        "date" => $row['NgayDang'],
                        "star" => $row['NgoiSao']
                   ];
                   $arr[] = $arr1; 
               }
            return json_encode($arr);
        }

        public function GetStarById($idsp){
            $sql = "SELECT *,AVG(NgoiSao) as star FROM `binhluan` 
            where id_SP = '$idsp'
            GROUP BY id_SP";
            $rs = mysqli_query($this->con,$sql);
            $arr = [];
            if(mysqli_num_rows($rs)>0)
                {
                    while( $row = mysqli_fetch_assoc($rs))
                    {
                        $arr = [
                             "star" => $row['star']
                        ];
                    }
                }
            return json_encode($arr);
        }
        // lấy top 3 sản phẩm có tỷ lệ đánh giá sao cao nhất
        public function GetTop3Star($loaisp){
            $sql = "SELECT id_SP,loaisp,sp.TenSP,sp.AnhSP ,AVG(NgoiSao) as star 
            FROM `binhluan` as bl JOIN sanpham as sp on bl.id_SP = sp.idSP
            WHERE loaisp = '$loaisp'
            GROUP by id_SP,loaisp ";
            $rs = mysqli_query($this->con,$sql);
            $arr = [];
            while( $row = mysqli_fetch_assoc($rs))
               {
                   $arr1 = [
                    "ten" => $row["TenSP"],
                    "anh" => $row["AnhSP"],
                   ];
                   $arr[] = $arr1; 
               }
            return json_encode($arr);
        }
    }
?>