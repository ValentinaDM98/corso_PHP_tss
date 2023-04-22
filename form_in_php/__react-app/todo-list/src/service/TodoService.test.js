import { activeFilter, addTask, completedFilter } from "./TodoService.js";

const taskList = [
    
        {
            
            name: "comprare il latte",
            user_id:12,
            id:11,
            due_date:"2023-04-25",
            done: true
        },
        {
            name: "comprare il dentifricio",
            user_id:12,
            id:12,
            due_date:"2023-04-25",
            done: true
        },
        {
            name: "comprare il pane",
            user_id:10,
            id:13,
            due_date:"2023-04-22",
            done: false
        }
    
]

//FILTER ACTIVE
const activeTaskList = activeFilter (taskList)
console.log(activeTaskList);

if(!(activeTaskList.length == 1)){
    console.log("test activeTask fallito");
}

//FILTER COMPLITED
const completedTask = completedFilter (taskList)
console.log(completedTask);

if(!(completedTask.length == 2)){
    console.log("test completedTask fallito");
}

//ADD TASK
//Altra opzione: const newTaskList = addTask ('Fare esercizi', '2000-03-01', 12) oppure passo il json
const newTask = ({
    name:'Fare esercizi',
    user_id:12,
    due_date: '2000-03-01'
})

const altro = taskList;
const newTaskList = addTask (newTask, taskList)
console.log(altro);

if(!(newTaskList.length == 4)){
    console.log("test addTask fallito");
}



