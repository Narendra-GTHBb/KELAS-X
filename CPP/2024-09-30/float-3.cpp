#include <iostream>

using namespace std;

int main()
{
    float celcius, fahrenheit;
    cout << "Masukkan Suhu dalam Celcius: ";
    cin >> celcius;

    fahrenheit = (celcius * 9 / 5) + 32;
    cout << "Suhu dalam Fahrenheit adalah: " << fahrenheit << endl;
    return 0;
}
