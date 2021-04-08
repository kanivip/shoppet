<!-- Modal UpdateBill-->
<div class="modal fade bd-UpdateBill-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Sữa hóa đơn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="./AdminBill/sua" method="post" enctype="multipart/form-data">
                        <input type="text" name="idhd" id="idhd" style="display:none;">
                        <div class="position-relative form-group"><label for="exampleEmail"
                                class="">Username</label><input name="txtusername" id="txtusername" type="text"
                                class="form-control" readonly></div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-10">
                                <div id="tp1" style="margin-top:5px;">
                                    <span>Thành phố:</span>
                                    <select name="tp" id="tp" class="custom-select custom-select-sm" required>
                                        <option selected value=" ">Chọn thành phố</option>
                                        <?php foreach($data['tp'] as $v) { ?>
                                        <option value="<?php echo $v->matp; ?>"><?php echo $v->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div id="qh1" style="margin-top:5px; ">
                                    <span>Quận huyện:</span>
                                    <select name="quan" id="qh" class="custom-select custom-select-sm" required>
                                        <option selected value=" ">Chọn quận huyện</option>
                                        <?php foreach($data['qh'] as $v) { ?>
                                        <option value="<?php echo $v->maqh; ?>"><?php echo $v->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div id="xp1" style="margin-top:5px;  ">
                                    <span>Xã phường:</span>
                                    <select name="xa" id="xp" class="custom-select custom-select-sm" required>
                                        <option selected value=" ">Chọn phường xã</option>
                                        <?php foreach($data['xp'] as $v) { ?>
                                        <option value="<?php echo $v->xaid; ?>"><?php echo $v->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div id="dc1" style="margin-top:5px;  ">
                                    <span>Số nhà:</span><input type="text" class="form-control" name="sonha"
                                        id="txtsonha" placeholder="Số nhà" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">Tổng tiền</label><input
                        name="txttongtien" min="1" id="txttongtien" type="number" class="form-control" required>
                </div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">SĐT</label><input
                        name="txtsdt" min="1" id="txtsdt" type="number" class="form-control" required>
                </div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">Họ tên</label><input
                        name="txthoten" id="txthoten" type="text" class="form-control" required></div>
                <div class="position-relative form-group"><label for="exampleSelect" class="">Trạng
                        thái</label><select name="opttrangthai" id="opttrangthai" class="form-control" required>
                        <option value="chưa duyệt đơn">chưa duyệt đơn</option>
                        <option value="đã duyệt đơn">đã duyệt đơn</option>
                        <option value="đã thanh toán">đã thanh toán</option>
                    </select></div>

                <button class="mt-1 btn btn-primary" name="suasp">Sữa</button>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>