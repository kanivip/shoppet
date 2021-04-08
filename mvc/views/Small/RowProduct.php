<?php
function RutGon($str){
    $arr = explode(' ',$str);
    if(count($arr)>15)
        {
            for ($i=0; $i<=15; $i++){
                echo $arr[$i]." ";
            }
        }
    else
        echo $str;
}
foreach($data['splimit'] as $value)
{

?>
<tr>
    <td class="text-center text-muted"><?php echo $value->idsp; ?></td>
    <td>
        <div class="widget-content p-0">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <div class="widget-content-left">
                        <img width="60" class="rounded-circle" src="<?php echo $value->anh; ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </td>
    <td class="text-center"><?php echo $value->ten; ?></td>
    <td class="text-center">
        <div class="badge badge-warning"><?php echo $value->loai; ?></div>
    </td>
    <td class="text-center"><?php echo number_format($value->gia,0,"","."); ?>
    </td>
    <td class="text-center"><?php echo $value->soluong; ?></td>
    <td class="text-center"><?php echo RutGon($value->noidung); ?></td>
    <td class="text-center"><?php echo $value->ngaythem; ?></td>
    <td class="text-center ">
        <a href="./AdminProduct/xoa/<?php echo $value->idsp; ?>"
            onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')">
            <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Xóa</button>
        </a>
        <button type="button" style="margin-top:5px;" class="btn btn-primary btn-sm UpdateProduct " data-toggle="modal"
            value="<?php echo $value->idsp; ?>" data-target=".bd-UpdateProduct-modal-lg">
            Sữa
        </button>
    </td>
</tr>
<?php } ?>