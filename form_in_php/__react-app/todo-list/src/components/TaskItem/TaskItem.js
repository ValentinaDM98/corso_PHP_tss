//SINGOLO ITEM

//const {nome_task} = props
function TaskItem({nome_task, done}) {
    return (
        <div className={done ? 'task_done' : '' }>
            <div class = "list__tasks">
            <div class="task">
                <input checked ={done} type="checkbox" className="list__task" id="task3" name="task3" defaultValue="task3"  />
                <label htmlFor="task3" className="list__label">{nome_task}</label>
            </div>
            <button className ="remove__task btn btn-danger btn-xs">
                <i className ="fa-regular fa-trash-can">Remove</i>
            </button>
         </div>
         </div>

    )

}

export default TaskItem;