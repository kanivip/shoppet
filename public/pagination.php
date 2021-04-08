<?php 
$pageno = $_POST['pageno'];
$loai = $_POST['loai'];
$no_of_records_per_page = 3;
$offset = ($pageno-1) * $no_of_records_per_page;
$conn=mysqli_connect("localhost","root","","shoppet");
mysqli_query($conn, "SET NAMES 'utf8'");
            // Check connection
            if (mysqli_connect_errno()){
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                die();
            }
            $sql = "SELECT * FROM sanpham WHERE LoaiSP = '$loai' LIMIT $offset,$no_of_records_per_page ";
            $res_data = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($res_data)){ ?>
<div class="col-md-4 text-center col-sm-6 col-xs-6 ">
    <div class="thumbnail product-box">
        <img src="<?php echo $row['AnhSP']; ?>" alt="" />
        <div class="caption">
            <h4><a href="#"><?php echo $row['TenSP']; ?> </a></h4>
            <p>Price :
                <strong
                    <?php if($row['giamgia']>0) echo 'class="sale"' ?>><?php echo number_format($row['GiaSP'],0,"","."); ?></strong>
            </p>
            <?php if($row['giamgia']>0) { ?>
            <p class="changecolor">Sale <?php echo $row['giamgia']; ?> %:
                <strong><?php echo number_format((int)$row['GiaSP']*(1-$row['giamgia']/100),0,"","."); ?></strong>
            </p>
            <?php } ?>
            <p class="text-danger"><?php echo $row['LoaiSP']; ?> </p>
            <p> <a href="./DetailProduct/SayHi/<?php echo $row['idSP'] ?>" class="btn btn-primary" role="button">See
                    Details</a></p>
        </div>
    </div>
</div>
<?php
            }
            mysqli_close($conn);
            ?>