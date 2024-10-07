#include <iostream>
#include <cmath> //Untuk M_PI

using namespace std;

int main()
{
  // float radius, area;

  // cout << "Masukkan jari-jari lingkaran: ";
  // cin >> radius;

  // area = M_PI * radius * radius;
  // cout << "Luas lingkaran adalah: "<< area << endl;
 //   return 0;


 float alas, sisitegak, area;

 cout << "Masukkan Alas Limas: ";
 cin >> alas;
 cout << "Masukkan Sisi Tegak: ";
 cin >> sisitegak;

 area = alas + sisitegak;
 cout << "Luas Limas segitiga Adalah :" << area << endl;
}
