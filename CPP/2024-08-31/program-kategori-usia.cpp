#include <iostream>

using namespace std;

int  main()

{
    int usia;

    std::cout << "Masukkan Usia Anda: ";
    std::cin >> usia;

    if (usia < 13) {
    std::cout << "Anda adalah Anak-anak. " << std::endl;

    } else if (usia >= 13 && usia <= 19) {
    std::cout << "Anda adalah Remaja. " << std::endl;
    } else if (usia >= 20 && usia <= 64) {
    std::cout << "Anda adalah Dewasa. " << std::endl;
    } else if (usia >= 65) {
    std::cout << "Anda adalah Lansia. " << std::endl;
    }
    return 0;
}
