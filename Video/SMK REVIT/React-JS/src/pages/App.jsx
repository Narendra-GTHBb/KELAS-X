import './styles.css'

function App() {
  return (
    <div className="content-wrapper">
      <div className="container">
        <h1 className="text-center mb-4">Belajar React</h1>
        <div className="row">
          <div className="col-md-4">
            <div className="simple-card">
              <h3>Components</h3>
              <p>Belajar komponen React</p>
              <button className="simple-button">Mulai</button>
            </div>
          </div>
          <div className="col-md-4">
            <div className="simple-card">
              <h3>Router</h3>
              <p>Belajar navigasi</p>
              <button className="simple-button">Mulai</button>
            </div>
          </div>
          <div className="col-md-4">
            <div className="simple-card">
              <h3>State</h3>
              <p>Belajar state</p>
              <button className="simple-button">Mulai</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default App