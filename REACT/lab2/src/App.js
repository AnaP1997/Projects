import Candidats from"./components/Candidats";
import Oferts from "./components/Oferts";
import "./styles.css";
import API from "./components/API";

function App() {
  return (<div className="App">
    <header className="head"><h1>JOBS</h1></header>
    
     <div className="info">
      <Candidats /> 
     <Oferts />
     <API />
     </div>
    </div>
  );
}

export default App;