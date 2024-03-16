#include <iostream>
#include <string>

using namespace std;

int main()
{
	setlocale(LC_CTYPE, "Polish");

	int ilość;

	cout << "Ilość uczniów: ";
	cin >> ilość;

	
	
	struct Osoba {
		string imie;
		string nazwisko;
	};


	struct Uczeń {
		Osoba os;
		string klasa;
		
	};

	Uczeń* uczniowie = new Uczeń[ilość];

	for (int i = 0; i < ilość; i++) {
		cout << "Wpisz imię ucznia: ";
		cin >> uczniowie[i].os.imie;
		cout << "Wpisz nazwisko ucznia: ";
		cin >> uczniowie[i].os.nazwisko;
		cout << "Wpisz klasę ucznia: ";
		cin >> uczniowie[i].klasa;
	}
	for (int i = 0; i < ilość; i++) {
		cout << "Uczeń numer " << i + 1 << " : " << endl;
		cout << "Imię: " << uczniowie[i].os.imie << endl;
		cout << "Nazwisko: " << uczniowie[i].os.nazwisko << endl;
		cout << "Klasa: " << uczniowie[i].klasa << endl << endl;
	}
	
	
	
	getchar();
	getchar();
}