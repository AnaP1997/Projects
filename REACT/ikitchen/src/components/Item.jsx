import {Link} from "react-router-dom";

export default function Item({id,name,img}){
    return (
        <div className="item">
            <Link to={"/item/"+id}>
                <img src={img} alt={name}/>
                <h3>{name}</h3>
            </Link>
        </div>
    )
}