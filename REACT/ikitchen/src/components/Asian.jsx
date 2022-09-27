import {React,useState,useEffect} from "react";
import Item from "./Item";

export default function Asian(){
    const[asian,setAsian]=useState();
                useEffect(()=>{
            fetchAsian();
        },[]);
        async function fetchAsian(){
        const api=await fetch("https://api.spoonacular.com/recipes/complexSearch?tags=asian&apiKey=fc2d4d669f484acebbeb2e84cf244c94");
        const asian=await api.json();
        setAsian(asian.results);
    }
    

    return <div><h1>Asian</h1>
    {
        asian ?
        asian.map(item=><Item 
        key={item.id}
        id={item.id}
        name={item.title}
        img={item.image}
        />):""

    }</div>;
}