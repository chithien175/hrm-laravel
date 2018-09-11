<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_read_hd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-file-text-o"></i> Đang xem hợp đồng</h4>
            </div>
            <div class="modal-body">
                <!-- nội dung in hđlđ -->
                <div id="print-hdld">
                    <div id="read-hdld">
                        <!-- BEGIN hđld header -->
                        <div class="row">
                            <div class="col-md-4 text-center company-info-left">
                                <img class="company-logo" src="{{ asset('/uploads/logos') }}/{{ setting('company.logo', '') }}" alt="">
                            </div>
                            <div class="col-md-8 text-center company-info-right">
                                <p class="company-name">{{ setting('company.name', '') }}</p>
                                <p class="company-address"><strong><em>Địa chỉ:</em></strong> {{ setting('company.address', '') }}</p>
                                <p class="company-phone"><strong><em>Điện thoại:</em></strong> {{ setting('company.phone', '') }} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <strong><em>Fax:</em></strong> {{ setting('company.fax', '') }}</p>
                            </div>
                        </div>
                        <!-- END hđld header -->
                        <div class="divider"></div>
                        <!-- BEGIN hđlđ content -->
                        <div class="row content-hdld">
                            <div class="col-md-12 text-center">
                                <p class="quoc-hieu">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
                                <p class="tieu-ngu">Độc lập - Tự do - Hạnh phúc</p>
                                <p class="line">------------o0o------------</p>
                            </div>
                            <div class="row">
                                <p class="ma-hdld"></p>
                                <p class="ten-hdld"></p>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Người sử dụng lao động<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 ten-cong-ty">
                                    {{ setting('company.name', '') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Địa chỉ<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    {{ setting('company.address', '') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Điện thoại<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    {{ setting('company.phone', '') }}
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Fax: {{ setting('company.fax', '') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Đại diện bởi<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 dai-dien-boi">
                                    Ông {{ setting('company.nguoi_dai_dien', '') }}
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Quốc tịch: Việt Nam
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Chức vụ<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    {{ setting('company.chuc_vu', '') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="font-size: 12pt;">
                                    Và
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Người lao động<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 nguoi-lao-dong">
                                    {{ ($nhan_su->gioi_tinh == 1)?'Ông':'Bà' }} {{ $nhan_su->ho_ten }}
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Quốc tịch: Việt Nam
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Ngày sinh<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    {{ \Carbon\Carbon::parse($nhan_su->ngay_sinh)->format('d/m/Y') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Hộ khẩu thường trú<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    {{ $nhan_su->dia_chi_thuong_tru }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Số CMND/ Hộ chiếu<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    {{ $nhan_su->so_cmnd }}
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    Ngày cấp: {{ \Carbon\Carbon::parse($nhan_su->ngay_cap_cmnd)->format('d/m/Y') }}
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    Nơi cấp: {{ $nhan_su->noi_cap_cmnd }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <em>Thỏa thuận ký kết hợp đồng lao động và cam kết làm đúng những điều khoản sau:</em>
                                </div>
                            </div>
                            <!-- Điều khoản 1 -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <strong>Điều 1: Thời hạn và công việc hợp đồng</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Loại hợp đồng lao động<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 ten-loai-hdld">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Thời hạn hợp đồng<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 thoi-han-hdld">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Địa điểm làm việc<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    Văn phòng, chi nhánh công ty và các dự án trực thuộc công ty quản lý.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Chức danh công việc / Chức vụ<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    {{ $nhan_su->chuc_danh }}
                                    @if($nhan_su->bophan_id != 0)
                                        {{ $nhan_su->bophans->ten }}
                                    @else
                                        {{ $nhan_su->phongbans->ten }}
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Công việc phải làm<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    Thực hiện các công việc thuộc chuyên môn, liên quan đến hoạt động kinh doanh của công ty và các công việc theo yêu cầu của quản lý trực tiếp.
                                </div>
                            </div>
                            <!-- END Điều khoản 1 -->

                            <!-- Điều khoản 2 -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <strong>Điều 2: Chế độ làm việc</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Loại hợp đồng lao động<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 ten-loai-hdld">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Thời hạn hợp đồng<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 thoi-han-hdld">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Địa điểm làm việc<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    Văn phòng, chi nhánh công ty và các dự án trực thuộc công ty quản lý.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Chức danh công việc / Chức vụ<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    {{ $nhan_su->chuc_danh }}
                                    @if($nhan_su->bophan_id != 0)
                                        {{ $nhan_su->bophans->ten }}
                                    @else
                                        {{ $nhan_su->phongbans->ten }}
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Công việc phải làm<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    Thực hiện các công việc thuộc chuyên môn, liên quan đến hoạt động kinh doanh của công ty và các công việc theo yêu cầu của quản lý trực tiếp.
                                </div>
                            </div>
                            <!-- END Điều khoản 2 -->
                        </div>
                        <!-- BEGIN hđlđ content -->
                    </div>
                </div>
                <!-- kết thúc nội dung in hđlđ -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn green" id="btn-print-hd"><i class="fa fa-print"></i> In</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->