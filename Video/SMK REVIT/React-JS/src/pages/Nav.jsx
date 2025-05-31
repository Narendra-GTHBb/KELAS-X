import { Link } from 'react-router-dom'
import './styles.css'

function Nav() {
  return (
    <nav className="navbar">
      <div className="container d-flex justify-content-between">
        <div>React Learning</div>
        <div>
          <Link to="/" className="btn btn-link text-white">Home</Link>
          <Link to="/tentang" className="btn btn-link text-white">Tentang</Link>
          <Link to="/sejarah" className="btn btn-link text-white">Sejarah</Link>
          <Link to="/kontak" className="btn btn-link text-white">Kontak</Link>
          <Link to="/siswa" className="btn btn-link text-white">Siswa</Link>
          <Link to="/menu" className="btn btn-link text-white">Menu</Link>
        </div>
      </div>
    </nav>
  )
}

export default Nav