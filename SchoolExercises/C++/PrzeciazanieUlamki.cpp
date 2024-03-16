#include <iostream>

using namespace std;

class Ulamek { //Utwórz klasę Ulamek reprezentującą ułamek zwykły.
private:
    int licznik; // W klasie powinny być przechowywane dwie liczby całkowite czyli licznik i mianownik.
    int mianownik; //Zmienne przechowujące licznik oraz mianownik powinny być prywatne.
public:
    Ulamek(int l, int m) { //Klasa powinna zawierać konstruktor przyjmujący jako argument dwie liczby całkowite (licznik i mianownik)
        this->licznik = l;
        this->mianownik = m;
    }
    Ulamek operator *(Ulamek& u2) { //Funkcje powinny przyjmować jako parametry referencje na dwa obiekty
        int nl = licznik * u2.licznik;
        int nm = mianownik * u2.mianownik;
        return Ulamek(nl, nm); //i powinny jako zwracać obiekt przechowujący wynik wykonanej operacji.
    }

    Ulamek operator /(Ulamek& u2) { //Funkcje powinny przyjmować jako parametry referencje na dwa obiekty
        int nl = licznik * u2.mianownik;
        int nm = mianownik * u2.licznik;
        return Ulamek(nl, nm); //i powinny jako zwracać obiekt przechowujący wynik wykonanej operacji.
    }
    Ulamek operator +(Ulamek& u2) { //Funkcje powinny przyjmować jako parametry referencje na dwa obiekty
        int nm = mianownik * u2.mianownik;
        int tmpl1 = u2.mianownik * licznik;
        int tmpl2 = mianownik * u2.licznik;
        int nl = tmpl1 + tmpl2;
        return Ulamek(nl, nm); //i powinny jako zwracać obiekt przechowujący wynik wykonanej operacji.
    }
    Ulamek operator -(Ulamek& u2) { //Funkcje powinny przyjmować jako parametry referencje na dwa obiekty
        int nm = mianownik * u2.mianownik;
        int tmpl1 = u2.mianownik * licznik;
        int tmpl2 = mianownik * u2.licznik;
        int nl = tmpl1 - tmpl2;
        return Ulamek(nl, nm);
    }
    bool operator >(Ulamek& u2) {
        int tmpl1 = u2.mianownik * licznik;
        int tmpl2 = mianownik * u2.licznik;
        return tmpl1 > tmpl2;
    }
    bool operator <(Ulamek& u2) {
        int tmpl1 = u2.mianownik * licznik;
        int tmpl2 = mianownik * u2.licznik;
        return tmpl1 < tmpl2;
    }
    bool operator ==(const Ulamek& u2) {
        int tmpl1 = u2.mianownik * licznik;
        int tmpl2 = mianownik * u2.licznik;
        return tmpl1 == tmpl2;
    }

    friend ostream& operator<<(ostream& out, const Ulamek& u);
    friend istream& operator>>(istream& in, Ulamek& u);

};

ostream& operator<<(ostream& out, const Ulamek& u) {
    out << u.licznik << "/" << u.mianownik;
    return out;
}
istream& operator>>(istream& in, Ulamek& u) {
    in >> u.licznik >> u.mianownik;
    return in;
}





int main() {

    setlocale(LC_CTYPE, "Polish");
    system("color 0a");
    Ulamek u1(1, 1), u2(2, 2);
    cout << "=============================================================================================\n";
    cout << "Podaj licznik i mianownik pierwszego ułamka: \n";  //W funkcji main prosimy użytkownika o podanie danych dla dwóch ułamków(czyli ich liczników i mianowników).
    cin >> u1;
    cout << "=============================================================================================\n";
    cout << "Podaj licznik i mianownik drugiego ułamka: \n";
    cin >> u2;

    Ulamek u3 = u1 * u2;
    Ulamek u4 = u1 / u2;
    Ulamek u5 = u1 + u2;
    Ulamek u6 = u1 - u2;
    cout << "=============================================================================================\n";
    cout << "Wynik mnożenia " << u1 << " i " << u2 << ": \n";
    cout << u3 << endl;
    cout << "=============================================================================================\n";
    cout << "Wynik dzielenia " << u1 << " i " << u2 << ": \n";
    cout << u4 << endl;
    cout << "=============================================================================================\n";
    cout << "Wynik dodawania " << u1 << " i " << u2 << ": \n";
    cout << u5 << endl;
    cout << "=============================================================================================\n";
    cout << "Wynik odejmowania " << u1 << " i " << u2 << ": \n";
    cout << u6 << endl;
    cout << "=============================================================================================\n";
    cout << "Czy ułamki są równe czy się różnią? \n";
    if (u1 == u2) {
        cout << "Ułamki są równe.\n";
    }
    else{
        cout << "Ułamki są różne.\n";
    }
    cout << "=============================================================================================\n";
    cout << "Czy ułamek " << u1 << " jest większy od " << u2 << "? \n";
    if (u1 > u2) {
        cout << "Ułamek "<< u1 <<" jest większy czy mniejszy od " << u2 << ". \n";
    }
    else if (u1 < u2) {
        cout << "Ułamek " << u1 << " jest mniejszy od " << u2 << ". \n";
    }
    cout << "=============================================================================================\n";
}