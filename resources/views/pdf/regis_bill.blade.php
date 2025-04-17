<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hóa đơn thanh toán</title>
    <style type="text/css">
        body {
            font-family: 'Roboto', Arial, sans-serif;
            display: flex;
            margin: 0;
        }
        .center {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-left: 20px;
        }
        th, td {
            padding:2px;
            text-align: left;
            font-family: 'Times New Roman';
            font-size: 12pt;
        }
        span {
            padding: 2px;
            text-align: left;
            font-size: 12pt;
        }
        .break_page {
            page-break-after: always;
        }
        .border-result {}
        .item-result {
            padding: 2px 2px;
            text-align: center;
            font-size: 11.5pt;
            border: 1px solid #333 !important;
        }
        .i {
            text-align: left !important;
        }
        .group-name {
            font-weight: bold;
            background-color: #f2f2f2;
            padding: 5px;
            font-size: 14pt;
        }
    </style>
</head>

<body>
@php
    $totalAmount = 0; // Khởi tạo biến tổng cộng
@endphp
    {{-- @if ($infor[0]['active'] == 0)
        <div >Không có sinh viên</div>
    @else
        @php
            $i = 0;
        @endphp
        @foreach ( $infor as $value )
        @php
 $i ++;
        @endphp --}}
        
        
        
            <table style="margin-top: 40px;margin-left: 10px;">
                <tbody>
                    <tr>
                        <td width="60%" class="border" style="vertical-align: top;">
                            <div style="font-weight:bold; font-size: 11pt;">PHÒNG KHÁM XÉT NGHIỆM Y KHOA SỐ 69</div>
                            <div style="font-weight:bold; font-size: 11pt;">Khóm 2, TT Cái Đôi Vàm, TP.Cà Mau</div>
                            <div style="font-weight:bold; font-size: 11pt;">ĐT: 0888184448 - 0523112113</div>
                        </td width="50%">
                        <td class="border" style="vertical-align: top; text-align: right; padding-right: 50px">
                            <div style="padding-top: -60px;text-align:right; font-family: 'Times New Roman', Times, serif; font-size: 11pt;font-style:italic">Mã bệnh nhân (PID): <strong>{{$patient->PID}}</strong></div>
                            <div style="padding-top: -60px;text-align:right; font-family: 'Times New Roman', Times, serif; font-size: 11pt;font-style:italic">Phiên khám: <strong>{{$id_session}}</strong></div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <td colspan="2" class="center border" style="padding-top:15px;padding-bottom:15px">
                            <div style="font-weight:bold; font-size: 13pt">HÓA ĐƠN THANH TOÁN</div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
            <tbody>
                <tr>
                    <td class="border" colspan="3">
                        <div>Họ và tên: <strong class="text-truncate d-inline-block" style="max-width: 150px;">{{$patient->name_patient}}</strong></div>
                    </td>
                </tr>
                <tr>
                    <td class="border">
                        <div>Năm sinh: <strong>{{$patient->birthday}}</strong></div>
                    </td>
                    <td class="border" colspan="2">
                        <div>Giới tính: <strong>{{$patient->sex == 0 ? 'Nam' : 'Nữ' }}</strong></div>
                    </td>
                </tr>
                
            </tbody>
                
            </table>
            <table>
                <tbody>
                    <tr>
                        <td class="border i" width="100%">
                            <div> Địa chỉ:&nbsp;<strong> {{ $patient->address    }}</strong></div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <td class="border i" style="padding-bottom: 10px" width="100%">
                            <div> Danh mục xét nghiệm:&nbsp;<strong> </strong></div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-borderd text-center border-result">
                <thead class="thead-dark border-result">
                    <tr>
                        <th class="item-result ">STT</th>
                        <th class="item-result ">Tên dịch vụ</th>
                        <th class="item-result ">Đơn giá (VND)</th>
    
                    </tr>
                </thead>
                @foreach ( $detail_value as $value )
                    @foreach ( $value['regis_detail'] as $value1 )
                    @php
                        $totalAmount += $value1['price']; // Cộng dồn giá vào biến tổng cộng
                    @endphp
                    <tbody class="border-result ">
                        <tr>
                            <td class="item-result ">{{ $value1['stt'] }}</td>
                            <td class="item-result ">{{ $value1['name_details'] }}</td>
                            <td class="item-result ">{{ number_format($value1['price'], 0, ',', '.') }} VND</td>
                        </tr>
                    </tbody>
                   
                    @endforeach
                @endforeach
            </table>
                 
            <!-- Tổng cộng -->
            <table>
                <tbody>
                    <tr>
                        <td class="border i" width="60%">
                            
                        </td>
                        <td class="border i" style="text-align:right;" width="40%">
                            <div class="item-result" style="font-weight: bold; border: none; font-style: italic;">Tổng cộng: {{ number_format($totalAmount, 0, ',', '.') }} VND</div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <footer class="main-footer" style = "margin-top:50px;">
                <table class="footer">
                    <tbody>
                        <tr>
                            <td class="center border" width="50%">
                            </td>
                            <td class="center border" width="50%">
                                <div><i> Cần Thơ, ngày {{$patient->current_day}} tháng {{$patient->current_month}} năm {{$patient->current_year}} </i></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="center border" width="50%">
                                <div><strong> </strong></div>
                            </td>
                            <td class="center border" width="50%" style="padding-top:0px ">
                                <div><strong>Người thực hiện</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="center border" width="50%" style="vertical-align: bottom">
                            </td>
                            <td class="center border" width="50%" height="120px" style="vertical-align: bottom">
                                <div><strong>CNXN.NGUYỄN BÁ KIỆN</strong></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </footer>
            
       
       


</body>
</html>
