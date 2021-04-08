<?php
    class Adminsale extends Controller{
        public $startpage;
        public $num_page;
        public $now_page;
        public function __construct(){
            $sp = $this->model("SanPhamModel");
            $loaisp = $this->model("LoaiSPModel");
            $arr = explode('/',$_GET['url']);
            if(isset($arr[2])) 
                $arr1 = explode('=',$arr[2]);
    
            $total = json_decode($sp->GetCountTotalSaleProduct());
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
                "page" => 'AdminSale',
                "splimit" => json_decode($sp->GetSanPhamSaleLimit10($this->startpage,10)),
                "loaisp" => json_decode($loaisp->GetLoaiSP()),
                "num_page" => $this->num_page,
                "now_page" =>$this->now_page,
                "modal" => "modal-adminsale"
            ]);
        }

        public function them(){
            $loaisp = $this->model("LoaiSPModel");
            $sp = $this->model("SanPhamModel");
            $flag = true;
            if(isset($_POST['txtsale']))
                $sale = $_POST['txtsale'];
            if($sale <0 || $sale >100)
            {
                $warn ="Số không hợp lệ. chỉ tử 0 -100";
                $flag = false;
            }
            if($_POST['radCheck']=="id" && isset($_POST['txtid']) && isset($_POST['txtsale']))
            {
                $name = $_POST['txtid'];
                if($flag)
                {
                    if(json_decode($sp->UpdateSaleProductByName($name,$sale)))
                        $warn = "Bạn đã thêm thành công";
                        else
                        $warn = "Mã sản phẩm không hợp lệ";
                }

            }
            if($_POST['radCheck']=="species" && isset($_POST['optloai']) && isset($_POST['txtsale']))
            {
                $loai = $_POST['optloai'];
                if($flag)
                {
                    if(json_decode($sp->UpdateSaleProductBySpecies($loai,$sale)))
                        $warn = "Bạn đã thêm thành công";
                        else
                        $warn = "Mã loại sản phẩm không hợp lệ";
                }

            }
            if($_POST['radCheck']=="price" && isset($_POST['txtstart']) && isset($_POST['txtend']) && isset($_POST['txtsale']))
            {
                $start = $_POST['txtstart'];
                $end = $_POST['txtend'];
                $loai = $_POST['optloai'];
                if($flag)
                {
                    if(json_decode($sp->UpdateSaleProductByPrice((int)$start,(int)$end,$sale)))
                        $warn = "Bạn đã thêm thành công";
                        else
                        $warn = "Giá sản phẩm không hợp lệ";
                }

            }
            $this->view("admin",[
                "page" => 'AdminSale',
                "loaisp" => json_decode($loaisp->GetLoaiSP()),
                "modal" => "modal-adminsale",
                "num_page" => $this->num_page,
                "now_page" =>$this->now_page,
                "splimit" => json_decode($sp->GetSanPhamSaleLimit10($this->startpage,10)),
                "warn" => $warn
            ]);
        }

        public function xoa(){
            $loaisp = $this->model("LoaiSPModel");
            $sp = $this->model("SanPhamModel");
            $arr = explode('/',$_GET['url']);
                if(isset($arr[1]) && isset($arr[2]) && $arr[1] =="xoa") 
            {
                $id = $arr[2];
                if(json_decode($sp->UpdateSaleProductById($id,0)))
                $warn = "Bạn đã xóa thành công";
                else
                $warn = "Có lỗi đã xảy ra";
            }


            $this->view("admin",[
                "page" => 'AdminSale',
                "loaisp" => json_decode($loaisp->GetLoaiSP()),
                "modal" => "modal-adminsale",
                "num_page" => $this->num_page,
                "now_page" =>$this->now_page,
                "splimit" => json_decode($sp->GetSanPhamSaleLimit10($this->startpage,10)),  
                "warn" => $warn
            ]);
        }
    }
?>