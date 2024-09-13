#include <iostream>

using namespace std;

int  main()

{
    double matematika, fisika, kimia;

    std::cout<< "Masukkan Nilai Matematika: ";
    std::cin >> matematika;
    std::cout<< "Masukkan Nilai Fisika: ";
    std::cin >> fisika;
    std::cout<< "Masukkan Nilai Kimia: ";
    std::cin >> kimia;


double rata_rata = (matematika+fisika+kimia) / 3;

std::cout << "Rata-rata Nilai: " <<rata_rata << std::endl;

bool lulus = (rata_rata >= 70) && (matematika >= 60) && (fisika >= 60) && (kimia >= 60);

if (lulus) {

    std::cout << "Siswa Lulus!" << std::endl;


} else {
    std::cout << "Siswa Tidak Lulus" << std::endl;
return 0;

}







}
