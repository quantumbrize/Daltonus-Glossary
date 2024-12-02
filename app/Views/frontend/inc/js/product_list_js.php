<script>
     $(document).ready(function () {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const c_id = urlParams.get('c_id');
        load_product(c_id)
        load_categories(c_id)
        
        
    })

    function truncateName(name) {
        const words = name.split(" ");
        if (words.length > 4) {
            return words.slice(0, 4).join(" ") + " ...";
        }
        return name;
    }

    function load_product(c_id){
        let total_quantity= 0
        if(c_id != null){
            
            load_products(c_id)
            // $.ajax({
            //     url: "<?= base_url('/api/category/product/list') ?>",
            //     type: "GET",
            //     data: {
            //         c_id: c_id
            //     },
            //     success: function (resp) {
            //         console.log(resp)
            //         if (resp.status) {
                        
            //             var html =``
            //                 $.each(resp.data, function(index, product) {
            //                     // if(index <= 8){
            //                         var original_price = product.base_discount ? (product.base_price - (product.base_price * product.base_discount / 100)).toFixed(2) : product.base_price.toFixed(2);
            //                         var base_price = product.base_discount ? product.base_discount : "";
            //                         html += `<div class="card">
            //                                     <img class="product-photo" src="<?=base_url()?>public/uploads/product_images/${product.product_img[0].src}">
            //                                     <div class="details">
            //                                         <p class="pd-name">${product.name}</p>
            //                                         <div class="star">
            //                                         <img src="<?=base_url()?>public/assets//ztImages/star.png" alt="star"> 
            //                                         <span class="rating">
            //                                             4.5 
            //                                             <span class="rating-count"> (30+)</span> 
            //                                         </span>
            //                                         </div>
            //                                         <p class="price">₹${original_price} <span class="discount">${product.base_discount}% off</span></p>
            //                                         <a href="Cart.html">
            //                                         <img class="plus-sign" src="<?=base_url()?>public/assets/ztImages/plus-sign.png" alt="plus">
            //                                         </a>
            //                                     </div>
            //                                 </div>`
            //                             $('#total_products').html(`<p class="text-muted flex-grow-1 mb-0">Showing ${index+1} results</p>`);
            //                     // }
            //                 })
            //                 $('#product-grid').html(html);
            //         } else {
            //             console.log("error")
            //         }
                    
            //     },
            //     error: function (err) {
            //         console.log(err)
            //     },
            // })  
        }else{
            $.ajax({
                url: "<?= base_url('/api/product') ?>",
                type: "GET",
                success: function (resp) {
                    
                    if (resp.status) {
                        console.log('details',resp)
                        // $('#user_address').empty();
                            var html =``  
                            
                            $.each(resp.data, function(index, product) {
                                // console.log(product)
                                // if(index <= 8){
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
                                
                                    // var add_to_cart_button = `<a href="javascript:void(0)" onclick="add_to_cart('${product.product_id}' , event)">
                                    //                             <img class="plus-sign" src="<?=base_url()?>public/assets/ztImages/plus-sign.png" alt="plus">
                                    //                         </a>`
                                    var add_to_cart_button = `<span class="style-available">In Stock</span>`
                                    // if(product.quantity < 1){
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
                                                            <p class="pd-name">${truncateName(product.name)}</p>
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
                        duration: 5000, // Optional: Extend the duration for interaction
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

    }

    function out_of_stock(){
        Toastify({
            text: 'Currently this product is out of stock'.toUpperCase(),
            duration: 3000,
            position: "center",
            stopOnFocus: true,
            style: {
                background: 'gray',
            },

        }).showToast();
    }

    function load_categories(c_id) {
        if(c_id != null){
            $.ajax({
                url: "<?= base_url('/api/categories') ?>",
                type: "GET",
                data:{parent_id:c_id},
                beforeSend: function () { },
                success: function (resp) {
                    if (resp.status) {
                        console.log(resp)
                        html = `<div class="sub-cat" onclick="load_product(${c_id = null})">
                                    <img src="<?= base_url('public/assets/ztImages/all_category.png') ?>" alt="sub-cat-img">
                                    <span>All</span>
                                </div>`
                        $.each(resp.data, function (index, item) {
                            html += `<a href="javascript:void(0)" onClick="load_products('${item.uid}')">
                                        <div class="sub-cat">
                                        <div class="sub-cat-wrapper">
                                            <img src="<?= base_url('public/uploads/category_images/') ?>${item.img_path}" alt="sub-cat-img">
                                        </div>
                                            <span>${item.name} </span>
                                        </div>
                                    </a>`
                            // html += `<div class="sub-cat" onClick="load_products('${item.uid}')">
                            //             <img src="<?= base_url('public/uploads/category_images/') ?>${item.img_path}">
                            //             <span>${item.name}</span>
                            //         </div>`
                        })
                        $('#category-tab').html(html)
                    } else{
                        html = `<div class="sub-cat" onclick="load_product(${c_id = null})">
                                    <img src="https://s3-alpha-sig.figma.com/img/6bc8/7c0b/3c4a73f4f2982c0fd8a95a5e70a053e3?Expires=1725235200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=PNlNajQrX1ueDWCUoHufPkTWQ8kNDe5MbkK4PWwOR3cl~8v0kHYmbc~9BZNnEuX9u6vnnqckh4ilNF3qvAAlq15CiTUBoT~~Ya0LIPW4grIxxR2AQa7M~B6aURTzSkAkw2pL0TYP2jICK1nvqr95T3x1cpNKHgRrYtZJtV8zyuFuFvF4I65nuU353FoYK63XsgdrL0tYXrmrjr01mKRDXX~l-xnUy4VOCBbYSy~HMUjUEpimm~y3F0iZ4Ec11kWMrcghg69B1i7SZsJtOqCJHFita4hgCYLAHj85xADR-fHOIugeq0OSAJxFOgucVZO9xdBx1jhFF7FOttuLhPld5Q__" alt="sub-cat-img">
                                    <span>All</span>
                                </div>`
                                $('#category-tab').html(html)
                    }
                },
                error: function (err) {
                    console.error(err)
                }
            })
        } else {
            $.ajax({
                url: "<?= base_url('/api/categories') ?>",
                type: "GET",
                beforeSend: function () { },
                success: function (resp) {
                    if (resp.status) {
                        console.log(resp)
                        html = `<div class="sub-cat" onclick="load_product(${c_id = null})">
                                    <img src="<?= base_url('public/assets/ztImages/all_category.png') ?>" alt="sub-cat-img">
                                    <span>All</span>
                                </div>`
                        $.each(resp.data, function (index, item) {
                            html += `<a href="javascript:void(0)" onClick="load_products('${item.uid}')">
                                        <div class="sub-cat">
                                        <div class="sub-cat-wrapper">
                                            <img src="<?= base_url('public/uploads/category_images/') ?>${item.img_path}" alt="sub-cat-img">
                                        </div>
                                            <span>${item.name} </span>
                                        </div>
                                    </a>`
                            // html += `<div class="sub-cat" onClick="load_products('${item.uid}')">
                            //             <img src="<?= base_url('public/uploads/category_images/') ?>${item.img_path}">
                            //             <span>${item.name}</span>
                            //         </div>`
                        })
                        $('#category-tab').html(html)
                    }
                },
                error: function (err) {
                    console.error(err)
                }
            })
        }
        


    }

    function load_products(c_id) {
        // alert(c_id)
        $.ajax({
            url: "<?= base_url('/api/category/product/list') ?>",
            type: "GET",
            data: {
                c_id: c_id
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

                console.log('checking',resp)
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
                                    if(product.quantity < 1){
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
                                                            <p class="pd-name">${truncateName(product.name)}</p>
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
                                    if(product.quantity < 1){
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
                                                            <p class="pd-name">${truncateName(product.name)}</p>
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
    function search_product_mobile() {
        var alphabet = $('#inputusername').val()
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
                                    if(product.quantity < 1){
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
                                                            <p class="pd-name">${truncateName(product.name)}</p>
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

    function clear_all(){
        load_product(c_id=null)
        $('#searchProductList').val("")
    }
</script>