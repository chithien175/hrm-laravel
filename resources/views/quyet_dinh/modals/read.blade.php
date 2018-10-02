<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_read_qd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-file-text-o"></i> Đang xem quyết định</h4>
            </div>
            <div class="modal-body">
                <!-- nội dung in hđlđ -->
                <div id="print-qd">
                    <div id="read-qd">
                        <!-- BEGIN hđld header -->
                        <div class="row">
                            <div class="col-md-3 text-center company-info-left">
                                <img class="company-logo" src="{{ asset('/uploads/logos') }}/{{ setting('company.logo', '') }}" alt="">
                            </div>
                            <div class="col-md-9 company-info-right">
                                <p class="company-name">{{ setting('company.name', '') }}</p>
                                <p class="company-address"><strong><em>Địa chỉ:</em></strong> {{ setting('company.address', '') }}</p>
                                <p class="company-phone"><strong><em>Điện thoại:</em></strong> {{ setting('company.phone', '') }} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <strong><em>Fax:</em></strong> {{ setting('company.fax', '') }}</p>
                            </div>
                        </div>
                        <!-- END hđld header -->
                        <div class="divider"></div>
                        <!-- BEGIN qđ content -->
                        <div class="row content-qd">
                            <div class="row text-center">
                                <p class="quoc-hieu">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
                                <p class="tieu-ngu">Độc lập - Tự do - Hạnh phúc</p>
                                <p class="line">------------o0o------------</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ma-qd">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right" style="font-style: italic;">
                                    Nha Trang, ngày <span class="ngay-qd"></span> tháng <span class="thang-qd"></span> năm <span class="nam-qd"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ten-qd">
                                    QUYẾT ĐỊNH
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ten-loai-qd">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tieu-de-qd">
                                    GIÁM ĐỐC CÔNG TY TNHH THỊNH PHONG
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 can-cu-qd">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tieu-de-qd">
                                    QUYẾT ĐỊNH
                                </div>
                            </div>
                            <!-- BEGIN Điều - Loại quyết định 1 -->
                            <div class="row loai-qd-1">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="bold" style="text-decoration: underline;">Điều 1</span>: Nay quyết định điều chỉnh tổng thu nhập cho:
                                </div>
                            </div>
                            <div class="row loai-qd-1" style="padding-left: 60px;">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    {{ ($nhan_su->gioi_tinh == 1)?'Ông':'Bà' }}<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    {{ $nhan_su->ho_ten }}
                                </div>
                            </div>
                            <div class="row loai-qd-1" style="padding-left: 60px;">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    Chức danh<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    {{ $nhan_su->chuc_danh }}
                                    @if($nhan_su->bophan_id != 0)
                                        {{ $nhan_su->bophans->ten }}
                                    @elseif($nhan_su->phongban_id != 0)
                                        {{ $nhan_su->phongbans->ten }}
                                    @endif
                                </div>
                            </div>
                            <div class="row loai-qd-1" style="padding-left: 60px;">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    Tổng thu nhập cũ<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 tong-thu-nhap-cu">
                                </div>
                            </div>
                            <div class="row loai-qd-1" style="padding-left: 60px;">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    Điều chỉnh tổng thu nhập mới<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 tong-thu-nhap-moi">
                                </div>
                            </div>
                            <div class="row loai-qd-1" style="padding-left: 60px;">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    - Lương cơ bản<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 luong-co-ban-moi">
                                </div>
                            </div>
                            <div class="row loai-qd-1" style="padding-left: 60px;">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    - Hỗ trợ, trợ cấp khác<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 luong-tro-cap-moi">
                                </div>
                            </div>
                            <div class="row loai-qd-1" style="padding-left: 60px;">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    - Thưởng hiệu quả công việc tối đa<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 luong-hieu-qua-moi">
                                </div>
                            </div>
                            <div class="row loai-qd-1" style="padding-left: 60px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ly-do-dieu-chinh">
                                    
                                </div>
                            </div>
                            <div class="row loai-qd-1">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="bold" style="text-decoration: underline;">Điều 2</span>: {{ ($nhan_su->gioi_tinh == 1)?'Ông':'Bà' }} {{ $nhan_su->ho_ten }} được hưởng mức lương thu nhập mới kể từ ngày <span class="ngay-ky-qd"></span>.
                                </div>
                            </div>
                            <div class="row loai-qd-1">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="bold" style="text-decoration: underline;">Điều 3</span>: Ông/Bà Ban Giám đốc, Trưởng các Bộ phận có liên quan và {{ ($nhan_su->gioi_tinh == 1)?'Ông':'Bà' }} {{ $nhan_su->ho_ten }} căn cứ quyết định thi hành.
                                </div>
                            </div>
                            <div class="row loai-qd-1" style="padding-left: 60px;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    Quyết định có hiệu lực kể từ ngày <span class="ngay-ky-qd"></span>.
                                </div>
                            </div>
                            <!-- END Điều - Loại quyết định 1 -->

                            
                        </div>
                        <!-- END qđ content -->
                        <!-- Chữ ký -->
                        <br>
                        <div class="row" style="font-size: 12.5pt;">
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="padding-left: 65px;">
                                <p>Nơi nhận:</p>
                                <div class="noi-nhan-qd" style="padding-left: 20px;">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 cot-phai text-center">
                                <p style="font-weight: bold; margin: 0 0 0 0;text-transform: uppercase;">{{ setting('company.name', '') }}</p>
                                <p style="font-weight: bold; margin: 0 0 0 0;text-transform: uppercase;">{{ setting('company.chuc_vu', '') }}</p>
                                <br><br><br><br>
                                <p style="font-weight: bold; margin: 0 0 0 0;">{{ setting('company.nguoi_dai_dien', '') }}</p>
                            </div>
                        </div>
                        <!-- END Chữ ký -->
                    </div>
                </div>
                <!-- kết thúc nội dung in qd -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn green" id="btn-print-qd"><i class="fa fa-print"></i> In</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->