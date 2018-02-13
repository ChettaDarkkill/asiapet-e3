        <?php $a =  base_url(); ?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            รายงานการจำหน่ายสินค้า<small></small>
                        </h1>
                    </div>
                </div>
            </div>
        <a href="<?php echo $a; ?>index.php/Report/ReportPayProduct/goReport" class="btn btn-lg btn-success">ออกรายงาน</a>
        <a onclick="goBack()" class="btn btn-lg btn-warning">ย้อนกลับ</a><br/><br/>
           <form action="">
                <div class = "row">
                  <div class="form-group">
                    <div class="col-md-3">
                      <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="appo_date" data-link-format="yyyy-mm-dd">
                      <input id="search_date_show" name="search_date_show"  class="form-control" size="16" placeholder="วันที่นัดหมาย" type="text" value="" readonly >
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
                    <input type="hidden" id="search_date" name="search_date" value="" />
                    </div>
                  </div>
                </div><br/>
              <button class="btn btn-lg btn-primary" type = "submit">ค้นหา</button>
              <a href="<?php echo $a; ?>index.php/Report/Report/reportPayProduct" class="btn btn-lg btn-warning">รีเซท</a>
            </form>
        <div class = "container">
            <div class = "row">
             <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อสินค้า</th>
                    <th>รายละเอียด</th>
                    <th>จำหน่ายจำนวน</th>
                    <th>หน่วยละ</th>
                    <th>ราคารวม</th>
                    <th>วันที่ขาย</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $count = 0 ;
                    if(count($data) > 0 ) { 
                        foreach ($data as $key => $value) {
                            $count++;
                  ?>
                  <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $value['product_name']; ?></td>
                    <td><?php echo $value['product_detail']; ?></td>
                    <td><?php echo $value['product_amt']; ?></td>
                    <td><?php echo $value['price']. ' บาท'; ?></td>
                    <td><?php echo $value['product_amt_sum']. ' บาท'; ?></td>
                    <td><?php echo date('Y-m-d', strtotime($value['created_dt_detail'])); ?></td>
                  </tr>
                  <?php }  } ?>
                </tbody>
              </table>
            </div>
        </div>
        </div>
<script type="text/javascript">
      $('.form_date').datetimepicker({
        // language:  'th',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
</script>