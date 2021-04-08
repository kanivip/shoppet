<?php
class Ajax extends Controller{
    public $UserModel;
    public $SanPhamModel;
    public $dcVN;
    public $hd;
    public function __construct(){
        $this->UserModel = $this->model("UserModel");
        $this->SanPhamModel = $this->model('SanPhamModel');
        $this->dcVN = $this->model("DiaChiModel");
        $this->hd = $this->model("HoaDonModel");
    }
    public function checkUsername(){
        $un = $_POST["un"];
        if(json_decode($this->UserModel->checkUsername($un))===true)
            echo "Tài khoản đã tồn tại";
        else 
            echo "Tài khoản hợp lệ";
    }
    public function insertUser(){
        $un = $_POST["un"];
        $pass = $_POST["pass"];
        $repass = $_POST["repass"];
        $check = true;
        if($repass!=$pass)
            $check =false;
        if(json_decode($this->UserModel->checkUsername($un))===true)
            $check = false;
        $pass = md5($pass);
        if($check==true && json_decode($this->UserModel->insertUser($un,$pass))===true)
            echo "Tạo tài khoản thành công";
        else 
            echo "Tạo tài khoản thất bại";
    }
    public function checkLogin(){
        $un = $_POST["un"];
        $pass = $_POST["pass"];
        $pass = md5($pass);
        if(json_decode($this->UserModel->Login($un,$pass))===true)
        {
            $_SESSION['username'] = $un;
            if(json_decode($this->UserModel->CheckAdmin($un))===true)
                $_SESSION['typeuser'] = "admin";
            echo $_SESSION['username'];
        }
        else 
            echo "false";
    }

    public function Logout(){
        unset($_SESSION['username']);
        unset($_SESSION['typeuser']);
    }
    public function GetProductById(){
        $idsp = $_POST['idsp'];
        if(json_decode($this->SanPhamModel->GetProductById($idsp)))
            echo $this->SanPhamModel->GetProductById($idsp);
        else
            echo false;
    }

    public function GetBillById(){
        $idhd = $_POST['idhd'];
        if($arr = json_decode($this->hd->GetBillById($idhd)))
        {
            $arr[0]->tp = json_decode($this->dcVN->GetIdByNameCity($arr[0]->tp));
            $arr[0]->xp = json_decode($this->dcVN->GetIdByNameXa($arr[0]->xp));
            $arr[0]->qh = json_decode($this->dcVN->GetIdByNameDistrict($arr[0]->qh));
            echo json_encode($arr);
        }
        else
            echo false;
    }

    public function GetDistrictById(){
        $matp = $_POST['matp'];
        $quanhuyen = json_decode($this->dcVN->GetDistrictById($matp));
        $this->view("SelectDistrict",[
            "qh" => $quanhuyen
        ]);
    }
    public function GetXaById(){
        $maqh = $_POST['maqh'];
        $xaphuong = json_decode($this->dcVN->GetXaById($maqh));
        $this->view("Selectxa",[
            "xp" => $xaphuong
        ]);
    }
    
    public function SelectNameLimit(){
        $col = $_POST['col'];
        $num = $_POST['num'];
        $key = $_POST['key'];
        $sp = json_decode($this->SanPhamModel->SelectNameLimit($col,$num,$key));
        $this->viewSmall("option",[
            "sp" =>$sp
        ]);
    }

    public function SelectAllLimit(){
        $col = $_POST['col'];
        $num = $_POST['num'];
        $key = $_POST['key'];
        $sp = json_decode($this->SanPhamModel->SelectAllLimit($col,$num,$key));
        $this->viewSmall("RowProduct",[
            "splimit" =>$sp
        ]);
    }

    public function SelectAllLimitBill(){
        $col = $_POST['col'];
        $num = $_POST['num'];
        $key = $_POST['key'];
        $hd = json_decode($this->hd->SelectBillLimit($col,$num,$key));
        $this->viewSmall("RowBill",[
            "hdlimit" =>$hd
        ]);
    }

    public function SelectAllLimitSale(){
        $col = $_POST['col'];
        $num = $_POST['num'];
        $key = $_POST['key'];
        $sp = json_decode($this->SanPhamModel->SelectAllLimitSale($col,$num,$key));
        $this->viewSmall("RowSale",[
            "splimit" =>$sp
        ]);
    }

}
?>