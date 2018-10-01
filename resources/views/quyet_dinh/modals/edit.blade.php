<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_qd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_qd">
                
                @csrf
                <input type="hidden" name="nhansu_id">
                <input type="hidden" name="quyetdinh_id" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa quyết định</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mã số<span class="required">*</span></label>
                                    <input value="" name="ma_qd" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Loại quyết định</label>
                                    <select name="loaiquyetdinh_id" class="form-control loaiquyetdinh_id">
                                        @foreach($ds_loai_qd as $v)
                                            <option value="{{ $v->id }}">{{ $v->ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ngày ký QĐ<span class="required">*</span></label>
                                    <input class="form-control" name="ngay_ky_qd" id="ngay_ky_qd" type="text" placeholder="dd-mm-yyyy" value="" />
                                </div>
                                <div class="form-group">
                                    <label>Căn cứ (cách nhau bằng dấu chấm phẩy ";")</label>
                                    <input name="can_cu" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nơi nhận (cách nhau bằng dấu chấm phẩy ";")</label>
                                    <input name="noi_nhan" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="trang_thai" class="form-control trang_thai" id="">
                                        <option value="1" selected>Đã ký</option>
                                        <option value="0">Chưa ký</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 type1_qd">
                                <div class="form-group">
                                    <label>Tổng thu nhập cũ</label>
                                    <input name="tong_thu_nhap_cu" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tổng thu nhập mới</label>
                                    <input name="tong_thu_nhap_moi" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Lương cơ bản (mới)</label>
                                    <input name="luong_co_ban_moi" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Lương trợ cấp (mới)</label>
                                    <input name="luong_tro_cap_moi" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Lương hiệu quả (mới)</label>
                                    <input name="luong_hieu_qua_moi" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Lý do</label>
                                    <input name="ly_do" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 type2_qd" style="display: none;">
                                <div class="form-group">
                                    <label>Chức vụ cũ</label>
                                    <input name="chuc_vu_cu" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Chức vụ mới</label>
                                    <input name="chuc_vu_moi" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Bộ phận cũ</label>
                                    <select class="form-control" name="bo_phan_cu">
                                        <option value="0">-------- Chọn Phòng / Ban --------</option>
                                        @if($ds_phong_ban->count()>0)
                                            @foreach($ds_phong_ban as $v)
                                            <option value="{{ $v->id }}">{{ $v->ten }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Bộ phân mới</label>
                                    <select class="form-control" name="bo_phan_moi">
                                        <option value="0">-------- Chọn Phòng / Ban --------</option>
                                        @if($ds_phong_ban->count()>0)
                                            @foreach($ds_phong_ban as $v)
                                            <option value="{{ $v->id }}">{{ $v->ten }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 type3_qd" style="display: none;">
                                <div class="form-group">
                                    <label>Chức vụ hiện tại</label>
                                    <input name="chuc_vu_hien_tai" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_qd"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->