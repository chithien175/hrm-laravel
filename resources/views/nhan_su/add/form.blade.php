<form action="{{ route('nhan_su.add.post') }}" method="post" id="form_sample_2" class="form-horizontal">
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
                                    <i class="fa fa-key"></i>
                                    <input type="text" class="form-control" name="ma_nv" value="{{ old('ma_nv') }}" required maxlength="20" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Họ tên
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="ho_ten" value="{{ old('ho_ten') }}" required maxlength="191" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Địa chỉ thường trú
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="text" class="form-control" name="dia_chi_thuong_tru" required maxlength="191" value="{{ old('dia_chi_thuong_tru') }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Địa chỉ liên hệ
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="text" class="form-control" name="dia_chi_lien_he" value="{{ old('dia_chi_lien_he') }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Điện thoại
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <input type="text" class="form-control" name="dien_thoai" value="{{ old('dien_thoai') }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Email</label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-envelope"></i>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" /> </div>
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
                                        <input type="radio" id="checkbox1" name="gioi_tinh" value="1" class="md-radiobtn" <?php if(old('gioi_tinh')) echo old('gioi_tinh') == '1' ? 'checked' : ''; else echo 'checked'; ?>>
                                        <label for="checkbox1">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Nam </label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="checkbox2" name="gioi_tinh" value="0" class="md-radiobtn" <?php echo old('gioi_tinh') == '0' ? 'checked' : ''; ?>>
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
                                <div class="input-icon right">
                                    <i class="fa fa-calendar"></i>
                                    <input class="form-control" name="ngay_sinh" id="ngay_sinh" type="text" placeholder="dd-mm-yyyy" required value="{{ old('ngay_sinh') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Số CMND
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-info"></i>
                                    <input type="text" class="form-control" name="so_cmnd" required value="{{ old('so_cmnd') }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày cấp CMND
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-calendar"></i>
                                    <input class="form-control" name="ngay_cap_cmnd" id="ngay_cap_cmnd" type="text" placeholder="dd-mm-yyyy" value="{{ old('ngay_cap_cmnd') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Nơi cấp CMND
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-location-arrow"></i>
                                    <input type="text" class="form-control" name="noi_cap_cmnd" value="{{ old('noi_cap_cmnd') }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày bắt đầu làm
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-calendar"></i>
                                    <input class="form-control" name="ngay_bat_dau_lam" id="ngay_bat_dau_lam" type="text" placeholder="dd-mm-yyyy" value="{{ old('ngay_bat_dau_lam') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày làm việc cuối
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-calendar"></i>
                                    <input class="form-control" name="ngay_lam_viec_cuoi" id="ngay_lam_viec_cuoi" type="text" placeholder="dd-mm-yyyy" value="{{ old('ngay_lam_viec_cuoi') }}" />
                                </div>
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
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-graduation-cap"></i>
                                    <input type="text" class="form-control" name="trinh_do" value="{{ old('trinh_do') }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Trường tốt nghiệp
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-institution"></i>
                                    <input type="text" class="form-control" name="truong_tot_nghiep" value="{{ old('truong_tot_nghiep') }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Năm tốt nghiệp
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-calendar-check-o"></i>
                                    <input type="text" class="form-control" name="nam_tot_nghiep" value="{{ old('nam_tot_nghiep') }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Chứng chỉ
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-edit"></i>
                                    <textarea name="chung_chi" class="form-control" id="chung_chi" rows="5">{{ old('chung_chi') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Chức danh
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-black-tie"></i>
                                    <input type="text" class="form-control" name="chuc_danh" value="{{ old('chuc_danh') }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Phòng ban</label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa"></i>
                                    <select class="form-control" name="phongban_id">
                                        <option value="0">-------- Chọn Phòng / Ban --------</option>
                                        @if($ds_phong_ban->count()>0)
                                            @foreach($ds_phong_ban as $v)
                                            <option value="{{ $v->id }}" <?php echo (old('phongban_id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
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
        <!-- END TAB 2-->

        <!-- BEGIN TAB 5-->
        <div class="tab-pane" id="tab5">
            <div class="alert alert-danger" style="margin-bottom: 0px;">
                    <p> Vui lòng tạo mới nhân sự trước khi thêm quyết định! </p>
            </div>
        </div>
        <!-- END TAB 5-->

        <!-- BEGIN TAB 4-->
        <div class="tab-pane" id="tab4">
            <div class="alert alert-danger" style="margin-bottom: 0px;">
                    <p> Vui lòng tạo mới nhân sự trước khi thêm hợp đồng! </p>
            </div>
        </div>
        <!-- END TAB 4-->

        <!-- BEGIN TAB 3-->
        <div class="tab-pane" id="tab3">
            <div class="form-body">
                    <div class="form-group">
                        <div class="input-group col-md-12">
                            @if($ds_ho_so->count()>0)
                            <div class="icheck-inline">
                                @foreach($ds_ho_so as $v)
                                <label class="col-md-3 col-xs-6" style="margin: 0 0 10px 0;">
                                    <input type="checkbox" name="hoso_id[]" value="{{ $v->id }}" data-checkbox="icheckbox_minimal-blue" type="checkbox" class="icheck"> {{ $v->ten }} </label>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB 3-->
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
            </div>
        </div>
    </div>

</form>