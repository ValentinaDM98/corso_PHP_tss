//si occupa delle manipolazioni principali dei dati, che poi andranno passati allo State

export const addTask = (newTask,todos) => {
    todos.push(newTask)
    return todos;
}

export const removeTask = () => {}
export const updateTask = () => {}

export const activeFilter = (todos) => {
    const newTodos = todos.filter(task => !task.done)
    return newTodos;
}

export const completedFilter = todos => todos.filter(task => task.done)

export const dateFilter = () => {}