<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><strong>Pet</strong> Shop</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
                <a style="color:#6A75F0;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                    aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span>
                    <?php if(isset($_SESSION['Cart'])) echo Count($_SESSION['Cart']); else echo 0 ?> - Items<span
                        class="caret"></span></a>
                <ul class="dropdown-menu dropdown-cart" role="menu">
                    <?php if(isset($_SESSION['Cart']) && $_SESSION['Total']) { foreach($_SESSION['Cart'] as $key => $value) { ?>
                    <li>
                        <span class="item">
                            <span class="item-left">
                                <img width="50px" height="50px" src="<?php echo $value['AnhSP'] ?>" alt="" />
                                <span class="item-info" style="width:140px;">
                                    <span><?php echo $value['TenSP'] ?></span>
                                    <span><?php echo number_format($value['GiaSP'],0,".",",") ?></span>
                                </span>
                            </span>
                            <a href="./ShoppingCart/Sayhi/Delete=<?php echo $key ?>">
                                <span class="item-right">
                                    <button class="btn btn-xs btn-danger pull-right">x</button>
                                </span>
                            </a>
                        </span>
                    </li>
                    <?php } ?>
                    <li class="divider"></li>
                    <li class="text-center">Tổng tiền: <?php echo number_format($_SESSION['Total'],0,".",",") ?> VND
                    </li>
                    <?php } ?>
                    <li class="divider"></li>
                    <li><a class="text-center" href="./ShoppingCart">View Cart</a></li>
                </ul>
            </li>

            <?php 
                        if(isset($_SESSION['username']))
                        {
                    ?>
            <li style="padding-top:3%">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['username']; ?>
                    </button>
                    <div style="padding:0px" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <button style="width:100%" id="logout" type="button" class="btn btn-primary">Đăng
                            Xuất</button>
                        <?php if(isset($_SESSION["typeuser"]) && $_SESSION["typeuser"] == "admin") { ?>
                        <a href="./AdminInfo"><button style="width:100%" id="option3" type="button"
                                class="btn btn-primary" data-target="#registerModal1">Admin</button></a>
                        <?php }?>
                    </div>
                </div>
            </li>

            <?php }else { ?>
            <li style="padding-top:3%">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tài khoản
                    </button>
                    <div style="padding:0px" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <button style="width:100%" id="option1" type="button" class="btn btn-primary"
                            data-toggle="modal" data-target="#loginModal1">Đăng Nhập</button>
                        <button style="width:100%" id="option2" type="button" class="btn btn-primary"
                            data-toggle="modal" data-target="#registerModal1">Đăng kí</button>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
        <form class="navbar-form navbar-right" role="search" method="post" action="./Home/Search">
            <div class="form-group">
                <input name="keyword" type="text" placeholder="Enter Keyword Here ..." class="form-control" required>
            </div>
            &nbsp;
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->
<!-- model -->
<!-- Button trigger modal -->
<!-- Modal login-->
<div class="modal fade" id="loginModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên Tài Khoản</label>
                    <input type="text" class="form-control" id="usernameLG" aria-describedby="emailHelp"
                        placeholder="Nhập tài khoản">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật Khẩu</label>
                    <input type="password" class="form-control" id="passwordLG" placeholder="Nhập mật khẩu">
                </div>
                <button id="btn-login" type="button" class="btn btn-primary">Đăng nhập</button>
                <small id="resultLG" class="form-text text-danger"></small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end Modal -->


<!-- Modal register-->
<div class="modal fade" id="registerModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng kí</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên Tài Khoản</label>
                    <input type="text" class="form-control" id="username" aria-describedby="emailHelp"
                        placeholder="Nhập tài khoản">
                    <small id="warn" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật Khẩu</label>
                    <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                    <small id="warnpass" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nhập Lại Mật Khẩu</label>
                    <input type="password" class="form-control" id="repassword" placeholder="Nhập lại mật khẩu">
                    <small id="warnrepass" class="form-text text-danger"></small>
                </div>
                <button type="button" id="register" class="btn btn-primary">Đăng kí</button>
                <small id="resultRegister" class="form-text text-danger"></small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end Modal -->