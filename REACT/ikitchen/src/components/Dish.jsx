
import {useParams} from "react-router-dom";
import {React,useState,useEffect} from "react";
import Ingredient from "./Ingredient";

export default function Dish(){
const params=useParams();
const [ingredients,setIngredients]=useState();
useEffect(()=>{
    recipe();
},[]);

async function recipe(){
    const api=await fetch(`https://api.spoonacular.com/recipes/${params.id}/ingredientWidget.json?apiKey=fc2d4d669f484acebbeb2e84cf244c94
`);
const recipe=await api.json();
setIngredients(recipe.ingredients);

}
    return <div className="Dish">
        {ingredients ? ingredients.map((ing,idx)=><Ingredient
        key={idx}
        name={ing.name}
        amount={ing.amount}
        />):""}

    </div>
}