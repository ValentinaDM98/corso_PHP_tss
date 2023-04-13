// mettiamo tutte le funzioni di view

//passo la "lista utenti"
function UsersList(array_users, element_selector) {


    const lista = document.getElementById(element_selector)//lo prende dall'index
    console.log(lista, element_selector)
    const elenco = array_users.map((user) => {
        // console.log("sono un utente",user)
        return "<li>(" + user.user_id + ")" + user.first_name + " " + user.last_name + "</li>"
        //trasforma array in stringa
    }).join("\n")

    lista.innerHTML = elenco


}

//function expression
const UserTable = (array_users, element_selector) => {
    //template literal
    const tr_users = array_users.map((user) => {
            return ` <tr>
                <td>
                    ${user.first_name}
                </td>
            </tr>`
        }).join("\n")
        console.log(tr_users);
    
    const html = `<table border = 1px width = 50%>
            <tr>
                <th>
                    Nome
                </th>
            </tr>
        ${tr_users}
       </table>`
        
    document.getElementById(element_selector).innerHTML = html
    
}



export { UsersList, UserTable }