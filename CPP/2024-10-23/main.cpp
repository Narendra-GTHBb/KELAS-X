#include <iostream>

using namespace std;

int main()
{
 int nilai;
 do {

 cout << "Masukkan Nilai :" << endl;
 cin >> nilai;


 if (nilai >=80) {
    cout << "Nilai A" << endl;
 } else if (nilai >=70){
 if (nilai>= 75){
    cout << "Nilai B+" << endl;
 } else {
 cout << "Nilai B" << endl;
 }
 } else {
 cout << "Nilai C" << endl;
 }
}

 while (nilai != 0);
 cout << endl;



    return 0;
}
