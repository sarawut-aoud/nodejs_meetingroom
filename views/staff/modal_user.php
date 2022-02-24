<!-- Modal Edit -->
<form action="" method="POST">
    <div class="modal fade" id="ModalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                            <label class="col-sm-2 col-form-label">Username :</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control " id="modalusername" />
                            </div>
                            <label class="col-sm-2 col-form-label">Password :</label>
                            <div class="col-md-4">
                                <input type="password" class="form-control " id="modalpassword" />
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3" style="background-color: black;">
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-sm-2 col-form-label">คำนำหน้า :</label>
                            <div class="col-md-4">
                                <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" id="modalprefix">
                                    <option value="นาย">นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="นาง">นาง</option>
                                    <option value="">ไม่ระบุ</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="input-group">
                            <label class="col-sm-2 col-form-label">ชื่อ :</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control " id="modalfname" />
                            </div>
                            <label class="col-sm-2 col-form-label">นามสกุล :</label>
                            <div class="col-md">
                                <input type="text" class="form-control " id="modallname" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="input-group">
                            <label class="col-sm-2 col-form-label">แผนก :</label>
                            <div class="col-md-4">
                                <select class="form-control select2 select2-info " data-dropdown-css-class="select2-success" data-placeholder="- แผนก -" id="modaldename">
                                    <option value=""></option>

                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label">ตำแหน่ง :</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control " id="modalposition" />
                            </div>

                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="input-group">
                            <label class="col-sm-2 col-form-label">โทรศัพท์ :</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control " id="modalphone" />
                            </div>
                            <label class="col-sm-2 col-form-label">เลขบัตรประชาชน :</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control " id="modalpersonid" />
                            </div>
                        </div>
                    </div>
                    
                    <!--//? /.html data -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                    <button type="submit" id="btnSaveUser"  class="col-md-4 btn btn-success mt-2 ">บันทึกข้อมูล</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="" id="iduser"/>

</form>
<!-- Modal Edit -->