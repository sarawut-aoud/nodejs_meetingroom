

<!-- Modal Status -->
<form action="" method="POST">
    <div class="modal fade" id="modalStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">สถานที่ประชุม :</label>
                            <span class="col-form-label col-md-5" id="modal2_roname"></span>
                            <label class=" col-form-label  col-md-2">รูปแบบห้อง :</label>
                            <span class="col-form-label" id="modal_style"></span>
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
                            <label class="col-md-3 col-form-label ">ตั้งแต่ :</label> <span class="col-form-label col-md-5" id="modal_starttime"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">ถึง :</label> <span class="col-form-label col-md-5" id="modal_endtime"></span>
                        </div>
                    </div>

                    <hr style="size: 10px; color:black">
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">อุปกรณ์โสตทัศนูปกรณ์ : </label>
                            <span class="col-form-label col-md" id="modal_tool"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">อื่น ๆ : </label>
                            <span class="col-form-label col-md" id="modal_toolmore"></span>
                        </div>
                    </div>
                    <hr style="size: 10px; color:black">
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">ผู้ใช้ห้องประชุม :</label>
                            <span class="col-form-label col-md-5" id="modal_name"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">ward : <br> faction : <br>แผนก :</label>
                            <span class="col-form-label col-md" id="modal_dept"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">ตำแหน่ง :</label>
                            <span class="col-form-label col-md-5" id="modal_pos"></span>
                        </div>
                    </div>
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">เบอร์โทรติดต่อสายตรง : </label>
                            <span class="col-form-label col-md-5" id="modal_phone"></span>
                        </div>
                    </div>
                    <hr style="size: 10px; color:black">
                    <div class="form-group row  mb-2">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label ">การอนมุัติ :</label>
                            <div class="col-md-9">
                                <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" id="modal_id_status" data-placeholder="สถานะการจอง">
                                    <option value=""></option>
                                    <option value="3">อนุมัติ</option>
                                    <option value="4">ไม่อนุมัติ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--//? /.html data -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="button" class="btn btn-primary btnSave">ยืนยันการแก้ไข</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="modal_ev_id" value="">
    <input type="hidden" id="modal_eventid_h" value="">
    <input type="hidden" id="modal_ro_id_h" value="">
    <input type="hidden" id="modal_ev_startdate_h" value="">
    <input type="hidden" id="modal_ev_enddate_h" value="">
    <input type="hidden" id="modal_ev_starttime_h" value="">
    <input type="hidden" id="modal_ev_endtime_h" value="">

</form>
<!-- Modal Status -->

<!-- Modal detail -->
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
                            <label class="col-md-3 col-form-label ">ward : <br> faction : <br>แผนก :</label>
                            <span class="col-form-label col-md" id="modal2_dept"></span>
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