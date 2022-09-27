import {React,useState,useEffect} from "react";
import Item from "./Item";

export default function Popular(){
    
        const[popular,setPopular]=useState();
                useEffect(()=>{
            fetchPopular();
        },[]);
        async function fetchPopular(){
        const api=await fetch("https://api.spoonacular.com/recipes/complexSearch?tags=popular&apiKey=fc2d4d669f484acebbeb2e84cf244c94");
        const popular=await api.json();
        setPopular(popular.results);
    }

    return <div><h1>Popular</h1>
    {
        popular ?
        popular.map(item=><Item 
        key={item.id}
        id={item.id}
        name={item.title}
        img={item.image}
        />):""

    }</div>;
}