<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller{

    // Must have SayHi()
    function SayHi(){
        $sp = $this->model("SanPhamModel");
        $user = $this->model("UserModel");
        $loai = $this->model("LoaiSPModel");
        $loaiSP = "ALK";
        if(isset($_GET['url']))
            $arr = explode("/",$_GET['url']);
        if(isset($arr[2]))
            $loaiSP = $arr[2];
        // Call Views
        $this->view("master1", [
            "page" => "Home",
            "SP" => json_decode($sp->GetProductBySpecies($loaiSP)),
            "user" => json_decode($user->checkUsername("admin")),
            "pk" => json_decode($sp->GetProductPriceLow("PK")),
            "alk" => json_decode($sp->GetProductPriceLow("ALK")),
            "hun" => json_decode($sp->GetProductPriceLow("Husky")),
            "pood" => json_decode($sp->GetProductPriceLow("Poodle")),
            "loaisp" => json_decode($loai->GetLoaiSPMenuLeft()),
            "menu-left" => "menu-left",
            "menu-main" => "MenuMain"
        ]);

    }
    function search(){        
        // Call Models
        $sp = $this->model("SanPhamModel");
        $user = $this->model("UserModel");
        $loai = $this->model("LoaiSPModel");
        $loaiSP = "ALK";
        if(isset($_POST['keyword']) && !empty($_POST['keyword']))
            $result = json_decode($sp->SearchProduct($_POST['keyword']));
        else
            return false;
        // Call Views
        $this->view("master1", [
            "page" => "searchproduct",
            "SP" => $result,
            "user" => json_decode($user->checkUsername("admin")),
            "pk" => json_decode($sp->GetProductPriceLow("PK")),
            "alk" => json_decode($sp->GetProductPriceLow("ALK")),
            "hun" => json_decode($sp->GetProductPriceLow("Husky")),
            "pood" => json_decode($sp->GetProductPriceLow("Poodle")),
            "loaisp" => json_decode($loai->GetLoaiSPMenuLeft()),
            "menu-left" => "menu-left",
            "menu-main" => "MenuMain"
        ]);
    }
}
?>