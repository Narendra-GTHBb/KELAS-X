import { link } from "./link.js";

export function ubah(){
    let id = 12;
    let data = {
        pelanggan : 'update axios export',
        alamat : 'update alamat axios export',
        telp : '1234567'
    };
    link.put('/pelanggan/'+id,data).then(res=>{
        console.log(res);
        let tampil = `<div class="alert alert-success">
          <h4>${res.data.pesan}</h4>
        </div>`;
        document.querySelector("#out").innerHTML = tampil;
    });

}