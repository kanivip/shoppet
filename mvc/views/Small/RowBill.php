<?php
function GetCiTY($str){
    $arr = explode(",",$str);
    echo $arr[0];
}                           
foreach($data['hdlimit'] as $value)
    {
                                                            
?>
<tr>
    <td class="text-center text-muted"><?php echo $value->idhd; ?></td>
    <td class="text-center"><?php echo $value->username; ?></td>
    <td class="text-center">
        <div class="badge badge-warning"><?php GetCiTY($value->diachi); ?>
        </div>
    </td>
    <td class="text-center">
        <?php echo number_format($value->tongtien,0,"","."); ?>
    </td>
    <td class="text-center"><?php echo $value->sdt; ?></td>
    <td class="text-center"><?php echo $value->hoten; ?></td>
    <td class="text-center"><?php echo $value->TrangThai; ?></td>
    <td class="text-center ">
        <a href="./AdminBill/xoa/<?php echo $value->idhd; ?>"
            onclick="return confirm('Bạn có muốn xóa hóa đơn này không này không?')">
            <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Xóa</button>
        </a>
        <button type="button" style="margin-top:5px;" class="btn btn-primary btn-sm UpdateBill" data-toggle="modal"
            value="<?php echo $value->idhd; ?>" data-target=".bd-UpdateBill-modal-lg">
            Sữa
        </button>
    </td>
</tr>
<?php } ?>