const input=document.getElementById("value");
const clear=document.getElementById("clear")
const modul = document.getElementById("modul");
const percent = document.getElementById("percent");
const divide = document.getElementById("divide");
const multiply = document.getElementById("multiply");
const subtract = document.getElementById("subtract");
const addition = document.getElementById("addition");
const comma = document.getElementById("comma");
const equals = document.getElementById("equals");
const numbers = document.querySelectorAll(".number_btn");


numbers.forEach((number_btn) =>
number_btn.addEventListener("click", () => {
// console.log(number_btn.textContent);
if(input.value==="0"){
    input.value="";
}
input.value+=number_btn.textContent;
})
);
clear.addEventListener("click",()=>{
    input.value="0";
})


let memoNumber=0;
let prevNumber=0;
let operator="";
let counter=0;
addition.addEventListener("click",()=>{
  counter+=1;
    prevNumber=Number(input.value);
        operator="+";
        memoNumber+=Number(input.value);
        input.value="";
        if(counter>1){
            input.value=memoNumber+Number(input.value);
            input.value="";
        }
       
    })
    

    equals.addEventListener("click",()=>{
        
        if(operator==="+"){
            input.value=memoNumber+Number(input.value);
        
        }else if(operator==="-"){
            input.value=Number(prevNumber)-(Number(input.value))
        }else if(operator==="*"){
            input.value=Number(prevNumber)*(Number(input.value))
        }else if(operator==="/"){
            input.value=Number(prevNumber)/(Number(input.value))
        }
        else if(operator==="%"){
            input.value=Number(prevNumber)%(Number(input.value))
        }
        })
        
    