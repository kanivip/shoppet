<div class="col-md-9">
    <div class="row">
        <div class="btn-group alg-right-pad">
            <button type="button" class="btn btn-default"><strong>1235 </strong>items</button>
            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    Sort Products &nbsp;
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">By Price Low</a></li>
                    <li class="divider"></li>
                    <li><a href="#">By Price High</a></li>
                    <li class="divider"></li>
                    <li><a href="#">By Popularity</a></li>
                    <li class="divider"></li>
                    <li><a href="#">By Reviews</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <?php 
                if(Count($data['SP'])<=0 || $data['SP'] === false )
                    echo "Không có sản phẩm nào";
                else {
                 foreach($data['SP'] as $value){
                     ?>

        <div style="height:480px" class="col-md-4 text-center col-sm-6 col-xs-6 ">
            <div class="thumbnail product-box">
                <img src="<?php echo $value->anh; ?>" alt="" />
                <div class="caption">
                    <h4><a href="#"><?php echo $value->ten; ?> </a></h4>
                    <p>Price : <strong><?php echo number_format($value->gia,0,"","."); ?></strong> </p>
                    <p class="text-danger"><?php echo $value->loai; ?> </p>
                    <p><a href="./DetailProduct/SayHi/<?php echo $value->idsp ?>" class="btn btn-primary"
                            role="button">See Details</a></p>
                </div>
            </div>
        </div>
        <?php } 
                }
                    ?>
    </div>