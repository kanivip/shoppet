<?php 
    function GetCiTY($str){
        $arr = explode(",",$str);
        echo $arr[0];
    }
?>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <h5 class="card-title">Chức năng</h5>
                    <div class="text-left">

                    </div>
                    <div>
                        Thông báo:<?php if(isset($data['kq'])) echo $data['kq']; ?>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-header">Active Users
                        <div class="input-group col-5 btn-actions-pane-right ">
                            <div class="input-group-prepend col-3">
                                <label class="input-group-text" for="inputGroupSelect01">Cột</label>
                            </div>
                            <select class="custom-select" id="optcolumnHD">
                                <option value="username_hd" selected>Username</option>
                                <option value="diachi">Địa chỉ</option>
                                <option value="sdt ">Số Điện Thoại</option>
                                <option value="hoten">Họ tên</option>
                                <option value="tongtien">Tổng Tiền</option>
                                <option value="TrangThai ">Trạng Thái</option>
                            </select>
                        </div>

                        <form class="form-inline btn-actions-pane-right">
                            <input id="txtsearchHD" class="form-control " type="search" placeholder="Search"
                                aria-label="Search">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Username</th>
                                    <th class="text-center">Địa chỉ</th>
                                    <th class="text-center">Tổng tiền</th>
                                    <th class="text-center">SĐT</th>
                                    <th class="text-center">Họ tên</th>
                                    <th class="text-center">Trạng Thái</th>
                                </tr>
                            </thead>
                            <tbody id="RowBill">
                                <!-- hàng sản phẩm -->
                                <?php
                                            
                                                foreach($data['hdlimit'] as $value)
                                                {
                                                                
                                            ?>
                                <tr>
                                    <td class="text-center text-muted"><?php echo $value->idhd; ?></td>
                                    <td class="text-center"><?php echo $value->username; ?></td>
                                    <td class="text-center">
                                        <div class="badge badge-warning"><?php GetCiTY($value->diachi); ?>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <?php echo number_format($value->tongtien,0,"","."); ?>
                                    </td>
                                    <td class="text-center"><?php echo $value->sdt; ?></td>
                                    <td class="text-center"><?php echo $value->hoten; ?></td>
                                    <td class="text-center"><?php echo $value->TrangThai; ?></td>
                                    <td class="text-center ">
                                        <a href="./AdminBill/xoa/<?php echo $value->idhd; ?>"
                                            onclick="return confirm('Bạn có muốn xóa hóa đơn này không này không?')">
                                            <button type="button" id="PopoverCustomT-1"
                                                class="btn btn-primary btn-sm">Xóa</button>
                                        </a>
                                        <button type="button" style="margin-top:5px;"
                                            class="btn btn-primary btn-sm UpdateBill" data-toggle="modal"
                                            value="<?php echo $value->idhd; ?>" data-target=".bd-UpdateBill-modal-lg">
                                            Sữa
                                        </button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-block text-center card-footer">
                        <ul class="pagination" style="padding-left:35%">
                            <li class="page-item"><a href="./AdminBill/sayhi/page=<?php  echo $data['now_page']-1; ?>"
                                    class="page-link" aria-label="Previous"><span aria-hidden="true">«</span><span
                                        class="sr-only">Previous</span></a></li>
                            <?php for($i =1;$i<=$data['num_page'];$i++){ ?>
                            <li class="page-item <?php if($i == $data['now_page']) echo "active"; ?>"><a
                                    href="./AdminBill/sayhi/page=<?php echo $i; ?>"
                                    class="page-link"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li class="page-item"><a href="./AdminBill/sayhi/page=<?php echo $data['now_page']+1; ?>"
                                    class="page-link" aria-label="Next"><span aria-hidden="true">»</span><span
                                        class="sr-only">Next</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>