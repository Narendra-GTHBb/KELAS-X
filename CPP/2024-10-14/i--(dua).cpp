#include <iostream>

using namespace std;

int main()
{

    int a=3, b=5, next;
    std::cout << "Perulangan for dengan i-- dan mencetak angka genap" << std::endl;

    for(int i= 0; a>=0; i++)
    {
        std::cout<<a << " ";
        next = a+b;
        a=b;
        b= next;
    }

    std::cout<<std::endl;
    return 0;
}
