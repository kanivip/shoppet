<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <form action="./ShoppingCart/AddToCart" method="POST">
                    <div class="preview col-md-6">
                        <!-- dữ liệu sản phẩm -->
                        <input style="display:none" type="text" name="idsp"
                            value="<?php echo $data['sp'][0]->idsp; ?>" />
                        <input style="display:none" type="text" name="soluong" value="<?php echo 1; ?>" />
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="<?php echo $data['sp'][0]->anh; ?>" />
                            </div>
                        </div>

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title"><?php echo $data['sp'][0]->ten; ?></h3>
                        <p class="product-description"><?php echo $data['sp'][0]->noidung; ?></p>
                        <p>Price :
                            <strong
                                <?php if($data['sp'][0]->giamgia>0) echo 'class="sale"' ?>><?php echo number_format($data['sp'][0]->gia,0,"","."); ?></strong>
                        </p>
                        <?php if($data['sp'][0]->giamgia>0) { ?>
                        <p class="changecolor">Sale <?php echo $data['sp'][0]->giamgia ?> %:
                            <strong><?php echo number_format((int)$data['sp'][0]->gia*(1-$data['sp'][0]->giamgia/100),0,"","."); ?></strong>
                        </p>
                        <?php } ?>
                        <h4 class="price">Số lượng: <span><?php echo $data['sp'][0]->soluong; ?></span></h4>
                        <div class="action">
                            <button class="add-to-cart btn btn-default" type="submit">add to cart</button>
                            <button class="like btn btn-default" type="button"><span
                                    class="fa fa-heart"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- comments -->
        <div class="container mt-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-6">
                    <div class="p-3 bg-white rounded">
                        <h3 class="product-title">Đánh giá sản phẩm
                            [<?php  if(isset($data['star'])) echo $data['star']; ?>]
                        </h3>
                        <?php  if(isset($_SESSION['username'])) { ?>
                        <form action="./DetailProduct/Comment/<?php echo $data['sp'][0]->idsp; ?>" method="POST">
                            <input style="display:none" type="text" name="idsp"
                                value="<?php echo $data['sp'][0]->idsp; ?>" />
                            <input style="border:none; background:none; font-weight:900px" type="text" name="user"
                                value="<?php echo $_SESSION['username'] ?>" readonly />
                            </br>
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" checked />
                                <label for="star1" title="text">1 star</label>
                            </div>
                            <div class="form-group">
                                <textarea name="noidung" class="form-control" id="exampleFormControlTextarea1"
                                    rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Đánh giá</button>
                        </form>
                        <?php } ?>
                        </br>
                        <?php foreach($data['comment'] as $v) {?>
                        <div class="review mt-4">
                            <div class="ml-2">
                                <div class="d-flex flex-row align-items-center"><span
                                        class="name font-weight-bold"><?php echo $v->user; ?></span><span
                                        class="dot"></span><span class="date"><?php echo $v->date; ?></span></div>
                                <div class="rating">
                                    <?php for($i =1;$i<=5;$i++) { 
										if($v->star < $i){	
									?>
                                    <i class="fa fa-star "></i>
                                    <?php }else { ?>
                                    <i class="fa fa-star checked"></i>

                                    <?php } 
								} ?>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <p class="comment-text"><?php echo $v->nd; ?></p>
                        </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end comments -->
</div>
</div>