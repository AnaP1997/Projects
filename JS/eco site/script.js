let slider=document.querySelector(".slider");
let bt1=document.getElementById("btn1");
let bt2=document.getElementById("btn2");
let bt3=document.getElementById("btn3");
let bt4=document.getElementById("btn4");
let bt5=document.getElementById("btn5");

bt1.addEventListener("click",()=>{
    slider.style.backgroundImage=`url(img/img1.jpg)`;
    setTimeout(
        slider.animate([
      // keyframes
         { transform: 'translateX(-5000px)' },
          { transform: 'translateX(0px)' }
           ], {
                 // timing options
                  duration: 800,
               iterations: 1,
             }),1000);
           
})
       
bt2.addEventListener("click",()=>{
    slider.style.backgroundImage=`url(img/img2.jpg)`;
    setTimeout(
        slider.animate([
      // keyframes
         { transform: 'translateX(-5000px)' },
          { transform: 'translateX(0px)' }
           ], {
                 // timing options
                  duration: 800,
               iterations: 1,
             }),1000);
})
bt3.addEventListener("click",()=>{
    slider.style.backgroundImage=`url(img/img3.jpg)`;
    setTimeout(
        slider.animate([
      // keyframes
         { transform: 'translateX(-5000px)' },
          { transform: 'translateX(0px)' }
           ], {
                 // timing options
                  duration: 800,
               iterations: 1,
             }),1000);
})
bt4.addEventListener("click",()=>{
    slider.style.backgroundImage=`url(img/img4.jpg)`;
    setTimeout(
        slider.animate([
      // keyframes
         { transform: 'translateX(-5000px)' },
          { transform: 'translateX(0px)' }
           ], {
                 // timing options
                  duration: 800,
               iterations: 1,
             }),1000);
})
bt5.addEventListener("click",()=>{
    slider.style.backgroundImage=`url(img/img5.jpg)`;
    setTimeout(
        slider.animate([
      // keyframes
         { transform: 'translateX(-5000px)' },
          { transform: 'translateX(0px)' }
           ], {
                 // timing options
                  duration: 800,
               iterations: 1,
             }),1000);
})



const products=[{
  id:0,
  title:"Aglaonema Point Star",
  image:"https://floralsoul.md/wp-content/webp-express/webp-images/uploads/2022/04/1-15-2.jpg.webp",
  price:450,
  stock:10
},
{
  id:1,
  title:"Compozitii de Primavara",
  image:"https://floralsoul.md/wp-content/webp-express/webp-images/uploads/2022/04/1-2-1.jpg.webp",
  price:350,
  stock:5

},
{
  id:2,
  title:"Euphorbia Lacteia",
  image:"https://floralsoul.md/wp-content/webp-express/webp-images/uploads/2021/12/1-99.jpg.webp",
  price:450,
  stock:2   
},
{
  id:3,
  title:"Calamondin",
  image:"https://floralsoul.md/wp-content/webp-express/webp-images/uploads/2022/03/1-129.jpg.webp",
  price:2500,
  stock:4   
},
{
  id:4,
  title:"Ficus Ginseng",
  image:"https://floralsoul.md/wp-content/webp-express/webp-images/uploads/2021/07/1-10.jpg.webp",
  price:400,
  stock:1   
},
{
  id:5,
  title:"Copac de Lamaie",
  image:"https://floralsoul.md/wp-content/webp-express/webp-images/uploads/2022/03/1-205.jpg.webp",
  price:2500,
  stock:3   
},
{
  id:6,
  title:"Sansevieria Black Diamond",
  image:"https://floralsoul.md/wp-content/webp-express/webp-images/uploads/2021/10/1-8.jpg.webp",
  price:350,
  stock:8   
},
{
  id:7,
  title:"Ficus Elastica Melany",
  image:"https://floralsoul.md/wp-content/webp-express/webp-images/uploads/2022/04/1-110.jpg.webp",
  price:1500,
  stock:2   
},
{
  id:8,
  title:"Begonia Beleaf",
  image:"https://floralsoul.md/wp-content/webp-express/webp-images/uploads/2021/12/1-23-1.jpg.webp",
  price:250,
  stock:20   
},
{
  id:9,
  title:"Campanula",
  image:"https://floralsoul.md/wp-content/webp-express/webp-images/uploads/2022/03/1-7.jpg.webp",
  price:250,
  stock:12   
},
{
  id:10,
  title:"Orhidee",
  image:"https://floralsoul.md/wp-content/webp-express/webp-images/uploads/2021/12/1-103-e1640276659153.jpg.webp",
  price:350,
  stock:6   
},
{
  id:11,
  title:"Air Plant",
  image:"https://floralsoul.md/wp-content/webp-express/webp-images/uploads/2022/01/1-16-2.jpg.webp",
  price:400,
  stock:2   
}]
let cart=[]
const productsDiv=document.getElementById("list-products")

products.forEach(product=>{
  productsDiv.innerHTML+=`
  <div class="product">
  <div class="product_image" style="background-image:url(${product.image})"></div>
  <h3>${product.title}</h3>
  <p>${product.price}LEI</p>
  <p>Stoc: ${product.stock} bucati</p>
  <button class="product_btn" onclick=addToCart(${product.id})>Adauga in Cos</button>
  </div>`
})
const shoppingCart=document.getElementById("shopping_cart")
const cartBtn=document.getElementById("cart")
const shoppingCartItems=document.getElementById("shopping_cart_items")
const totalPriceContainer=document.getElementById("summ")

