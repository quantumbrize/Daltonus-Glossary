<script>
    $(document).ready(function() {
        customers()
    });

    function customers() {
        $.ajax({
            url: "<?= base_url('/api/customers') ?>",
            type: "GET",
            // beforeSend: function () {
            //     $('#table-banner-list-all-body').html(`<tr >
            //             <td colspan="7"  style="text-align:center;">
            //                 <div class="spinner-border" role="status"></div>
            //             </td>
            //         </tr>`)
            // },
            success: function (resp) {
                if (resp.status) {
                    console.log(resp)
                        let html = ``
                        $.each(resp.user_data, function (index, user) {
                            // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
                            var image = `https://usercontent.one/wp/www.vocaleurope.eu/wp-content/uploads/no-image.jpg?media=1642546813`
                            if(user.user_img != null){
                                image = `<?= base_url('public/uploads/user_images/') ?>${user.user_img.img}`
                            }
                            var joining_date = new Date(user.created_at)
                            var formatted_date = joining_date.toLocaleString('en-US', { weekday: 'short', month: 'short', day: '2-digit', year: 'numeric' });
                            var status_color = 'text-danger'
                            if(user.status == "active"){
                                status_color = 'text-success'
                            }
                            
                            console.log(user)
                            html += `<tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                </div>
                                            </th>
                                            <td >
                                                <img src="${image}" alt="" class="product-img" style="width: 80px; height: 80px;  border-radius: 50%; overflow: hidden;">
                                            </td>
                                            <td >
                                                ${user.user_name}
                                            </td>
                                            <td >
                                                ${user.number}
                                            </td>
                                            <td >
                                                ${user.email}
                                            </td>
                                            <td >
                                                ${formatted_date}
                                            </td>
                                            <td class="status">
                                                <span class="badge bg-success-subtle ${status_color} text-uppercase">${user.status}</span>
                                            </td>
                                            <td>
                                                <ul class="list-inline hstack gap-2 mb-0">
                                                    <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                        <a href="#showModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
                                                            <i class="ri-pencil-fill fs-16"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                        <a class="text-danger d-inline-block remove-item-btn" href="#" onclick="open_delete_modal('${user.uid}')">
                                                            <i class="ri-delete-bin-5-fill fs-16"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>

                                        </tr>`
                        })
                        $('#table_data').html(html)
                        // $('#table-banner-list-all').DataTable();
                }else{
                    $('#table-banner-list-all-body').html(`<tr >
                        <td>
                            DATA NOT FOUND!
                        </td>
                    </tr>`)
                }

            },
            error: function (err) {
                console.log(err)
            },
            // complete: function () {
               
            // }
        })
    }

    

    var customer_id = ""
    var flag = false
    function open_delete_modal(c_id){
        customer_id = c_id
        $('#deleteRecordModal').modal('show')
    }

    function delet_customer() {
        // alert(customer_id)
        $.ajax({
            url: "<?= base_url('/api/delete/customer') ?>",
            type: "GET",
            data:{user_id:customer_id},
            beforeSend: function () {
                    $('#delete-record').html(`<div class="spinner-border" role="status"></div>`)
                    $('#delete-record').attr('disabled', true)

                },
            success: function (resp) {
                if (resp.status) {
                    console.log(resp)
                    $('#deleteRecordModal').modal('hide')
                    customers()
                }else{
                    console.log(resp)
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                    $('#delete-record').html(`Yes, Delete It!`)
                    $('#delete-record').attr('disabled', false)
                }
        })
    }
</script>