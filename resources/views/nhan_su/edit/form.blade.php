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
                            <label class="control-label col-md-4">Ngày làm việc cuối
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-calendar"></i>
                                    <input class="form-control" name="ngay_lam_viec_cuoi" id="ngay_lam_viec_cuoi" type="text" placeholder="dd-mm-yyyy" value="{{ $nhan_su->ngay_lam_viec_cuoi }}" />
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
                        <div class="form-group">
                            <label class="control-label col-md-4">Chứng chỉ
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-edit"></i>
                                    <textarea name="chung_chi" class="form-control" id="chung_chi" rows="5">{{ $nhan_su->chung_chi }}</textarea>
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
                                        @foreach(App\BoPhan::getByPhongBanId($nhan_su->phongban_id)->get() as $v)
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

        <!-- BEGIN TAB 5-->
        <div class="tab-pane" id="tab5">
        @if($ds_quyet_dinh->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_qd"><i class="fa fa-plus"></i> Tạo quyết định
                                        
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($ds_quyet_dinh as $v)
                            <div class="col-md-12">
                                <div class="mt-element-ribbon bg-grey-steel">
                                    
                                    @if($v->trang_thai)
                                    <div class="ribbon ribbon-right ribbon-vertical-right ribbon-shadow ribbon-border-dash-vert ribbon-color-info">
                                        <div class="ribbon-sub ribbon-bookmark"></div>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="ribbon ribbon-left ribbon-clip ribbon-shadow ribbon-round ribbon-border-dash-hor ribbon-color-info">
                                        <div class="ribbon-sub ribbon-clip ribbon-left"></div>Số: {{ $v->ma_qd }} (Đã ký)</div>
                                    @else
                                    <div class="ribbon ribbon-right ribbon-vertical-right ribbon-shadow ribbon-border-dash-vert ribbon-color-default">
                                        <div class="ribbon-sub ribbon-bookmark"></div>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="ribbon ribbon-left ribbon-clip ribbon-shadow ribbon-round ribbon-border-dash-hor ribbon-color-default">
                                        <div class="ribbon-sub ribbon-clip ribbon-left"></div>Số: {{ $v->ma_qd }} (Chưa ký)</div>
                                    @endif
                                    <div class="row" style="padding: 50px 15px 5px 15px;">
                                        <div class="col-md-6 bold">
                                        V/v: {{ ($v->loaiquyetdinh_id)?$v->loaiquyetdinhs->ten:'' }}
                                        </div>
                                        <div class="col-md-6">
                                        Ngày ký: {{ $v->ngay_ky }}
                                        </div>
                                    </div>
                                    
                                    @if($v->loaiquyetdinh_id == 1)
                                        <div class="row" style="padding: 0px 15px 5px 15px;">
                                            <div class="col-md-6">
                                                Tổng thu nhập cũ: {{ $v->tong_thu_nhap_cu }}
                                            </div>
                                            <div class="col-md-6">
                                                Lương cơ bản mới: {{ $v->luong_co_ban_moi }}
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 0px 15px 5px 15px;">
                                            <div class="col-md-6">
                                                Tổng thu nhập mới: {{ $v->tong_thu_nhap_moi }}
                                            </div>
                                            <div class="col-md-6">
                                                Lương trợ cấp mới: {{ $v->luong_tro_cap_moi }}
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 0px 15px 20px 15px;">
                                            <div class="col-md-6">
                                                Lý do: {{ $v->ly_do }}
                                            </div>
                                            <div class="col-md-6">
                                                Lương hiệu quả mới: {{ $v->luong_hieu_qua_moi }}
                                            </div>
                                        </div>
                                    @elseif($v->loaiquyetdinh_id == 2)
                                        <div class="row" style="padding: 0px 15px 5px 15px;">
                                            <div class="col-md-6">
                                                Chức vụ cũ: {{ $v->chuc_vu_cu }}
                                            </div>
                                            <div class="col-md-6">
                                                Bộ phận cũ: Phòng {{ getTenPhongBanById($v->bo_phan_cu) }}
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 0px 15px 20px 15px;">
                                            <div class="col-md-6">
                                                Chức vụ mới: {{ $v->chu_vu_moi }}
                                            </div>
                                            <div class="col-md-6">
                                                Bộ phận mới: Phòng {{ getTenPhongBanById($v->bo_phan_moi) }}
                                            </div>
                                        </div>
                                        
                                        
                                    @elseif($v->loaiquyetdinh_id == 3)
                                        <div class="row" style="padding: 0px 15px 20px 15px;">
                                            <div class="col-md-6">
                                                Chức vụ hiện tại: {{ $v->chuc_vu_hien_tai }}
                                            </div>
                                        </div>
                                        
                                    @endif
                                    
                                    <div class="btn-group">
                                        <a data-qd-id="{{ $v->id }}" class="btn_read_qd btn btn-xs blue-steel" href="#" title="In"><i class="fa fa-print"></i> In</a>
                                    </div>
                                    <div class="btn-group">
                                        <a data-qd-id="{{ $v->id }}" class="btn_edit_qd btn btn-xs yellow-gold" href="#" title="Sửa"><i class="fa fa-edit"></i> Sửa</a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn_delete_qd btn btn-xs red-mint" href="#" data-qd-id="{{ $v->id }}" title="Xóa"><i class="fa fa-trash"></i> Xóa</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            @else
                <div class="alert alert-danger" style="margin-bottom: 0px;">
                    <p> Nhân sự này chưa có quyết định! <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_qd"><i class="fa fa-plus"></i> Tạo quyết định</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 5-->

        <!-- BEGIN TAB 4-->
        <div class="tab-pane" id="tab4">
            @if($ds_hop_dong->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hd"><i class="fa fa-plus"></i> Tạo hợp đồng
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Mã HĐ</th>
                                    <th> Loại HĐ </th>
                                    <th> Vào làm</th>
                                    <th> Đến ngày</th>
                                    <th> Trạng thái</th>
                                    <th> Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $ds_hop_dong->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $ds_hop_dong as $k => $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> 
                                            <a class="btn_read_hd" data-hd-id="{{ $v->id }}" href="#">{{ $v->ma_hd }}</a> 
                                        </td>
                                        <td> {{ ($v->loaihopdong_id)?$v->loaihopdongs->ten:'' }} </td>
                                        <td> {{ $v->ngay_co_hieu_luc }} </td>
                                        <td> {{ $v->ngay_het_hieu_luc }} </td>
                                        <td> 
                                            @if( $v->trang_thai )
                                            <span class="label label-sm label-success" style="font-size: 12px;"> Còn hiệu lực </span>
                                            @else
                                            <span class="label label-sm label-danger" style="font-size: 12px;"> Hết hiệu lực </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a data-hd-id="{{ $v->id }}" class="btn_read_hd btn btn-xs blue-steel" href="#" title="In"> <i class="fa fa-print"></i> In </a>
                                            <a data-hd-id="{{ $v->id }}" class="btn_edit_hd btn btn-xs yellow-gold" href="#" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_hd btn btn-xs red-mint" href="#" data-hd-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                        </td>
                                    </tr>
                                    @php $stt++; @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            @else
                <div class="alert alert-danger" style="margin-bottom: 0px;">
                    <p> Nhân sự này chưa có HĐLĐ! <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hd"><i class="fa fa-plus"></i> Tạo hợp đồng</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 4-->

        <!-- BEGIN TAB 3-->
        <div class="tab-pane" id="tab3">
            <div class="form-body">
                    <div class="form-group">
                        <div class="input-group col-md-12">
                            @if($ds_ho_so->count()>0)
                                @if(!empty($nhan_su->hoso_id))
                                    @php
                                        $ho_so = explode(',', $nhan_su->hoso_id);
                                    @endphp
                                    <div class="icheck-inline">
                                        @foreach($ds_ho_so as $k => $v)
                                        <label class="col-md-3 col-xs-6" style="margin: 0 0 10px 0;">
                                            <input type="checkbox" name="hoso_id[]" value="{{ $k }}" data-checkbox="icheckbox_minimal-blue" type="checkbox" class="icheck" {{ (in_array($k, $ho_so))?"checked":"" }}> {{ $v }} </label>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="icheck-inline">
                                        @foreach($ds_ho_so as $k => $v)
                                        <label class="col-md-3 col-xs-6" style="margin: 0 0 10px 0;">
                                            <input type="checkbox" name="hoso_id[]" value="{{ $k }}" data-checkbox="icheckbox_minimal-blue" type="checkbox" class="icheck"> {{ $v }} </label>
                                        @endforeach
                                    </div>
                                @endif
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
@include('hop_dong.modals.add')
@include('hop_dong.modals.edit')
@include('hop_dong.modals.read')
@include('quyet_dinh.modals.add')
@include('quyet_dinh.modals.edit')
@include('quyet_dinh.modals.read')