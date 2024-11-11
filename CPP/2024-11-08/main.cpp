#include <iostream>

using namespace std;

int main()
{
    string nama, nickname, npacar, jurusan, sekolah, alamat, hobi, citacita;

    for( int i = 1; i<=2; i++) {

    cout << "\nData Siswa " << i << endl;

    cout << "Nama Lengkap :" ;
    getline (cin, nama);

    cout << "Nama Panggilan :" ;
    getline (cin, nickname);

    cout << "Nama Pacar :" ;
    getline (cin, npacar);

    cout << "Jurusan :" ;
    getline (cin, jurusan);

    cout << "Sekolah :" ;
    getline (cin, sekolah);

    cout << "Alamat :" ;
    getline (cin, alamat);

    cout << "Hobi : " ;
    getline (cin, hobi);

    cout << "Cita-cita :" ;
    getline (cin, citacita);

    cout << "\nData Siswa " << i << endl;

    cout << "Nama Lengkap anda adalah : " << nama << '\n';
    cout << "Nama Panggilan anda adalah : " << nickname << '\n';
    cout << "Nama Pacar anda adalah : " << npacar << '\n';
    cout << "Jurusan anda adalah : " << jurusan << '\n';
    cout << "Sekolah anda adalah : " << sekolah << '\n';
    cout << "Alamat anda adalah : " << alamat << '\n';
    cout << "Hobi anda adalah : " << hobi << '\n';
    cout << "Cita-cita anda adalah : " << citacita << '\n';

    }

    return 0;
}
