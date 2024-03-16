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
    void wypisz() { // oraz metodę wypisującą wartość ułamka.
        cout << licznik << "/" << mianownik << endl;
    }
    friend Ulamek mnoz(Ulamek& u1, Ulamek& u2); //Napisz dwie funkcję zaprzyjaźnione. Jedną do mnożenia ułamków
    friend Ulamek dziel(Ulamek& u1, Ulamek& u2); // drugą do dzielenia ułamków.
};

Ulamek mnoz(Ulamek& u1, Ulamek& u2) { //Funkcje powinny przyjmować jako parametry referencje na dwa obiekty
    int nl = u1.licznik * u2.licznik; 
    int nm = u1.mianownik * u2.mianownik;
    return Ulamek(nl, nm); //i powinny jako zwracać obiekt przechowujący wynik wykonanej operacji.
}

Ulamek dziel(Ulamek& u1, Ulamek& u2) { //Funkcje powinny przyjmować jako parametry referencje na dwa obiekty
    int nl = u1.licznik * u2.mianownik;
    int nm = u1.mianownik * u2.licznik;
    return Ulamek(nl, nm); //i powinny jako zwracać obiekt przechowujący wynik wykonanej operacji.
}


int main(){

    int l1, l2, m1, m2;
    setlocale(LC_CTYPE, "Polish");
    system("color 0a");
    cout << "=============================================================================================\n";
    cout << "Podaj licznik pierwszego ułamka: ";  //W funkcji main prosimy użytkownika o podanie danych dla dwóch ułamków(czyli ich liczników i mianowników).
    cin >> l1;
    cout << "Podaj mianownik pierwszego ułamka: ";
    cin >> m1;
    cout << "=============================================================================================\n";
    cout << "Podaj licznik drugiego ułamka: ";
    cin >> l2;
    cout << "Podaj mianownik drugiego ułamka: ";
    cin >> m2;

    Ulamek u1(l1, m1), u2(l2, m2); //Następnie tworzymy dwa obiekty za pomocą konstruktora i wywołujemy dwie funkcje
    Ulamek u3 = mnoz(u1, u2); //jedną do mnożenia ułamków,
    Ulamek u4 = dziel(u1, u2); // drugą do dzielenia ułamków.
    cout << "=============================================================================================\n";
    cout << "Wynik mnożenia " << l1 << "/" << m1 << " i " << l2 << "/" << m2 << ": \n";
    u3.wypisz();  //Następnie wywołujemy metody wypisujące wyniki wykonanych operacji.
    cout << "=============================================================================================\n";
    cout << "Wynik dzielenia " << l1 << "/" << m1 << " i " << l2 << "/" << m2 << ": \n";
    u4.wypisz();
    cout << "=============================================================================================\n";
}