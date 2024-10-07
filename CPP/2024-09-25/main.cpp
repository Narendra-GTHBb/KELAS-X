#include <iostream>
#include <string>

using namespace std;

int main()
{
    std::string input;
    std::cout << "Masukkan Sebuah String: ";
    std::getline(std::cin, input);

    std::string reversed = std::string(input.rbegin(), input.rend());

    std::cout<< "String yang dibalik adalah: " <<reversed << endl;
    return 0;
}
