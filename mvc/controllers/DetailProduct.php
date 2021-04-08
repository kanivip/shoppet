<?php
    class DetailProduct extends Controller{

        public $sp;
        public $user;
        public $loai;
        public $binhluan;
        
        public function __construct(){
            $this->sp = $this->model('SanPhamModel');
            $this->user = $this->model('UserModel');
            $this->loai = $this->model('LoaiSPModel');
            $this->binhluan = $this->model('BinhLuanModel');
        }
        
        function SayHi(){

            if(isset($_GET['url']))
            $arr = explode("/",$_GET['url']);
            if(isset($arr[2]))
            $idsp = $arr[2];
            $a = json_decode($this->binhluan->GetStarById($idsp));
            if(!empty($a))
                $star = round($a->star,1);
                else
                $star = "Chưa có đánh giá";
            $this->view('master1',[
                'page' => 'DetailProduct',
                "loaisp" => json_decode($this->loai->GetLoaiSPMenuLeft()),
                "menu-left" => "menu-left",
                'sp' => json_decode($this->sp->GetProductById($idsp)),
                'comment' => json_decode($this->binhluan->SelectAll($idsp)),
                'star' => $star
            ]);
        }

        function comment(){
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            if(isset($_GET['url']))
            $arr = explode("/",$_GET['url']);
            if(isset($arr[2]))
            $idsp = $arr[2];
            $user=$_POST['user'];
            $rate=$_POST['rate'];
            $noidung=$_POST['noidung'];
            $datenow=date("Y-m-d H:i:s");
            $usercheck = json_decode($this->binhluan->CheckUserComment($user,$idsp));
            if($usercheck === false)
                json_decode($this->binhluan->Insert($idsp, $user,$datenow, $noidung,$rate));
            else {
                $this->binhluan->Update($datenow,$noidung,$rate,$user);
            }
            $a = json_decode($this->binhluan->GetStarById($idsp));
            if(!empty($a))
                $star = round($a->star,1);
                else
                $star = "Chưa có đánh giá";
            $this->view('master1',[
                'page' => 'DetailProduct',
                "loaisp" => json_decode($this->loai->GetLoaiSPMenuLeft()),
                "menu-left" => "menu-left",
                'sp' => json_decode($this->sp->GetProductById($idsp)),
                'comment' => json_decode($this->binhluan->SelectAll($idsp)),
                'test' => $usercheck,
                'star' => $star
            ]);
        }

    }
?>