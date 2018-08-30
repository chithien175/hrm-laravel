<form action="#" method="post" id="form_sample_2" class="form-horizontal">
    @csrf
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Mã NV
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="ma_nv" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Họ tên
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="ho_ten" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Địa chỉ thường trú
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="dia_chi_thuong_tru" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Địa chỉ liên lạc
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="dia_chi_lien_lac" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Điện thoại
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="dien_thoai" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Email
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="email" /> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Giới tính
                            </label>
                            <div class="col-md-7">
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="checkbox1" name="gioi_tinh" value="1" class="md-radiobtn" checked>
                                        <label for="checkbox1">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Nam </label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="checkbox2" name="gioi_tinh" value="0" class="md-radiobtn">
                                        <label for="checkbox2">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Nữ </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày sinh
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <input class="form-control" name="ngay_sinh" id="ngay_sinh" type="text" placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Số CMND
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="so_cmnd" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày cấp CMND
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <input class="form-control" name="ngay_cap_cmnd" id="ngay_cap_cmnd" type="text" placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Nơi cấp CMND
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="noi_cap_cmnd" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày bắt đầu làm
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <input class="form-control" name="ngay_bat_dau_lam" id="ngay_bat_dau_lam" type="text" placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB 1-->
        <!-- BEGIN TAB 2-->
        <div class="tab-pane" id="tab2">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Trình độ
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="trinh_do" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Trường tốt nghiệp
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="truong_tot_nghiep" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Năm tốt nghiệp
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="truong_tot_nghiep" /> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Chức danh
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="chuc_danh" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Phòng ban</label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa"></i>
                                    <select class="form-control" name="phongban_id">
                                        <option value="0">-------- Chọn Phòng / Ban --------</option>
                                        @if($ds_phong_ban)
                                            @foreach($ds_phong_ban as $v)
                                            <option value="{{ $v->id }}">{{ $v->ten }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Bộ phận</label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <select class="form-control" name="bophan_id">
                                        <option value="0">---- Vui lòng chọn Phòng ban ----</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="tab-pane" id="tab3">
            <div class="alert alert-danger" style="margin-bottom: 0px;">
                    <p> Vui lòng tạo mới nhân sự trước khi thêm lương! </p>
            </div>
        </div>
        <div class="tab-pane" id="tab4">
            <div class="alert alert-danger" style="margin-bottom: 0px;">
                    <p> Vui lòng tạo mới nhân sự trước khi thêm hợp đồng! </p>
            </div>
        </div>
        <div class="tab-pane" id="tab5">
            <div class="form-body">
                    <div class="form-group">
                        <div class="input-group col-md-12">
                            <div class="icheck-inline">
                                <label class="col-md-3" style="margin: 0 0 10px 0;">
                                    <input data-checkbox="icheckbox_minimal-blue" type="checkbox" class="icheck"> Checkbox 1 </label>
                                <label class="col-md-3" style="margin: 0 0 10px 0;">
                                    <input data-checkbox="icheckbox_minimal-blue" type="checkbox" checked class="icheck"> Checkbox 2 </label>
                                <label class="col-md-3" style="margin: 0 0 10px 0;">
                                    <input data-checkbox="icheckbox_minimal-blue" type="checkbox" class="icheck"> Checkbox 3 </label>
                                <label class="col-md-3" style="margin: 0 0 10px 0;">
                                    <input data-checkbox="icheckbox_minimal-blue" type="checkbox" class="icheck"> Checkbox 4 </label>
                                <label class="col-md-3" style="margin: 0 0 10px 0;">
                                    <input data-checkbox="icheckbox_minimal-blue" type="checkbox" class="icheck"> Checkbox 4 </label>
                                <label class="col-md-3" style="margin: 0 0 10px 0;">
                                    <input data-checkbox="icheckbox_minimal-blue" type="checkbox" class="icheck"> Checkbox 4 </label>
                                <label class="col-md-3" style="margin: 0 0 10px 0;">
                                    <input data-checkbox="icheckbox_minimal-blue" type="checkbox" class="icheck"> Checkbox 4 </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn green"><i class="fa fa-plus"></i> Thêm mới</button>
            </div>
        </div>
    </div>

</form>