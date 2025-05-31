import {useState} from 'react';
import Tabel from './Tabel';
import './styles.css'

function Menu() {
    const titel = "Daftar Menu Restoran"
    const[menus,setMenu]=useState(
        [
            {
                menu:"Nasi Goreng",
                idkategori:1,
                harga:15000
            },
            {
                menu:"Nasi Uduk",
                idkategori:1,
                harga:10000
            },
            {
                menu: "Nasi Ayam",
                idkategori:3,
                harga:12000
            }
        ]
    )
  return (
    <div className="App">
       <Tabel menu={menus} titel={titel}/>
       <Tabel menu={menus.filter((data)=>(data.idkategori===1))} titel="Menu Buah"/>
    </div>
  )
}

export default Menu