<!-- Page Header-->
<header class="page-header">
    <div class="container-fluid">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center ">
        <h2 class="no-margin-bottom">แผนการสอน</h2>
            <p class="mb-0">
               
                <a href="<?=base_url('Teacher/Course/SendPlan');?>" class="btn btn-primary mb-2 mb-sm-0 text-white">+ ส่งงาน</a>
            </p>
        </div>       
    </div>
</header>
<!-- Dashboard Counts Section-->
<section class="">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ภาคเรียน</th>
                            <th>ปีการศึกษา</th>
                            <th>ประเภท</th>
                            <th>รหัสวิชา</th>
                            <th>ชื่อวิชา</th>
                            <th>วันที่ส่ง</th>
                            <th>หน.กลุ่มสาระ</th>
                            <th>หน.งานพัฒนาหลักสูตร</th>
                            <th>คำสั่ง</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($plan as $key => $v_plan) : ?>
                        <tr>
                            <td>2<?=$v_plan->seplan_term;?></td>
                            <td>2563<?=$v_plan->seplan_year;?></td>
                            <td><?=$v_plan->seplan_typeplan;?></td>
                            <td><?=$v_plan->seplan_coursecode;?></td>
                            <td><?=$v_plan->seplan_namesubject;?></td>
                            <td><?=$v_plan->seplan_createdate;?></td>
                            <td class="text-center"><span class="badge badge-success">ผ่าน</span><?=$v_plan->seplan_status1;?></td>
                            <td class="text-center"><span class="badge badge-danger">ไม่ผ่าน</span><?=$v_plan->seplan_status2;?></td>
                            <td><a href="" class="btn btn-warning btn-sm text-white">แก้ไข</a> <a href="" class="btn btn-danger btn-sm text-white">ลบ</a></td>
                        </tr>
                      <?php endforeach; ?>

                    </tbody>
        
                </table>
            </div>
        </div>
    </div>
</section>