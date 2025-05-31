import { link } from "./link.js";

export function hapus(){
    let id =11;

    link.delete('/pelanggan/'+id).then(res=>{
        console.log(res);
        let tampil = `<div class="alert alert-success">
              <h4>${res.data.pesan}</h4>
            </div>`;
        document.querySelector("#out").innerHTML = tampil;
    });
  }
