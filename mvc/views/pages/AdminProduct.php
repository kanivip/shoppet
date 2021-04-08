<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <h5 class="card-title">Chức năng</h5>
                    <div class="text-left">
                        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal"
                            data-target=".bd-addproduct-modal-lg">
                            Thêm sản phẩm
                        </button>
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
                            <select class="custom-select" id="optcolumnSP">
                                <option value="TenSP" selected>Tên sản phẩm</option>
                                <option value="GiaSP">Giá</option>
                                <option value="LoaiSP">Loại</option>
                            </select>
                        </div>

                        <form class="form-inline btn-actions-pane-right">
                            <input id="txtsearchSP" class="form-control " type="search" placeholder="Search"
                                aria-label="Search">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Ảnh</th>
                                    <th class="text-center">Tên</th>
                                    <th class="text-center">Loại</th>
                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Số Lượng</th>
                                    <th class="text-center">Nội dung</th>
                                    <th class="text-center">Ngày thêm</th>
                                </tr>
                            </thead>
                            <tbody id="RowProduct">
                                <!-- hàng sản phẩm -->
                                <?php
                                            

                                                foreach($data['splimit'] as $value)
                                                {
                                                                
                                            ?>
                                <tr>
                                    <td class="text-center text-muted"><?php echo $value->idsp; ?></td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-content-left">
                                                        <img width="60" class="rounded-circle"
                                                            src="<?php echo $value->anh; ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><?php echo $value->ten; ?></td>
                                    <td class="text-center">
                                        <div class="badge badge-warning"><?php echo $value->loai; ?></div>
                                    </td>
                                    <td class="text-center"><?php echo number_format($value->gia,0,"","."); ?>
                                    </td>
                                    <td class="text-center"><?php echo $value->soluong; ?></td>
                                    <td class="text-center"><?php echo RutGon($value->noidung); ?></td>
                                    <td class="text-center"><?php echo $value->ngaythem; ?></td>
                                    <td class="text-center ">
                                        <a href="./AdminProduct/xoa/<?php echo $value->idsp; ?>"
                                            onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')">
                                            <button type="button" id="PopoverCustomT-1"
                                                class="btn btn-primary btn-sm">Xóa</button>
                                        </a>
                                        <button type="button" style="margin-top:5px;"
                                            class="btn btn-primary btn-sm UpdateProduct " data-toggle="modal"
                                            value="<?php echo $value->idsp; ?>"
                                            data-target=".bd-UpdateProduct-modal-lg">
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
                            <li class="page-item"><a
                                    href="./AdminProduct/sayhi/page=<?php  echo $data['now_page']-1; ?>"
                                    class="page-link" aria-label="Previous"><span aria-hidden="true">«</span><span
                                        class="sr-only">Previous</span></a></li>
                            <?php for($i =1;$i<=$data['num_page'];$i++){ ?>
                            <li class="page-item <?php if($i == $data['now_page']) echo "active"; ?>"><a
                                    href="./AdminProduct/sayhi/page=<?php echo $i; ?>"
                                    class="page-link"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li class="page-item"><a href="./AdminProduct/sayhi/page=<?php echo $data['now_page']+1; ?>"
                                    class="page-link" aria-label="Next"><span aria-hidden="true">»</span><span
                                        class="sr-only">Next</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>