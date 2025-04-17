<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phiếu kết quả xét nghiệm</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
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
    @if ( $patient )
        <table style="margin-top: 40px; margin-left: 10px;">
            <tbody>
                <tr>
                    <td width="60%" class="border" style="vertical-align: top;">
                        <div style="font-weight:bold; font-size: 11pt;">PHÒNG KHÁM XÉT NGHIỆM Y KHOA SỐ 69</div>
                        <div style="font-weight:bold; font-size: 11pt;">Khóm 2, TT Cái Đôi Vàm, TP.Cà Mau</div>
                        <div style="font-weight:bold; font-size: 11pt;">ĐT: 0888184448 - 0523112113</div>
                    </td>
                    <td class="border" style="vertical-align: top; text-align: right; padding-right: 50px">
                        <div style="text-align:right; font-size: 11pt; font-style:italic">Mã bệnh nhân (PID): <strong>{{$patient->PID}}</strong></div>
                        <div style="text-align:right; font-size: 11pt; font-style:italic">Phiên khám: <strong>{{$patient->id_session}}</strong></div>
                    </td>
                </tr>
            </tbody>
        </table>

        <table>
            <tbody>
                <tr>
                    <td colspan="2" class="center border" style="padding-top:15px; padding-bottom:15px">
                        <div style="font-weight:bold; font-size: 13pt">PHIẾU KẾT QUẢ XÉT NGHIỆM</div>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table">
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
                        <div>Giới tính: <strong>{{$patient->sex}}</strong></div>
                    </td>
                </tr>
                
            </tbody>
        </table>
        

        <table>
            <tbody>
                <tr>
                    <td class="border i" width="100%">
                        <div>Địa chỉ:&nbsp;<strong>{{$patient->address}}</strong></div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <td class="border i" style="padding-bottom: 10px" width="100%">
                        <div>Kết quả xét nghiệm:&nbsp;<strong></strong></div>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <table class="table table-bordered text-center border-result">
            <thead class="border-result">
                <tr>
                    <th class="item-result" >Xét nghiệm</th>
                    {{-- <th class="item-result">Nhóm xét nghiệm</th> --}}
                    <th class="item-result">Kết quả</th>
                    <th class="item-result">Trị số bình thường</th>
                    <th class="item-result">Đơn vị</th>
                    <th class="item-result">Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $currentCategory = null;
                @endphp

                @foreach ($result as $item)
                    @if ($currentCategory != $item->name_category)
                        @if ($currentCategory != null)
                        @endif
                        <tr class="group-name">
                            <td colspan="5" style="font-weight: bold; background-color: #f2f2f2; padding: 2px; border: solid 1px #000000; font-style: italic; text-transform: uppercase; font-size: 11pt; ">{{ $item->name_category }}</td>
                        </tr>
                        @php
                            $currentCategory = $item->name_category;
                        @endphp
                    @endif
                    <tr>
                        <td class="item-result">{{$item->name_details_test}}</td>
                        {{-- <td class="item-result">{{$item->name_category}}</td> --}}
                        @php
                            $resultMap = [
                                            -100 => ">",
                                            -110 => "<",
                                            -120 => "=",
                                            -130 => ">=",
                                            -140 => "<="
                                        ];

                            if (isset($resultMap[$item->normal_value_start])) {
                            $resultText = $resultMap[$item->normal_value_start];
                            } else {
                                $resultText = $item->normal_value_start . "-";
                            }
                            $isInvalid = false;
                            switch ($resultText) {
                                case ">":
                                    $isInvalid = $item->text_result <= $item->normal_value_end;
                                    break;
                                case "<":
                                    $isInvalid = $item->text_result >= $item->normal_value_end;
                                    break;
                                case "=":
                                    $isInvalid = $item->text_result != $item->normal_value_end;
                                    break;
                                case ">=":
                                    $isInvalid = $item->text_result < $item->normal_value_end;
                                    break;
                                case "<=":
                                    $isInvalid = $item->text_result > $item->normal_value_end;
                                    break;
                                case ($item->normal_value_start . "-"):
                                    $isInvalid = $item->text_result > $item->normal_value_end || $item->text_result < $item->normal_value_start;
                                    break;
                            }
                        @endphp
                        <td class="item-result" style="{{ $isInvalid ? 'font-weight: bold; font-style: italic; text-decoration: underline;' : '' }}">
                            @if ($item->text_result === null  || $item->text_result === '' )
                                <span style="font-weight: bold; font-style: italic;  font-size:13px;">Không có kết quả</span>
                            @else
                                {{ $item->text_result }}
                            @endif
                        </td>
                        <td class="item-result">
                            {{$resultText}}{{$item->normal_value_end}}
                        </td>
                        <td class="item-result">{{$item->unit}}</td>
                        </td>
                        <td class="item-result">{{$item->note}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <footer class="main-footer" style=" margin-top:50px;">
            <table class="footer">
                <tbody>
                    <tr>
                        <td class="center border" width="50%"></td>
                        <td class="center border" width="50%">
                            <div>
                                <i>
                                    Cần Thơ, ngày {{$item->current_day}} tháng {{$item->current_month}} năm {{$item->current_year}}
                                </i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="center border" width="50%"><div><strong></strong></div></td>
                        <td class="center border" width="50%" style="padding-top:0px"><div><strong>Người thực hiện</strong></div></td>
                    </tr>
                    <tr>
                        <td class="center border" width="50%" style="vertical-align: bottom"></td>
                        <td class="center border" width="50%" height="120px" style="vertical-align: bottom">
                            <div><strong>CNXN.NGUYỄN BÁ KIỆN</strong></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </footer>
    @endif
</body>
</html>
