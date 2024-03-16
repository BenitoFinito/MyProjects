#include <iostream>
#include <string>

using namespace std;

/*
Utwórz klase osoba, umiescic imie nazwisko wiek, przynajmniej dwa konstruktory, bez parametrów i z parametrami, dodac metode print.
*/

class Człowiek
{

public:
	int wiek;
	string nazwisko;
	string imie, imie2;
	Człowiek() //konstruktor 
	{
		imie = "Grzegorz";
		nazwisko = "Brzęczeszczykiewicz";
		wiek = 21;
	}
	Człowiek(int w, string n, string i, string i2) //kostruktor z parametrami
	{
		imie = i;
		imie2 = i2;
		nazwisko = n;
		wiek = w;
	}
	void printOsoba();
	
};

void Człowiek::printOsoba()
{
	cout << "Imię: " << imie;
	if (imie2 != "") {
		cout << "\nDrugie imię: " << imie2;
	}
	cout << "\nNazwisko: " << nazwisko << "\nWiek: " << wiek << "\n";
}

int main()
{
	system("color 0a");
	setlocale(LC_CTYPE, "Polish"); //program wyświetla polskie znaki, ale po wpisaniu własnych wartości, które zawierają polskie znaki, nie wyświetla polskich znaków.
	Człowiek osoba1;
	Człowiek* osoba2;
	int w = 0;
	string n, i, i2, odp;
	
	cout << "Dane osoby pierwszej: \n";
	osoba1.printOsoba();
	cout << "\nPodaj dane osoby drugiej: \n";
	cout << "Imię: ";
	cin >> i;
	cout << "Czy osoba ma drugie imię? (t/n) ";
	cin >> odp;
	if(odp == "t")
	{
		cout << "Podaj drugie imię: ";
		cin >> i2;
	}
	cout << "Nazwisko: ";
	cin >> n;
	cout << "Wiek: ";
	cin >> w;
	cout << "\nDane osoby drugiej: \n";

	osoba2 = new Człowiek(w, n, i, i2);

	osoba2->printOsoba();

	delete osoba2;
}