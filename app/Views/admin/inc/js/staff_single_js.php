<script>

    load_staff()

    function load_staff() {

        $.ajax({
            url: "<?= base_url('/api/user/staff/') ?>",
            type: "GET",
            data: {
                s_id: "<?= $_GET['s_id'] ?>"
            },
            beforeSend: function () { },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    let staff = resp.data
                    $('#staff-name').val(staff.staff_name)
                    $('#staff-role').val(staff.staff_role)
                    $('#staff-number').val(staff.staff_number)
                    $('#staff-email').val(staff.staff_email)
                    $('#staff-id').val(staff.staff_id)
                    $.ajax({
                        url: "<?= base_url('/api/user/staff/access') ?>",
                        data: {},
                        type: "GET",
                        beforeSend: function () { },
                        success: function (resp_access) {
                            if (resp_access.status) {

                                let html = ``
                                $.each(resp_access.data, function (index, item) {
                                    // console.log(staff.access, item.uid);
                                    let isChecked = staff.access.includes(item.uid);
                                    html += `<div class="form-check form-switch form-switch-md form-switch-success mb-3" dir="ltr">
                                                <input 
                                                    type="checkbox" 
                                                    class="form-check-input" 
                                                    onChange="toggleAccess('${staff.staff_id}', '${item.uid}')" 
                                                    id="input_${item.uid}" 
                                                    ${isChecked ? 'checked' : ''}>
                                                <label class="form-check-label" for="input_${item.uid}">${item.name}</label>
                                            </div>`;
                                })

                                $('#access_bx').html(html)

                            }
                        },
                        error: function (err) {
                            console.error(err)
                        }
                    })
                }
            },
            error: function (err) {
                console.error(err)
            }

        })
    }

    function toggleAccess(staff_id, access_id) {
        $.ajax({
            url: "<?= base_url('/api/user/staff/access/update') ?>",
            data: {
                staff_id: staff_id,
                access_id: access_id
            },
            beforeSend: function () {
                $(`#input_${access_id}`).attr('disabled', true);
            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    $(`#input_${access_id}`).attr('disabled', false);
                    html = `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                    $('#alert').html(html)
                } else {
                    html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                            <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`
                    $('#alert').html(html)
                }
            },
            error: function (err) {
                console.error(err)
            },
            complete: function () {
                $(`#input_${access_id}`).attr('disabled', false);
                load_staff();
            }
        })
    }

    $('#staff_update_btn').on('click', function () {

        $.ajax({
            url: "<?=base_url('/api/user/staff/update')?>",
            type: "POST",
            data: {
                staffId         : $('#staff-id').val(),
                staffName       : $('#staff-name').val(),
                staffEmail      : $('#staff-email').val(),
                staffNumber     : $('#staff-number').val(),
                staffRole       : $('#staff-role').val()
            },
            beforeSend:function(){
                $(`#staff_update_btn`).attr('disabled', true);
            },
            success:function(resp){
                if(resp.status){
                    html = `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                    $('#alert').html(html)

                }else{
                    html = `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                    <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
                    $('#alert').html(html)
                }
                $(`#staff_update_btn`).attr('disabled', false);
            },
            error: function(err){
                console.error(err)
            },
            complete: function () {
                $(`#staff_update_btn`).attr('disabled', false);
                load_staff();
            }
        })

    })

</script>