<!-- Modal detail -->
<form action="" method="POST" id="modalRoomall">
    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-white edit-head">
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
                            <label class="col-md-3 col-form-label ">เลขที่ใบขออนุญาต :</label>
                            <span class="col-form-label col-md-4" id="modal2_evid"></span>
                            <label class=" col-form-label  col-md-3 text-right">วันที่ส่งแบบฟอร์ม :</label>
                            <span class="col-form-label" id="modal2_cre_date"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">สถานที่ประชุม :</label>
                            <span class="col-form-label col-md-5" id="modal2_roName"></span>
                            <label class=" col-form-label  col-md-2 text-right">รูปแบบห้อง :</label>
                            <span class="col-form-label" id="modal2_style"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">หัวข้อเรื่องประชุม :</label> <span class="col-form-label col-md-5" id="modal2_title"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">จำนวนผู้เข้าประชุม :</label> <span class="col-form-label col-md-5" id="modal2_people"></span>
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
                    <hr style="size: 10px; color:black">
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">ผู้ใช้ห้องประชุม :</label>
                            <span class="col-form-label col-md-5" id="modal2_name"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">แผนก :</label>
                            <span class="col-form-label col-md-5" id="modal2_dept"></span>
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

</form>
<!-- Modal detail -->

<!-- Modal Edit -->
<form action="" method="POST" id="frm_modalEditRoom">
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-white edit-head">
                    <div class="text-center">
                        <h1> แก้ไขรายละเอียดการขอใช้ห้องประชุม </h1>
                    </div>
                </div>
                <div class="modal-body" id="modaldata">
                    <!-- style="overflow-x: scroll;" -->
                    <!--//? /.html data -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">หัวข้อเรื่องประชุม :</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control " id="modal_title" name="title" />
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
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" placeholder="00:00" id="modal_timeStart"name="timeStart" />
                                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label class="col-md-2 col-form-label">ถึงเวลา :</label>
                            <div class="col-md-4">
                                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" placeholder="00:00" id="modal_timeEnd"name="timeEnd" />
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
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" placeholder="00/00/0000" id="modal_dateStart"name="dateStart" />
                                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label class="col-md-2 col-form-label">ถึงวันที่ :</label>
                            <div class="col-md-4">
                                <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" placeholder="00/00/0000" id="modal_dateEnd"name="dateEnd"/>
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
                                <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" id="modal_ro_name" name="ro_name"/>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--? /. Room  -->
                    <!--? Style /  ผู้เข้าร่วม-->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">จำนวนคนที่เข้าประชุม : </label>
                            <div class="col-md">
                                <input type="number" class="form-control " id="modal_people" name="people"min="0" />
                            </div>
                            <label class="col-md-2 col-form-label">รูปแบบห้อง : </label>
                            <div class="col-md">
                                <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" id="modal_style" name="style" />
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--? Style /  ผู้เข้าร่วม-->
                    <!--? Tool -->
                    <div class="form-group row ">
                        <div class="input-group">
                            <label class="col-md-2 col-form-label">อุปกรณ์ :</label>
                            <div id="modaltool"></div>
                        
                        </div>
                    </div>
                    <!--? Tool -->

                    <!--//? /.html data -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="submit" id="btnsaveRoom" name="btnsaveRoom" class="col-md-4 btn btn-success mt-2 ">แก้ไขรายการจอง</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="" id="modal_ev_id" name="eventid"/>
    <input type="hidden" value="" id="modal_status" name="evstatus"/>
    <input type="hidden" value="<?php echo $_SESSION['mt_id'];?>"   name="id" />
    <input type="hidden" value="<?php echo $_SESSION['mt_lv_id'];?>" name="level" />

</form>
<!-- Modal Edit -->