#include <iostream>

using namespace std;

int main()
{
    cout << "Perulangan for dengan i--:" << endl;

    for(int i=100 ; i > 0; i--)
    {
        if (i % 4-1 == 0){
            std::cout << i << " ";
        }
    }
    std::cout << std::endl;

    return 0;
}
