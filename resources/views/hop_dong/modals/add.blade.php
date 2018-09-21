<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_hd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_add_hd">
                @csrf
                <input value="{{ $nhan_su->id }}" name="nhansu_id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới HĐLĐ</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mã số<span class="required">*</span></label>
                                    <input value="{{ $nhan_su->ma_nv }}/{{ \Carbon\Carbon::now()->year }}/HĐLĐ-TP" name="ma_hd" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tên hợp đồng<span class="required">*</span></label>
                                    <input name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Loại hợp đồng</label>
                                    <select name="loaihopdong_id" class="form-control loaihopdong_id" id="">
                                        <option value="0">---- Chọn loại hợp đồng ----</option>
                                        @foreach($ds_loai_hd as $v)
                                            <option value="{{ $v->id }}">{{ $v->ten }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ngày ký HĐ<span class="required">*</span></label>
                                    <input class="form-control" name="ngay_ky" id="ngay_ky_hd" type="text" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ngày có hiệu lực<span class="required">*</span></label>
                                    <input class="form-control" name="ngay_co_hieu_luc" id="ngay_co_hieu_luc" type="text" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Ngày hết hiệu lực<span class="required">*</span></label>
                                    <input class="form-control" name="ngay_het_hieu_luc" id="ngay_het_hieu_luc" type="text" placeholder="dd-mm-yyyy" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lương căn bản<span class="required">*</span></label>
                                    <input name="luong_can_ban" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Hỗ trợ, trợ cấp<span class="required">*</span></label>
                                    <input name="luong_tro_cap" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Hiệu quả công việc<span class="required">*</span></label>
                                    <input name="luong_hieu_qua" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="trang_thai" class="form-control trang_thai" id="">
                                        <option value="1" selected>Còn hiệu lực</option>
                                        <option value="0">Hết hiệu lực</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_hd"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->