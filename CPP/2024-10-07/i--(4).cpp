#include <iostream>

using namespace std;

int main()
{
   // cout << "Hello world!" << endl;
    //for(int i=15; i>= 0; i--)
    //{
     //   std::cout << i << std::endl;
    //}

    int array [100];

    for(int i= 25; i >= 0; i--)
    {
        array [i] =i*4;
    }
    for (int i=25; i>= 0; i--)
    {
        std::cout << "Array [" << i*4 << "]=" << array[i] << std::endl;
    }
    return 0;
}
