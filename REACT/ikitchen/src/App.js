import "./css/styles.scss";
import {BrowserRouter,Routes,Route} from "react-router-dom";
import Popular from "./components/Popular";
import Italian from "./components/Italian";
import American from "./components/American";
import Asian from "./components/Asian";
import Header  from "./components/Header";
import Dish from "./components/Dish";
function App() {
  return (
    <div className="App">
      <BrowserRouter>
      <Header />
      <Routes>
      <Route path="/" element={<Popular />}/>
      <Route path="/italian" element={<Italian />}/>
      <Route path="/american" element={<American />}/>
      <Route path="/asian" element={<Asian />}/>
      <Route path="/item/:id" element={<Dish />}/>
      </Routes>
      </BrowserRouter>
    
    </div>
  );
}

export default App;
