import React,{useState,useEffect} from "react";
import Ofert from "./Ofert";

export default function Oferts(){
    const [oferts,setOferts]=useState(JSON.parse(localStorage.getItem("oferts"))||[]);

    const [ofert,setOfert]=useState({title:"",
    description:"",
    category:"",
    location:"",
    salary:"",
    id:"",});

useEffect(()=>{
    localStorage.setItem("oferts",JSON.stringify(oferts));
},[oferts]);

    function addOfert(){
    if(
        ofert.title.length>0 && 
        ofert.description.length>0 &&
        ofert.category.length>0 &&
        ofert.location.length>0 &&
        ofert.salary.length>0){
            setOferts([...oferts,{...ofert,id:Date.now()}]);
            console.log(oferts);
            setOfert({...ofert,id:"",title:"",description:"",category:"",location:"",salary:""});
            document.getElementById("form").reset();
        
        }    
    }
   function seeOferts(of){of.map((t)=>(
    <Ofert
    key={t.id}
    category={t.category} 
    title={t.title}
    description={t.description}
    location={t.location}
    salary={t.salary}
    id={t.id}
    />
    ))}

    return <div className="container">
        <div className="addOfert"><h1>Plaseaza o oferta</h1>
    <form id="form" onSubmit={(e)=>{
        e.preventDefault();
        addOfert();}} style={{width:"600px"}}>
        
        <input 
        onChange={(e)=>setOfert((prevOfert)=>{return{...prevOfert,title:e.target.value};
        })}  type="text"placeholder="Titlu" />
        <br/>
        <input 
        onChange={(e)=>setOfert((prevOfert)=>{return{...prevOfert,location:e.target.value};
        })}  type="text"placeholder="Locatia" />
        <br/>
        <textarea
        onChange={(e)=>setOfert((prevOfert)=>{
            return{...prevOfert,description:e.target.value}
        })}  name="" id="" cols="30" rows="3" placeholder="Descriere"></textarea>
        <br/>
        Categorie:
        <select onChange={(e)=>setOfert((prevOfert)=>{
            return{...prevOfert,category:e.target.value}
        })} >
            <option value="IT">IT</option>
            <option value="Management">Management</option>
            <option value="Marketing">Marketing</option>
        </select>
        <br/>
        <input 
        onChange={(e)=>setOfert((prevOfert)=>{return{...prevOfert,salary:e.target.value};
        })}  type="text"placeholder="Salariu" />
        <br/>
        <button type="submit" >Plaseaza oferta</button>
    </form>
    <br/><br/><br/></div>
    <div className="oferts">
        <h1>Oferte({oferts.length})</h1>
        <h4>Filtreaza dupa:</h4>
        <select id="category" onChange={(e)=>{let oferte=oferts.filter((ofert)=>ofert.category===e.target.value);
        seeOferts(oferte);}

        } >
        <option value="IT">IT</option>
            <option value="Management">Management</option>
            <option value="Marketing">Marketing</option>
        </select>
        
        
        <div className="seeOf">
        {seeOferts(oferts)}
            </div>

    </div>
    </div>
}

