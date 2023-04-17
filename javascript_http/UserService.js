//users.php
const base_url = "http://localhost/corso_php_tss/form_in_php/rest_api"


export async function getUser() {
    const response = await fetch(base_url + "/users.php")
    const json = await response.json();
    return json.data;
}
