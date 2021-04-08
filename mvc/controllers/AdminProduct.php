<?php
class AdminProduct extends Controller{
    
    public $startpage;
    public $num_page;
    public $now_page;
    public function __construct(){
        $sp = $this->model("SanPhamModel");
        $loaisp = $this->model("LoaiSPModel");
        $arr = explode('/',$_GET['url']);
        if(isset($arr[2])) 
            $arr1 = explode('=',$arr[2]);

        $total = json_decode($sp->GetCountTotalProduct());
        $this->num_page = ceil($total/10);
        if(isset($arr1[1]) && $arr1[0]=='page')
            $this->now_page = $arr1[1];
        else
            $this->now_page = 1;
        if($this->now_page<=0)
            $this->now_page=$this->num_page;
        if($this->now_page>$this->num_page)
            $this->now_page=1;
        $this->startpage = ($this->now_page-1)*10;
    }
    
    public function sayhi(){
        $sp = $this->model("SanPhamModel");
        $loaisp = $this->model("LoaiSPModel");

        $this->view("admin",[
            "page" => 'AdminProduct',
            "loaisp" => json_decode($loaisp->GetLoaiSP()),
            "splimit" => json_decode($sp->GetSanPhamLimit10($this->startpage,10)),
            "num_page" => $this->num_page,
            "now_page" =>$this->now_page,
            "modal" => "modal-adminproduct"
        ]);
    }

    public function them(){
        $sp = $this->model("SanPhamModel");
        $loaisp = $this->model("LoaiSPModel");
        if(isset($_FILES['image'])&&isset($_POST['themsp']))
        {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $datenow = date('Y-m-d H:i:s');
            $flag = true;
            $arr_img = array (
                'image/png',
                'image/jpeg',
                'image/jpg'
            );
            if(!in_array($_FILES['image']['type'],$arr_img))
            {
                $flag =  "Chỉ nhận ảnh đuôi *.png,*.jpeg,*.jpg </br>";
            }
            if($_FILES['image']['size']>200000)
            {
                $flag = "Dung lượng ảnh quá lớn.Chỉ nhận dưới 200KB </br>";
            }
            if(strlen($_POST['txtten'])>60)
            {
                $flag =  "Tên quá dài. chỉ nhận dưới 60 kí tự </br>";
            }
            if($flag===true)
            {
            $arr =explode('.',$_FILES['image']['name']);
            $newname = $arr[0].time().".".$arr[1];
            $address = "./public/upload/image/".basename($newname);
            move_uploaded_file($_FILES['image']['tmp_name'],"$address");
            $flag = "Bạn đã thêm".json_decode($sp->InsertProduct($_POST['optloai'],$_POST['txtten'],$address,$_POST['txtgia'],$_POST['txtsl'],$_POST['txtnd'],$datenow)). "sản phẩm";
            }
        }
        $this->view("admin",[
            "page" => 'AdminProduct',
            "splimit" => json_decode($sp->GetSanPhamLimit10($this->startpage,10)),
            "num_page" => $this->num_page,
            "now_page" =>$this->now_page,
            "loaisp" => json_decode($loaisp->GetLoaiSP()),
            "kq" => $flag,
            "modal" => "modal-adminproduct"
        ]);
    }
    public function sua(){
        $sp = $this->model("SanPhamModel");
        $loaisp = $this->model("LoaiSPModel");
        $address = null;
        if(isset($_POST['suasp']))
        {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $datenow = date('Y-m-d H:i:s');
            $flag = true;
            if(strlen($_POST['txtten'])>60)
            {
                $flag =  "Tên quá dài. chỉ nhận dưới 60 kí tự </br>";
            }
            if($_FILES['image']['name']!=null)
            {
                $arr =explode('.',$_FILES['image']['name']);
                $newname = $arr[0].time().".".$arr[1];
                $address = "./public/upload/image/".basename($newname);
                move_uploaded_file($_FILES['image']['tmp_name'],"$address");
            
                $arr_img = array (
                    'image/png',
                    'image/jpeg',
                    'image/jpg'
                );
                if(!in_array($_FILES['image']['type'],$arr_img))
                {
                    $flag =  "Chỉ nhận ảnh đuôi *.png,*.jpeg,*.jpg </br>";
                }
                if($_FILES['image']['size']>200000)
                {
                    $flag = "Dung lượng ảnh quá lớn.Chỉ nhận dưới 200KB </br>";
                }
            }
            if($flag===true)
            {
            $flag = "Bạn đã sữa".$sp->UpdateProduct($_POST['idsp'],$_POST['optloai'],$_POST['txtten'],$address,$_POST['txtgia'],$_POST['txtsl'],$_POST['txtnd'],$datenow). "sản phẩm";
            if($flag <0)
                $flag = "Sữa thất bại";
            }
        }
        $this->view("admin",[
            "page" => 'AdminProduct',
            "splimit" => json_decode($sp->GetSanPhamLimit10($this->startpage,10)),
            "num_page" => $this->num_page,
            "now_page" =>$this->now_page,
            "loaisp" => json_decode($loaisp->GetLoaiSP()),
            "kq" => $flag,
            "modal" => "modal-adminproduct"
        ]);
    }

    public function xoa(){
        $arr = explode('/',$_GET['url']);
        $idsp = $arr[2];
        $sp = $this->model("SanPhamModel");
        $loaisp = $this->model("LoaiSPModel");
        $kq = "Đã có lỗi xảy ra";
        if($sp->DeleteProduct($idsp))
            $kq = "Bạn đã xóa sản phẩm id là ".$idsp." thành công";
        $this->view("admin",[
            "page" => 'AdminProduct',
            "splimit" => json_decode($sp->GetSanPhamLimit10($this->startpage,10)),
            "num_page" => $this->num_page,
            "now_page" =>$this->now_page,
            "loaisp" => json_decode($loaisp->GetLoaiSP()),
            "kq" => $kq,
            "modal" => "modal-adminproduct"
        ]);
    }

}
?>