<span>Quận huyện:</span>
<select name="quan" id="qh" class="custom-select custom-select-sm">
    <option selected value=" ">Chọn quận huyện</option>
    <?php foreach($data['qh'] as $v) { ?>
    <option value="<?php echo $v->maqh; ?>"><?php echo $v->name; ?></option>
    <?php } ?>
</select>