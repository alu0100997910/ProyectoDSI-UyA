let categoria=0;
let price=0;
let page=1;
$( document ).ready(function() {
    filter();
    $( window ).resize(()=>{
        if($(window).width()>992){
            $("#slide-out").attr("hidden", "true");
        } else {
            $("#slide-out").removeAttr("hidden");
        }
    })
    
});

$("ul.collection li.collection-item").keypress(function(e){
    let code=e.which;
    if(code == 13){
        $(this).click();
    }
});

$("#boletin").submit(e=>{
   e.preventDefault(); 
});
function pagination(numpages){
    let texto='';
    if(page==1){
        texto += `<li class="disabled"><a href="#"><i class="material-icons">chevron_left</i></a></li>`;
    }else{
        texto += `<li class="waves-effect"><a href="#"><i class="material-icons">chevron_left</i></a></li>`
    }
    
    for(let i=0;i<numpages/4;i++){
        texto += `<li class="waves-effect"><button class="btn-small btn-flat" value=${i+1}>${i+1}</btn></li>`
    }
    
    if(page==(numpages%4?Math.floor((numpages)/4)+1:Math.floor((numpages)/4))){
        texto += `<li class="disabled"><a href="#"><i class="material-icons">chevron_right</i></a></li>`;
    }else{
        texto+= `<li class="waves-effect"><a href="#"><i class="material-icons">chevron_right</i></a></li>`;
    }
    $(".pagination").html(texto);
    $(`.pagination li button[value="${page}"]`).addClass('selected');
    $(".pagination li button").click(function() {
        page=$(this).val();
        filter();
    });
}

function filter(){
    $.ajax({
        url: "/controllers/product.php",
        type: "GET",
        data: `cat=${categoria}&price=${price}&page=${page}`,
        dataType: 'json',
        success: (res) => {
            let numpages = parseInt(res.icount);
            let texto = '<h1>Productos:</h1>';
            for (let i in res.items){
                texto+=`
                    <div class="col s12 m6 l6">
                        <div class="card #fff8e1 amber lighten-5">
                            <div class="card-image">
                                <img src="../assets/products/${res.items[i].img}" alt="${res.items[i].alt}">
                            </div>
                            <div class="card-content">
                                <span class="card-title">${res.items[i].name}<span class="new badge blue price-tag" data-badge-caption="€">${res.items[i].price}</span></span>
                                    <p class="truncate">${res.items[i].desc}</p>
                                    <div class="center-align mt-15">
                                        <a href="producto.php?id=${res.items[i].id}" class="waves-effect waves-light btn-small blue"><i class="material-icons right">info</i>Info</a>
                                    </div>
                                </div>
                            <div class="card-action center-align">
                                <button onClick="addToCart(${res.items[i].id})" class="waves-effect waves-light btn-small red"><i class="material-icons right">add_shopping_cart</i>Add To Cart</button>
                            </div>
                        </div>
                    </div>
                `;
            }
            $("#product-list").html(texto);
            pagination(numpages);
        },
        error: (res) => {
            window.location.replace("/index.php");
        }
    });
}

$("#category .collection-item").click(function(){
    $("#category .collection-item.selected").removeClass("selected");
    $(this).addClass("selected");
    categoria=$(this).val();
    filter();
});

$("#price .collection-item").click(function(){
    $("#price .collection-item.selected").removeClass("selected");
    $(this).addClass("selected");
    price=$(this).val();
    filter();
});