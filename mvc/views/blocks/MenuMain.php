<div class="row" style=" margin-top:0px">
            <div class="col-md-12 ">
                <div class="well well-lg offer-box text-center">


                   Today's Offer : &nbsp; <span class="glyphicon glyphicon-cog"></span>&nbsp;40 % off  on purchase of $ 2,000 and above till 24 dec !                
              
               
                </div>
                <div class="main box-border">
                    <div id="mi-slider" class="mi-slider">
                        <ul>
                            <?php foreach($data['pk'] as $value) { ?>
                            <li><a href="./DetailProduct/SayHi/<?php echo $value->idsp ?>">
                                <img src="<?php echo $value->anh ?>" alt="img01"><h4><?php echo $value->ten ?></h4>
                            </a></li>
                            <?php } ?>
                        </ul>
                        <ul>
                        <?php foreach($data['alk'] as $value) { ?>
                            <li><a href="./DetailProduct/SayHi/<?php echo $value->idsp ?>">
                                <img src="<?php echo $value->anh ?>" alt="img01"><h4><?php echo $value->ten ?></h4>
                            </a></li>
                            <?php } ?>
                        </ul>
                        <ul>
                        <?php foreach($data['hun'] as $value) { ?>
                            <li><a href="./DetailProduct/SayHi/<?php echo $value->idsp ?>">
                                <img src="<?php echo $value->anh ?>" alt="img01"><h4><?php echo $value->ten ?></h4>
                            </a></li>
                            <?php } ?>
                        </ul>
                        <ul>
                        <?php foreach($data['pood'] as $value) { ?>
                            <li><a href="./DetailProduct/SayHi/<?php echo $value->idsp ?>">
                                <img src="<?php echo $value->anh ?>" alt="img01"><h4><?php echo $value->ten ?></h4>
                            </a></li>
                            <?php } ?>
                        </ul>
                        <nav>
                            <a href="#">Phụ kiện</a>
                            <a href="#">Alaska</a>
                            <a href="#">Husky</a>
                            <a href="#">Poodle</a>
                        </nav>
                    </div>
                    
                </div>
                <br />
            </div>
            </div>