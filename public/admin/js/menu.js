$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#root_menu').select2();
    $('#type_menu').select2();
    $('#type_screen').select2();
    
    $('#edit_root_menu').select2();
    $('#edit_type_menu').select2();
    $('#edit_type_screen').select2();
    $.ajax({
        type: 'post',
        url: '/menu/load_list_menu',       
        success: function(res) {
            $('#root_menu').empty();
            $('#root_menu').select2({
                data: res
            });
            $('#edit_root_menu').empty();
            $('#edit_root_menu').select2({
                data: res
            });
            menu = res;
        }
    });
});

async function list_menu() {
    $("#list_menu").empty();
    $.ajax({
        type: "get",
        url: "/menu/list_menu",
        success: function(data) {
            let html = "";
            html += '<table class="table table-bordered table-hover table-striped" style="width: 100%" id="danhsach_menu">';
            html += "<thead><tr>";
            html += "<th>STT</th><th>Tên menu</th><th>Loại menu</th><th>Loại màn hình</th><th>Giới thiệu</th><th>Thao tác</th>";
            html += "</tr></thead><tbody>";
            data.forEach((item, index) => {
                html += "<tr>";
                html += `<td style="text-align: center;">${index + 1}</td>`;
                html += `<td style="width:200px;">${item.tenmenu}</td>`; 
                html += `<td style="text-align: center;">${item.id_cap}</td>`;
                html += `<td style="text-align: center;">${item.loaimanhinh}</td>`;
                html += `<td style="text-align: center;">${item.gioithieu}</td>`;
                html += `<td style="text-align: center; display: flex; justify-content: center; align-items: center;">
                            <a href="#" title="Sửa" class="mx-2" onclick="edit_menu('${item.id}')"><i class='fas fa-edit' style='color:black;'></i></a>
                            <a href="#" title="xóa" class="mx-2" onclick="delete_menu('${item.id}')"><i class='fas fa-trash'  style='color:red;'></i></a>
                         </td>`;
                html += "</tr>";
            });
            html += "</tbody></table>";
            $("#list_menu").html(html);
        
            const table = $("#danhsach_menu").DataTable({
                scrollY: "350px",
                paging: false,
                lengthChange: false,
                searching: false,
                ordering: false,
                info: false,
                autoWidth: true,
                responsive: true,
            });
        
            return table;
        },
    });
}

$(async function () {
    const table = await list_menu();
});

async function delete_menu(id) {
    if (confirm("Bạn có chắc chắn muốn xóa menu này?")) {
        const res = await $.ajax({
            type: 'POST',
            url: '/menu/delete_menu/'+ id,
            data: { id: id },
        });
        if (res.success) {
            toastr.success('Đã xóa menu thành công!');
            await list_menu(); 
        } else {
            toastr.warning('Có lỗi xảy ra khi xóa menu!');
        }
    }
}

function edit_menu(id) {
    $.ajax({
        type: 'GET',
        url: '/menu/edit_menu/' + id,
        success: function(data) {
            if (data.success) {
                console.log(data)
                $('#edit_name_menu').val(data.data.tenmenu);
                $('#edit_root_menu').val(data.data.id_cha);
                $('#edit_type_menu').val(data.data.id_cap);
                $('#edit_type_screen').val(data.data.loaimanhinh);
                $('#edit_rd_hienthi').val(data.data.trangthai);
                $('#edit_thuTu').val(data.data.thutu);
                $('#edit_rd_uutien').val(data.data.uutien);
                $('#edit_intro').val(data.data.gioithieu);
                $('#edit_id').val(id);
                $('#edit_menu').modal('show');
            } else {
                alert(data.message);
            }
        },
        error: function(xhr) {
            toartr('Có lỗi xảy ra khi lấy thông tin bệnh nhân.');
        }
    });
}

async function update_menu() {
    var id = $('#edit_id').val();
    var name_menu = $('#edit_name_menu').val();
    var root_menu = $('#edit_root_menu').val();
    var typle_menu = $('#edit_type_menu').val();
    var type_screen = $('#edit_type_screen').val();
    var thuTu = $('#edit_thuTu').val();
    var intro = $('#edit_intro').val();
    var rd_uutien = $('#edit_rd_uutien').is(':checked') ? $('#edit_rd_uutien').val() : 0;
    var rd_hienthi = $('#edit_rd_hienthi').is(':checked') ? $('#edit_rd_hienthi').val() : 0;
    root_menu = root_menu ? root_menu : 0;
    typle_menu = typle_menu ? typle_menu : 0;
    type_screen = type_screen ? type_screen : 0;

    const res = await $.ajax({
        type: 'POST',
        url: '/menu/update_menu/' + id, 
        data: {
            tenmenu: name_menu,
            id_cha: root_menu,
            id_cap: typle_menu,
            loaimanhinh: type_screen,
            trangthai: rd_hienthi,
            thutu: thuTu,
            uutien: rd_uutien,
            gioithieu: intro,
        },
        });
        if (res.success) {
            toastr.success('Đã cập nhật menu thành công!');
            $('#edit_menu').modal('hide');
            await list_menu(); 
            logs();
        } else {
            toastr.warning('Có lỗi xảy ra khi cập nhật menu!');
        }

}


