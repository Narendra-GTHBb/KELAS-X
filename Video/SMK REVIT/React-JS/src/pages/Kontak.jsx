import './styles.css'

function Kontak() {
  return (
    <div className="content-wrapper">
      <div className="container">
        <div className="simple-card">
          <h2>Kontak</h2>
          <form>
            <div className="mb-3">
              <input type="text" className="form-control" placeholder="Nama" />
            </div>
            <div className="mb-3">
              <input type="email" className="form-control" placeholder="Email" />
            </div>
            <div className="mb-3">
              <textarea className="form-control" placeholder="Pesan"></textarea>
            </div>
            <button className="simple-button">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  )
}

export default Kontak