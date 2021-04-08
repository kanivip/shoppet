<?php
    class ShoppingCart extends Controller{
        public $sp;
        public $dcVN;
        public $hd;
        public $cthd;
        function __construct(){
            $this->sp = $this->model("SanPhamModel");
            $this->dcVN = $this->model("DiaChiModel");
            $this->hd = $this->model("HoaDonModel");
            $this->cthd = $this->model("CTHDModel");
        }

        public function Sayhi(){
            if(isset($_GET['url']))
            {
                $arr = explode('/',$_GET['url']);
                if(isset($arr[2]))
                    $parameter = explode('=',$arr[2]);
            }
            if(isset($parameter) && $parameter[0]=='Delete' && isset($parameter[1]))
            {
                unset($_SESSION['Cart'][$parameter[1]]);
            }
            $this->view("master1",[
                'page' => 'ShoppingCart',
                'test' => json_decode($this->dcVN->GetCity())
            ]);
            
        }

        public function AddToCart(){
        
            if(isset($_POST['idsp']))
                $idsp = $_POST['idsp'];


                if(isset($idsp))
                {
                $sanpham =json_decode($this->sp->GetProductById($idsp));
                if(empty($_SESSION['Cart']) && $idsp != '')
                {
                    $Cart = array();
                    $Cart[$idsp] = array(
                        'LoaiSP' => $sanpham[0]->loai,
                        'TenSP' => $sanpham[0]->ten,
                        'AnhSP' => $sanpham[0]->anh,
                        'GiaSP' => $sanpham[0]->gia*(1-$sanpham[0]->giamgia/100),
                        'SoLuong' =>(int)1,
                    );
                }
                else if(isset($_SESSION['Cart']))
                {
                    $Cart = $_SESSION['Cart'];
                    if(array_key_exists($idsp,$Cart))
                        {
                            $Cart[$idsp] = array(
                                'LoaiSP' => $sanpham[0]->loai,
                                'TenSP' => $sanpham[0]->ten,
                                'AnhSP' => $sanpham[0]->anh,
                                'GiaSP' => $sanpham[0]->gia*(1-$sanpham[0]->giamgia/100),
                                'SoLuong' => (int)$Cart[$idsp]['SoLuong'] + (int)1,
                            );
                        }
                    else if(array_key_exists($idsp,$Cart)==false ){
                        $Cart[$idsp] = array(
                            'LoaiSP' => $sanpham[0]->loai,
                            'TenSP' => $sanpham[0]->ten,
                            'AnhSP' => $sanpham[0]->anh,
                            'GiaSP' => $sanpham[0]->gia*(1-$sanpham[0]->giamgia/100),
                            'SoLuong' =>(int)1,
                        );
                    }
                }
                $_SESSION['Total'] = 0;
                $_SESSION['Cart'] = $Cart;
                foreach($_SESSION['Cart'] as $key => $value)
                {
                    (int)$_SESSION['Total'] += (int)$value['SoLuong'] * (int)$value['GiaSP'];
                }
            }
            
                $this->view("master1",[
                    'page' => 'ShoppingCart',
                    'test' => json_decode($this->dcVN->GetCity())
                ]);
        }

        public function UpdateCart(){
            if(isset($_POST['soluong']))
            {
                $sl = $_POST['soluong'];
                foreach($sl as $key => $value)
                {
                    (int)$_SESSION['Cart'][$key]['SoLuong'] = (int)$value;
                }
            }
            $_SESSION['Total'] = 0;
            foreach($_SESSION['Cart'] as $key => $value)
            {
                
                (int)$_SESSION['Total'] += (int)$value['SoLuong'] * (int)$value['GiaSP'];
            }
            $this->view("master1",[
                'page' => 'ShoppingCart',
                'test' => json_decode($this->dcVN->GetCity())
            ]);
        }
        
        public function OrderShoppingCart(){
            $warm = '';
            $flag = true;

            if(isset($_POST['tp']))
                $tp = $_POST['tp'];
            if(isset($_POST['quan']))
                $quan = $_POST['quan'];
            if(isset($_POST['xa']))
                $xa = $_POST['xa'];
            if(isset($_POST['sonha']))
                $sonha = $_POST['sonha'];
            if(isset($_POST['phonenumber']))
            $phone = $_POST['phonenumber'];
            if(isset($_POST['username']))
            $user = $_POST['username'];
            if(isset($_POST['name']))
            $name = $_POST['name'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $datenow = date('Y-m-d H:i:s');
            if(isset($_SESSION['Cart']) && isset($_SESSION['Total']))
            {
                //kiểm tra số lượng trong Cart và csdl
                foreach($_SESSION['Cart'] as $key => $value){
                    $sp1 = json_decode($this->sp->GetProductById($key));
                    if($value['SoLuong']>$sp1[0]->soluong)
                    {
                        $warm .="-" . $sp1[0]->ten . " chỉ còn " .$sp1[0]->soluong."</br>";
                        $flag = false;
                    }
                }


                $total = $_SESSION['Total'];
                if($_SESSION['Cart']=='' || !isset($_SESSION['Cart']) ||$_SESSION['Cart']==null)
                {
                    $warm = '-Bạn chưa mua hàng </br>';
                    $flag = false;
                }
                if($name == '')
                    $warm .= '-Không được để trống tên </br>';
                if(empty($tp) || empty($quan) || empty($xa) || empty($sonha) )
                {
                    $warm .= '-Không được để trống địa chỉ </br>';
                    $flag = false;
                }
                if(!is_numeric($phone))
                {
                    $warm .= '-Không được để trống số điện thoại hoặc chứa kí tự chữ </br>';
                    $flag = false;
                }
                if($flag==true)
                {
                    $tp = json_decode($this->dcVN->GetNameCityById($tp));
                    $quan = json_decode($this->dcVN->GetNameDistrictById($quan));
                    $xa = json_decode($this->dcVN->GetNameXaById($xa));
                    $dc = $tp->name.',' . $quan->name .','. $xa->name .','. $sonha ;
                    $idhd = $this->hd->Insert($user, $dc, $phone, $name, $datenow, $total);
                    if(json_decode($this->cthd->Insert($idhd,$_SESSION['Cart']))== true)
                    {
                        $warm = "Bạn đã đặt hàng thành công";
                        unset($_SESSION['Cart']);
                        unset($_SESSION['Total']);

                    }
                }
            }else $warm = '-Bạn chưa mua hàng </br>';
        
            $this->view("master1",[
                'page' => 'ShoppingCart',
                'test' => json_decode($this->dcVN->GetCity()),
                'warm' => $warm,
            ]);
        }


        
    }

?>