import {React,useState,useEffect} from "react";
import Item from "./Item";

export default function Italian(){
    const[italian,setItalian]=useState();
                useEffect(()=>{
            fetchItalian();
        },[]);
        async function fetchItalian(){
        const api=await fetch("https://api.spoonacular.com/recipes/complexSearch?tags=italian&apiKey=fc2d4d669f484acebbeb2e84cf244c94");
        const italian=await api.json();
        setItalian(italian.results);
    }
    

    return <div><h1>Italian</h1>
    {
        italian ?
        italian.map(item=><Item 
        key={item.id}
        id={item.id}
        name={item.title}
        img={item.image}
        />):""

    }</div>;
}