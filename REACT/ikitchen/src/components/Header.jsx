import {NavLink} from "react-router-dom";
import {GiKnifeFork,GiChopsticks} from "react-icons/gi";
import {FaPizzaSlice,FaHamburger} from "react-icons/fa"
export default function Header(){
    return <nav>
<NavLink className={({isActive})=>(isActive ? "active": "inactive")} to="/">
    <GiKnifeFork/>Popular</NavLink>

<NavLink className={({isActive})=>(isActive ? "active": "inactive")} to="/italian">
    <FaPizzaSlice/>Italian</NavLink>

<NavLink className={({isActive})=>(isActive ? "active": "inactive")} to="/american">
    <FaHamburger/>American</NavLink>

<NavLink className={({isActive})=>(isActive ? "active": "inactive")} to="/asian">
    <GiChopsticks/>Asian</NavLink>
    </nav>;
}