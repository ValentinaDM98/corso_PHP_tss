//function CardBase(props) {
    function CardBase({titolo, autore, descrizione}) {
        //const {titolo, testo} = props;
            return (
                <div>
                    <h3>{titolo}</h3>
                    <h6>{autore}</h6>
                    <p>{descrizione}</p>
                </div>
            );
        }
        
        export default CardBase;



//costruisco il componente
// function CardBase(props) {
    // console.log(props.titolo);
    //deve sempre restituire un'interfaccia
//     return (
//         //i componenti devono avere sempre un contenutore
//         <div>
        
//             <h3>{props.titolo}</h3>
//             <p>{props.testo}</p>

//         </div>
        
//     );
    
// }
// //funzione che voglio rendere disponibile all'esterno
// export default CardBase;