//users.php
const base_url = "http://localhost/corso_php_mysql_2223/form_in_php/rest_api"

// devo mettere export per utilizzarla perchè si trova dentro un modulo 
export function getUser() {
   

    const promise = fetch(base_url+"/users.php")
    //console.log("1 promessa di fetch",promise)
          promise
          .then((response) => {
                return response.json()   //restituisce una promessa
          })
          //elaboro la promessa, restituisce un json
          .then((json)=>{
                // DATI DISPONIBILI
                console.log(json.data);
                const lista = document.getElementById("lista_utenti")//lo prende dall'index
                const elenco = json.data.map((user)=>{
                    // console.log("sono un utente",user)
                    return "<li>("+user.user_id+")"+user.first_name+" " + user.last_name+"</li>"
                    //trasforma array in stringa
                }).join("")

                lista.innerHTML = elenco
                console.log(elenco)
          })
        
    
}