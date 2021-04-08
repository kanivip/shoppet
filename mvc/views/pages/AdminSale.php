<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <h5 class="card-title">Chức năng</h5>
                    <div class="text-left">
                        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal"
                            data-target=".bd-saleproduct-modal-lg">
                            Thêm giảm giá
                        </button>
                    </div>
                    <div>
                        Thông báo:<?php if(isset($data['warn'])) echo $data['warn']; ?>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-header">Active Users
                        <div class="input-group col-5 btn-actions-pane-right ">
                            <div class="input-group-prepend col-3">
                                <label class="input-group-text" for="inputGroupSelect01">Cột</label>
                            </div>
                            <select class="custom-select" id="optcolumnSale">
                                <option value="TenSP" selected>Tên sản phẩm</option>
                                <option value="GiaSP">Giá</option>
                                <option value="LoaiSP">Loại</option>
                                <option value="giamgia">% giảm</option>
                            </select>
                        </div>

                        <form class="form-inline btn-actions-pane-right">
                            <input id="txtsearchSale" class="form-control " type="search" placeholder="Search"
                                aria-label="Search">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Tên sản phẩm</th>
                                    <th class="text-center">Loại</th>
                                    <th class="text-center">Giá</th>
                                    <th class="text-center">% giảm</th>
                                    <th class="text-center">Giá sau giảm</th>
                                </tr>
                            </thead>
                            <tbody id="RowSale">
                                <!-- hàng sản phẩm -->
                                <?php
                                            

                                                foreach($data['splimit'] as $value)
                                                {
                                                                
                                            ?>
                                <tr>
                                    <td class="text-center text-muted"><?php echo $value->idsp; ?></td>
                                    <td class="text-center"><?php echo $value->ten; ?></td>
                                    <td class="text-center">
                                        <div class="badge badge-warning"><?php echo $value->loai; ?></div>
                                    </td>
                                    <td class="text-center"><?php echo number_format($value->gia,0,"","."); ?>
                                    </td>
                                    <td class="text-center"><?php echo $value->giamgia; ?></td>
                                    <td class="text-center">
                                        <?php echo number_format((int)$value->gia*(1-$value->giamgia/100),0,"","."); ?>
                                    </td>
                                    <td class="text-center ">
                                        <a href="./AdminSale/xoa/<?php echo $value->idsp; ?>"
                                            onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')">
                                            <button type="button" id="PopoverCustomT-1"
                                                class="btn btn-primary btn-sm">Xóa</button>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-block text-center card-footer">
                        <ul class="pagination" style="padding-left:35%">
                            <li class="page-item"><a href="./AdminSale/sayhi/page=<?php  echo $data['now_page']-1; ?>"
                                    class="page-link" aria-label="Previous"><span aria-hidden="true">«</span><span
                                        class="sr-only">Previous</span></a></li>
                            <?php for($i =1;$i<=$data['num_page'];$i++){ ?>
                            <li class="page-item <?php if($i == $data['now_page']) echo "active"; ?>"><a
                                    href="./AdminSale/sayhi/page=<?php echo $i; ?>"
                                    class="page-link"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li class="page-item"><a href="./AdminSale/sayhi/page=<?php echo $data['now_page']+1; ?>"
                                    class="page-link" aria-label="Next"><span aria-hidden="true">»</span><span
                                        class="sr-only">Next</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>