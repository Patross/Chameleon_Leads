let btnShop = document.getElementById("btnShop");
btnShop.addEventListener("click", ShopToggle);
let shoppingList = document.getElementById("shopping");
let shopHidden = true;

function ShopToggle(){
    if(shopHidden == true){
        shoppingList.removeAttribute("class","hidden");
        shopHidden = false;
    }
    else if(shopHidden == false){
        shoppingList.setAttribute("class","hidden");
        shopHidden = true;
    }
};


///
///ASSIGN EVENT LISTENER FOR EACH BUTTON WITH AddToCart CLASS
///
var AddToCart = document.getElementsByClassName('AddToCart');
for (i = 0; i < AddToCart.length; i++) {
    AddToCart[i].addEventListener('click', function(){
        // console.log(this.id);
        // console.log(window.pageYOffset);
        let itemID;
        let timestamp;
        
        document.cookie = `itemid=${variable};expires=${timestamp}`;



    });
}