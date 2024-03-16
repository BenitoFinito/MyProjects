#include <iostream>
#include <string>

using namespace std;

class Adres;

class Osoba {
private:
	string imie;
	string nazwisko;
	int wiek;
public:
	Osoba(string imie, string nazwisko, int wiek) {
		this->wiek = wiek;
		this->imie = imie;
		this->nazwisko = nazwisko;
	}
	Osoba(Adres& adres);
	void getDane(Adres& adres);
	void checkWiek() {
		if (wiek >= 18) {
			cout << "Osoba o nazwie |" + imie + " " + nazwisko + "| jest pełnoletnia.\n\n";
			cout << "----------------------------\n\n";
		}
		else
		{
			cout << "Osoba o nazwie |" + imie + " " + nazwisko + "| nie jest pełnoletnia.\n\n";
			cout << "----------------------------\n\n";
		}
	}
};


class Adres {

	string ulica;
	string numer_domu;
	string miasto;
	string kod_pocztowy;
	friend class Osoba;
public:
	Adres(string ulica, string numer_domu, string miasto, string kod_pocztowy) {
		this->ulica = ulica;
		this->numer_domu = numer_domu;
		this->miasto = miasto;
		this->kod_pocztowy = kod_pocztowy;
	}
	Adres()
	{
		//Co prawda nic nie robi, ale jest potrzebny. Jest jak most łączący dwie klasy, aby prawdiłowo działały. W sensie daje dostęp do danych obiektom bez parametrowym. Chodź jest pusty, jest potrzebny. Nie chce mi się już modyfikować programu, więc będzie on pusty :/
	}
};

void Osoba::getDane(Adres& adres) {
	cout << "\nOsoba:\n\n";
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	cout << "Imie osoby: " << imie << endl;
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	cout << "Nazwisko osoby: " << nazwisko << endl;
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	cout << "Wiek osoby: " << wiek << endl;
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n\n";
	cout << "Adres: \n\n";
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	cout << "Ulica: " << adres.ulica << endl;
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	cout << "Numer domu: " << adres.numer_domu << endl;
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	cout << "Miasto: " << adres.miasto << endl;
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	cout << "Kod pocztowy: " << adres.kod_pocztowy << endl;
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n\n";
}

Osoba::Osoba(Adres& adres) {
	cout << "Teraz stworzysz własną osobę:\n\n";
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	cout << "Wpisz imię:";
	cin >> imie;
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	cout << "Wpisz nazwisko:";
	cin >> nazwisko;
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	cout << "Wpisz wiek:";
	cin >> wiek;
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n\n";
	cout << "Teraz adres:\n\n";
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	cout << "Wpisz ulicę:";
	cin >> adres.ulica;
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	cout << "Wpisz numer domu:";
	cin >> adres.numer_domu;
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	cout << "Wpisz miasto:";
	cin >> adres.miasto;
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
	cout << "Wpisz kod pocztowy:";
	cin >> adres.kod_pocztowy;
	cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
}

int main() {
	system("color 0a");
	setlocale(LC_CTYPE, "Polish");
	Osoba ob1("Jan", "Kowalski", 20);
	Adres ad1("Kwiatowa", "10", "Warszawa", "00-001");
	ob1.getDane(ad1);
	ob1.checkWiek();
	Adres ad2;
	Osoba ob2(ad2);
	ob2.getDane(ad2);
	ob2.checkWiek();
	return 0;
}