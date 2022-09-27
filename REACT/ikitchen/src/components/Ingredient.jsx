export default function Ingredient({name,amount})
{
    return <div className="ingredient">
        <h4>{name}-{amount.metric.value} {amount.metric.unit}</h4>
    </div>
}

