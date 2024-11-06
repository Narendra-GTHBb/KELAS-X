#include <iostream>

using namespace std;

int main()
{
    cout << "Masukkan Harga Pembelian :" << endl;
    int n;
    double potongan;
    int hasil;
     cin >> n;

     if (n>= 1000000)
     {
         potongan = n*0.10;
         hasil= n - potongan;
     } else {
     potongan = 0;
     hasil = n - potongan;
     }

     cout << "Jumlah Pembelian Anda: " << n <<endl;
     cout << "Potongan " << potongan <<endl;
     cout << "Jumlah yang Harus dibayar:  " << hasil <<endl;
    return 0;
}
