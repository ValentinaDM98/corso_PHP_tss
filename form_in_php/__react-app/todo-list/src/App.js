import logo from './logo.svg';
import './App.css';

// componente react
function App() {
  // le () vengono usate come trucco per contenere un'istruzione continua, 
  // questo perchè in js se vado a capo termino l'istruzione
  return ( 
    <div className="App">
      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
        <p>
          Edit <code>src/App.js</code> and save to reload.
        </p>
        <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a>
      </header>
    </div>
  );
}

export default App;
