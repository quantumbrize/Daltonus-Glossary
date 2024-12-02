
<script>
    $(document).ready(function () {


        // Initialize the carousel with options
        // $('#myCarousel').carousel({
        //     interval: 500,
        //     touch: true
        // });
        load_banners()
        load_categories()
        load_product()
        // products('all')
        // get_promotion_card()
        // latest_arival()
        // load_category_men()

        $.ajax({
            url: "<?= base_url('/api/about') ?>",
            type: "GET",
            success: function (resp) {
                if (resp.status) {
                console.log('aboutdata',resp)
                about_id = resp.data.uid
                html1=`${resp.data.company_name}`;
                // $('#companyName').val(resp.data.company_name)
                // $('#address').val(resp.data.address)
                // $('#phoneNo1').val(resp.data.phone1)
                // $('#phoneNo2').val(resp.data.phone2)
                // $('#map').val(resp.data.map)
                // $('#email').val(resp.data.email)
                // editor.setData(resp.data.about_description);
                // editor1.setData(resp.data.mission);
                // editor2.setData(resp.data.vision);
                // $('#frontend-meta-description').val(resp.data.frontend_meta_description);
                // $('#frontend-meta-author').val(resp.data.frontend_meta_author);
                // $('#frontend-copyright').val(resp.data.frontend_copyright);
                // $('#frontend-meta-description').val(resp.data.frontend_meta_description);
                // $('#frontend-meta-author').val(resp.data.frontend_meta_author);
                // $('#frontend-copyright').val(resp.data.frontend_copyright);
                // $('#admin-meta-description').val(resp.data.admin_meta_description);
                // $('#admin-meta-author').val(resp.data.admin_meta_author);
                // $('#admin-copyright').val(resp.data.admin_copyright);
                // $('#images').html(`<img src="<?= base_url('public/uploads/logo/') ?>${resp.data.logo}" alt="" class="img_logo">`)
                $('#company_name').html(html1);
                $('#company_name1').html(html1);
                $('#company_name2').html(html1);
                $('#company_name3').html(html1);
                $('#company_name4').html(html1);
                }else{
                    console.log(resp)
                }
            },
            error: function (err) {
                console.log(err)
            },
        })
    })

    

    // Function to determine if the image is light or dark
    function isImageLight(imageUrl, threshold = 128) {
        return new Promise((resolve, reject) => {
            let img = new Image();
            img.crossOrigin = 'Anonymous';
            img.src = imageUrl;
            img.onload = function () {
                let canvas = document.createElement('canvas');
                let ctx = canvas.getContext('2d');
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);
                let imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                let brightnessSum = 0;
                for (let i = 0; i < imageData.data.length; i += 4) {
                    let r = imageData.data[i];
                    let g = imageData.data[i + 1];
                    let b = imageData.data[i + 2];
                    let brightness = (r + g + b) / 3;
                    brightnessSum += brightness;
                }
                let averageBrightness = brightnessSum / (imageData.data.length / 4);
                resolve(averageBrightness >= threshold);
            };
            img.onerror = function () {
                reject('Error loading image');
            };
        });
    }

    function load_banners() {
        $.ajax({
            url: "<?= base_url('/api/banners') ?>",
            type: "GET",
            beforeSend: function () {
            },
            success: function (resp) {
                if (resp.status) {
                    $.each(resp.data, function (index, banner) {
                        let fontColor = '';
                        isImageLight(`<?= base_url('public/uploads/banner_images/') ?>${banner.img}`)
                            .then(isLight => {
                                if (isLight) {
                                    // console.log('Image is light');
                                    fontColor = 'black';
                                } else {
                                    // console.log('Image is dark');
                                    fontColor = 'light';
                                }
                                console.log(fontColor);

                                isActive = index === 0 ? 'active' : ''
                                // console.log(isActive);
                                var shop_now = ``
                                if (banner.title != "") {
                                    shop_now = ` <a href="${banner.link}" class="btn btn-danger btn-hover"><i class="ph-shopping-cart align-middle me-1"></i> ShopNow</a>`
                                }
                                html = `<div class="carousel-item ${isActive}">
                                            <div class="carousel-caption">
                                            <img
                                                class="carousel-img d-block w-100"
                                                src="<?= base_url('public/uploads/banner_images/') ?>${banner.img}"
                                                alt=""
                                            />
                                            </div>
                                        </div>`

                                html2 = `<li
                                            data-target="#carouselExampleFade"
                                            data-slide-to="${index}"
                                            class="${isActive}">
                                        </li>`

                                $('#banner_img').append(html);
                                $('#banner_img_indicator').append(html2);
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    })
                } else {
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {

            }
        })
    }

    function load_categories() {
        $.ajax({
            url: "<?= base_url('/api/categories') ?>",
            type: "GET",
            beforeSend: function () { },
            success: function (resp) {
                if (resp.status) {
                    console.log(resp)
                    html1 = ``
                    html2 = ``
                    html3 = ``
                    html_desktop = ``
                    $.each(resp.data, function (index, item) {
                        html_desktop += `<div class="category-card large" onclick="window.location.href = '<?= base_url()?>product/list?c_id=${item.uid}'">
                                            <img
                                            class="large-category-img"
                                            src="<?= base_url('public/uploads/category_images/') ?>${item.img_path}"
                                            alt=""
                                            />
                                            <div class="overlay">${item.name}</div>
                                        </div>
                                        `
                        if(index <= 1){
                            html1 += `<div class="category-card large" onclick="window.location.href = '<?= base_url()?>product/list?c_id=${item.uid}'">
                                        <img
                                        class="large-category-img"
                                        src="<?= base_url('public/uploads/category_images/') ?>${item.img_path}"
                                        alt=""
                                        />
                                        <div class="overlay">${item.name}</div>
                                    </div>`
                        }
                        if(index > 1 && index <= 5){
                            html2 += `<div class="category-card medium" onclick="window.location.href = '<?= base_url()?>product/list?c_id=${item.uid}'">
                                            <img
                                            class="large-category-img"
                                            src="<?= base_url('public/uploads/category_images/') ?>${item.img_path}"
                                            alt=""
                                            />
                                            <div class="overlay">${item.name}</div>
                                        </div>`
                        }
                        if(index > 5 && index <= 10){
                            html3 += `<div class="small-category-card d-block d-md-none" onclick="window.location.href = '<?= base_url()?>product/list?c_id=${item.uid}'">
                                        <img
                                            class="small-category-img"
                                            src="<?= base_url('public/uploads/category_images/') ?>${item.img_path}"
                                            alt=""
                                        />
                                        <div class="overlay">${item.name}</div>
                                        </div>`
                        }
                    })
                    
                    $('#left_side_category').html(html1)
                    $('#right_side_category').html(html2)
                    $('#rest_category').html(html3)
                    $('#all_categoris_desktop').html(html_desktop)
                }
            },
            error: function (err) {
                console.error(err)
            }
        })


    }

    // function products(product_type) {
    //     $.ajax({
    //         url: "<?= base_url('/api/product') ?>",
    //         type: "GET",
    //         success: function (resp) {

    //             if (resp.status) {
    //                 $('#all_products').empty();
    //                 var margin_top_mobile = 0
    //                 var margin_top_tab = 0
    //                 $.each(resp.data, function (index, product) {


    //                     var view_more = `<a href="<?= base_url('product/list') ?>" class="btn btn-soft-primary btn-hover">View All Products<i class="mdi mdi-arrow-right align-middle ms-1"></i></a>`
    //                     if (index <= 8) {
    //                         var original_price = product.base_discount ? (product.base_price - (product.base_price * product.base_discount / 100)).toFixed(2) : product.base_price.toFixed(2);
    //                         var base_price = product.base_discount ? product.base_discount : "";
    //                         if (product_type == 'all') {
    //                             var element = document.getElementById("deal-banner");
    //                             // if (window.innerWidth > 1024) {
    //                             //     if (index <= 2) {
    //                             //         element.style.marginTop = "400px";
    //                             //     } else if (index <= 5) {
    //                             //         element.style.marginTop = "700px";
    //                             //     } else if (index <= 8) {
    //                             //         element.style.marginTop = "1100px";
    //                             //     }
    //                             // } else if (window.innerWidth <= 768) {
    //                             //     margin_top_mobile = margin_top_mobile + 350
    //                             //     element.style.marginTop = margin_top_mobile + "px";
    //                             // }else if(window.innerWidth <= 991.98){
    //                             //     margin_top_tab = margin_top_tab + 200
    //                             //     element.style.marginTop = margin_top_tab + "px";
    //                             // }
    //                             var add_to_cart_button = `<div class="product-btn px-3">
    //                                                         <a href="javascript:void(0);" onclick="add_to_cart('${product.product_id}')" class="btn btn-primary btn-sm w-75 add-btn"><i class="mdi mdi-cart me-1"></i> Add to cart</a>
    //                                                     </div>`
    //                             var message = ``
    //                             if (product.product_stock < 1) {
    //                                 add_to_cart_button = ``
    //                                 // message = `<span style="color:red;">Currently unavailable</span>`

    //                             }
    //                             html = `<div class="element-item col-xxl-3 col-xl-4 col-sm-6 seller hot arrival" data-category="hot arrival">
    //                                         <div class="card overflow-hidden">
    //                                             <a href="<?= base_url('product/details?id=') ?>${product.product_id}">
    //                                                 <div class="bg-warning-subtle rounded-top">
    //                                                     <div class="gallery-product">
    //                                                         <img src="<?= base_url() ?>public/uploads/product_images/${product.product_img.length > 0 ? product.product_img[0].src : ''}" alt="" style="max-height: 215px; max-width: 100%" class="mx-auto d-block" />
    //                                                     </div>
    //                                                     <p class="fs-11 fw-medium badge bg-primary py-2 px-3 product-lable mb-0"> Best Arrival </p>
    //                                                     <div class="gallery-product-actions">
                                                            
    //                                                     </div>
    //                                                     <div class="product-btn px-3">
    //                                                         <a href="<?= base_url('product/details?id=') ?>${product.product_id}" class="btn btn-primary btn-sm w-75 add-btn"><i class="mdi mdi-cart me-1"></i> View</a>
    //                                                     </div>
    //                                                 </div>
    //                                             </a>
    //                                             <div class="card-body">
    //                                                 <div>
    //                                                     <a href="<?= base_url('product/details?id=') ?>${product.product_id}">
    //                                                         <h6 class="fs-15 lh-base text-truncate mb-0">
    //                                                            ${product.name}
    //                                                         </h6>
    //                                                     </a>
    //                                                     <div class="mt-3">
    //                                                         <h5 class="mb-0">
    //                                                         ₹${original_price}
    //                                                             <span class="text-muted fs-12"><del>₹${product.base_price}</del></span>
    //                                                         </h5>
    //                                                     </div>
    //                                                     ${message}
    //                                                 </div>
    //                                             </div>
    //                                         </div>
    //                                     </div>`
    //                             $('#all_products').append(html);
    //                         } else if (product_type == 'new_arrival') {
    //                             var currentDate = new Date(); // Current date
    //                             var oneWeekAgo = new Date();
    //                             oneWeekAgo.setDate(oneWeekAgo.getDate() - 2);
    //                             if (new Date(product.created_at) > oneWeekAgo && new Date(product.created_at) <= currentDate) {
    //                                 var element = document.getElementById("deal-banner");
    //                                 if (window.innerWidth > 1024) {
    //                                     if (index <= 2) {
    //                                         element.style.marginTop = "400px";
    //                                     } else if (index <= 5) {
    //                                         element.style.marginTop = "700px";
    //                                     } else if (index <= 8) {
    //                                         element.style.marginTop = "1100px";
    //                                     }
    //                                 } else if (window.innerWidth <= 768) {
    //                                     margin_top_mobile = margin_top_mobile + 350
    //                                     element.style.marginTop = margin_top_mobile + "px";
    //                                 }else if(window.innerWidth <= 991.98){
    //                                     margin_top_tab = margin_top_tab + 200
    //                                     element.style.marginTop = margin_top_tab + "px";
    //                                 }
    //                                 var add_to_cart_button = `<div class="product-btn px-3">
    //                                                             <a href="javascript:void(0);" onclick="add_to_cart('${product.product_id}')" class="btn btn-primary btn-sm w-75 add-btn"><i class="mdi mdi-cart me-1"></i> Add to cart</a>
    //                                                         </div>`
    //                                 var message = ``
    //                                 if (product.product_stock < 1) {
    //                                     add_to_cart_button = ``
    //                                     // message = `<span style="color:red;">Currently unavailable</span>`

    //                                 }
    //                                 html = `<div class="element-item col-xxl-3 col-xl-4 col-sm-6 seller hot arrival" data-category="hot arrival">
    //                                             <div class="card overflow-hidden">
    //                                                 <a href="<?= base_url('product/details?id=') ?>${product.product_id}">
    //                                                     <div class="bg-warning-subtle rounded-top">
    //                                                         <div class="gallery-product">
    //                                                             <img src="<?= base_url() ?>public/uploads/product_images/${product.product_img.length > 0 ? product.product_img[0].src : ''}" alt="" style="max-height: 215px; max-width: 100%" class="mx-auto d-block" />
    //                                                         </div>
    //                                                         <p class="fs-11 fw-medium badge bg-primary py-2 px-3 product-lable mb-0"> Best Arrival </p>
    //                                                         <div class="gallery-product-actions">
                                                                
    //                                                         </div>
    //                                                         <div class="product-btn px-3">
    //                                                         <a href="<?= base_url('product/details?id=') ?>${product.product_id}" class="btn btn-primary btn-sm w-75 add-btn"><i class="mdi mdi-cart me-1"></i> View</a>
    //                                                     </div>
    //                                                     </div>
    //                                                 </a>
    //                                                 <div class="card-body">
    //                                                     <div>
    //                                                         <a href="<?= base_url('product/details?id=') ?>${product.product_id}">
    //                                                             <h6 class="fs-15 lh-base text-truncate mb-0">
    //                                                             ${product.name}
    //                                                             </h6>
    //                                                         </a>
    //                                                         <div class="mt-3">
    //                                                             <h5 class="mb-0">
    //                                                             ₹${original_price}
    //                                                                 <span class="text-muted fs-12"><del>₹${product.base_price}</del></span>
    //                                                             </h5>
    //                                                         </div>
    //                                                         ${message}
    //                                                     </div>
    //                                                 </div>
    //                                             </div>
    //                                         </div>`
    //                                 $('#all_products').append(html);
    //                             }
    //                         }


    //                     }
    //                     if (index > 8) {
    //                         $('#view_more_product').html(view_more);
    //                     }
    //                 })
    //             } else {
    //                 console.log(resp)
    //             }

    //         },
    //         error: function (err) {
    //             console.log(err)
    //         },
    //     })
    // }

    // function add_to_cart(p_id) {

    //     $.ajax({
    //         url: "<?= base_url('/api/user/id') ?>",
    //         type: "GET",
    //         success: function (resp) {

    //             if (resp.status) {
    //                 // console.log(resp.data)
    //                 $.ajax({
    //                     url: "<?= base_url('/api/user/cart/add') ?>",
    //                     type: "POST",
    //                     data: {
    //                         product_id: p_id,
    //                         user_id: resp.data,
    //                         variation_id: '',
    //                         qty: '1',
    //                     },
    //                     success: function (resp) {

    //                         if (resp.status) {
    //                             Toastify({
    //                                 text: resp.message.toUpperCase(),
    //                                 duration: 3000,
    //                                 position: "center",
    //                                 stopOnFocus: true,
    //                                 style: {
    //                                     background: resp.status ? 'darkgreen' : 'darkred',
    //                                 },

    //                             }).showToast();
    //                         } else {
    //                             console.log(resp)
    //                             Toastify({
    //                                 text: resp.message.toUpperCase(),
    //                                 duration: 3000,
    //                                 position: "center",
    //                                 stopOnFocus: true,
    //                                 style: {
    //                                     background: resp.status ? 'darkgreen' : 'darkred',
    //                                 },

    //                             }).showToast();
    //                         }

    //                     },
    //                     error: function (err) {
    //                         console.log(err)
    //                     },
    //                 })

    //             } else {
    //                 // console.log(resp)
    //                 Toastify({
    //                         text: 'Please login'.toUpperCase(),
    //                         duration: 3000,
    //                         position: "center",
    //                         stopOnFocus: true,
    //                         style: {
    //                             background: 'darkred',
    //                         },

    //                     }).showToast();

    //                 // var existingData = localStorage.getItem('cartData');
    //                 // var dataArray = existingData ? JSON.parse(existingData) : [];
    //                 // if (!Array.isArray(dataArray)) {
    //                 //     dataArray = []; // Initialize as empty array if not already an array
    //                 // }
    //                 // var data = {
    //                 //     product_id: p_id,
    //                 //     variation_id: 'VAR00001',
    //                 //     qty: '1'
    //                 // };
    //                 // dataArray.push(data);

    //                 // var jsonData = JSON.stringify(dataArray);
    //                 // localStorage.setItem('cartData', jsonData);


    //                 // // Retrieve data from local storage
    //                 // var storedData = localStorage.getItem('cartData');
    //                 // var retrievedData = JSON.parse(storedData);
    //                 // // console.log(retrievedData); // This will log 'value1'

    //                 // if (retrievedData != "") {
    //                 //     var message = 'Item added to cart'
    //                 //     Toastify({
    //                 //         text: message.toUpperCase(),
    //                 //         duration: 3000,
    //                 //         position: "center",
    //                 //         stopOnFocus: true,
    //                 //         style: {
    //                 //             background: 'darkgreen',
    //                 //         },

    //                 //     }).showToast();
    //                 // } else {
    //                 //     var message = 'Item added Faild!'
    //                 //     Toastify({
    //                 //         text: message.toUpperCase(),
    //                 //         duration: 3000,
    //                 //         position: "center",
    //                 //         stopOnFocus: true,
    //                 //         style: {
    //                 //             background: 'darkred',
    //                 //         },

    //                 //     }).showToast();
    //                 // }

    //             }


    //         },
    //         error: function (err) {
    //             console.log(err)
    //         },
    //     })

    // }

    // function latest_arival() {
    //     $.ajax({
    //         url: "<?= base_url('/api/letest-arrival/product') ?>",
    //         type: "GET",
    //         beforeSend: function () {
    //         },
    //         success: function (resp) {
    //             if (resp.status) {
    //                 // var currentDate = new Date(); // Current date
    //                 // var oneWeekAgo = new Date();
    //                 // oneWeekAgo.setDate(oneWeekAgo.getDate() - 7);
    //                 $.each(resp.data, function (index, product) {
    //                     var add_to_cart_button = ` <div class="mt-3">
    //                                                     <a  onclick="add_to_cart('${product.product_id}')" class="btn btn-primary btn-sm"><i
    //                                                             class="mdi mdi-cart me-1"></i> Add to cart</a>
    //                                                 </div>`
    //                     if (product.product_stock < 1) {
    //                         add_to_cart_button = `<span style="color:red;">Currently unavailable</span>`

    //                     }

    //                     // if (new Date(product.created_at) > oneWeekAgo && new Date(product.created_at) <= currentDate) {
    //                         var original_price = product.base_discount ? (product.base_price - (product.base_price * product.base_discount / 100)).toFixed(2) : product.base_price.toFixed(2);
    //                         var base_price = product.base_discount ? product.base_discount : "";
    //                         // console.log('resp=',new Date(product.created_at));
    //                         html = `<div class="swiper-slide">
    //                                     <div class="card overflow-hidden">
    //                                         <a href="<?= base_url('product/details?id=') ?>${product.product_id}">
    //                                             <div class="bg-dark-subtle rounded-top py-4">
    //                                                 <div class="gallery-product">
    //                                                     <img src="<?= base_url() ?>public/uploads/product_images/${product.product_img.length > 0 ? product.product_img[0].src : ''}" alt=""
    //                                                         style="max-height: 215px; max-width: 100%" class="mx-auto d-block" />
    //                                                 </div>
    //                                             </div>
    //                                         </a>
    //                                         <div class="card-body">
    //                                             <div>
    //                                                 <a href="<?= base_url('product/details?id=') ?>${product.product_id}">
    //                                                     <h6 class="fs-15 lh-base text-truncate mb-0">
    //                                                         ${product.name}
    //                                                     </h6>
    //                                                 </a>
    //                                                 <div class="mt-3">
                                                        
    //                                                     <h5 class="mb-0">
    //                                                         ₹${original_price}
    //                                                         <span class="text-muted fs-12"><del>₹${product.base_price}</del></span>
    //                                                     </h5>
    //                                                 </div>
    //                                                 <div class="mt-3">
    //                                                     <a  href="<?= base_url('product/details?id=') ?>${product.product_id}" class="btn btn-primary btn-sm"><i
    //                                                             class="mdi mdi-cart me-1"></i> View</a>
    //                                                 </div>
    //                                             </div>
    //                                         </div>
    //                                     </div>
    //                                 </div>`
    //                         $('#latest_arriva').append(html);
    //                     // }
    //                 })
    //             } else {
    //             }

    //         },
    //         error: function (err) {
    //             console.log(err)
    //         },
    //         complete: function () {

    //         }
    //     })
    // }

    // function out_of_stock() {
    //     Toastify({
    //         text: 'Currently this product is out of stock'.toUpperCase(),
    //         duration: 3000,
    //         position: "center",
    //         stopOnFocus: true,
    //         style: {
    //             background: 'gray',
    //         },

    //     }).showToast();
    // }

    // function get_promotion_card() {
    //     $.ajax({
    //         url: "<?= base_url('/api/promotion-card/update') ?>",
    //         type: "GET",
    //         success: function (resp) {
    //             if (resp.status) {
    //                 // console.log(resp)

    //                 // $('#images1').html(`<img src="<?= base_url('public/uploads/promotion_card_images/') ?>${resp.data.img1}" alt="">`)
    //                 // $('#imgLink1').val(resp.data.link1)
    //                 // $('#images2').html(`<img src="<?= base_url('public/uploads/promotion_card_images/') ?>${resp.data.img2}" alt="">`)
    //                 // $('#imgLink2').val(resp.data.link2)
    //                 // $('#card_id').val(resp.data.uid)

    //                 html = `<div class="col-12 col-md-6">
    //                         <a href="${resp.data.link1}" class="product-banner-1 mt-4 mt-lg-0 rounded overflow-hidden position-relative d-block">
    //                             <img src="<?= base_url('public/uploads/promotion_card_images/') ?>${resp.data.img1}" class="img-fluid rounded" style="width: 100%; height: 50%; object-fit: cover;  object-position: center;" alt="" />
    //                             <div class="bg-overlay blue"></div>
    //                             <div class="product-content p-4">
    //                             </div>
    //                         </a>
    //                     </div>
    //                     <div class="col-12 col-md-6">
    //                         <a href="${resp.data.link2}" class="product-banner-1 mt-4 mt-lg-0 rounded overflow-hidden position-relative d-block">
    //                             <img src="<?= base_url('public/uploads/promotion_card_images/') ?>${resp.data.img2}" class="img-fluid rounded" style="width: 100%; height: 50%; object-fit: cover;  object-position: center;" alt="" />
    //                             <div class="product-content p-4">
    //                             </div>
    //                         </a>
    //                     </div>`
    //                 $('#promotion_card').append(html);

    //             } else {
    //                 console.log(resp)
    //             }
    //         },
    //         error: function (err) {
    //             console.log(err)
    //         },
    //     })
    // }

    // function load_category_men() {
    //     var c_id= 'CATD515A6A020240323' 
    //     $.ajax({
    //         url: "<?= base_url('/api/category/product/list') ?>",
    //         type: "GET",
    //         data: {
    //             c_id: c_id
    //         },
    //         beforeSend: function () {
    //             $('#product-grid').html(`<div style="width: 100%;
    //                                                 display: flex;
    //                                                 align-items: center;
    //                                                 justify-content: center;
    //                                                 height: 200px;">
    //                                         <div style="height: 50px;
    //                                                     width: 50px;
    //                                                     font-size: 20px;
    //                                                     color: #004aad;" class="spinner-border" 
    //                                             role="status">
    //                                         </div>
    //                                     </div>`)
    //         },
    //         success: function (resp) {

    //             console.log(resp)
    //             if (resp.status == true) {
    //                 html = ''
    //                 if (resp.data.length > 0) {
    //                     $.each(resp.data, function (index, product) {
    //                         var add_to_cart_button = ` <div class="mt-3">
    //                                                     <a  onclick="add_to_cart('${product.product_id}')" class="btn btn-primary btn-sm"><i
    //                                                             class="mdi mdi-cart me-1"></i> Add to cart</a>
    //                                                 </div>`
    //                         if (product.product_stock < 1) {
    //                             add_to_cart_button = `<span style="color:red;">Currently unavailable</span>`

    //                         }
    //                         // console.log(product)
    //                             // if(index <= 8){
    //                                 var original_price = product.base_discount ? (product.base_price - (product.base_price * product.base_discount / 100)): product.base_price;
    //                                 var base_price = product.base_discount ? product.base_discount : "";
    //                                 html += `<div class="swiper-slide">
    //                                     <div class="card overflow-hidden">
    //                                         <a href="<?= base_url('product/details?id=') ?>${product.product_id}">
    //                                             <div class="bg-dark-subtle rounded-top py-4">
    //                                                 <div class="gallery-product">
    //                                                     <img src="<?= base_url() ?>public/uploads/product_images/${product.product_img.length > 0 ? product.product_img[0].src : ''}" alt=""
    //                                                         style="max-height: 215px; max-width: 100%" class="mx-auto d-block" />
    //                                                 </div>
    //                                             </div>
    //                                         </a>
    //                                         <div class="card-body">
    //                                             <div>
    //                                                 <a href="<?= base_url('product/details?id=') ?>${product.product_id}">
    //                                                     <h6 class="fs-15 lh-base text-truncate mb-0">
    //                                                         ${product.name}
    //                                                     </h6>
    //                                                 </a>
    //                                                 <div class="mt-3">
    //                                                     <span class="float-end">3.2
    //                                                         <i class="ri-star-half-fill text-warning align-bottom"></i></span>
    //                                                     <h5 class="mb-0">
    //                                                         ₹${original_price}
    //                                                         <span class="text-muted fs-12"><del>₹${product.base_price}</del></span>
    //                                                     </h5>
    //                                                 </div>
    //                                                 <div class="mt-3">
    //                                                     <a href="<?= base_url('product/details?id=') ?>${product.product_id}" class="btn btn-primary btn-sm"><i
    //                                                             class="mdi mdi-cart me-1"></i> View</a>
    //                                                 </div>
    //                                             </div>
    //                                         </div>
    //                                     </div>
    //                                 </div>`
    //                                 // $('#product-grid').append(html);
    //                             // }
    //                     })
    //                     $('#category_men').append(html);
    //                 } else {
    //                     $('#category_men').html(`<h3 class="text-danger">No Products Found</h3>`);
    //                 }
    //             } else {
    //                 $('#category_men').html(`<h3 class="text-danger">No Products Found</h3>`);
    //             }
    //         },
    //         error: function (err) {
    //             console.error(err)
    //         },
    //         complete: function () { }
    //     })

    // }




    function load_product(){
            $.ajax({
                url: "<?= base_url('/api/product') ?>",
                type: "GET",
                success: function (resp) {
                    
                    if (resp.status) {
                        console.log('details',resp)
                        // $('#user_address').empty();
                            var html =``  
                            $.each(resp.data, function(index, product) {
                                total_quantity = 0; // Reset total_quantity for each product
                        
                                    // Loop through each product size to calculate the total stock
                                for (let i = 0; i < product.product_sizes.length; i++) {
                                    total_quantity += parseInt(product.product_sizes[i].stocks, 10); // Add stocks to total_quantity
                                }
                                console.log('total_quantity',total_quantity);
                                let product_image = '<?=base_url()?>public/assets/ztImages/demo_img.jpg'
                                if(product.product_img != ""){
                                    product_image = `<?=base_url()?>public/uploads/product_images/${product.product_img[0].src}`
                                }
                                // console.log(product)
                                // if(index <= 8){
                                    // var add_to_cart_button = `<a href="javascript:void(0)" onclick="add_to_cart('${product.product_id}' , event)">
                                    //                             <img class="plus-sign" src="<?=base_url()?>public/assets/ztImages/plus-sign.png" alt="plus">
                                    //                         </a>`

                                    var add_to_cart_button = `<span class="style-available">In Stock</span>`
                                    // if(product.product_sizes.stocks < 1){
                                    //     add_to_cart_button = `<span class="style-unavailable">Currently unavailable</span>`
                                    // }
                                    if(total_quantity < 1){
                                        add_to_cart_button = `<span class="style-unavailable">Currently unavailable</span>`
                                    }
                                    var original_price = product.base_discount ? (product.base_price - (product.base_price * (product.base_discount / 100))).toFixed(2) : product.base_price;
                                    var base_price = product.base_discount ? product.base_discount : "";

                                    let rating = 0
                                    let total_rating = 0
                                    if(product.product_reviews != ""){
                                        total_rating = product.product_reviews.length
                                        $.each(product.product_reviews, function(index, review) {
                                            rating += parseInt(review.rateing, 10);
                                        })
                                    }
                                            html += `<div class="card" onclick="window.location.href = '<?= base_url()?>product/details?id=${product.product_id}'">
                                                        <div class="product-photo-wrapper">
                                                            <img class="product-photo" src="${product_image}" alt="Product Image">
                                                        </div>
                                                        <div class="details" id="product_details">
                                                            <p class="pd-name">${product.name}</p>
                                                            <div class="star">
                                                                <img src="<?=base_url()?>public/assets//ztImages/star.png" alt="star"> 
                                                                <span class="rating">
                                                                    ${total_rating != 0 ? (rating/total_rating).toFixed(1) : 0} 
                                                                    <span class="rating-count"> (${total_rating}+)</span> 
                                                                </span>
                                                            </div>
                                                            <p class="price">₹${original_price} <span class="discount">${parseFloat(product.base_discount).toFixed(2)}% off</span></p>
                                                            <div id='un'>${add_to_cart_button}</div>
                                                        </div>
                                                    </div>`
                                            $('#total_products').html(`<p class="text-muted flex-grow-1 mb-0">Showing ${index+1} results</p>`);
                                // }
                            })
                            $('#product-grid').html(html);
                    } else {
                        console.log("error")
                    }
                    
                },
                error: function (err) {
                    console.log(err)
                },
            }) 
    }

    function add_to_cart(p_id, event) {
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

    function search_product() {
        var alphabet = $('#inputproductname').val()
        // alert(alphabet)
        $.ajax({
            url: "<?= base_url('/api/search/product') ?>",
            type: "GET",
            data: {
                alph: alphabet
            },
            beforeSend: function () {
                $('#product-grid').html(`<div style="width: 100%;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    height: 200px;">
                                            <div style="height: 50px;
                                                        width: 50px;
                                                        font-size: 20px;
                                                        color: #004aad;" class="spinner-border" 
                                                role="status">
                                            </div>
                                        </div>`)
            },
            success: function (resp) {

                console.log(resp)
                if (resp.status == true) {
                    html = ''
                    if (resp.data.length > 0) {
                        $.each(resp.data, function (index, product) {
                            let product_image = '<?=base_url()?>public/assets/ztImages/demo_img.jpg'
                            if(product.product_img != ""){
                                product_image = `<?=base_url()?>public/uploads/product_images/${product.product_img[0].src}`
                            }
                            // console.log(product)
                                // if(index <= 8){
                                    // var add_to_cart_button = `<a href="javascript:void(0)" onclick="add_to_cart('${product.product_id}' , event)">
                                    //                             <img class="plus-sign" src="<?=base_url()?>public/assets/ztImages/plus-sign.png" alt="plus">
                                    //                         </a>`

                                    var add_to_cart_button = `<span class="style-available">In Stock</span>`
                                    if(product.product_sizes.stocks < 1){
                                        add_to_cart_button = `<span class="style-unavailable">Currently unavailable</span>`
                                    }
                                    var original_price = product.base_discount ? (product.base_price - (product.base_price * (product.base_discount / 100))).toFixed(2): product.base_price;
                                    var base_price = product.base_discount ? product.base_discount : "";
                                    let rating = 0
                                    let total_rating = 0
                                    if(product.product_reviews != ""){
                                        total_rating = product.product_reviews.length
                                        $.each(product.product_reviews, function(index, review) {
                                            rating += parseInt(review.rateing, 10);
                                        })
                                    }
                                    html += `<div class="card" onclick="window.location.href = '<?= base_url()?>product/details?id=${product.product_id}'">
                                                        <div class="product-photo-wrapper">
                                                            <img class="product-photo" src="${product_image}" alt="Product Image">
                                                        </div>
                                                        <div class="details" id="product_details">
                                                            <p class="pd-name">${product.name}</p>
                                                            <div class="star">
                                                                <img src="<?=base_url()?>public/assets//ztImages/star.png" alt="star"> 
                                                                <span class="rating">
                                                                    ${total_rating != 0 ? (rating/total_rating).toFixed(1) : 0} 
                                                                    <span class="rating-count"> (${total_rating}+)</span>  
                                                                </span>
                                                            </div>
                                                            <p class="price">₹${original_price} <span class="discount">${parseFloat(product.base_discount).toFixed(2)}% off</span></p>
                                                            
                                                        </div>
                                                    </div>`
                                    // $('#product-grid').append(html);
                                    $('#total_products').html(`<p class="text-muted flex-grow-1 mb-0">Showing ${index+1} results</p>`);
                                // }
                        })
                        $('#product-grid').html(html);
                    } else {
                        $('#product-grid').html(`<h3 class="text-danger">No Products Found</h3>`);
                    }
                } else {
                    $('#product-grid').html(`<h3 class="text-danger">No Products Found</h3>`);
                }
            },
            error: function (err) {
                console.error(err)
            },
            complete: function () { }
        })

    }
</script>