shoppingCart.style.display="none";
cartBtn.addEventListener("click",()=>{
  shoppingCart.classList.toggle("show");
})

function addToCart(product_id){
  let product=products.filter(product=>product.id===product_id)[0];
  let productInCart=cart.filter((pCart)=>pCart.id===product.id);
  if(productInCart.length===0){
      cart.push({...product,quantity : 1});
      renderCart();
      
  }}
  
  
  function renderCart() {
    shoppingCartItems.innerHTML="";
cart.forEach((item) => {
  
    shoppingCartItems.innerHTML += `
    <div class="cart_item">
    <div class="product_image" id="cart_img" style="background-image: url(${item.image})"></div>
    <div class="cart_data">
    <h5>${item.title}</h5>
    </div>
    <p> ${item.price}LEI</p>
    <div class="item_quantity">
    <button class="item_quantity add" onclick=addQuantity(${item.id})>+</button>
    <small>${item.quantity}</small>
    <button class="item_quantity subtract" onclick=subtractQuantity(${item.id})>-</button>
    </div>
    <div class="item_prices">
    
    
    <p> ${(item.price*item.quantity)}LEI</p>
    </div>
    <button class="delete_item" onclick=deleteItem(${item.id})>X</button>
    </div>
    `;calculateTotal(item.quantity,item.price);
    })
    
   
   }
    
    function addQuantity(product_id){
      let product=cart.filter((product)=>product.id===product_id)[0];
      // console.log(product);
      let newQnt=product.quantity;
      if(product.quantity<product.stock){
          newQnt+=1;
      }
      let updatedProduct={...product,quantity:newQnt};
      // console.log(updatedProduct)
      cart=cart.map((product)=>{
          if(product.id===product_id){
              return{...product,quantity:newQnt};

          } return product;
      });
      renderCart();
      
  }

  function subtractQuantity(product_id){let product=cart.filter((product)=>product.id===product_id)[0];
      // console.log(product);
      let newQnt=product.quantity;
      if(product.quantity>1){
          newQnt-=1;
      }
      let updatedProduct={...product,quantity:newQnt};
      // console.log(updatedProduct)
      cart=cart.map((product)=>{
          if(product.id===product_id){
              return{...product,quantity:newQnt};

          } return product;
      });
      renderCart();
      
  }

  function deleteItem(product_id){
      cart=cart.filter((product)=>product.id!==product_id)
      renderCart();
      
      
  }
  const Total=document.getElementById("total_sum");
  function calculateTotal(quantity,price){
 let totalItem=quantity*price;
    let sum=[]
    sum=sum+totalItem;
    totalPriceContainer.innerHTML=`<hr>
    <p>TOTAL:${sum}LEI</p>`;
    if(sum>300){Total.innerHTML=`
    <p>Livrare:0 LEI</p>
    <h3>TOTAL:${sum}LEI`}
    else{Total.innerHTML=`
    <p>Livrare:50 LEI</p>
    <h3>TOTAL:${parseInt(sum)+50}LEI`}
    }
  



const date=document.getElementById("date");
function formatted_date()
{
   var result="";
   var d = new Date();
   if((d.getMonth()+1)<10){result +=d.getDate()+".0"+(d.getMonth()+1)+"."+ d.getFullYear();}
   else{result +=d.getDate()+"."+(d.getMonth()+1)+"."+ d.getFullYear();}
   return result;
}

date.innerHTML=`<h2>${formatted_date()}</h2>`;
  let city="Chisinau";
  const wText= document.getElementById("wether");
 const cityName=document.getElementById("city-name"); 
 const feelsLike=document.getElementById("feels-like");

   
async function main (){
  const response =await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=75ed9b0e68b3533ee3d2363803a95644`);
const weather=await response.json();

cityName.textContent=weather.name;
if(weather.weather['0'].main==='Clear'){
wText.innerHTML=`<div class="grade">${Math.round(weather.main.temp-273.15)}°C<img src="/img/sun.png" class="w-img"></div>`;}
 else if(weather.weather['0'].main==='Clouds'){
      wText.innerHTML=`<div class="grade">${Math.round(weather.main.temp-273.15)}°C<img src="/img/clouds.png" class="w-img"></div>`;
  }
  else if(weather.weather['0'].main==='Rain'){
       wText.innerHTML=`<div class="grade">${Math.round(weather.main.temp-273.15)}°C<img src="/img/rain.png" class="w-img"></div>`

  }
 feelsLike.textContent=`Real feel:${Math.round(weather.main.feels_like-273.15)}°C` ;
 
}
main();


let money="MDL";
const usd= document.getElementById("usd");
const eur=document.getElementById("eur"); 


async function main1 (){
const response1 =await fetch(`https://api.currencyapi.com/v3/latest?apikey=Jqjq5i6MveDJwrqgI31ppByqS8b8whSIUxe0BLbe`);
const cursUSD=await response1.json();
const response2 =await fetch(`https://api.currencyapi.com/v3/latest?apikey=Jqjq5i6MveDJwrqgI31ppByqS8b8whSIUxe0BLbe&currencies=MDL%2CUSD%2CCAD&base_currency=EUR`);
const cursEUR=await response2.json();
let convertUSD=cursUSD.data.MDL.value;
usd.innerHTML+=`<p>=${convertUSD} Lei</p>`;
let convertEUR=cursEUR.data.MDL.value;
eur.innerHTML+=`<p>=${convertEUR} Lei</p>`;


}
main1();













