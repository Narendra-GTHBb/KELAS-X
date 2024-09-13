#include <iostream>

using namespace std;

int  main()

{
    cout<<"KESEMPATAN AKU JADI PACAR KAMU" << endl;

    double Good_Looking, Mewing, Sultan, Perhatian;

    std::cout<<"Nilai Good_Looking: ";
    std::cin >> Good_Looking;
    std::cout<<"Nilai Mewing: ";
    std::cin >> Mewing;
    std::cout<<"Nilai Sultan: ";
    std::cin >> Sultan;
    std::cout<<"Nilai Perhatian: ";
    std::cin >> Perhatian;

    double rata_rata = (Good_Looking+Mewing+Sultan+Perhatian) / 4;
    std::cout << "Rata-rata Nilai: " << rata_rata << std::endl;

    bool lulus = (rata_rata >=75 ) && (Good_Looking >=60 ) && (Mewing >=60 ) && (Sultan >=60 ) && (Perhatian >=60 ) ;

    if (lulus) {
        std::cout << "DAPAT PACAR" << std::endl;
    } else {
        std::cout << "TIDAK DAPAT" << std::endl;

        return 0;
    }

}