function clearPopup() {
    $('#edit_name_menu').val('');
    $('#edit_root_menu').val('');
    $('#edit_type_menu').val('');
    $('#edit_type_screen').val('');
    $('#edit_thuTu').val('');
    $('#edit_intro').val();
    $('#edit_rd_uutien').val()
    // $('#edit_rd_hienthi').val()
    $('input[name="rdio"]:checked').prop('checked', false); 
    $('input[name="rdioo"]:checked').prop('checked', false); 

    $('.error-message').addClass('d-none').text('');
}
function closePopup() {
    clearPopup(); 
    $('#edit_menu').modal('hide'); 
}



function formatDateWithTime(dateString) {
    if (!dateString) return '';
    const date = new Date(dateString);
    if (isNaN(date.getTime())) return '';
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = date.getFullYear();
    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');
    const seconds = String(date.getSeconds()).padStart(2, '0');
    return `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;
}

function logs() {
    console.log('Gọi logs()...');
    $.ajax({
        url: '/menu/logs',
        type: 'GET',
        success: function (data) {
            const table = $('#log-table').DataTable();
            table.clear(); // Xóa dữ liệu cũ
            data.forEach(log => {
                let changesHtml = '';
                if (log.changes && Object.keys(log.changes).length > 0) {
                    // Duyệt qua các thay đổi và hiển thị chúng
                    for (const key in log.changes) {
                        if (log.changes.hasOwnProperty(key)) {
                        //    console.log("Có sự thay đổi ở", key);
                        //    console.log(log.changes[key].old);
                        //    console.log(log.changes[key].new);
                        //    console.log("TOÀN BỘ CHANGES", JSON.stringify(log.changes, null, 2));

                            if(log.changes[key].new != log.changes[key].old){
                                // console.log("nó phải khác nhau mới nhảy vô đây")
                                changesHtml += `<strong>${key}:</strong> Cũ: ${log.changes[key].old} -> Mới: ${log.changes[key].new}<br>`;
                            }
                        }
                    }
                }
                // Nếu có thay đổi, thêm vào bảng
                if (changesHtml) {
                    // console.log('vẽ cái bảng ở đây')
                    table.row.add({
                        time: formatDateWithTime(log.time),
                        causer: log.causer,
                        description: log.description,
                        changes: changesHtml
                    }).draw(); 
                }
            });
            
        },
        error: function(xhr, status, error) {
            console.error("Lỗi khi lấy logs: ", error);
            console.log("Status:", status);
            console.log("Response:", xhr.responseText);
        }
    });
}

$(document).ready(function () {
    console.log('click cái để vẽ bảng...............................................')
    // Khởi tạo DataTable
    $('#log-table').DataTable({
        columns: [
            { data: 'time', type: 'date' }, 
            { data: 'causer' },
            { data: 'description' },
            { data: 'changes' }
        ],
        
        order: [[0, 'desc']]
    });

    // Gọi logs khi nhấp vào tab
    $('a[href="#tab-log"]').on('click', function () {
        console.log('Sự kiện click được gọi!');
        logs(); // Gọi hàm logs()
    });
});

function add_menu(){
    var name_menu = $('#name_menu').val();
    var root_menu = $('#root_menu').val() || 0;
    var type_menu = 0;
    var type_screen = 0;
    var rd_hienthi = 1;
    var rd_uutien =  1;
    var thuTu = 1;
    let gioithieu = $('#gioithieu').val();
    gioithieu = gioithieu ? gioithieu : '';

    
    console.log(name_menu);
    $.ajax({
        type: 'POST',
        url: '/menu/add_menu',
        data: {
           
            name_menu: name_menu,
            root_menu: root_menu,
            type_menu: type_menu,
            type_screen: type_screen,
            rd_hienthi: rd_hienthi,
            rd_uutien: rd_uutien,
            thuTu: thuTu,
            gioithieu: gioithieu,
        },
        success: function(res){
            if(res.success){
                console.log(res);
                toastr.success("Thêm dữ liệu thành công");

                // Reset các trường nhập liệu
                $('#name_menu').val('');
                $('#root_menu').val(null).trigger('change'); // Reset Select2
                $('#gioithieu').val('');

                list_menu(); // Gọi lại danh sách menu
            }
        },
        error: function(xhr, res){
            toastr.error("Có lỗi xảy ra");
            console.log(res);
            console.log(xhr.responseText);
        }
    });
}
