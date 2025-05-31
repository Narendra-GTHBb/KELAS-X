import {link} from './link.js';

export function post() {
    let data = {
      pelanggan: "pelanggan axios export",
      alamat: "alamat axios export",
      telp: "1234567890",
    };
    link.post("/pelanggan", data).then((res) => {
        // console.log( res);
        if (!res.data) {
          throw new Error("Data response tidak valid");
        }
        let tampil = `<div class="alert alert-success">
              <h4>${res.data.pesan}</h4>
            </div>`;
        document.querySelector("#out").innerHTML = tampil;
      })
      .catch((error) => {
        console.error("Error:", error);
        document.querySelector(
          "#out"
        ).innerHTML = `<div class="alert alert-danger">Error: ${error.message}</div>`;
      });
  }