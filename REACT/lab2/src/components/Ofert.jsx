import React from "react";

export default function Ofert(props){
  
    return( 
    <div className="oferte">
        
        <small>{props.category}</small>
        <h2>{props.title}</h2>
        <p>{props.location}</p>
        <p>{props.description}</p>
        <h3>Salariu {props.salary}</h3>
        
        <br/>
        <br/>
    </div>);

}


