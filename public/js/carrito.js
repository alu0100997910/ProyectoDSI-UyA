function getCart(){
    $.ajax({
        url: "/controllers/carrito.php",
        type: "GET",
        dataType: 'json',
        success: (res) => {
            let html="";
            for (let i in res.cart){
                html+= `
                    <li class="collection-item avatar wrapper">
                        <img src="assets/products/${res.cart[i].img}" alt="${res.cart[i].alt}" class="circle product-image">
                        <button onClick="removeFromCart(${i})" class="waves-effect red btn-flat remove-cart"><i class="material-icons">remove_shopping_cart</i></button>
                        <a href="producto.php?id=${res.cart[i].id}" >
                            <span class="title truncate"><span class="new badge blue price-tag left" data-badge-caption="€">${res.cart[i].price}</span>${res.cart[i].name}</span>
                        </a>
                    </li>
                `;
            }
            $("#carrito .modal-content .collection").html(html);
        }
    });
}

$( document ).ready(function() {
    getCart();
});

function addToCart(id){
    let params = {"id": id};
    $.ajax({
        url: "/controllers/carrito.php",
        type: "POST",
        data: JSON.stringify(params),
        dataType: 'json',
        success: (res) => {
            getCart();
        }
    });
}

function removeFromCart(pos){
    let params = {"pos": pos};
    $.ajax({
        url: "/controllers/carrito.php",
        type: "DELETE",
        data: JSON.stringify(params),
        dataType: 'json',
        success: (res) => {
            getCart();
        }
    });
}