// import { useState } from 'react';

import './App.css';
import TaskItem from "./components/TaskItem/TaskItem";
import TaskList from './components/TaskList/TaskList';
import SearchBar from './components/SearchBar';


function App() {

  const taskListData=[];

  // const taskListData = [
  //   {
  //     task_id: 2,
  //     user_id: 2,
  //     name: "Fare la spesa",
  //     due_date: "2023-05-24",
  //     done: true
  //   },
  //   {
  //     task_id: 3,
  //     user_id: 3,
  //     name: "Andare in palestra",
  //     due_date: "2021-04-24",
  //     done: false
  //   }
  // ]
  // const [taskListData, setTaskListData] = useState([])
  const list = taskListData.map(task => <TaskItem key = {task.task_id} done={task.done} nome_task={task.name}></TaskItem>)
  // // console.log(list);

  // function aggiungiTask(){
  //   setTaskListData((attuale)=>{
  //     //copia dello stato attuale si fa con ...
  //     const new_attuale = [...attuale]
  //     new_attuale.push(
  //       {
  //           task_id: 3,
  //           user_id: 3,
  //           name: "Andare in palestra",
  //           due_date: "2021-04-24",
  //           done: false
  //         }
  //       );
  //     // console.log(attuale);
  //     return new_attuale;

  //   })
  // }

    return (
      <main>
        {/* <button onClick={aggiungiTask}>Add Task</button> */}
        {/* {list} */}
        {/* sostituisco con list */}
      {/* <TaskItem nome_task = {"Comprare il latte"}></TaskItem> */}

      <SearchBar></SearchBar>

      <TaskList header = {'Employee Mario, task n:  '} tasks = {taskListData}>
        {list}
      </TaskList>
      <TaskList header = {'Employee Paolo, task n:  '} tasks = {taskListData}>
        {list}
      </TaskList>
      </main>
    )
}

export default App;