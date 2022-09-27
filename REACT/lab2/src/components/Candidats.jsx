import React,{useState,useEffect} from "react";


const names=["Gheorghe","Ana","Ion","Viorica","Alexandru","Daniela","Olga","Ionela","Grigore","Vasile","Mia","Dominic","Maria","Dumitru","Mihai"];
const lastnames=["Palitu","Rosca","Vicol","Birca","Lupu","Stavila","Dascal","Cojocaru","Revenco","Popa","Vames","Popescu","Dontu","Jardan","Tataru"];
const locations=["or. Chisinau","or. Balti","or. Orhei","or. Criuleni","or. Calarasi","or. Hancesti","or. Drochia","or. Telenesti","or. Ungheni"];
const jobs=["Programator","Designer","Administrator de sistem","Asistent Recrutare","Frontend Developer","Tehnician-montor","Inginer Proiectant","Service Desk Engineer","Manager de vanzari","Manager de produs"];

function Candidats (){

    

    const [candidat,setCandidat]=useState([]);
    useEffect(()=>{console.log(candidat)},[candidat]);

    const [candidat1,setCandidat1]=useState([]);
    useEffect(()=>{console.log(candidat1)},[candidat1]);
    
    
function generateCandidat(){
        const cand={
            id:Date.now(),
            name:names[Math.floor(Math.random()*names.length)],
            lastname:lastnames[Math.floor(Math.random()*lastnames.length)],
            age:[Math.floor(Math.random()*70)+18],
            location:locations[Math.floor(Math.random()*locations.length)],
            job:jobs[Math.floor(Math.random()*jobs.length)]
            
            
        };

        const cand1={
            id:Date.now(),
            name:names[Math.floor(Math.random()*names.length)],
            lastname:lastnames[Math.floor(Math.random()*lastnames.length)],
            age:[Math.floor(Math.random()*70)+18],
            location:locations[Math.floor(Math.random()*locations.length)],
            job:jobs[Math.floor(Math.random()*jobs.length)]
            
            
        };
       setCandidat([...candidat,cand]);
       setCandidat1([...candidat1,cand1]);

        

    }


    return <div 
    style={{width:"600px"}} className="candidats">
            <h1 className="title">Candidati</h1>
            <button onClick={()=>{generateCandidat();
           
        }
     }>Genereza Candidat</button>
     <br/>
     <br/>
           <div className="cand">{candidat.length===0? "":candidat.map((c)=>(<div className="candidat" key={c.id}>
            <img src="https://ddrg.farmasi.unej.ac.id/wp-content/uploads/sites/6/2017/10/unknown-person-icon-Image-from.png" alt="img"/>
            <br/>
               {c.name} {c.lastname}  {c.age}   ani <br/> 
               {c.location}<br/> {c.job}

    
           </div>))}
           
           </div>
             
        </div>
    
}
export default Candidats;