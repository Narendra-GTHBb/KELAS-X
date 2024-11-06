#include <iostream>

using namespace std;

int main()
{
   std::cout<< "Percabangan 2 Kondisi" << std::endl;

   cout<<"Masukkan Hasil Nilai :" <<endl;

   int n;
   cin >> n;


   if(n >=90 && n<=100)
   {
    cout<< "Nilai Kamu A !" << endl;
   } else if ( n>= 80 && n<=89)
   {
       cout << "Nilai Kamu A !" << endl;
   } else if ( n >= 70 && n<=79)
   {
       cout<< "Nilai Kamu B !" << endl;
   } else if ( n >= 60 && n<= 69)
   {
       cout<< "Nilai Kamu B !" << endl;
   } else if ( n>= 50 && n<= 59)
   {
       cout << "Nilai Kamu C !" << endl;
   } else if ( n >= 40 && n<= 49)
   {
       cout << "Nilai Kamu C !" << endl;
   } else if (n <= 39 && n>=0 )
   {
       cout << "Nilai Kamu E !" << endl;
   } else {

   cout << "Nilai diluar batas" << endl;
   }








}
