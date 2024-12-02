<script>

    load_staff_table()

    function load_staff_table() {

        $.ajax({
            url: '<?= base_url('/api/user/staff/') ?>',
            type: "GET",
            beforeSend: function () {
                $('#staff_table_data').html(`<tr>
                                            <td colspan="5">
                                                <center>
                                                    <div class="spinner-border text-success" role="status"></div>
                                                </center>
                                            </td>
                                        </tr>`)
            },
            success: function (resp) {
                console.log(resp)
                if (resp) {
                    let html = ''
                    $.each(resp.data, function (index, item) {
                        html += `<tr>
                                <td>${item.staff_name}</td>
                                <td>${item.staff_role}</td>
                                <td>${item.staff_number}</td>
                                <td>${item.staff_email}</td>
                                <td>
                                    <i 
                                        style="margin-right: 20px; cursor: pointer;"
                                        class="ri-edit-2-line text-primary d-inline-block edit-item-btn fs-16" 
                                        onclick="open_staff('${item.staff_id}')">
                                    </i>
                                    <i 
                                        style="margin-right: 20px; cursor: pointer;"
                                        class="ri-delete-bin-line text-danger d-inline-block remove-item-btn fs-16" 
                                        onclick="delete_staff('${item.staff_id}')">
                                    </i>
                                </td>
                            </tr>`

                    })
                    $('#staff_table_data').html(html)
                    $('#staff_table').DataTable();

                }
            },
            error: function (err) {
                console.err(err)
            }
        })
    }


    function open_staff(staff_id) {
        window.location.href = `<?= base_url('/admin/users/staff/update?s_id=') ?>${staff_id}`;
    }


</script>