import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import { BrowserRouter, Routes, Route } from 'react-router-dom'
import './index.css'
import Nav from './pages/Nav'
import App from './pages/App'
import Tentang from './pages/Tentang'
import Sejarah from './pages/Sejarah'
import Kontak from './pages/Kontak'
import Siswa from './pages/Siswa'
import Menu from './pages/Menu'


createRoot(document.getElementById('root')).render(
  <StrictMode>
    <BrowserRouter>
      <Nav />
      <Routes>
        <Route path="/" element={<App />} />
        <Route path="/tentang" element={<Tentang />} />
        <Route path="/sejarah" element={<Sejarah />} />
        <Route path="/kontak" element={<Kontak />} />
        <Route path="/siswa" element={<Siswa />} />
        <Route path="/menu" element={<Menu />} />
      </Routes>
    </BrowserRouter>
  </StrictMode>,
)
