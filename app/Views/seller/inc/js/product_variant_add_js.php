<script>
    lode_variants();

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

    $('#variant_add_btn').on('click', function () {
        var formData = new FormData();
    })

    function lode_variants() {

        $.ajax({
            url: "<?= base_url('/api/product/variant/options') ?>",
            type: 'GET',
            beforeSend: function () { },
            success: function (resp) {
                console.log(resp.data)
                if (resp.status == true) {
                    $.each(resp.data, function (varIndex, varItem) {
                        if (varItem.name == 'size') {
                            // let sizeHtml = ''
                            // $.each(varItem.options, function (optIndex, optItem) {
                            //     sizeHtml += `<option value="${optItem.uid}">${optItem.value}</option>`
                            // })
                            $('#size_id').val(varItem.uid)
                        }else if(varItem.name == 'color'){
                            $('#color_id').val(varItem.uid)
                        }
                    })
                }
            },
            error: function (err) {
                console.log(err)
            }
        })

    }


    var quantitiy = 0;
    $('.quantity-right-plus').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        // If is not undefined
        $('#quantity').val(quantity + 1);
        // Increment
    });

    $('.quantity-left-minus').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        // If is not undefined
        // Increment
        if (quantity > 0) {
            $('#quantity').val(quantity - 1);
        }
    });


    $('#variant_add_btn').on('click', function () {
        var formData = new FormData();
        formData.append('sizeVal',   'L');
        formData.append('sizeId',    'VAR3467GHJ678YU');
        formData.append('colorVal',  '#364574');
        formData.append('colorId',   'VAR678TYU678TYU');
        formData.append('productId', '<?= $_GET['p_id'] ?>');
        formData.append('price',     $('#product-price-input').val())
        formData.append('discount',  $('#product-discount-input').val())
        formData.append('stock',     '1')

        $.each($('#file-input')[0].files, function (index, file) {
            formData.append('images[]', file);
        });

        // console.log($('#size_id').val())
        // console.log($('#size').val())
        // console.log($('#color_id').val())
        // console.log($('#colorPicker').val())


        $.ajax({
            url: "<?= base_url('/api/product/variant/add') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#variant_add_btn').html('<div class="spinner-border" role="status"></div>')
                $('#variant_add_btn').attr('disabled', true)
            },
            success: function (resp) {
                if(resp.status){
                    $('#variant_add_btn').html('Save')
                    $('#variant_add_btn').attr('disabled', false)
                    window.location.href = "<?= base_url('/seller/product?p_id='.$_GET['p_id']) ?>";
                }   
            },
            error: function (err) {
                console.log(err)
                $('#variant_add_btn').html('Save')
                $('#variant_add_btn').attr('disabled', false)
            }
        })

    })


</script>