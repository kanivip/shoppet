 <!-- Modal addproduct-->
 <div class="modal fade bd-addproduct-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle">Thêm sản phẩm</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="card-body">
                     <form action="./AdminProduct/them" method="post" enctype="multipart/form-data">
                         <div class="position-relative form-group"><label for="exampleEmail" class="">Tên sản
                                 phẩm</label><input name="txtten" id="exampleEmail" type="text" class="form-control">
                         </div>
                         <div class="position-relative form-group"><label for="exampleEmail" class="">Giá</label><input
                                 name="txtgia" min="1" id="exampleEmail" type="number" class="form-control"></div>
                         <div class="position-relative form-group"><label for="exampleEmail" class="">Số
                                 Lượng</label><input name="txtsl" min="1" id="exampleEmail" type="number"
                                 class="form-control"></div>
                         <div class="position-relative form-group"><label for="exampleSelect" class="">Loại sản
                                 phẩm</label><select name="optloai" id="exampleSelect" class="form-control">
                                 <?php foreach($data['loaisp'] as $value){ ?>
                                 <option value="<?php echo $value?>"><?php echo $value?></option>
                                 <?php } ?>
                             </select></div>
                         <div class="position-relative form-group"><label for="exampleText" class="">Nội
                                 dung</label><textarea name="txtnd" id="exampleText" class="form-control"></textarea>
                         </div>
                         <div class="position-relative form-group"><label for="exampleFile" class="">Hình
                                 ảnh</label><input name="image" id="exampleFile" type="file" class="form-control-file">
                         </div>
                         <button class="mt-1 btn btn-primary" name="themsp">Thêm</button>
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

 <!-- Modal UpdateProduct-->
 <div class="modal fade bd-UpdateProduct-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle">Sữa sản phẩm</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="card-body">
                     <form action="./AdminProduct/sua" method="post" enctype="multipart/form-data">
                         <input type="text" name="idsp" id="idsp" style="display:none;">
                         <div class="position-relative form-group"><label for="exampleEmail" class="">Tên sản
                                 phẩm</label><input name="txtten" id="txtten" type="text" class="form-control"></div>
                         <div class="position-relative form-group"><label for="exampleEmail" class="">Giá</label><input
                                 name="txtgia" min="1" id="txtgia" type="number" class="form-control"></div>
                         <div class="position-relative form-group"><label for="exampleEmail" class="">Số
                                 Lượng</label><input name="txtsl" min="1" id="txtsl" type="number" class="form-control">
                         </div>
                         <div class="position-relative form-group"><label for="exampleSelect" class="">Loại sản
                                 phẩm</label><select name="optloai" id="optloai" class="form-control">
                                 <?php foreach($data['loaisp'] as $value){ ?>
                                 <option value="<?php echo $value?>"><?php echo $value?></option>
                                 <?php } ?>
                             </select></div>
                         <div class="position-relative form-group"><label for="exampleText" class="">Nội
                                 dung</label><textarea name="txtnd" id="txtnd" class="form-control"></textarea></div>
                         <div class="position-relative form-group"><label for="exampleFile" class="">Hình
                                 ảnh</label><input name="image" id="image" type="file" class="form-control-file">
                             <div>Ảnh củ</div>
                             <img id="hinh" src="" alt="" style="width:200px; height:200px">
                         </div>
                         <button class="mt-1 btn btn-primary" name="suasp">Sữa</button>
                     </form>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>