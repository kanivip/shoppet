<?php if(isset($data['sp'])){
    foreach($data['sp'] as $value)
    {

?>
<option value="<?php echo $value->ten; ?>">
    <?php
    }
} ?>