$( document ).ready(function() {
    $.ajax({
        url: "/controllers/carrito.php",
        type: "GET",
        dataType: 'json',
        success: (res) => {
            let html="";
            for (let i in res.cart){
                html+= `
                    <li class="collection-item avatar valign-wrapper">
                        <a href="producto.php?id=${res.cart[i].id}">
                            <img src="assets/products/${res.cart[i].img}" alt="${res.cart[i].alt}" class="circle">
                            <span class="title"><span class="new badge blue price-tag" data-badge-caption="€">${res.cart[i].price}</span>${res.cart[i].name}</span>
                        </a>
                        <button onClick="removeFromCart(${i})" class="waves-effect red btn-flat remove-cart"><i class="material-icons">remove_shopping_cart</i></button>
                    </li>
                `;
            }
            $("#carrito .modal-content .collection").html(html);
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
            let html="";
            for (let i in res.cart){
                html+= `
                    <li class="collection-item avatar valign-wrapper">
                        <a href="producto.php?id=${res.cart[i].id}">
                            <img src="assets/products/${res.cart[i].img}" alt="${res.cart[i].alt}" class="circle">
                            <span class="title"><span class="new badge blue price-tag" data-badge-caption="€">${res.cart[i].price}</span>${res.cart[i].name}</span>
                        </a>
                        <button onClick="removeFromCart(${i})" class="waves-effect red btn-flat remove-cart"><i class="material-icons">remove_shopping_cart</i></button>
                    </li>
                `;
            }
            $("#carrito .modal-content .collection").html(html);
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
            let html="";
            for (let i in res.cart){
                html+= `
                    <li class="collection-item avatar valign-wrapper">
                        <a href="producto.php?id=${res.cart[i].id}">
                            <img src="assets/products/${res.cart[i].img}" alt="${res.cart[i].alt}" class="circle">
                            <span class="title"><span class="new badge blue price-tag" data-badge-caption="€">${res.cart[i].price}</span>${res.cart[i].name}</span>
                        </a>
                        <button onClick="removeFromCart(${i})" class="waves-effect red btn-flat remove-cart"><i class="material-icons">remove_shopping_cart</i></button>
                    </li>
                `;
            }
            $("#carrito .modal-content .collection").html(html);
        }
    });
}