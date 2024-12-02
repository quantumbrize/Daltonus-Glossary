<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script>
    var editor;
    var editor1;
    var editor2;
    var about_id = ''
    $(document).ready(function () {
        

        let $fileInput = $("#file-input");
        let $imageContainer = $("#images");
        let $numOfFiles = $("#num-of-files");

        function preview() {
            $imageContainer.html("");
            $numOfFiles.text(`${$fileInput[0].files.length} Files Selected`);

            $.each($fileInput[0].files, function (index, file) {
                let reader = new FileReader();
                let $figure = $("<figure>");
                let $figCap = $("<figcaption>").text(file.name);
                $figure.append($figCap);
                reader.onload = function () {
                    let $img = $("<img>").attr("src", reader.result);
                    $figure.prepend($img);
                }
                $imageContainer.append($figure);
                reader.readAsDataURL(file);
            });
        }
        $fileInput.change(preview);

        ClassicEditor.create(document.querySelector("#ckeditor-classic")).then(function (createdEditor) {
            editor = createdEditor;
            editor.ui.view.editable.element.style.height = "200px";
        }).catch(function (error) {
            console.error(error);
        }); 

        ClassicEditor.create(document.querySelector("#ckeditor-classic1")).then(function (createdEditor) {
            editor1 = createdEditor;
            editor1.ui.view.editable.element.style.height = "200px";
        }).catch(function (error) {
            console.error(error);
        });

        ClassicEditor.create(document.querySelector("#ckeditor-classic2")).then(function (createdEditor) {
            editor2 = createdEditor;
            editor2.ui.view.editable.element.style.height = "200px";
        }).catch(function (error) {
            console.error(error);
        });

        $('#about_update_btn').on('click', function () {
            var formData = new FormData();

            formData.append('companyName', $('#companyName').val());
            formData.append('address', $('#address').val());
            formData.append('bannerDescription', editor.getData());
            formData.append('phoneNo1', $('#phoneNo1').val());
            formData.append('phoneNo2', $('#phoneNo2').val());
            formData.append('map', $('#map').val());
            formData.append('email', $('#email').val());
            formData.append('mission', editor1.getData());
            formData.append('vision', editor2.getData());
            formData.append('about_id', about_id);
            formData.append('frontend-meta-description', $('#frontend-meta-description').val());
            formData.append('frontend-meta-author', $('#frontend-meta-author').val());
            formData.append('frontend-copyright', $('#frontend-copyright').val());
            formData.append('admin-meta-description', $('#admin-meta-description').val());
            formData.append('admin-meta-author', $('#admin-meta-author').val());
            formData.append('admin-copyright', $('#admin-copyright').val());
            

            $.each($('#file-input')[0].files, function (index, file) {
                formData.append('images[]', file);
            })
            // formData.forEach(function(value, key){
            //     console.log(key + ": " + value);
            // });
            $.ajax({
                url: "<?= base_url('/api/update/about') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#about_update_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#about_update_btn').attr('disabled', true)

                },
                success: function (resp) {
                    let html = ''

                    if (resp.status) {
                        html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                            // get_banner()
                    } else {
                        html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                    }


                    $('#alert').html(html)
                    console.log(resp)
                },
                error: function (err) {
                    console.log(err)
                },
                complete: function () {
                    $('#about_update_btn').html(`submit`)
                    $('#about_update_btn').attr('disabled', false)
                }
            })
        })

        
//differnt function
    $.ajax({
        url: "<?= base_url('/api/about') ?>",
        type: "GET",
        success: function (resp) {
            if (resp.status) {
            console.log('aboutdata',resp)
            about_id = resp.data.uid
            $('#companyName').val(resp.data.company_name)
            $('#address').val(resp.data.address)
            $('#phoneNo1').val(resp.data.phone1)
            $('#phoneNo2').val(resp.data.phone2)
            $('#map').val(resp.data.map)
            $('#email').val(resp.data.email)
            editor.setData(resp.data.about_description);
            editor1.setData(resp.data.mission);
            editor2.setData(resp.data.vision);
            $('#frontend-meta-description').val(resp.data.frontend_meta_description);
            $('#frontend-meta-author').val(resp.data.frontend_meta_author);
            $('#frontend-copyright').val(resp.data.frontend_copyright);
            $('#frontend-meta-description').val(resp.data.frontend_meta_description);
            $('#frontend-meta-author').val(resp.data.frontend_meta_author);
            $('#frontend-copyright').val(resp.data.frontend_copyright);
            // $('#admin-meta-description').val(resp.data.admin_meta_description);
            // $('#admin-meta-author').val(resp.data.admin_meta_author);
            // $('#admin-copyright').val(resp.data.admin_copyright);
            $('#images').html(`<img src="<?= base_url('public/uploads/logo/') ?>${resp.data.logo}" alt="" class="img_logo">`)
            
            }else{
                console.log(resp)
            }
        },
        error: function (err) {
            console.log(err)
        },
    })
    // let tagsArray = [];  // Array to hold the selected tags

// Function to add tag
        // $('#add-admin-tag').click(function () {
        //     let tagInput = $('#admin-tag-input').val().trim(); // Get input value
        //     if (tagInput !== "") {
        //         // Add tag to the array
        //         tagsArray.push(tagInput);
                
        //         // Append the tag to the display area
        //         $('#selected-admin-tags').append(`
        //             <span class="tag-item">
        //                 ${tagInput} 
        //                 <button type="button" class="remove-tag" data-tag="${tagInput}">x</button>
        //             </span>
        //         `);

        //         // Clear the input field
        //         $('#admin-tag-input').val('');
        //     } else {
        //         alert("Please enter a tag.");
        //     }
        // });

        // Function to remove a tag from the array
        // $('#selected-admin-tags').on('click', '.remove-tag', function () {
        //     let tag = $(this).data('tag');
        //     // Remove the tag from the array
        //     tagsArray = tagsArray.filter(item => item !== tag);

        //     // Remove the tag from the UI
        //     $(this).parent().remove();
        // });

        // Submit tags
        // $('#submit-admin-tags').click(function () {
        //     if (tagsArray.length > 0) {
        //         // Send the tags to the server (CI4)
        //         $.ajax({
        //             url: '<?= base_url("/tags/admin/save") ?>',  // CI4 function to save the tags
        //             type: 'POST',
        //             data: {
        //                 tags: tagsArray
        //             },
        //             success: function (response) {
        //                 alert("Tags saved successfully!");
        //             },
        //             error: function (err) {
        //                 console.error("Error saving tags:", err);
        //             }
        //         });
        //     } else {
        //         alert("Please add some tags before submitting.");
        //     }
        // });

    

    let ftagsArray = [];  // Array to hold the selected tags

    // Function to add tag
    $('#add-frontend-tag').click(function () {
        let tagInput = $('#frontend-tag-input').val().trim(); // Get input value
        if (tagInput !== "") {
            // Add tag to the array
            ftagsArray.push(tagInput);
            
            // Append the tag to the display area
            $('#selected-frontend-tags').append(`
                <span class="tag-item">
                    ${tagInput} 
                    <button type="button" class="remove-tag" data-tag="${tagInput}">x</button>
                </span>
            `);

            // Clear the input field
            $('#frontend-tag-input').val('');
        } else {
            alert("Please enter a tag.");
        }
    });

    // Function to remove a tag from the array
    $('#selected-frontend-tags').on('click', '.remove-tag', function () {
        let tag = $(this).data('tag');
        // Remove the tag from the array
        ftagsArray = ftagsArray.filter(item => item !== tag);

        // Remove the tag from the UI
        $(this).parent().remove();
    });

    // Submit tags
    $('#submit-frontend-tags').click(function () {
        if (ftagsArray.length > 0) {
            // Send the tags to the server (CI4)
            $.ajax({
                url: '<?= base_url("/tags/frontend/save") ?>',  // CI4 function to save the tags
                type: 'POST',
                data: {
                    tags: ftagsArray
                },
                success: function (response) {
                    alert("Tags saved successfully!");
                },
                error: function (err) {
                    console.error("Error saving tags:", err);
                }
            });
        } else {
            alert("Please add some tags before submitting.");
        }
    });
});
</script>