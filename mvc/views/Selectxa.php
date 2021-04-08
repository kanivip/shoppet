<span>Xã phường:</span>
<select name="xa" id="xp" class="custom-select custom-select-sm">
    <option selected value=" ">Chọn phường xã</option>
    <?php foreach($data['xp'] as $v) { ?>
    <option value="<?php echo $v->xaid; ?>"><?php echo $v->name; ?></option>
    <?php } ?>
</select>