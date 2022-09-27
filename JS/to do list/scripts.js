const taskInput=document.getElementById("task");
const taskBtn=document.getElementById("add-task");
const message=document.getElementById("message")
const tasksDiv=document.getElementById("task-collection")
const select=document.getElementById("importancy")

let tasks= JSON.parse(localStorage.getItem("tasks")) || []

function deleteTask(id){
    let newTasks=tasks.filter(task=>task.id !==id)
    tasks=newTasks

    localStorage.setItem("tesks",JSON.stringify(tasks))
    updateDOM(tasks)

}
//functia ce va afisa elementele la ecran
function updateDOM(arr){
    tasksDiv.innerHTML="";
    arr.map(item=>{
        let date=new Date(item.date)
        let year=date.getFullYear();
        let month=date.getMonth();
        let day=date.getDate();
        let hour=date.getHours();
        let minutes=date.getMinutes();

        tasksDiv.innerHTML+=`<div class='container border d-flex align-items-center justify-content-between p-3 rounded m-2'>
        <h5 class='${item.importancy === "important" ? "text-danger" : "text-success"}'>${item.content}</h5>
        <small>${hour}:${minutes} ${day}/${month}/${year}</small>
        <button class="btn btn-outline-danger" onclick="deleteTask(${item.id})">Delete</button>
        </div>`;
    })

}


taskBtn.addEventListener("click",()=>{
    message.textContent=""
    let taskValue=taskInput.value
    taskInput.value=""
    let taskImportancy = document.querySelector("input[name='importancy']:checked").value;
    let taskCreatedAt=Date.now();

    if(taskValue.length>5){
        const task={
            id:Date.now(),
            content:taskValue,
            importancy:taskImportancy,
            date:taskCreatedAt
        }
       // console.log(task);
       tasks.push(task)
      // console.log(tasks)
      localStorage.setItem("tesks",JSON.stringify(tasks))

      updateDOM(tasks);
    }
    else{
        message.textContent="Task has be longer than 5 characters"
    }
})
select.addEventListener("change",()=>{
    if(select.value ==="all"){
        updateDOM(tasks)
    }else{
    let newTasks=tasks.filter(task=>task.importancy===select.value)
    updateDOM(newTasks)}
})
