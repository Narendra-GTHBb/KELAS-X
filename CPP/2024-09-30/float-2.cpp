#include <iostream>

using namespace std;

int main()
{
    float num1, num2, num3, average;

    cout<< "Masukkan tiga angka: ";
    cin >> num1 >> num2 >> num3;

    average = (num1 + num2 + num3) / 3;
    cout << "Rata-rata dari ketiga angka adalah: " << average << endl
    return 0;
}
