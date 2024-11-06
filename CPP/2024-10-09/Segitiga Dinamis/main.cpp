#include <iostream>

using namespace std;

int main()
{
    int x,y;
    cout << "Masukkan Tinggi Segitiga" << endl;
    cin >> x;



    for (int i = 1; i <= x; i++)
    {
        for (int j = x ; j >= i; j--)
        {
            cout << " * ";
        }
        cout << endl;
    }

cout << endl;

    for (int i = 1; i <= x; i++)
    {
        for (int j = 1 ; j <= i; j++)
        {
            cout << " * ";
        }
        cout << endl;
    }

cout << endl;

    for (int i = 1; i <= x; i++)
    {
        for (int j = 1; j < i; j++)
        {
            cout << "   ";
        }

        for (int k = x; k >= i; k--)
        {
            cout << " * ";
        }
        cout << endl;
    }

cout << endl;

    for (int i = 1; i <= x; i++)
    {
        for (int j = x; j > i; j--)
        {
            cout << "   ";
        }

        for (int k = 1; k <= i; k++)
        {
            cout << " * ";
        }
        cout << endl;
    }
    return 0;
}
