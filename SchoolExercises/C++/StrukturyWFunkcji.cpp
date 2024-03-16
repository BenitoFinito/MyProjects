#include <iostream>
#include <string>
using namespace std;

struct osoba {
	string imie;
	string nazwisko;
	int wiek;
};

osoba wprowadz() {

	osoba wskaznik;
	wskaznik = new osoba;

	cout  podaj imie  endl;
	cin  wskaznik-imie;
	cout  podaj nazwisko  endl;
	cin  wskaznik-nazwisko;
	cout  podaj wiek  endl;
	cin  wskaznik-wiek;
	return wskaznik;
}

void pokaz(osoba a) {

	cout  a.imie  endl;
	cout  a.nazwisko  endl;
	cout  a.wiek  endl;

}

int main()
{
	osoba wskaznik = new osoba;
	wskaznik = wprowadz();
	pokaz(wskaznik);
}