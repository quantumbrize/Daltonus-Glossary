<!-- for product details carpousal -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


<script>
    user_id = '<?= isset($_COOKIE['USER_user_id']) ? $_COOKIE['USER_user_id'] : '' ?>'
    let product_id = "";
    let variation_id = "";
    let c_id = "";
    let u_id="";
    let product_price = 0;
    function setActive(element, stock) {
        if(parseInt(stock, 10) > 0){
            document.querySelectorAll('#product_size .size').forEach(function(size) {
                size.classList.remove('active');
            });
            
            element.classList.add('active');
        }
        
    }
    
    $(document).ready(function () {
        // Get the URL parameters
        
        $('#product_size').on('click', '.size', function (e) {
        e.preventDefault(); // Prevent the default anchor behavior
        
        // Remove 'active' class from all size links
        $('#product_size .size').removeClass('active');
        
        // Add 'active' class to the clicked size
        $(this).addClass('active');
        
        // Optionally, you can do something with the selected size, such as displaying it or updating other parts of the page.
        console.log('Selected Size:', $(this).text()); // Display selected size in the console
    });




        const id = "<?=$_GET['id']?>"
        // $(".owl-carousel").owlCarousel({
        //     items: 1,
        //     loop: true,
        //     margin: 10,
        //     nav: false,
        //     dots: false,
        //     autoplay: true,
        //     autoplayTimeout: 3000
        // });
        

        $.ajax({
            url: "<?= base_url('/api/product') ?>",
            type: "GET",
            data: { p_id: id },
            success: function (resp) {

                if (resp.status) {
                    console.log('check',resp);
                    product_id = resp.data.product_id;
                    u_id = resp.data.uid;

                    get_all_reviews(resp.data.product_id)
                    var var_id = ""
                    c_id = resp.data.category_id;
                    get_similar_product(resp.data.category_id, product_id, resp.data.vendor_id)
                    $('#product_name').text(resp.data.name)
                    $('#product_tag').text(resp.data.tags)
                    var truncatedDescription = truncateText(resp.data.description, 150);
                    $('#product_description').html(truncatedDescription)
                    // Store the full description in a data attribute for later use
                    $('#product_description').data('full-description', resp.data.description);
                    // $('#see_size_chart').html(`<li><span class="see_size_chart" onclick="openModal('<?= base_url() ?>public/uploads/product_size_chart/${resp.data.size_chart}')" >See size chart</span></li>`);
                    let allSizes = JSON.parse(resp.data.size_list);
                    let html_size = '';
                    let isavailable = false
                    $.each(resp.data.product_sizes, function (index, size) {
                        // console.log('size',size);
                        let checked_item = index === 0 ? 'checked=""' : '';
                        disabled_item = size.stocks === '0' ? 'disabled' : '';
                        if(parseInt(size.stocks, 10) > 0){
                            html_size += `<li> 
                                            <a href="javascript:void(0)"  class="size" data-size="${size.uid}" style="font-weight:bold;" onclick="setActive(this, '${size.stocks}')">${size.sizes}</a>
                                        </li> &nbsp;`;
                            isavailable = true
                        }else{
                            html_size += `<li> 
                                            <a href="javascript:void(0)" class="size disabled" data-size="${size.uid}" style="font-weight:bold;" onclick="setActive(this, '${size.stocks}')">${size.sizes}</a>
                                        </li> &nbsp;`;
                        }
                        disabled_color_item = size.stocks === '0' ? 'color:gray' : 'font-weight:bold';
                        
                    });
                    $('#product_size').html(html_size);
                    if (isavailable) {
                        $('#product_stock').append(`<li class=""><i class="bi bi-check2-circle me-2 align-middle text-success"></i>In stock</li>`);
                        // $('#product_add_to_cart_button').append(`<button type="button" onclick="add_to_cart()" class="btn btn-success btn-hover w-100"><i class="bi bi-basket2 me-2"></i> Add To Cart</button>`);
                        $('#product_add_to_cart_button').append(`<button class="add-to-cart-btn checkout-btn" onclick="add_to_cart('${resp.data.quantity}')">Add to Cart <i class="bi bi-basket2 me-2"></i></button>
                                                                <button class="add-to-cart-btn Buy-btn">Buy Now</button>`);
                        $('#add_to_catr_btn_mobile').append(`<button class="add-to-cart-btn" onclick="add_to_cart('${resp.data.quantity}')">Add to Cart <i class="bi bi-basket2 me-2"></i></button>`);


                    } else {
                        $('#product_stock').append(`<li class="out-of-stock"><i class="bi bi-x-circle me-2 align-middle text-danger"></i>Out of stock</li>`);
                        $('#stock_msg').append(`Currently Unavailable`);
                        // $('#product_add_to_cart_button').append(`<button type="button" class="btn w-100 out_of_stock"><i class="bi bi-basket2 me-2"></i> Add To Cart</button>`);
                        $('#product_add_to_cart_button').append(`<button class="add-to-cart-btn checkout-btn out_of_stock">Add to Cart <i class="bi bi-basket2 me-2"></i></button>
                                                                <button class="add-to-cart-btn Buy-btn out_of_stock">Buy Now</button>`);
                        $('#add_to_catr_btn_mobile').append(`<button class="add-to-cart-btn out_of_stock">Add to Cart <i class="bi bi-basket2 me-2"></i></button>`);

                    }

                    var original_price = resp.data.base_discount ? (resp.data.base_price - (resp.data.base_price * (resp.data.base_discount / 100))).toFixed(2) : parseInt(resp.data.base_price).toFixed(2);
                    var base_price = resp.data.base_discount ? resp.data.base_price : "";
                    var base_discount = resp.data.base_discount ? resp.data.base_discount : "";
                    $('#product_price').html('₹' + original_price);
                    $('#product_price_mobile').html('₹' + original_price);
                    product_price = original_price
                    let html1 = ``;
                    let html2 = ``;
                    if(resp.data.product_img != ""){
                        $.each(resp.data.product_img, function (index, p_img) {
                            var isActive = ''
                            if (index == 0) {
                                isActive = 'active'
                            }
                            html1 += `<li
                                        data-target="#carouselExampleFade"
                                        data-slide-to="${index}"
                                        class="${isActive}"
                                    ></li>`
                            html2 += `<div class="carousel-item ${isActive}">
                                        <div class="carousel-caption">
                                        <img
                                            class="carousel-img d-block w-100" style="object-fit : contain;"
                                            src="<?= base_url() ?>public/uploads/product_images/${p_img.src}"
                                            alt=""
                                        />
                                        </div>
                                    </div>`
                        })
                    } else {
                        html1 += `<li
                                    data-target="#carouselExampleFade"
                                    data-slide-to="1"
                                    class="active"
                                ></li>`
                        html2 += `<div class="carousel-item active">
                                    <div class="carousel-caption">
                                    <img
                                        class="carousel-img d-block w-100" style="object-fit : contain;"
                                        src="<?=base_url()?>public/assets/ztImages/demo_img.jpg"
                                        alt=""
                                    />
                                    </div>
                                </div>`
                    }
                    html3= `<h4 class="product-keyword" id="product_keyword"> <b>${resp.data.tags}</b></h4>`
                    html4=`<a href="javascript:void(0);" onclick="showSizeChart('${resp.data.uid}')">See Size Chart</a>`

                    
                        $('#product_img_indecator').html(html1);
                        $('#product_main_image').html(html2);
                        $('#size_chart_link').html(html4);
                        $('#keyword_div').html(html3);
                        // $('#product_img_share').attr('src', '<?= base_url() ?>public/uploads/product_images/'+resp.data.product_img[0].src);
                            // Reinitialize the carousel after loading new items
                                // $("#main_image").owlCarousel('destroy');
                                // $("#main_image").owlCarousel({
                                //     items: 1,
                                //     loop: true,
                                //     margin: 10,
                                //     nav: false,
                                //     dots: true,
                                //     autoplay: true,
                                //     autoplayTimeout: 3000
                                // });

                    
                    // if(isavailable){
                    //     $('#product_stock').append(`<li class=""><i class="bi bi-check2-circle me-2 align-middle text-success"></i>In stock</li>`);
                    //     $('#product_add_to_cart_button').append(`<button type="button" onclick="add_to_cart()" class="btn btn-success btn-hover w-100"><i class="bi bi-basket2 me-2"></i> Add To Cart</button>`);
                    // } else{
                    //     $('#product_stock').append(`<li class="out-of-stock"><i class="bi bi-x-circle me-2 align-middle text-danger"></i>Out of stock</li>`);
                    //     $('#product_add_to_cart_button').append(`<button type="button" class="btn w-100 out_of_stock"><i class="bi bi-basket2 me-2"></i> Add To Cart</button>`);
                    // }

                } else {
                    console.log(resp)

                }
                // console.log(resp)
            },
            error: function (err) {
                console.log(err)
            },
        })

        $.ajax({
            url: "<?= base_url('/api/exparts-review') ?>",
            type: "GET",
            data: { p_id: id },
            success: function (resp) {
                
                if (resp.status) {
                    // console.log(resp)
                    $('#expart_img').html(`<img alt="user" class="img-fluid product-img" src="<?= base_url()?>public/uploads/user_images/${resp.data.user_img}">`)
                    // $('#expart_review_date').text(formatDate(resp.data.created_at))
                    var html = ``
                    if(resp.data.rateing == '1'){
                        
                        html += `⭐`
                    } else if(resp.data.rateing == '2'){
                        
                        html += `⭐⭐`
                    } else if(resp.data.rateing == '3'){
                        
                        html += `⭐⭐⭐`
                    } else if(resp.data.rateing == '4'){
                        html += `⭐⭐⭐⭐`
                    } else if(resp.data.rateing == '5'){
                        html += `⭐⭐⭐⭐⭐`
                    } 
                    
                    $('#expart_rateing').html(html)
                    $('#expart_name').text(resp.data.user_name)

                    $('#expart_review').html(`${resp.data.review}`)
                    
                    
                } else {
                    $('#expart_review').html(`Not Found!`)
                    console.log(resp)
                    
                }
                // console.log(resp)
            },
            error: function (err) {
                console.log(err)
            },
        })

        get_varient(id)



        function truncateText(text, maxLength) {
            if (text.length > maxLength) {
                return text.substring(0, maxLength) + '... <a href="javascript:void(0);" class="link-info" id="read_more_link">Read More</a>';
            } else {
                return text;
            }
        }
        $('#product_description').on('click', '#read_more_link', function (e) {
            e.preventDefault();
            var $description = $('#product_description');
            var fullDescription = $description.data('full-description');
            
            const elements = document.querySelectorAll('.product-description');
            elements.forEach(element => {
            element.style.height = '130px';
            element.style.transition = 'all 0.3s ease';
            });

            if ($(this).text() === 'Read More') {
                $description.html(fullDescription + ' <a href="javascript:void(0);" id="show_less_link">Show Less</a>');
            } else {
                $description.html(truncatedDescription + ' <a href="javascript:void(0);" id="read_more_link">Read More</a>');
            }
        });
        $('#product_description').on('click', '#show_less_link', function (e) {
            e.preventDefault();
            var $description = $('#product_description');
            var truncatedDescription = truncateText($description.data('full-description'), 150); // Adjust the character count as needed

            $description.html(truncatedDescription);

            const elements = document.querySelectorAll('.product-description');
            elements.forEach(element => {
            element.style.height = '60px';
            });
            
        });

       

    })
    function submit_review() {
        var formData = new FormData();

        const radios = document.getElementsByName('rating');
        let checkedValue = '';
        for (const radio of radios) {
            if (radio.checked) {
                checkedValue = radio.value;
                break;
            }
        }

        formData.append('rateing', checkedValue);
        formData.append('review', $('#reviewContent').val());
        formData.append('productId', product_id);
        formData.append('userId', user_id);

        $.ajax({
            url: "<?= base_url('/api/add/review') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#review_add_btn').html(`<div class="spinner-border" role="status"></div>`)
                $('#review_add_btn').attr('disabled', true)

            },
            success: function (resp) {
                let html = ''

                if (resp.status) {
                    Toastify({
                            text: resp.message.toUpperCase(),
                            duration: 3000,
                            position: "center",
                            stopOnFocus: true,
                            style: {
                                background: resp.status ? 'darkgreen' : 'darkred',
                            },

                        }).showToast();
                        clearReviewForm()
                        get_all_reviews(product_id)
                } else {
                    Toastify({
                            text: resp.message.toUpperCase(),
                            duration: 3000,
                            position: "center",
                            stopOnFocus: true,
                            style: {
                                background: resp.status ? 'darkgreen' : 'darkred',
                            },

                        }).showToast();
                }
                console.log(resp)
            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                $('#review_add_btn').html(`submit`)
                $('#review_add_btn').attr('disabled', false)
            }
        })
    }
    function openModal(path) {
        $('#exampleModalLong').modal('show');
        var img = document.getElementById('size_chart_img');
        img.src = path;
    }
    function closeModal() {
        $('#exampleModalLong').modal('hide');
    }
    function add_to_cart(quantity) {
        // var product_quantity = $('#product_quantity').val()
        const activeSize = document.querySelector('.size.active');
        let product_quantity = parseInt($('#quantity').text(), 10);
        const sizeValue = activeSize.getAttribute('data-size');
        // alert(product_quantity)
        // alert(sizeValue);
        if(product_quantity <= quantity){
            $.ajax({
                url: "<?= base_url('/api/user/id') ?>",
                type: "GET",
                success: function (resp) {
                    if (resp.status) {
                        // console.log(resp.data)
                        $.ajax({
                            url: "<?= base_url('/api/user/cart/add') ?>",
                            type: "POST",
                            data: {
                                product_id: product_id,
                                user_id: resp.data,
                                variation_id: variation_id,
                                qty: product_quantity,
                                size: sizeValue
                            },  
                            success: function (resp) {
                                if (resp.status) {
                                    Toastify({
                                        text: resp.message.toUpperCase(),
                                        duration: 3000,
                                        position: "center",
                                        stopOnFocus: true,
                                        style: {
                                            background: resp.status ? 'darkgreen' : 'darkred',
                                        },
                                    }).showToast();
                                    get_cart_header()
                                } else {
                                    console.log(resp)
                                    Toastify({
                                        text: resp.message.toUpperCase(),
                                        duration: 3000,
                                        position: "center",
                                        stopOnFocus: true,
                                        style: {
                                            background: resp.status ? 'darkgreen' : 'darkred',
                                        },
                                    }).showToast();
                                }
                            },
                            error: function (err) {
                                console.log(err)
                            },
                        })
                    } else {
                        // Toastify({
                        //     text: 'Please login'.toUpperCase(),
                        //     duration: 3000,
                        //     position: "center",
                        //     stopOnFocus: true,
                        //     style: {
                        //         background: 'darkred',
                        //     },
                        // }).showToast();
                        // window.location.href = `<?= base_url() ?>sign-up`;

                        Toastify({
                            node: (() => {
                                const container = document.createElement("div");
                                container.style.display = "flex";
                                container.style.alignItems = "center";
                                container.style.justifyContent = "space-between";
                                container.style.color = "white";
                                container.innerHTML = `
                                    <span>${'Please login'.toUpperCase()}</span>
                                    <a style="
                                        margin-left: 10px; 
                                        background: white; 
                                        color: darkred; 
                                        border: none; 
                                        padding: 5px 10px; 
                                        cursor: pointer; 
                                        border-radius: 5px;
                                    " onclick="window.location.href='<?= base_url('login')?>'">Login</a>
                                `;
                                return container;
                            })(),
                            duration: 3000, // Optional: Extend the duration for interaction
                            position: "center",
                            stopOnFocus: true,
                            style: {
                                background: 'darkred',
                            },
                        }).showToast();
                        window.location.href = `<?= base_url() ?>login`;
                    }
                },
                error: function (err) {
                    console.log(err)
                },
            })
        } else{
            Toastify({
                text: 'Stock not available Please decrease Quantity'.toUpperCase(),
                duration: 3000,
                position: "center",
                stopOnFocus: true,
                style: {
                    background:'darkred',
                },
            }).showToast();
        }

    }

    function quantity_increase() {
        let product_quantity = parseInt($('#product_quantity').val())

        // console.log(typeof(product_quantity))
        if (product_quantity < 100) {
           
            $('#product_quantity').val( product_quantity + 1)
        }
    }

    function quantity_decrease() {
        let product_quantity = parseInt($('#product_quantity').val())
        if (product_quantity > 1) {
            $('#product_quantity').val(product_quantity -1)
        }
    }

    function get_similar_product(c_id, product_id, vendor_id) {
        // alert(vendor_id)
        $.ajax({
            url: "<?= base_url('/api/product?c_id=') ?>" + c_id + "&vendor_id=" + vendor_id,
            type: "GET",
            success: function (resp) {

                if (resp.status) {
                    console.log('similar',resp)
                    $.each(resp.data, function (index, products) {
                        // console.log('loop',products);
                        if (products.product_id != product_id) {
                            console.log('loop',products);
                            var original_price = products.base_discount ? (products.base_price - (products.base_price * (products.base_discount / 100))).toFixed(2) : parseInt(products.base_price).toFixed(2);
                            var base_price = products.base_discount ? products.base_price : "";
                            var base_discount = products.base_discount ? products.base_discount : "";
                            var add_to_cart_button = `<a href="javascript:void(0)" onclick="similar_add_to_cart('${products.product_id}' , event)">
                                                            <img class="plus-sign" src="<?=base_url()?>public/assets/ztImages/plus-sign.png" alt="plus">
                                                        </a>`
                            if (products.quantity < 1) {
                                add_to_cart_button = `<span class="style-unavailable">Currently unavailable</span>`

                            }
                            // var html = `<div class="col-xxl-3 col-lg-4 col-sm-6">
                            //             <div class="card ecommerce-product-widgets border-0 rounded-0 shadow-none overflow-hidden card-animate">
                            //                 <a href="<?= base_url('product/details?id=') ?>${products.product_id}">
                            //                     <div class="bg-light bg-opacity-50 rounded py-4 position-relative">
                            //                         <img src="<?= base_url() ?>public/uploads/product_images/${products.product_img[0].src}" alt="" style="max-height: 200px;max-width: 100%;" class="mx-auto d-block rounded-2">
                            //                     </div>
                            //                 </a>
                            //                 <div class="pt-4">
                            //                     <a href="<?= base_url('product/details?id=') ?>${products.product_id}">
                            //                         <h6 class="text-capitalize fs-15 lh-base text-truncate mb-0">${products.name}</h6>
                            //                     </a>
                            //                     <div class="mt-2">
                            //                         <h5 class="mb-0">₹${original_price}</h5>
                            //                     </div>
                            //                     <div class="mt-3">
                            //                         <a href="<?= base_url('product/details?id=') ?>${products.product_id}" class="btn btn-primary w-100 add-btn"><i class="mdi mdi-cart me-1"></i> View</a>
                            //                     </div>
                            //                 </div>
                            //             </div>
                            //         </div>`

                                    let product_img = products.product_img.length > 0 ? '<?= base_url('public/uploads/product_images/') ?>'+products.product_img[0]['src'] : '<?= base_url('public/assets/ztImages/demo_img.jpg') ?>'

                                    var html = `<div class="addon-option" onclick="window.location.href = '<?= base_url()?>product/details?id=${products.product_id}'">
                                                    <div class="inner-divider">
                                                        <img src="${product_img}" alt="product-img">
                                                        <label for="pepper">${products.name}</label>    
                                                    </div>
                                                    <div class="inner-divider">
                                                        <span class="addon-price">₹${original_price}</span></br>
                                                        ${add_to_cart_button}
                                                    </div>
                                                </div>`
                                    var html2 = `<div class="addon-option" onclick="window.location.href = '<?= base_url()?>product/details?id=${products.product_id}'">
                                                    <div class="inner-divider">
                                                        <img src="${product_img}" alt="product-img">
                                                        <label for="pepper">${products.name}</label>
                                                    </div>
                                                    <div class="inner-divider">
                                                        <span class="addon-price">₹${original_price}</span></br>
                                                        ${add_to_cart_button}
                                                    </div>
                                                </div>`
                            // alert(html);
                            $('#similar_product').append(html)
                            $('#similar_product_mobile').append(html2)
                        }

                    })

                } else {
                    console.log('error',resp)

                }
                // console.log(resp)
            },
            error: function (err) {
                console.log(err)
            },
        })
    }

    function similar_add_to_cart(p_id, event) {
        event.stopPropagation();
        $.ajax({
            url: "<?= base_url('/api/user/id') ?>",
            type: "GET",
            success: function (resp) {
                
                if (resp.status) {
                    // console.log(resp.data) 
                    $.ajax({
                        url: "<?= base_url('/api/user/cart/add') ?>",
                        type: "POST",
                        data:{product_id:p_id, 
                            user_id:resp.data,
                            variation_id:'',
                            qty:'1',
                            },
                        success: function (resp) {
                            
                            if (resp.status) {
                                Toastify({
                                text: resp.message.toUpperCase(),
                                duration: 3000,
                                position: "center",
                                stopOnFocus: true,
                                style: {
                                    background: resp.status ? 'darkgreen' : 'darkred',
                                },

                            }).showToast();
                            get_cart_header()
                            } else {
                                console.log(resp)
                                Toastify({
                                    text: resp.message.toUpperCase(),
                                    duration: 3000,
                                    position: "center",
                                    stopOnFocus: true,
                                    style: {
                                        background: resp.status ? 'darkgreen' : 'darkred',
                                    },

                                }).showToast();
                            }
                            
                        },
                        error: function (err) {
                            console.log(err)
                        },
                    })
                       
                } else {
                    Toastify({
                            text: 'Please login'.toUpperCase(),
                            duration: 3000,
                            position: "center",
                            stopOnFocus: true,
                            style: {
                                background: 'darkred',
                            },

                        }).showToast();
                }

                
            },
            error: function (err) {
                console.log(err)
            },
        })

    }

    function get_varient(id) {
        $.ajax({
            url: "<?= base_url('/api/product/variant?p_id=') ?>" + id,
            type: "GET",
            success: function (resp) {
                // console.log(resp)
                if (resp.status) {

                    // var html_size = ``
                    var html_color = ``
                    var html_img = ``
                    $.each(resp.data, function (index, variation) {
                        var checked_item = ''
                        if (index == 0) {
                            checked_item = 'checked=""'
                        }
                        // console.log(variation)
                        // html_size += `<li> 
                        //                     <input type="radio" ${checked_item} name="sizes7" id="product-color-${72 + index}" value=" ${variation.size}"> 
                        //                     <label 
                        //                         class="avatar-xs btn btn-soft-primary text-uppercase p-0 fs-12 d-flex align-items-center justify-content-center rounded-circle" 
                        //                         for="product-color-${72 + index}">
                        //                         ${variation.size}
                        //                     </label> 
                        //                 </li>`
                        html_color += `<li>
                                        <input type="radio" ${checked_item} name="sizes" id="product-color-2" value="${variation.color}">
                                        <label class="avatar-xs btn p-0 d-flex align-items-center justify-content-center rounded-circle" style="background-color:${variation.color}" for="product-color-2"></label>
                                    </li>`
                        html_img += `<img 
                                        src="<?= base_url() ?>/public/uploads/variant_images/${variation.product_img[0].src}"
                                        onclick="view_image('/public/uploads/variant_images/${variation.product_img[0].src}', '${variation.price}', '${variation.discount}', '${variation.uid}', '${variation.stock}','${encodeURIComponent(JSON.stringify(variation.product_sizes))}', 'varient')" alt="Image 1"> `
                    })
                    // $('#product_size').html(html_size)
                    // $('#product_color').html(html_color)
                    $('#all_varient_img').append(html_img)

                } else {
                    console.log(resp)

                }

            },
            error: function (err) {
                console.log(err)
            },
        })
    }

    function view_image(product_img, base_price, base_discount, var_id, stock, sizes, type) {
        var html = ``;
        variation_id = var_id;
        var original_price = base_discount ? (base_price - (base_price * (base_discount / 100))).toFixed(2) : base_price.toFixed(2);
        var base_price = base_discount ? base_price : "";
        var base_discount = base_discount ? base_discount : "";
        $('#product_price').html('₹' + original_price + `<span class="text-muted fs-14" id="base_price">&nbsp;MRP:<del>₹${base_price}</del></span> <span class="fs-14 ms-2 text-danger">${base_discount}% off</span>`)
        if (stock >= 1) {
            $('#product_stock').html(`<li class=""><i class="bi bi-check2-circle me-2 align-middle text-success"></i>In stock</li>`);
            $('#product_add_to_cart_button').html(`<button type="button" onclick="add_to_cart()" class="btn btn-success btn-hover w-100"><i class="bi bi-basket2 me-2"></i> Add To Cart</button>`);

        } else {
            $('#product_stock').html(`<li class="out-of-stock"><i class="bi bi-x-circle me-2 align-middle text-danger"></i>Out of stock</li>`);
            $('#product_add_to_cart_button').html(`<button type="button" class="btn w-100 out_of_stock"><i class="bi bi-basket2 me-2"></i> Add To Cart</button>`);

        }
        // console.log(sizes)
        sizes = JSON.parse(decodeURIComponent(sizes));
        let html_size = '';
        let isavailable = false
        $.each(sizes, function (index, size) {
            let checked_item = index === 0 ? 'checked=""' : '';
            disabled_item = size.stocks === '0' ? 'disabled' : '';
            disabled_color_item = size.stocks === '0' ? 'color:gray' : 'font-weight:bold';
            if(size.stocks !== '0'){
                isavailable = true
            }
            html_size += `<li> 
                            <a href="javascript:void(0)" class="size" data-size="${size.uid}" style="font-weight:bold;" onclick="setActive(this, '${size.stocks}')">${size.sizes}</a>
                        </li> &nbsp;`;
        });
        $('#product_size').html(html_size);
        if(isavailable){
            $('#product_stock').html(`<li class=""><i class="bi bi-check2-circle me-2 align-middle text-success"></i>In stock</li>`);
            $('#product_add_to_cart_button').html(`<button type="button" onclick="add_to_cart()" class="btn btn-success btn-hover w-100"><i class="bi bi-basket2 me-2"></i> Add To Cart</button>`);
        } else{
            $('#product_stock').html(`<li class="out-of-stock"><i class="bi bi-x-circle me-2 align-middle text-danger"></i>Out of stock</li>`);
            $('#product_add_to_cart_button').html(`<button type="button" class="btn w-100 out_of_stock"><i class="bi bi-basket2 me-2"></i> Add To Cart</button>`);
        }






        if (type === 'varient') {
            // html = `<div class="carousel-item active">
            //             <img class="d-block w-100 fixed-size-image" src="<?= base_url() ?>${product_img}" alt="" style="width: 300px;">
            //         </div>`;
            html = `<div class="item active">
                        <img class="" src="<?= base_url() ?>${product_img}" alt="">
                    </div>`

        } else if (type === 'main') {
            // Decode the JSON string and parse it
            product_img = JSON.parse(decodeURIComponent(product_img));
            $.each(product_img, function (index, p_img) {
                // console.log(p_img);
                var isActive = '';
                if (index === 0) {
                    isActive = 'active';
                }
                // html += `<div class="carousel-item ${isActive}">
                //             <img class="d-block w-100 fixed-size-image" src="<?= base_url() ?>public/uploads/product_images/${p_img.src}" alt="" style="width: 300px;">
                //         </div>`;
                // html += `<div class="item ${isActive}">
                //         <img class="fixed-size-image" src="<?= base_url() ?>public/uploads/product_images/${p_img.src}" alt="">
                //     </div>`
                html += `<div class="item">
                                    <img class="fixed-size-image" src="<?= base_url() ?>public/uploads/product_images/${p_img.src}" alt="Image ${index+1}" style="width:100%;">
                                </div>`
            });
        }

        $('#main_image').html(html);
        // Reinitialize the carousel after loading new items
        $("#main_image").owlCarousel('destroy'); // Destroy the previous instance
        $("#main_image").owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000
        });
    }

    function review_modal_open(){
        $('#exampleModal').modal('show')
    }

    function clearReviewForm() {
        // Clear the product image (if applicable)
        document.getElementById('product_modal_img').innerHTML = ''; 

        // Clear the product name
        document.getElementById('product_modal_name').textContent = '';

        // Clear the product price
        document.getElementById('product_modal_price').textContent = '';

        // Clear the rating (uncheck all radio buttons)
        const ratingInputs = document.querySelectorAll('input[name="rating"]');
        ratingInputs.forEach(input => input.checked = false);

        // Clear the review content
        document.getElementById('reviewContent').value = '';
    }

    function get_all_reviews(p_id){
        $.ajax({
            url: "<?= base_url('/api/users/review') ?>",
            type: "GET",
            data: { p_id: p_id },
            success: function (resp) {
                // console.log(resp)
                if (resp.status) {
                   
                    let html1 = `<h2>Customer Reviews</h2>`
                    let total_review = resp.data.length
                    let total_rateing = 0
                    let total_1star = 0
                    let total_2star = 0
                    let total_3star = 0
                    let total_4star = 0
                    let total_5star = 0
                    $.each(resp.data, function(index, review) {
                        total_rateing += parseInt(review.rateing, 10)
                        var html = ``
                        if(review.rateing == '1'){
                            total_1star += 1
                            html += `<div class="rating">⭐</div>`
                        } else if(review.rateing == '2'){
                            total_2star += 1
                            html += `<div class="rating">⭐⭐</div>`
                        } else if(review.rateing == '3'){
                            total_3star += 1
                            html += `<div class="rating">⭐⭐⭐</div>`
                        } else if(review.rateing == '4'){
                            total_4star += 1
                            html += `<div class="rating">⭐⭐⭐⭐</div>`
                        } else if(review.rateing == '5'){
                            total_5star += 1
                            html += `<div class="rating">⭐⭐⭐⭐⭐</div>`
                        } 
                        html1 += `<div class="review">
                                        ${html}
                                    <div class="user">${review.user_name}</div>
                                    <div class="comment">${review.review}</div>
                                </div>`
                    })
                    $('#list_of_reviews').html(html1)
                    $('#overall_rateing').text(total_rateing/total_review.toFixed(1))
                    $('#total_rateing').html(`(${total_review}+)`)
                    
                } else {
                    console.log(resp)
                    
                }
                // console.log(resp)
            },
            error: function (err) {
                console.log(err)
            },
        })
    }

    function increase_qty(){
        let calculated_price = 0
        let product_quantity = parseInt($('#quantity').text(), 10) +1;
        // let product_price = parseInt($('#product_price').text().replace(/[₹,]/g, ''), 10);
        // alert(product_price)
        // alert(product_quantity)
        calculated_price = product_price * product_quantity.toFixed(2)
        $('#quantity').text(product_quantity)
        $('#product_price_mobile').html('₹' + parseFloat(calculated_price.toFixed(2)))
    }

    function decrease_qty(){
        let calculated_price = 0
        let product_quantity = parseInt($('#quantity').text(), 10) - 1;
        if(product_quantity > 0){
            calculated_price = product_price * product_quantity
            $('#quantity').text(product_quantity)
            $('#product_price_mobile').html('₹' + parseFloat(calculated_price.toFixed(2)))
        }
        
    }

    function showSizeChart(uid) {
        // Send the UID to the controller via AJAX
        console.log('UID:', uid); // Check if UID is printed in the console

        $.ajax({
            url: "<?= base_url('/product/get_size_chart') ?>", // CI4 route to fetch the image name
            method: 'POST',
            data: { uid: uid },
            success: function(response) {
                console.log('sizechart', response); // Check what the response is
                if (response.status === true && response.image_name) {
                    // If image is found, set the src for the image tag in the popup
                    $('#sizeChartImage').attr('src', "<?=base_url()?>"+'public/uploads/size_charts/' + response.image_name); // Assuming images are stored in 'uploads/size_charts'
                    $('#sizeChartModal').show(); // Show the popup modal
                } else {
                    alert('Size chart not found!');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Capture any errors and log them
                console.log('AJAX Error:', textStatus, errorThrown);
                alert('Error fetching size chart!');
            }
        });
    }


    // Function to close the popup
    function closePopup() {
        $('#sizeChartModal').hide();
    }




</script>