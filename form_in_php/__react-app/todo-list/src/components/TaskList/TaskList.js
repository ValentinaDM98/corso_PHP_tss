//INTERO COMPONENTE CHE CONTIENE PIù ITEM

//funzione anonima messa nella task list
const TaskList = (props) => {
    return (
        //fragment = tag vuoto che serve a rispettare la regoa di racchiudere un componente nel tag

    <>

    <h3 className="task_list__header">{props.header}{props.tasks.length}</h3>
    {/* // task_list__list vedere se cambiare nome */}
    <ul className= "task_list__header">{props.children}
    </ul>
    </>


        

    )

}

export default TaskList