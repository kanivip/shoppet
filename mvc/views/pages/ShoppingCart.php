<div class="row">
    <div class="col-xs-9">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                        </div>
                        <div class="col-xs-6">
                            <a href="./">
                                <button type="button" class="btn btn-primary btn-sm btn-block">
                                    <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form action="./ShoppingCart/UpdateCart" method="post">
                    <?php if(isset($_SESSION['Cart'])) { foreach($_SESSION['Cart'] as $key => $value) { ?>
                    <div class="row">
                        <div class="col-xs-2"><img class="img-responsive" src="<?php echo $value['AnhSP']; ?>">
                        </div>
                        <div class="col-xs-4">
                            <h4 class="product-name"><strong><?php echo $value['TenSP']; ?></strong></h4>
                            <h4><small><?php echo $value['LoaiSP']; ?></small></h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-6 text-right">
                                <h6><strong><?php echo number_format($value['GiaSP'],0,".",",") ?> <span
                                            class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-xs-4">
                                <input min='1' type="number" name="soluong[<?php echo $key ?>]"
                                    class=" form-control input-sm" value="<?php echo $value['SoLuong']; ?>">
                            </div>
                            <div class="col-xs-2">
                                <a href="./ShoppingCart/Sayhi/Delete=<?php echo $key; ?>">
                                    <button type="button" class="btn btn-link btn-xs">
                                        <span class="glyphicon glyphicon-trash"> </span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php } } ?>


            </div>
            <div class="panel-footer">
                <div class="row text-center">
                    <div class="col-xs-9">
                        <h4 class="text-right">Total <strong><input style="display:none" type="text" name="Total"
                                    value="<?php if(isset($_SESSION['Total'])) echo $_SESSION['Total']; ?>"><?php if(isset($_SESSION['Total'])) echo number_format($_SESSION['Total'],0,',','.'); else echo 0; ?>
                                VND</strong>
                        </h4>
                    </div>
                    <div class="col-xs-3">
                        <button type="submit" class="btn btn-success btn-block">
                            Cập nhật giỏ
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php if(isset($_SESSION['username'])) { ?>
<div class="col-xs-9">
    <form method="post" action="./ShoppingCart/OrderShoppingCart">
        <h3>Thông tin đặt hàng</h3>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Tài khoản</label>
            <div class="col-sm-10">
                <input name="username" type="text" readonly class="form-control-plaintext inputNoBoder" id="staticEmail"
                    value="<?php echo $_SESSION['username']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Họ Tên</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Name" name="name" placeholder="Họ Tên"
                    value="<?php if(isset($_POST['name'])) echo $_POST['name'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Địa chỉ</label>
            <div class="col-sm-10">
                <div id="tp1" style="margin-top:5px;">
                    <span>Thành phố:</span>
                    <select name="tp" id="tp" class="custom-select custom-select-sm" required>
                        <option selected value=" ">Chọn thành phố</option>
                        <?php foreach($data['test'] as $v) { ?>
                        <option value="<?php echo $v->matp; ?>"><?php echo $v->name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div id="qh1" style="margin-top:5px; display:none;">
                </div>
                <div id="xp1" style="margin-top:5px;  display:none;">
                </div>
                <div id="dc1" style="margin-top:5px;  display:none;">
                    <span>Số nhà:</span><input type="text" class="form-control" name="sonha"
                        value="<?php if(isset($_POST['sonha'])) echo $_POST['sonha'] ?>" id="Name" placeholder="Số nhà">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Số điện thoại</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phonenumber"
                    value="<?php if(isset($_POST['phonenumber'])) echo $_POST['phonenumber']; ?>" id="PhoneNumber"
                    placeholder="Số điện thoại">
            </div>
        </div>
        <div class="text-right">
            <button name="order" type="submit" class="btn btn-primary">Đặt hàng</button>
        </div>
    </form>
    <?php } ?>
    <h4><?php if(isset($data['warm'])) echo $data['warm'];  ?></h4>
</div>