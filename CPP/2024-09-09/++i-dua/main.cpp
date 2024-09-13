#include <iostream>

using namespace std;

int main()
{
  int array[100];

  for (int i = 0; i < 100; ++i)
  {
    array[i] = i + 1;
  }
  std::cout << "Menggunakan ++i untuk akses array:" << std::endl;
  for (int i = 0; i < 100; ++i)
  {
    std::cout << "Array [" << i << "] = " << array[i] << std::endl;
  }

  return 0;
}
