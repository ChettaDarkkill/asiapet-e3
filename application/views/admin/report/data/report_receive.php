
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <br/>
  <div style="text-align: center;">
    <h1>รายงานสรุปรายรับของร้าน<br>
    </h1>
    <p>เอเชียเพทออนไลน์ เลขที่ 320/12 ถนนพหลโยธิน ตำบลนครสวรรค์ตก อำเภอเมือง จังหวัดนครสวรรค์</p>
    <p>ข้อมูลวันที่ <?php echo date('d'). ' ' . showLongDate(date('m'),date('Y'),'th'); ?></p>
  </div>
  <div style="width: 80%; margin: 0 auto; text-align: center;">
  <table border="1" cellspacing="0" style="width:100%;">
        <thead>
            <tr style="background-color: #ccc;">
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
</body>
</html>
