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
                        <!-- BEGIN hđlđ content -->
                        <div class="row content-hdld">
                            <div class="row text-center">
                                <p class="quoc-hieu">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
                                <p class="tieu-ngu">Độc lập - Tự do - Hạnh phúc</p>
                                <p class="line">------------o0o------------</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ma-hdld">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ten-hdld">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Người sử dụng lao động<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8 ten-cong-ty">
                                    {{ setting('company.name', '') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Địa chỉ<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    {{ setting('company.address', '') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Điện thoại<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    {{ setting('company.phone', '') }}
                                </div>
                                <div class="d-contents col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Fax: {{ setting('company.fax', '') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Đại diện bởi<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-4 col-md-4 col-sm-4 col-xs-4 dai-dien-boi">
                                    Ông {{ setting('company.nguoi_dai_dien', '') }}
                                </div>
                                <div class="d-contents col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Quốc tịch: Việt Nam
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Chức vụ<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8">
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
                                <div class="d-contents col-lg-4 col-md-4 col-sm-4 col-xs-4 nguoi-lao-dong">
                                    {{ ($nhan_su->gioi_tinh == 1)?'Ông':'Bà' }} {{ $nhan_su->ho_ten }}
                                </div>
                                <div class="d-contents col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Quốc tịch: Việt Nam
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Ngày sinh<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    {{ \Carbon\Carbon::parse($nhan_su->ngay_sinh)->format('d/m/Y') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Hộ khẩu thường trú<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    {{ $nhan_su->dia_chi_thuong_tru }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    Số CMND/ Hộ chiếu<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    {{ $nhan_su->so_cmnd }}
                                </div>
                                <div class="d-contents col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    Ngày cấp: {{ \Carbon\Carbon::parse($nhan_su->ngay_cap_cmnd)->format('d/m/Y') }}
                                </div>
                                <div class="d-contents col-lg-3 col-md-3 col-sm-3 col-xs-3">
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
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8 ten-loai-hdld">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Thời hạn hợp đồng<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8 thoi-han-hdld">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Địa điểm làm việc<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    Văn phòng, chi nhánh công ty và các dự án trực thuộc công ty quản lý.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    - Chức danh công việc / Chức vụ<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    {{ $nhan_su->chuc_danh }}
                                    @if($nhan_su->bophan_id != 0)
                                        {{ $nhan_su->bophans->ten }}
                                    @elseif($nhan_su->phongban_id != 0)
                                        {{ $nhan_su->phongbans->ten }}
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Công việc phải làm<span class="pull-right">:</span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="padding-left: 0px;">
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
                                    - Thời gian làm việc<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    08h/ngày hoặc 48h/tuần
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    (Sáng từ 07h30 đến 11h30, chiều từ 13h00 đến 17h00. Làm việc từ thứ hai đến thứ bảy hàng tuần. Khi có nhu cầu công việc có thể huy động làm thêm giờ.)
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    - Được cấp phát những dụng cụ làm việc gồm: theo nhu cầu thực tế.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    - Được trang bị đồng phục, BHLĐ: theo quy định của Công ty.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    - Điều kiện an toàn và vệ sinh lao động tại nơi làm việc theo quy định của Nhà nước và quy định của công ty.
                                </div>
                            </div>
                            <!-- END Điều khoản 2 -->

                            <!-- Điều khoản 3 -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <strong>Điều 3: Nghĩa vụ và quyền lợi của người lao động</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <strong>1. Quyền lợi: </strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                - Phương tiện đi lại làm việc<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    Cá nhân tự túc.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                - Lương căn bản<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8 luong-can-ban-hdld">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                - Hỗ trợ, trợ cấp khác<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8 luong-tro-cap-hdld">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                - Thưởng hiệu quả công việc tối đa<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-7 col-md-7 col-sm-7 col-xs-7 luong-hieu-qua-hdld">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    (Theo bảng đánh giá hiệu quả công việc của quản lý trực tiếp và của Công ty vào cuối mỗi tháng dựa vào quy chế lương thưởng).
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Hình thức trả lương<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    Chuyển khoản
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Thời hạn trả lương<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    Không muộn hơn ngày 05 của tháng kế tiếp.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Chế độ nâng lương<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    Theo quy định của công ty.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    - Bảo hiểm xã hội, bảo hiểm y tế và bảo hiểm thất nghiệp<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    Theo quy định của luật BHXH
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    - Chế độ nghỉ ngơi<span class="pull-right">:</span>
                                </div>
                                <div class="d-contents col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    Nghỉ hàng tuần, nghỉ lễ, nghỉ phép năm…: theo quy định pháp luật lao động và quy định của Công ty.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <em>- Người lao động có trách nhiệm đóng thuế thu nhập cá nhân theo quy định nhà nước.</em>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <strong>2. Nghĩa vụ: </strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    - Hoàn thành những công việc đã cam kết trong hợp đồng lao động và các nghĩa vụ khác của người lao động đối với Công ty.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    - Chấp hành nghiêm túc sự phân công, điều động công tác của Công ty; chấp hành kỷ luật lao động, an toàn lao động, thỏa ước lao động tập thể và các nội quy, quy chế khác của Công ty.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    - Bồi thường vi phạm và vật chất:
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    + Người lao động phải bồi thường cho công ty những thiệt hại về vật chất và chịu trách nhiệm trước pháp luật do làm trái nội quy, làm trái những quy định hiện hành về vệ sinh – an toàn lao động, phòng chống cháy nổ.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    + Người lao động làm hư hỏng hoặc làm thất lạc, mất mát thiết bị dụng cụ phương tiện làm việc của công ty phải có trách nhiệm bồi thường cho công ty. Mức bồi thường và phương thức thanh toán do 2 bên thỏa thuận.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <em>- Trong thời gian hiệu lực hợp đồng và sau khi nghỉ việc tại công ty, nhân viên không được phép: Cung cấp thông tin, tiết lộ bí mật tài chính, kinh doanh của công ty ra ngoài, tiết lộ thông tin về khách hàng, mặt hàng, sản phẩm tương tự của công ty cho bất kỳ tổ chức cá nhân nào nhằm phục vụ công việc riêng cho mình mà chưa được sự đồng ý bằng văn bản từ phía công ty. Trường hợp bị phát hiện, cá nhân đó sẽ bị khởi tố trước pháp luật.</em>
                                </div>
                            </div>
                            <!-- END Điều khoản 3 -->

                            <!-- Điều khoản 4 -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <strong>Điều 4: Nghĩa vụ và quyền hạn của người sử dụng lao động.</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <strong>1. Nghĩa vụ: </strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    - Thực hiện đầy đủ những điều kiện đã cam kết trong hợp đồng để người lao động làm việc có hiệu quả; bảo đảm việc làm cho người lao động theo hợp đồng đã ký.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    - Thanh toán đầy đủ, đúng thời hạn các chế độ và quyền lợi cho người lao động đã cam kết trong hợp đồng.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <strong>2. Quyền hạn: </strong>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    - Điều hành người lao động hoàn thành công việc theo hợp đồng (bố trí, điều chuyển, tạm ngừng việc...).
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    - Tạm hoãn, chấm dứt hợp đồng lao động, kỷ luật người lao động theo quy định của pháp luật, thỏa ước lao động tập thể (nếu có) và nội quy lao động của doanh nghiệp.
                                </div>
                            </div>
                            <!-- END Điều khoản 4 -->

                            <!-- Điều khoản 5 -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <strong>Điều 5: Điều khoản thi hành</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <strong>1. Nghĩa vụ: </strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    - Những vấn đề về lao động không ghi trong hợp đồng lao động này thì áp dụng quy định của thoả ước tập thể, trường hợp chưa có thoả ước tập thể thì áp dụng quy định của pháp luật lao động.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    - Hợp đồng lao động được làm thành 02 bản có giá trị ngang nhau, mỗi bên giữ một bản và có hiệu lực từ ngày <strong class="ngay-ky-hdld"></strong>. Khi hai bên ký kết phụ lục hợp đồng lao động thì nội dung của phụ lục hợp đồng lao động cũng có giá trị như các nội dung của bản hợp đồng lao động này.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    Hợp đồng này được lập tại {{ setting('company.name', '') }} ngày: <strong class="ngay-ky-hdld"></strong>
                                </div>
                            </div>
                            <!-- END Điều khoản 5 -->

                            <!-- Chữ ký -->
                            <br>
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 cot-trai text-center">
                                    <p style="font-weight: bold; margin: 0 0 0 0;">NGƯỜI LAO ĐỘNG</p>
                                    <p style="margin: 0 0 0 0;"><em>(Ký, ghi rõ họ tên)</em></p>
                                    <br><br><br><br>
                                    <p style="font-weight: bold; margin: 0 0 0 0;">{{ $nhan_su->ho_ten }}</p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 cot-phai text-center">
                                    <p style="font-weight: bold; margin: 0 0 0 0;">NGƯỜI SỬ DỤNG LAO ĐỘNG</p>
                                    <p style="font-weight: bold; margin: 0 0 0 0;">{{ setting('company.chuc_vu', '') }}</p>
                                    <br><br><br><br>
                                    <p style="font-weight: bold; margin: 0 0 0 0;">{{ setting('company.nguoi_dai_dien', '') }}</p>
                                </div>
                            </div>
                            <!-- END Chữ ký -->
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