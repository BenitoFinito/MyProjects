#include <iostream>
/*Zdefiniowany + - * / == != > < operatory. Klasa vector, podaj daje xy dla 1 i 2 obiektu, v1 + v2 = cos v1-v2 = cos. Czy obiekty som rowne itd. Wieksze mniejsze itd itd*/

using namespace std;

class Vector2D {
public:
    int x, y;
    Vector2D(int x, int y) : x(x), y(y) {}
   /* Vector2D operator +(const Vector2D& v) const {
        return Vector2D(x + v.x, y + v.y);
    }
    Vector2D operator -(const Vector2D& v) const {
        return Vector2D(x - v.x, y - v.y);
    }
    Vector2D operator *(const Vector2D& v) const {
        return Vector2D(x * v.x, y * v.y);
    }
    Vector2D operator +(const Vector2D& v) const {
        return Vector2D(x / v.x, y / v.y);
    } */
    bool operator ==(const Vector2D& v)
    {
        if ((x == v.x) && (y == v.y))
            return true;
        else
            return false;
    }
    bool operator !=(const Vector2D& v)
    {
        if ((x != v.x) && (y != v.y))
            return true;
        else
            return false;
    }
    bool operator >(const Vector2D& v)
    {
        if ((x + y > v.x + v.y))
            return true;
        else
            return false;
    }
    bool operator <(const Vector2D& v)
    {
        if ((x < v.x) && (y < v.y))
            return true;
        else
            return false;
    }
    void print() {
        cout << "x=" << x << " y=" << y << endl;
    }
};
int main()
{
    setlocale(LC_CTYPE, "Polish");
    int x, y, z, w, wbr;
    cout << "Podaj wartości do obiektu v1: \n";
    cin >> x;
    cin >> y;
    cout << "Podaj wartości do obiektu v2: \n";
    cin >> z; 
    cin >> w;
    Vector2D v1(x, y);
    Vector2D v2(z, w);
   // Vector2D v3;
    cout << "Wybierz opcję: \n";
    cout << "1. Sprawdź czy wartości obiektu są równe.\n";
    cout << "2. Sprawdź czy wartości obiektu są różne.\n";
    cout << "3. Sprawdź czy wartości obiektu v1 są większe od wartości obiektu v2.\n";
    cout << "4. Sprawdź czy wartości obiektu v1 są mniejsze od wartości obiektu v2.\n";
    cout << "::";
    cin >> wbr;
    switch (wbr) {
    case 1:
        if (v1 == v2)
            cout << "Równe";
        else
            cout << "Rożne";
        return 0;
    case 2:
        if (v1 != v2)
            cout << "Rożne";
        else
            cout << "Równe";
        return 0;
    case 3:
        if (v1 > v2)
            cout << "Tak";
        else
            cout << "Nie";
        return 0;
    case 4:
        if (v1 < v2)
            cout << "Tak";
        else
            cout << "Nie";
        return 0;
    default:
        cout << "Nie ma takiej opcji";
    }
}