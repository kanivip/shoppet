<?php

Class AdminBill extends Controller {
    public $sp;
    public $loaisp;
    public $hd;
    public $dcVN;
    public $cthd;
    public $startpage;
    public $num_page;
    public $now_page;
    public function __construct(){
        $this->sp =  $this->model("SanPhamModel");
        $this->loaisp =  $this->model("LoaiSPModel");
        $this->hd =  $this->model("HoaDonModel");
        $this->dcVN = $this->model("DiaChiModel");
        $this->cthd = $this->model("CTHDModel");
        $arr = explode('/',$_GET['url']);
        if(isset($arr[2])) 
            $arr1 = explode('=',$arr[2]);

        $total = json_decode($this->hd->GetCountTotalBill());
        $this->num_page = ceil($total/4);
        if(isset($arr1[1]) && $arr1[0]=='page')
            $this->now_page = $arr1[1];
        else
            $this->now_page = 1;
        if($this->now_page<=0)
            $this->now_page=$this->num_page;
        if($this->now_page>$this->num_page)
            $this->now_page=1;
        $this->startpage = ($this->now_page-1)*4;
    }
    
    public function sayhi(){
        
        $this->view("admin",[
            "page" => 'AdminBill',
            "hdlimit" => json_decode($this->hd->GetBillLimit10($this->startpage,4)),
            "num_page" => $this->num_page,
            "now_page" =>$this->now_page,
            "loaisp" => json_decode($this->loaisp->GetLoaiSP()),
            'tp' => json_decode($this->dcVN->GetCity()),
            'modal' => "modal-adminbill"
        ]);
    }

    public function sua(){
        $warn = '';
        $flag = true;
        if(isset($_POST['tp']))
            $tp = $_POST['tp'];
        if(isset($_POST['quan']))
            $quan = $_POST['quan'];
        if(isset($_POST['xa']))
            $xa = $_POST['xa'];
        if(isset($_POST['sonha']))
            $sonha = $_POST['sonha'];
        if(empty($tp) || empty($quan) || empty($xa) || empty($sonha) )
        {
            $warn .= '-Không được để trống địa chỉ </br>';
            $flag = false;
        }
            

        if($flag==true)
        {
            $tp = json_decode($this->dcVN->GetNameCityById($tp));
            $quan = json_decode($this->dcVN->GetNameDistrictById($quan));
            $xa = json_decode($this->dcVN->GetNameXaById($xa));
            $dc = $tp->name.',' . $quan->name .','. $xa->name .','. $sonha;
            if(json_decode($this->hd->Update($_POST['idhd'],$dc,$_POST['txttongtien']
            ,$_POST['txtsdt'],$_POST['txthoten'], $_POST['opttrangthai'])==true))
            $warn .= "Bạn đã sữa thành công";
        }
        $this->view("admin",[
            "page" => 'AdminBill',
            "hdlimit" => json_decode($this->hd->GetBillLimit10($this->startpage,4)),
            "num_page" => $this->num_page,
            "now_page" =>$this->now_page,
            "loaisp" => json_decode($this->loaisp->GetLoaiSP()),
            'tp' => json_decode($this->dcVN->GetCity()),
            'kq' => $warn,
            'modal' => "modal-adminbill"
        ]);
    }

    public function xoa(){
        $warn = '';
        $arr = explode("/",$_GET['url']);
        if(isset($arr[2]))
            $idhd = $arr[2];
        if( json_decode($this->cthd->DeleteDetailBill($idhd)) && json_decode($this->hd->DeleteBill($idhd)) )
            $warn .= "bạn đã xóa thành công";
            else
            $warn .= "Có lỗi đã xảy ra";
        $this->view("admin",[
            "page" => 'AdminBill',
            "hdlimit" => json_decode($this->hd->GetBillLimit10($this->startpage,4)),
            "num_page" => $this->num_page,
            "now_page" =>$this->now_page,
            "loaisp" => json_decode($this->loaisp->GetLoaiSP()),
            'tp' => json_decode($this->dcVN->GetCity()),
            'kq' => $warn,
            'modal' => "modal-adminbill"
        ]);
    }


}

?>