#include <iostream>

using namespace std;

int main()
{
    const int SIZE = 7;
    int numbers[SIZE] = {23, 45, 67, 23, 100, 45, 56};

    int totalPreIncrement = 0;
    std::cout << "Menggunakan ++i untuk menghilangkan total dan rata-rata:" << std::endl;
    for (int i = 0; i < SIZE; ++i)
    {

        totalPreIncrement += numbers[i];
        std::cout << "Menambahkan " << numbers[i] << ", total sementara: " << totalPreIncrement << std::endl;
    }

    return 0;
}
