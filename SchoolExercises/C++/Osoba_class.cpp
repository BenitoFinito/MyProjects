#include <iostream>
#include <string>

using namespace std;
//string imie nazwisko, print, użytkownik wprowadza imie, public. 
class osoba {
	
public:
	string imie;
	string nazwisko;
	int wiek;
	string klasa;
	void printOsoba() {
		cout << "Imie: " << imie << "\nNazwisko: " << nazwisko << "\nWiek: " << wiek << "\nKlasa: " << klasa;
	}
};

int main()
{
	setlocale(LC_CTYPE, "Polish");
	osoba o1;
	
	cout << "Podaj imię osoby: ";
	cin >> o1.imie;
	cout << "Podaj nazwisko osoby: ";
	cin >> o1.nazwisko;
	cout << "Podaj wiek osoby: ";
	cin >> o1.wiek;
	cout << "Podaj klasę do której jest przydzielony: ";
	cin >> o1.klasa;
	o1.printOsoba();

	getchar();
	getchar();
}
