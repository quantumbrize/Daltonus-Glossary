<script>

    load_access()


    function load_access() {
        $.ajax({
            url: '<?= base_url('/api/user/staff/access') ?>',
            type: "GET",
            beforeSend: function () { },
            success: function (resp) {
                if (resp.status) {
                    let html = ``
                    $.each(resp.data, function (index, item) {
                        html += ` <div class="form-check form-switch form-switch-md form-switch-success mb-3" dir="ltr">
                                    <input type="checkbox" class="form-check-input" id="input_${item.uid}" >
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

    $('#staff_add_btn').on('click', function () {
        let staffName = $('#staff-name').val()
        let staffRole = $('#staff-role').val()
        let staffNumber = $('#staff-number').val()
        let staffEmail = $('#staff-email').val()
        let staffPassword = $('#staff-password').val()
        let selectedAccess = [];
        // Iterate over each checkbox
        $('input[type="checkbox"]').each(function () {
            // Check if the checkbox is checked
            if ($(this).is(':checked')) {
                // Extract the ID from the checkbox ID attribute
                let uid = $(this).attr('id').replace('input_', '');
                selectedAccess.push(uid);
            }
        });
        //console.log('Selected Access:', selectedAccess);
        $.ajax({
            url: '<?= base_url('/api/user/staff/add') ?>',
            type: "POST",
            data: {
                staffName: staffName,
                staffRole: staffRole,
                staffNumber: staffNumber,
                staffEmail: staffEmail,
                staffPassword: staffPassword,
                selectedAccess: selectedAccess
            },
            beforeSend: function () { },
            success: function (resp) {
                console.log(resp)
                let html = ''
                if (resp.status) {
                    html = `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                    $('#alert').html(html)
                    setTimeout(function () {
                        window.location.href = "<?= base_url('/admin/users/staff') ?>";
                    }, 2000)

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
            }
        })
    })


</script>