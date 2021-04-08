<div class="col-md-3">
                <div>
                    <a href="#" class="list-group-item active">Phân Loại
                    </a>
                    <ul class="list-group">
                        <?php foreach($data['loaisp'] as $value){ ?>
                        
                        <li class="list-group-item"><a href="./Home/Sayhi/<?php echo $value->loai; ?>"><?php echo $value->ten; ?></a>
      <span class="label label-info pull-right"><?php echo $value->soluong; ?></span>
                        </li>
                        
                        <?php } ?>
                    </ul>
                </div>
            </div>