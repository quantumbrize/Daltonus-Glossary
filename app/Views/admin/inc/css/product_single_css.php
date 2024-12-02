<style>
    .product-img{
        height: 60px;
        width: 60px;
        object-fit: contain;
        background: white;
    }
    tbody tr{
        transition: 50ms;
    }
    #table-product-variant tbody tr:hover{
        cursor: pointer;
       
    }
    .sorting_1{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    #table-product-variant-body td{
       text-align:  center !important;
    }
    #table-product-variant_wrapper{
        overflow-x:scroll ;
    }

    .stock_number{
        padding: 0px 10px 0px 10px;
        width: 20px;
        box-sizing: content-box;
        border: none;
        outline: none;
        text-align: center;
    }
</style>