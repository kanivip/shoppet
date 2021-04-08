<div class="col-md-9">
    <div>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active"><?php echo $data['SP'][0]->loai; ?></li>
        </ol>
    </div>
    <!-- /.div -->
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
        <?php $num = 0;
                 foreach($data['SP'] as $value){
                     $num++;
                     if($num==4) break; 
                     ?>

        <div class="col-md-4 text-center col-sm-6 col-xs-6 ">
            <div class="thumbnail product-box">
                <img src="<?php echo $value->anh; ?>" alt="" />
                <div class="caption">
                    <h4><a href="#"><?php echo $value->ten; ?> </a></h4>

                    <p>Price :
                        <strong
                            <?php if($value->giamgia>0) echo 'class="sale"' ?>><?php echo number_format($value->gia,0,"","."); ?></strong>
                    </p>
                    <?php if($value->giamgia>0) { ?>
                    <p class="changecolor">Sale <?php echo $value->giamgia ?> %:
                        <strong><?php echo number_format((int)$value->gia*(1-$value->giamgia/100),0,"","."); ?></strong>
                    </p>
                    <?php } ?>
                    <p class="text-danger"><?php echo $value->loai; ?> </p>
                    <p> <a href="./DetailProduct/SayHi/<?php echo $value->idsp ?>" class="btn btn-primary"
                            role="button">See Details</a></p>
                </div>
            </div>
        </div>

        <?php } ?>
        <div id="producttest"></div>

        <!-- /.col -->
        <div class="row">
            <input type="hidden" id="loai" value="<?php echo $data['SP'][0]->loai; ?>">
            <input type="hidden" id="pageno" value="1">
            <img id="loader" src="./public/images/103.gif">
        </div>
    </div>
    <!-- /.col -->
</div>
</div>
</div>