<form action="{{ route('nhan_su.edit.post', $nhan_su->id) }}" method="post" id="form_sample_2" class="form-horizontal">
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
                                    <input type="text" class="form-control" name="ma_nv" value="{{ $nhan_su->ma_nv }}" required maxlength="20" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Họ tên
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="ho_ten" value="{{ $nhan_su->ho_ten }}" required maxlength="191" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Địa chỉ thường trú
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="text" class="form-control" name="dia_chi_thuong_tru" required maxlength="191" value="{{ $nhan_su->dia_chi_thuong_tru }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Địa chỉ liên hệ
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="text" class="form-control" name="dia_chi_lien_he" value="{{ $nhan_su->dia_chi_lien_he }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Điện thoại
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <input type="text" class="form-control" name="dien_thoai" value="{{ $nhan_su->dien_thoai }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Email</label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-envelope"></i>
                                    <input type="email" class="form-control" name="email" value="{{ $nhan_su->email }}" /> </div>
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
                                        <input type="radio" id="checkbox1" name="gioi_tinh" value="1" class="md-radiobtn" <?php if($nhan_su->gioi_tinh) echo $nhan_su->gioi_tinh == '1' ? 'checked' : ''; else echo 'checked'; ?>>
                                        <label for="checkbox1">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Nam </label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="checkbox2" name="gioi_tinh" value="0" class="md-radiobtn" <?php echo $nhan_su->gioi_tinh == '0' ? 'checked' : ''; ?>>
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
                                    <input class="form-control" name="ngay_sinh" id="ngay_sinh" type="text" placeholder="dd-mm-yyyy" required value="{{ $nhan_su->ngay_sinh }}" />
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
                                    <input type="text" class="form-control" name="so_cmnd" required value="{{ $nhan_su->so_cmnd }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày cấp CMND
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-calendar"></i>
                                    <input class="form-control" name="ngay_cap_cmnd" id="ngay_cap_cmnd" type="text" placeholder="dd-mm-yyyy" value="{{ $nhan_su->ngay_cap_cmnd }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Nơi cấp CMND
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-location-arrow"></i>
                                    <input type="text" class="form-control" name="noi_cap_cmnd" value="{{ $nhan_su->noi_cap_cmnd }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày bắt đầu làm
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-calendar"></i>
                                    <input class="form-control" name="ngay_bat_dau_lam" id="ngay_bat_dau_lam" type="text" placeholder="dd-mm-yyyy" value="{{ $nhan_su->ngay_bat_dau_lam }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Trạng thái</label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa"></i>
                                    <select class="form-control" name="trang_thai">
                                        <option value="1" {{ ($nhan_su->trang_thai == 1) ? 'selected' : ''}}>Đang làm</option>
                                        <option value="0" {{ ($nhan_su->trang_thai == 0) ? 'selected' : ''}}>Thôi việc</option>
                                    </select>
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
                                    <input type="text" class="form-control" name="trinh_do" value="{{ $nhan_su->trinh_do }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Trường tốt nghiệp
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-institution"></i>
                                    <input type="text" class="form-control" name="truong_tot_nghiep" value="{{ $nhan_su->truong_tot_nghiep }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Năm tốt nghiệp
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-calendar-check-o"></i>
                                    <input type="text" class="form-control" name="nam_tot_nghiep" value="{{ $nhan_su->nam_tot_nghiep }}" /> </div>
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
                                    <input type="text" class="form-control" name="chuc_danh" value="{{ $nhan_su->chuc_danh }}" /> </div>
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
                                            <option value="{{ $v->id }}" {{ ($nhan_su->phongban_id == $v->id) ? 'selected' : ''}}>{{ $v->ten }}</option>
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
                                        <option value="0">-------- Chọn Bộ phận --------</option>
                                        @foreach(App\BoPhan::getById($nhan_su->phongban_id)->get() as $v)
                                            <option value="{{ $v->id }}" {{ ($nhan_su->bophan_id == $v->id)?"selected":"" }}>{{ $v->ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- END TAB 2-->

        <!-- BEGIN TAB 3-->
        <div class="tab-pane" id="tab3">
            <div class="alert alert-danger" style="margin-bottom: 0px;">
                    <p> Vui lòng tạo mới nhân sự trước khi thêm lương! </p>
            </div>
        </div>
        <!-- END TAB 3-->

        <!-- BEGIN TAB 4-->
        <div class="tab-pane" id="tab4">
            <div class="alert alert-danger" style="margin-bottom: 0px;">
                    <p> Vui lòng tạo mới nhân sự trước khi thêm hợp đồng! </p>
            </div>
        </div>
        <!-- END TAB 4-->

        <!-- BEGIN TAB 5-->
        <div class="tab-pane" id="tab5">
            <div class="form-body">
                    <div class="form-group">
                        <div class="input-group col-md-12">
                            @if($ds_ho_so->count()>0)
                            @php
                                $ho_so = json_decode($nhan_su->hoso_id);
                            @endphp
                            <div class="icheck-inline">
                                @foreach($ds_ho_so as $k => $v)
                                <label class="col-md-3 col-xs-6" style="margin: 0 0 10px 0;">
                                    <input type="checkbox" name="hoso_id[]" value="{{ $k }}" data-checkbox="icheckbox_minimal-blue" type="checkbox" class="icheck" {{ (in_array($k, $ho_so))?"checked":"" }}> {{ $v }} </label>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB 5-->
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
            </div>
        </div>
    </div>

</form>