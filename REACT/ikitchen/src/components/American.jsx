
import {React,useState,useEffect} from "react";
import Item from "./Item";

export default function American(){

    const[american,setAmerican]=useState();
                useEffect(()=>{
            fetchAmerican();
        },[]);
        async function fetchAmerican(){
        const api=await fetch("https://api.spoonacular.com/recipes/complexSearch?tags=american&apiKey=fc2d4d669f484acebbeb2e84cf244c94");
        const american=await api.json();
        setAmerican(american.results);
    }
    

    return <div><h1>American</h1>
    {
        american ?
        american.map(item=><Item 
        key={item.id}
        id={item.id}
        name={item.title}
        img={item.image}
        />):""

    }</div>;
}