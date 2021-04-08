<?php
    Class AdminInfo extends Controller{

        public $sp;
        public $hd;
        
        public function __construct(){
            $this->sp = $this->model("SanPhamModel");
            $this->hd = $this->model("HoaDonModel");
        }

        public function sayhi()
        {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $this->view("admin",[
                "page" => "AdminInfo",
                "tongsp" => json_decode($this->sp->GetSumProduct()),
                "spthem" => json_decode($this->sp->GetCountAddProductByMonth(date("m"))),
                "tongtiensp" => json_decode($this->sp->GetSumMoneyProduct()),
                "topspcomment" => json_decode($this->sp->GetProductPopularComment()),
                "dathanhtoan" => json_decode($this->hd->GetBillPaid()),
                "tongtiendatra" => json_decode($this->hd->GetSumTotalMoneyPaid())
            ]);
        }

    }
?>