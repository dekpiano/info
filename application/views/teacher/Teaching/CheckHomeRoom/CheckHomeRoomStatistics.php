<!-- Page Header-->
<header class="page-header">
    <div class="container-fluid">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center ">
            <h2 class="no-margin-bottom"><?=$title;?> ห้องเรียนชั้น ม.<?=$teacher[0]->Reg_Class;?></h2>
            <p class="mb-0">

            </p>
        </div>
    </div>
</header>
<div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=base_url('Teacher/Teaching/CheckHomeRoomMain');?>">หน้าแรก</a></li>
        <li class="breadcrumb-item active">สถิติโฮมรูม</li>
    </ul>
</div>

<section class="tables">

    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">สถิติรายวัน </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>วันที่</th>
                                    <th>มา</th>
                                    <th>ขาด</th>
                                    <th>สาย</th>
                                    <th>ลา</th>
                                    <th>กิจกรรม</th>
                                    <th>ไม่เข้าแถว</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ChkHomeRoom as $key => $v_ChkHomeRoom) : ?>
                                <tr>
                                    <th scope="row">
                                        <?=$this->datethai->thai_date_fullmonth(strtotime($v_ChkHomeRoom->chk_home_date))?> <?=$v_ChkHomeRoom->chk_home_time?>
                                    </th>
                                    <td>
                                        <?=$v_ChkHomeRoom->chk_home_ma !== "" ? $data[] =  count(explode('|', $v_ChkHomeRoom->chk_home_ma)) : $data[] = 0;?>
                                    </td>
                                    <td><?=$v_ChkHomeRoom->chk_home_khad !== "" ? $data[] =  count(explode('|', $v_ChkHomeRoom->chk_home_khad)) : $data[] = 0;?>
                                    </td>
                                    <td><?=$v_ChkHomeRoom->chk_home_sahy !== "" ? $data[] =  count(explode('|', $v_ChkHomeRoom->chk_home_sahy)) : $data[] = 0;?>
                                    </td>
                                    <td><?=$v_ChkHomeRoom->chk_home_la !== "" ? $data[] =  count(explode('|', $v_ChkHomeRoom->chk_home_la)) : $data[] = 0;?>
                                    </td>
                                    <td><?=$v_ChkHomeRoom->chk_home_kid !== "" ? $data[] =  count(explode('|', $v_ChkHomeRoom->chk_home_kid)) : $data[] = 0;?>
                                    </td>
                                    <td><?=$v_ChkHomeRoom->chk_home_hnee !== "" ? $data[] =  count(explode('|', $v_ChkHomeRoom->chk_home_hnee)) : $data[] = 0;?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

</section>