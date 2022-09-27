import React,{useEffect,useRef,useState} from "react";

export default function API(){
    const [values,setValues]=useState([]);
    const [inputValue,setInputValue]=useState(0);
    const [selectValue,setSelectValue]=useState("LEI");

    const exchangeInput=useRef();
   
    function calculate(){
    let changeVal=values.value[selectValue];
exchangeInput.current.value=(inputValue*changeVal).toFixed(10);
    }
    useEffect(()=>{
        getData()
    },[])
   
    const getData= async ()=>{

        const checkData=localStorage.getItem("data");

        if(checkData){
            setValues(JSON.parse(checkData));
        }
        else{

        const api=await fetch(`https://api.currencyapi.com/v3/latest?apikey=Jqjq5i6MveDJwrqgI31ppByqS8b8whSIUxe0BLbe&currencies=MDL%2CUSD%2CCAD&base_currency=EUR`);

        const data=await api.json();
        localStorage.setItem("data",JSON.stringify(data));
        setValues(data);}
        
        
        
    };

    return (<div className="exchange">
        <h1>Schimb Valutar</h1>
        <input
        onChange={(e)=>setInputValue(e.target.value)}
        type="number" placeholder="EUR"
        min="0.0"
        step="0.1"/>EUR
        <br/>
        <input
        ref={exchangeInput} type="number" placeholder="Alegeti valuta"
        min="0.0"
        step="0.1"/>
        <select onChange={(e)=>setSelectValue(e.target.value)} >
            <option value="USD">USD</option>
            <option value="LEI">LEI</option>
        </select>
        <br />
        <button onClick={()=>{
            calculate();
        }}>Calculeaza</button>
        
        
        
    </div>);
    

}