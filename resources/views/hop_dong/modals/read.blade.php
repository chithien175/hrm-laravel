<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_read_hd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-file-text-o"></i> HĐLĐ</h4>
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
                            <div class="col-md-12">
                                <p class="ma-hdld"></p>
                                <p class="ten-hdld"></p>
                            </div>
                            <div class="col-md-12">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="font-size: 12pt;">
                                    Người sử dụng lao động<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 ten-cong-ty">
                                    {{ setting('company.name', '') }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="font-size: 12pt;">
                                    Địa chỉ<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="font-size: 12pt;">
                                    {{ setting('company.name', '') }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="font-size: 12pt;">
                                    Điện thoại<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="font-size: 12pt;">
                                    {{ setting('company.name', '') }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="font-size: 12pt;">
                                    Đại diện bởi<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="font-size: 12pt;">
                                    {{ setting('company.name', '') }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="font-size: 12pt;">
                                    Chức vụ<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="font-size: 12pt;">
                                    {{ setting('company.name', '') }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4" style="font-size: 12pt;">
                                    Và
                                </div>
                            </div>
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