$(".addCart").click(function () {

    var product_id=$(this).attr("product_id");
    $.ajax({
        url:"web/addCart",
        method:"POST",
        data:{product_id:product_id ,_token:_token},
        success:function (params) {
          $(".shopping-list").load(location.href+" .shopping-list",function(){
            Total();
            Delete();
        });   
        },
        error:function(params) {
            console.log(params);
        }
    });
});


function Total() {
    var price=document.querySelectorAll("._price");
    var count=document.querySelectorAll("._count");
    var total=0;
    var num_item=price.length;
    for (var i =0; i < price.length; i++){
        var total= total + +price[i].innerHTML*count[i].innerHTML;
    }
    $(".total-amount").html("$ "+total);
    $(".num_item").html(num_item+ "Items");
    $(".total_item").html(num_item);
    
// console.log(total);

}
Total()

function Delete(){
    $(".del_item").click(function () {
    var product_id=$(this).attr("product_id");
    $(this).closest("li").remove();
    // console.log(product_id);
   $.ajax({
    url:"web/DeleteCart",
    method:"DELETE",
    data:{product_id:product_id,_token:_token},
    success:function(data) {
        Total()
        console.log(data);
    },
    error:function(data) {
        console.log(data);
    }
   })
    
    });
}
Delete()