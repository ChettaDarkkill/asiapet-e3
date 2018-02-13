        <?php $a =  base_url(); ?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            รายงานสรุปรายรับของร้าน<small></small>
                        </h1>
                    </div>
                </div>
            </div>
        <a href="<?php echo $a; ?>index.php/Report/ReportReceive/goReport" class="btn btn-lg btn-success">ออกรายงาน</a>
        <a onclick="goBack()" class="btn btn-lg btn-warning">ย้อนกลับ</a><br/><br/>
        <div class = "container">
            <div class = "row">
             <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ลำดับ</th>
                    <th>สัตว์ที่รักษา</th>
                    <th>อาการ</th>
                    <th>ราคาหลัก</th>
                    <th>สินค้า</th>
                    <th>จำนวน</th>
                    <th>ราคาสินค้า</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      if(count($data) > 0) {
                        $count = 0;
                        $main = 0;
                        $product = 0;
                        foreach ($data as $key => $value) {
                        $count = $count + 1;
                        $main = $main + $value['service_bath'];
                        $product = $product + $value['product_amt_sum'];
                    ?>
                      <tr>
                        <td><?php echo  $count; ?></td>
                        <td><?php echo  $value['appo_animal']; ?></td>
                        <td><?php echo  $value['service_detail']; ?></td>
                        <td><?php echo  $value['service_bath']; ?></td>
                        <td><?php echo  $value['product_name']; ?></td>
                        <td><?php echo  $value['product_amt']; ?></td>
                        <td><?php echo  $value['product_amt_sum']; ?></td>
                      </tr>
                    <?php } }  ?>
                </tbody>    
              </table>
              <div>
                <h4> ยอดเงินหลักรวม : <?php echo $main; ?> บาท</h4>
                <h4> ยอดเงินสินค้ารวม : <?php echo $product; ?> บาท</h4>
                 <h3> รายได้ทั้งหมด : <span style="color:red"><?php echo $main + $product; ?></span> บาท</h3>
              </div>
            </div>
        </div>
        </div>
