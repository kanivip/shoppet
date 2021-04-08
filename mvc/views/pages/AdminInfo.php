<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="divider mt-0" style="margin-bottom: 30px;"></div>
        <div class="main-card mb-3 card">
            <div class="no-gutters row">
                <div class="col-md-6">
                    <div class="pt-0 pb-0 card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Tổng sản phẩm</div>
                                                <div class="widget-subheading">Từ trước đến nay</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success">
                                                    <?php if(isset($data['tongsp'])) echo $data['tongsp']; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Sản phẩm đã bán</div>
                                                <div class="widget-subheading">Từ trước đến nay</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-primary">
                                                    <?php if(isset($data['dathanhtoan'])) echo $data['dathanhtoan']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pt-0 pb-0 card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Sản phẩm còn lại</div>
                                                <div class="widget-subheading">Từ trước đến nay</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-danger">
                                                    <?php if(isset($data['dathanhtoan']) && isset($data['tongsp']) ) echo $data['tongsp']-$data['dathanhtoan']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Sản phẩm được thêm</div>
                                                <div class="widget-subheading">Tháng này</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning">
                                                    <?php if(isset($data['spthem'])) echo $data['spthem']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Tổng tiền sản phẩm đã bán</div>
                        <div class="widget-subheading">Từ trước đến nay</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning">
                            <?php if(isset($data['tongtiendatra'])) echo number_format($data['tongtiendatra'],0,".",",") ?>VNĐ
                        </div>
                    </div>
                </div>
                <div class="widget-progress-wrapper">
                    <div class="progress-bar-xs progress-bar-animated-alt progress">
                        <div class="progress-bar bg-danger" role="progressbar"
                            aria-valuenow="<?php if(isset($data['tongtiendatra']) && isset($data['tongtiensp'])) echo (int)($data['tongtiendatra']/$data['tongtiensp']*100); ?>"
                            aria-valuemin="0" aria-valuemax="100"
                            style="width: <?php if(isset($data['tongtiendatra']) && isset($data['tongtiensp'])) echo (int)($data['tongtiendatra']/$data['tongtiensp']*100); ?>%;">
                        </div>
                    </div>
                    <div class="progress-sub-label">
                        <div class="sub-label-left">Tỉ lệ</div>
                        <div class="sub-label-right">
                            <?php if(isset($data['tongtiendatra']) && isset($data['tongtiensp'])) echo (int)($data['tongtiendatra']/$data['tongtiensp']*100); ?>%
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h3>Top sản phẩm được quan tâm</h3>
                    <ul class="list-group">

                        <?php foreach($data['topspcomment'] as $value) { ?>
                        <li class="list-group-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading"><?php echo $value->TenSP; ?></div>
                                            <div class="widget-subheading"><?php echo $value->loai; ?></div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-success">
                                                <?php echo round($value->star,1); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>