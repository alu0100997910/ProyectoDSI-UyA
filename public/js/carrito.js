function getCart(){
    return $.ajax({
        url: "/controllers/carrito.php",
        type: "GET",
        dataType: 'json',
        success: (res) => {
            let html="";
            for (let i in res.cart){
                html+= `
                    <li class="collection-item avatar wrapper">
                        <img src="assets/products/${res.cart[i].img}" alt="${res.cart[i].alt}" class="circle product-image">
                        <button onClick="removeFromCart(${i})" class="waves-effect #d32f2f red darken-2 btn-flat remove-cart"><i class="material-icons white-text">remove_shopping_cart</i></button>
                        <a href="producto.php?id=${res.cart[i].id}" >
                            <span class="title truncate"><span class="new badge #1976d2 blue darken-2 bold price-tag left" data-badge-caption="€">${res.cart[i].price}</span>${res.cart[i].name}</span>
                        </a>
                    </li>
                `;
            }
            $("#order-alert").attr("hidden","true");
            $("#carrito .modal-content .collection").html(html);
        }
    });
}

$( document ).ready(function() {
    getCart();
});

$("#order").click(function(){
    let params = {"pos":"order"}
    $.ajax({
        url: "/controllers/carrito.php",
        type: "DELETE",
        data: JSON.stringify(params),
        dataType: 'json',
        success: (res) => {
            getCart().done(function(){
                let alerta = `
                <div class="card-panel #b2ff59 light-green accent-2 center-align">
                    <span class="black-text">${res.message}</span>
                </div>`;
                $("#order-alert").html(alerta).removeAttr("hidden");
            });
        },
        error: (res) => {
            let alerta = `
                <div class="card-panel #b71c1c red darken-4 center-align">
                    <span class="white-text">${res.responseJSON.message}</span>
                    <ul>
                    `;
            for(let i in res.responseJSON.products){
                alerta += `<li class="white-text">${res.responseJSON.products[i]}</li>`;
            }
            alerta += `</ul></div>`;
            $("#order-alert").html(alerta).removeAttr("hidden");
        }
    });
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