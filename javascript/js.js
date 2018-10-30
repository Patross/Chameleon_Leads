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