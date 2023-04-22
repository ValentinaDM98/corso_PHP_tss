import { useState } from 'react';

const SearchBar = () => {

    const [taskName, setTaskName] = useState('')
    const [taskDuedate, setTaskDueDate] = useState('')
    
    return (
        <div className="header mb-1">
  <h2>To Do List</h2>
  <div className="taskItem">
    <input type="text" name="text" className="form-control" id="text" value={taskName} 
//    quando cambia il valore fai questo
   onChange= {evento => setTaskName(evento.target.value)} 
    placeholder="Aggiungi una nuova attività"/>
   
    <button className="taskItem__add btn btn-primary btn-xs">Add</button>
    <input type="date" value={taskDuedate}
    onChange={evento => setTaskDueDate(evento.target.value)}
    className="taskItem__date btn btn-primary" name="date" id="date"/>
  </div>
</div>



    )
}
export default SearchBar


