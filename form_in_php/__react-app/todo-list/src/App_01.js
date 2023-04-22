
// import './App.css';
// import CardBase from './components/CardBase';

// // componente react
// function App() {
//   // le () vengono usate come trucco per contenere un'istruzione continua, 
//   // questo perchè in js se vado a capo termino l'istruzione
//   return ( 
//     //i componenti devono avere sempre un contenutore
//     <div className="App">
//       <CardBase titolo={"Harry Potter"} testo= {"testo"}></CardBase>
//       <CardBase titolo={"Il grande Gatsby"} testo= {"testo"}></CardBase>
//       <CardBase titolo={"Biancaneve e i 7 nani"} testo= {"testo"}></CardBase>
      
//     </div>
//   );
// }

// //default: non è necessario mettere le parentesi graffe
// export default App;

import logo from './logo.svg';
import './App.css';
import CardBase from './components/CardBase';

/** https://www.telerik.com/blogs/beginners-guide-loops-in-react-jsx */

function App() {

  const booklist = [
    {
      titolo: "le 4 piume",
      autore:"kipling"
    },
    {
      titolo: "il grande gabsy",
      autore: "scoot"
    },
    {
      titolo: "kim",
      autore: "kipling"
    },
    // {
    //   titolo: "kim"
    // }
  ]

  // Trasformo le informazioni in componenti
  const card_list = booklist.map((book,key) => <CardBase key={key} testo={book} titolo={book.titolo} />)
  // const card_list = booklist.map( function(book){return <CardBase titolo={book.titolo}  /> })

  return (
    <section>

      <div className="App">
        {card_list}
      </div>
      <hr />
      <div className="App">
        {booklist.map( book => <CardBase key={book.titolo}  titolo={book.titolo} />)}
      </div>
    </section>
  )
}

export default App;
