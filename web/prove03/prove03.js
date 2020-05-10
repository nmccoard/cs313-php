/**********************
 * Nate McCoard
 * 
 * 
 **********************/

function getSizeAndQty(thisId, qty, sz){
    var item = thisId;
    var quantity = innerHTML.getValueById(qty);
    var size = innerHTML.getValueById(sz);
    addToCart(item, quantity, size)
}

function addToCart(item, quantity, size){
    var data = {};
    data['item']= item;
    data['qty']= quantity;
    data['size'] = size;
    
    $.ajax({
        url: "insideCart.php",
        type: "GET",
        data: data,
    })
}