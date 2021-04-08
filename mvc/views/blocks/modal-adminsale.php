 <!-- Modal sale-->
 <div class="modal fade bd-saleproduct-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle">Giảm giá</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="card-body">
                     <form action="./AdminSale/them" method="post" enctype="multipart/form-data">
                         <div class="form-check">
                             <input class="form-check-input" type="radio" name="radCheck" id="radCheck1" value="id"
                                 checked>
                             <label class="form-check-label" for="radCheck1">
                                 Theo Tên
                             </label>

                             <div class="position-relative form-group " id="divid"><input name="txtid" id="txtid"
                                     list="browsers" class="form-control col-6 ">
                             </div>
                             <datalist id="browsers">
                                 <option value="Chrome">
                             </datalist>
                         </div>

                         <div class="form-check">
                             <input class="form-check-input" type="radio" name="radCheck" id="radCheck2"
                                 value="species">
                             <label class="form-check-label" for="radCheck2">
                                 Theo loại
                             </label>
                             <div id="divloai" class="position-relative form-group "><select name="optloai"
                                     id="exampleSelect" class="form-control">
                                     <?php foreach($data['loaisp'] as $value){ ?>
                                     <option value="<?php echo $value?>"><?php echo $value?></option>
                                     <?php } ?>
                                 </select>
                             </div>
                         </div>

                         <div class="form-check">
                             <input class="form-check-input" type="radio" name="radCheck" id="radCheck3" value="price">
                             <label class="form-check-label" for="radCheck3">
                                 Theo giá
                             </label>
                             <div id="divgia">
                                 <div class="form-group row">
                                     <label for="inputEmail3" class="col-sm-2 col-form-label">Từ</label>
                                     <div class="col-sm-10">
                                         <input type="number" class="form-control" id="inputEmail3" name="txtstart"
                                             placeholder="Giá bắt đầu">
                                     </div>
                                 </div>
                                 <div class="form-group row">
                                     <label for="inputEmail3" class="col-sm-2 col-form-label">Đến</label>
                                     <div class="col-sm-10">
                                         <input type="number" class="form-control" id="inputEmail3" name="txtend"
                                             placeholder="Giá kết thúc">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="position-relative form-group"><label for="exampleEmail" class="">Tỷ lệ % giảm
                                 giá</label><input name="txtsale" min="1" max="100" id="exampleEmail" type="number"
                                 class="form-control"></div>
                         <button class="mt-1 btn btn-primary" name="themsale">Thêm</button>
                     </form>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>
 </div>
 </div>