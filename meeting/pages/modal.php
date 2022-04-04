<!-- Modal Rooms -->
<form action="" method="POST">
    <div class="modal fade" id="ModalRoom" style="overflow:hidden;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-white edit-head">
                    <div class="text-center">
                        <h1> แก้ไข ข้อมูลห้อง </h1>
                    </div>
                </div>
                <div class="modal-body">
                    <!-- style="overflow-x: scroll;" -->
                    <!--//? /.Room Name -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label">ชื่อห้องประชุม :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control " id="modal_ro_name" />
                            </div>
                        </div>
                    </div>
                    <!--//? /.Room Name -->
                    <!-- //? Input People -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label">จำห้องคนที่บรรจุ :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control " id="modal_ro_people" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label">จำห้องคนขั้นต่ำ :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control " id="ro_peoplemini" name="ro_peoplemini" />
                            </div>
                        </div>
                    </div>
                    <!-- //? Input People -->
                    <!-- //? Input Color -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label">สีห้อง :</label>
                            <div class="col-md-9">
                                <input type="color" class="form-control " id="modal_ro_color">
                            </div>
                        </div>
                    </div>
                    <!-- //? Input Color -->
                    <!-- //? Input Detail -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label">รายละเอียดห้อง :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control " id="modal_ro_detail" />
                            </div>
                        </div>
                    </div>
                    <!-- //? Input Detail -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label">สถานะ :</label>
                            <div class="col-md-9">
                                <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="ro_public" name="ro_public">
                                    <option value="Y">Online</option>
                                    <option value="N">Offline</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="button" class="btn btn-primary btnSaveRoom">ยืนยันการแก้ไข</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="modal_ro_id" value="">
</form>
<!-- Modal Rooms -->
<!-- Modal Style -->
<form action="" method="POST">
    <div class="modal fade" id="ModalStyle" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-white edit-head">
                    <div class="text-center">
                        <h1> แก้ไข ข้อมูลรูปแบบห้อง </h1>
                    </div>
                </div>
                <div class="modal-body">
                    <!-- style="overflow-x: scroll;" -->
                    <!--//? /.Style Name -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label">รูปแบบห้องประชุม :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control " id="modal_st_name" />
                            </div>
                        </div>
                    </div>
                    <!--//? /.Style Name -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="button" class="btn btn-primary btnSaveStyle">ยืนยันการแก้ไข</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="modal_st_id" value="">

</form>
<!-- Modal Style -->
<!-- Modal tools -->
<form action="" method="POST" id="modaltools">
    <div class="modal fade" id="ModalTool" style="overflow:hidden;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center text-white edit-head">
                    <div class="text-center">
                        <h1> แก้ไข ข้อมูลอุปกรณ์ </h1>
                    </div>
                </div>
                <div class="modal-body">
                    <!-- style="overflow-x: scroll;" -->
                    <!--//? /.Tool Name -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label">อุปกรณ์ :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control " id="modal_to_name" name="to_name" />
                            </div>
                        </div>
                    </div>
                    <!--//? /.Tool Name -->
                    <!-- //? Input People -->
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label">ward :</label>
                            <div class="col-md-9">
                                <select class="form-control select2  select2-info " data-dropdown-css-class="select2-success" id="modal_ward_id" name="ward_id">
                                    <!-- <option value="">-- เลือกแผนกที่ดูแล --</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label">facion :</label>
                            <div class="col-md-9">
                                <select class="form-control select2  select2-info " data-dropdown-css-class="select2-success" id="modal_fac_id" name="faction_id">
                                    <!-- <option value="">-- เลือกแผนกที่ดูแล --</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-3 col-form-label">depart:</label>
                            <div class="col-md-9">
                                <select class="form-control select2  select2-info " data-dropdown-css-class="select2-success" id="modal_depart_id" name="depart_id">
                                    <!-- <option value="">-- เลือกแผนกที่ดูแล --</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //? Input People -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="button" class="btn btn-primary btnSaveTool">ยืนยันการแก้ไข</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="modal_to_id" name="to_id" value="">
</form>
<!-- Modal tool -->
<!-- Modal tools -->