<?php
                                            

foreach($data['splimit'] as $value)
{
    
    ?>
<tr>
    <td class="text-center text-muted"><?php echo $value->idsp; ?></td>
    <td class="text-center"><?php echo $value->ten; ?></td>
    <td class="text-center">
        <div class="badge badge-warning"><?php echo $value->loai; ?></div>
    </td>
    <td class="text-center"><?php echo number_format($value->gia,0,"","."); ?>
    </td>
    <td class="text-center"><?php echo $value->giamgia; ?></td>
    <td class="text-center">
        <?php echo number_format((int)$value->gia*(1-$value->giamgia/100),0,"","."); ?>
    </td>
    <td class="text-center ">
        <a href="./AdminSale/xoa/<?php echo $value->idsp; ?>"
            onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')">
            <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Xóa</button>
        </a>
    </td>
</tr>
<?php } ?>