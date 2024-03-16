#include <iostream>

using namespace std;

class Macierz {
private:
    int size = 3;
    float t[3][3];
public:
    Macierz()
    {
        int j = 0, i = 0;
        while (j < 3) {
            while (i < 3) {
                t[j][i] = 0;
                i++;
            }
            i = 0;
            j++;
        }
    }

    Macierz* operator +(Macierz& m2) {
        int j = 0, i = 0;
        Macierz* m3 = new Macierz();
        while (j < 3) {
            while (i < 3) {
                m3->t[j][i] = t[j][i] + m2.t[j][i];
                i++;
            }
            i = 0;
            j++;
        }
        return m3;
    }
    Macierz* operator -(Macierz& m2) {
        int j = 0, i = 0;
        Macierz* m4 = new Macierz();
        while (j < 3) {
            while (i < 3) {
                m4->t[j][i] = t[j][i] - m2.t[j][i];
                i++;
            }
            i = 0;
            j++;
        }
        return m4;
    }
    bool operator==(Macierz& m2) {
        int j = 0, i = 0;
        while (j < 3) {
            while (i < 3) {
                if (t[i][j] != m2.t[i][j]) {
                    return false;
                    break;
                }
                i++;
            }
            i = 0;
            j++;
        }
        return true;
    }

    friend ostream& operator<<(ostream& out, Macierz& m);
    friend istream& operator>>(istream& in, Macierz& m);
};

ostream& operator<<(ostream& out, Macierz& m) {
    int j = 0, i = 0;
    while (j < 3) {
        while (i < 3) {
            out << m.t[j][i] << "	";
            i++;
        }
        i = 0;
        cout << "\n";
        j++;
    }
    return out;
}
istream& operator>>(istream& in, Macierz& m) {
    int j = 0, i = 0;
    while (j < 3) {
        while (i < 3) {
            in >> m.t[j][i];
            i++;
        }
        i = 0;
        j++;
    }
    return in;
}



int main() {

    setlocale(LC_CTYPE, "Polish");
    system("color 0a");
    Macierz m1, m2;
    cout << "=============================================================================================\n";
    cout << "Wprowadź dane do pierwszej macierzy: \n";
    cin >> m1;
    cout << "=============================================================================================\n";
    cout << "Wprowadź dane do drugiej macierzy: \n";
    cin >> m2;
    cout << "=============================================================================================\n";
    cout << "Pierwsza macierz:\n";
    cout << m1 << endl;
    cout << "=============================================================================================\n";
    cout << "Druga macierz:\n";
    cout << m2 << endl;
    cout << "=============================================================================================\n";
    Macierz* m3 = m1 + m2;
    cout << "Wynik dodawania macierzy:\n";
    cout << *m3 << endl;
    delete m3;
    cout << "=============================================================================================\n";
    Macierz* m4 = m1 - m2;
    cout << "Wynik odejmowania macierzy:\n";
    cout << *m4 << endl;
    delete m4;
    cout << "=============================================================================================\n";
    if (m1 == m2) {
        cout << "Macierze są równe.\n";
    }
    else {
        cout << "Macierze są różne.\n";
    }
    cout << "=============================================================================================\n";
}