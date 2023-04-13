//users.php
const base_url = "http://localhost/corso_php_tss/form_in_php/rest_api"

export function getUser() {
   

    return fetch(base_url+"/users.php").then((response) => {return response.json()})
   
          
          
          
        
    
}