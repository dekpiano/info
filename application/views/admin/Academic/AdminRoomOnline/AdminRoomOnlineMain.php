<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <!-- Dashboard Counts Section-->
            <section class="">
                <div class="container-fluid">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header align-items-center">
                                <h3 class="h4 float-left">จัดการห้องเรียนออนไลน์ </h3>
                                <button type="button" class="btn btn-primary float-right ShowAddRoomOnline">
                                    + เพิ่มห้องเรียนออนไลน์
                                </button>
                                <!-- data-toggle="modal" data-target="#AddRoomOnline" -->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover display" id="example" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ปีการศึกษา</th>
                                                <th>รหัสวิชา</th>
                                                <th>ชื่อวิชา</th>
                                                <th>ระดับชั้น</th>
                                                <th>ครูผู้สอน</th>
                                                <th>ลิ้งก์ห้องส่งงาน (แนะนำ Classroom)</th>
                                                <th>ลิ้งก์ห้องเรียนออนไลน์ Meet,Line,Facebook, อื่นๆ </th>
                                                <th>คำสั่ง</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($RoomOnline as $key => $v_RoomOnline) : ?>
                                            <tr>
                                                <td><?=$v_RoomOnline->roomon_year.'/'.$v_RoomOnline->roomon_term?></td>
                                                <td><?=$v_RoomOnline->roomon_coursecode?></td>                                                
                                                <td><?=$v_RoomOnline->roomon_coursename?></td>
                                                <td><?=$v_RoomOnline->roomon_classlevel?></td>
                                                <td><?=$v_RoomOnline->roomon_teachid?></td>
                                                <td><?=$v_RoomOnline->roomon_linkroom?></td>
                                                <td><?=$v_RoomOnline->roomon_liveroom?></td>
                                                <td><a href="#" class="ShowEditRoomOnline"
                                                        roomid="<?=$v_RoomOnline->roomon_id;?>">แก้ไข</a>|<a href="#"
                                                        class="ShowDeleteRoomOnline"
                                                        roomid="<?=$v_RoomOnline->roomon_id;?>">ลบ</a></td>
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


            <!-- The Modal -->
            <div class="modal fade" id="AddRoomOnline" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">เพิ่มห้องเรียนออนไลน์</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="post" id="FormRoomOnline" class="needs-validation" novalidate>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="roomon_year">ปีการศึกษา</label>
                                            <select class="form-control" id="roomon_year" name="roomon_year" required>
                                                <option value="">เลือกปีการศึกษา</option>
                                                <?php $year = date('Y')+543;
                                    for ($i=$year-1; $i <= $year+1; $i++) : ?>
                                                <option <?=$year==$i ?"selected":""?> value="<?=$i?>"><?=$i?></option>
                                                <?php endfor; ?>
                                            </select>
                                            <div class="invalid-feedback">กรุณาเลือกปีการศึกษา</div>
                                        </div>
                                        <div class="col">
                                            <label for="roomon_term">ภาคเรียน</label>
                                            <select class="form-control" id="roomon_term" name="roomon_term" required>
                                                <option value="">เลือกภาคเรียน</option>
                                                <?php 
                                    for ($i=1; $i <= 3; $i++) : ?>
                                                <option value="<?=$i?>"><?=$i?></option>
                                                <?php endfor; ?>
                                            </select>
                                            <div class="invalid-feedback">กรุณาเลือกภาคเรียน</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="roomon_coursecode">รหัสวิชา</label>
                                    <input type="text" class="form-control" placeholder="กรอกรหัสวิชา"
                                        id="roomon_coursecode" name="roomon_coursecode" required value="">
                                    <div class="invalid-feedback">กรุณากรอกรหัสวิชา</div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="roomon_coursename">ชื่อวิชา</label>
                                    <input type="text" class="form-control" placeholder="กรอกชื่อวิชา"
                                        id="roomon_coursename" name="roomon_coursename" required value="">
                                    <div class="invalid-feedback">กรุณากรอกชื่อวิชา</div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class="form-group">
                                        <label for="roomon_classlevel">ระดับชั้น (เลือกได้มากกว่า 1 ห้อง กรณีสอนรวม)</label>
                                        <select class="" id="roomon_classlevel" name="roomon_classlevel[]"
                                            required multiple>
                                            <option value="">เลือกระดับชั้น</option>
                                            <?php 
                                    foreach ($this->classroom->ListRoom() as $key => $value) :
                                ?>
                                            <option value="<?=$value?>"><?=$value?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">กรุณาเลือกระดับชั้น</div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="teacher">ครูผู้สอน:</label>
                                    <select name="roomon_teachid" id="roomon_teachid" class="single form-control"
                                        required>
                                        <option value=''>เลือกครูผู้สอน</option>
                                        <?php foreach ($NameTeacher as $key => $v_NameTeacher) : ?>
                                        <option value="<?=$v_NameTeacher->pers_id?>">
                                            <?=$v_NameTeacher->pers_prefix.$v_NameTeacher->pers_firstname.' '.$v_NameTeacher->pers_lastname?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">กรุณาเลือกครูผู้สอน</div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="roomon_linkroom">ลิ้งก์ห้องส่งงาน (แนะนำ Classroom)</label>
                                    <input type="text" class="form-control"
                                        placeholder="ใส่	ลิ้งก์ห้องส่งงาน (แนะนำ Classroom)" id="roomon_linkroom"
                                        name="roomon_linkroom" required value="">
                                    <div class="invalid-feedback">กรุณาใส่ลิ้งก์ห้องส่งงาน (แนะนำ Classroom)</div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="roomon_liveroom">ลิ้งก์ห้องเรียนออนไลน์ Meet,Line,Facebook,
                                        อื่นๆ</label>
                                    <input type="text" class="form-control"
                                        placeholder="ใส่	ลิ้งก์ห้องเรียนออนไลน์ Meet,Line,Facebook, อื่นๆ"
                                        id="roomon_liveroom" name="roomon_liveroom" required value="">
                                    <div class="invalid-feedback">กรุณาใส่ลิ้งก์ห้องเรียนออนไลน์ Meet,Line,Facebook,
                                        อื่นๆ</div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="roomon_note">หมายเหตุ</label>
                                    <input type="text" class="form-control" placeholder="หมายเหตุ" id="roomon_note"
                                        name="roomon_note" value="">
                                    <div class="invalid-feedback">กรุณาใส่หมายเหตุ</div>
                                </div>
                                <input type="text" class="form-control d-none" id="roomon_id" name="roomon_id" value="">
                                <button type="submit" class="btn btn-primary mt-3">บันทึกข้อมูล</button>
                                <button type="button" class="btn btn-secondary mt-3 btn-out" data-bs-dismiss="modal" style="float:right;">ออก</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="DeleteRoomOnline" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">ลบข้อมูล</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" class="FormDeleteRoomOnline">
                            <div class="modal-body">
                                <p>คุณต้องการลบข้อมูลหรือไม่</p>
                                <input type="text" class="d-none" id="del_roomon_id" name="del_roomon_id" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">ลบ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>