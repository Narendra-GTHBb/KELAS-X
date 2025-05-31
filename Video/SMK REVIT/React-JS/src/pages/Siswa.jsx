import Listsiswa from './Listsiswa'
import './styles.css'

function Siswa() {
  const nama = ['joni','budi','andi']
  
  return (
   <div className="App">

     <Listsiswa judul={nama}/>
   </div>
  )
}

export default Siswa