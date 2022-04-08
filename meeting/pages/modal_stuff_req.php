<!-- Modal Edit -->
<form action="" method="POST" id="ModalStatusstaff">
    <div class="modal fade" id="modalStatusStaff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center  edit-head">
                    <div class="text-center">
                        <h1> อนุมัติแบบฟอร์มขออนุญาตใช้ห้องประชุม </h1>
                    </div>
                </div>
                <div class="modal-body" id="modaldata">
                    <!-- style="overflow-x: scroll;" -->
                    <!--//? /.html data -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">สถานะ :</label>
                            <div class="col-md-10">
                                <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" data-placeholder="สถานะการอนุมัติ" id="ev_status" name="ev_status">
                                    <option value=""></option>
                                    <option value="3">อนุมัติ</option>
                                    <option value="4">ไม่อนุมัติ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">หัวข้อเรื่องประชุม :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control " id="modal_title" name="title" readonly />
                            </div>
                        </div>
                    </div>
                    <!--? /.Title Name -->
                    <!--? Input Time -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">เวลา :</label>
                            <div class="col-md-4">
                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" placeholder="00:00" id="modal_timeStart" name="timeStart" readonly />
                                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label class="col-md-2 col-form-label">ถึงเวลา :</label>
                            <div class="col-md-4">
                                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" placeholder="00:00" id="modal_timeEnd" name="timeEnd" readonly />
                                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--? /.Input Time -->
                    <!--? InputDate -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">วันที่ :</label>
                            <div class="col-md-4">
                                <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" placeholder="00/00/0000" id="modal_dateStart" name="dateStart" readonly />
                                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label class="col-md-2 col-form-label">ถึงวันที่ :</label>
                            <div class="col-md-4">
                                <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" placeholder="00/00/0000" id="modal_dateEnd" name="dateEnd" readonly />
                                    <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--? /.InputDate -->
                    <!--? Room  -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">ห้องประชุม : </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control " id="modal_ro_name" name="ro_name" readonly />
                            </div>
                        </div>
                    </div>
                    <!--? /. Room  -->
                    <!--? Style /  ผู้เข้าร่วม-->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">จำนวนคนที่เข้าประชุม : </label>
                            <div class="col-md">
                                <input type="number" class="form-control " id="modal_people" name="people" min="0" readonly />
                            </div>
                            <label class="col-md-2 col-form-label">รูปแบบห้อง : </label>
                            <div class="col-md">
                                <input type="text" class="form-control " id="modal_style" name="style" readonly />

                            </div>
                        </div>
                    </div>
                    <!--? Style /  ผู้เข้าร่วม-->
                    <!--? Tool -->
                    <div class="form-group row ">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">อุปกรณ์โสตทัศนูปกรณ์ :</label>
                            <div id="modal_tool"></div>

                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">อื่น ๆ :</label>
                            <span class="col-form-label col-md" id="modal_toolmore" name="modal_toolmore"></span>
                        </div>
                    </div>
                    <!--? Tool -->

                    <!--//? /.html data -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="submit" id="btnsaveRoom" name="btnsaveRoom" class="col-md-4 btn bg-color mt-2 ">ยืนยันการอนุมัติ</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="" id="modal_ev_id" name="event_id" />
    <input type="hidden" value="" id="modal_ro_id" name="ro_id" />
    <input type="hidden" value="" id="modal_st_id" name="st_id" />

    <input type="hidden" value="" name="id" id="modal_mt_id" />
    <input type="hidden" value="" id="modal_ward" name="ward_id" />
    <input type="hidden" value="" id="modal_fac" name="faction_id" />
    <input type="hidden" value="" id="modal_depart" name="depart_id" />
    <input type="hidden" value="<?php echo $_SESSION['mt_duty_id']; ?>" name="level" />

</form>
<!-- Modal Edit -->
<form action="" method="">
    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center  edit-head">
                    <div class="text-center">
                        <h1> รายละเอียดการขอใช้ห้องประชุม </h1>
                    </div>
                </div>
                <div class="modal-body" id="modaldata">
                    <!-- style="overflow-x: scroll;" -->
                    <!--//? /.html data -->
                    <div class="form-group row  mb-2 ">

                        <center style="font-size: 22px;">
                            <label class="col-form-label ">สถานะ :</label>
                            <span class="col-form-label" id="modal2_status"></span>
                        </center>

                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">สถานที่ประชุม :</label>
                            <span class="col-form-label col-md-5" id="modal2_roName"></span>
                            <label class=" col-form-label  col-md-2">รูปแบบห้อง :</label>
                            <span class="col-form-label" id="modal2_style"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">หัวข้อเรื่องประชุม :</label> <span class="col-form-label col-md-5" id="modal1_title"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">จำนวนผู้เข้าประชุม :</label> <span class="col-form-label col-md-5" id="modal1_people"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">ตั้งแต่ :</label> <span class="col-form-label col-md-5" id="modal2_starttime"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">ถึง :</label> <span class="col-form-label col-md-5" id="modal2_endtime"></span>
                        </div>
                    </div>

                    <hr style="size: 10px; color:black">
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">อุปกรณ์โสตทัศนูปกรณ์ : </label>
                            <span class="col-form-label col-md" id="modal2_tool"></span>
                        </div>

                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">อื่น ๆ : </label>
                            <span class="col-form-label col-md" id="modal2_toolmore"></span>
                        </div>

                    </div>
                    <hr style="size: 10px; color:black">
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">ผู้ใช้ห้องประชุม :</label>
                            <span class="col-form-label col-md-6" id="modal2_name"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">ward : </label>
                            <span class="col-form-label col-md" id="modal2_ward"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">faction : </label>
                            <span class="col-form-label col-md" id="modal2_fac"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">แผนก :</label>
                            <span class="col-form-label col-md" id="modal2_depart"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">ตำแหน่ง :</label>
                            <span class="col-form-label col-md-5" id="modal2_pos"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">เบอร์โทรติดต่อสายตรง : </label>
                            <span class="col-form-label col-md-5" id="modal2_phone"></span>
                        </div>
                    </div>

                    <!--//? /.html data -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="modal2_ev_id" value="">

</form>
<!-- Modal detail -->