import {link} from './link.js';

export function get() {
    link
      .get("/pelanggan")
      .then((res) => {
        console.log("Response data:", res.data);

        if (!res.data || !Array.isArray(res.data)) {
          throw new Error("Data tidak valid");
        }

        let tampil = `<table class="table table-striped">
          <tr> 
            <th>ID</th> 
            <th>Pelanggan</th> 
            <th>Alamat</th> 
            <th>Telp</th> 
          </tr>`;

        res.data.forEach((el) => {
          tampil += `<tr> 
            <td>${el.idpelanggan}</td> 
            <td>${el.pelanggan}</td> 
            <td>${el.alamat}</td> 
            <td>${el.telp}</td> 
          </tr>`;
        });

        tampil += "</table>";
        document.querySelector("#out").innerHTML = tampil;
      })
      .catch((error) => {
        console.error("Error:", error);
        document.querySelector(
          "#out"
        ).innerHTML = `<div class="alert alert-danger">Error: ${error.message}</div>`;
      });
  }