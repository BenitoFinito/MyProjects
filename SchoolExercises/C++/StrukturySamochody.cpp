#include <iostream>
#include <string>
#define N 2

using namespace std;

int main()
{
	setlocale(LC_CTYPE, "Polish");

	struct Auto {
		double cena;
		int rocznik;
		double przebieg;
		string marka;
	};


	struct Auto samochody[N];

	for (int i = 0; i < N; i++)
	{
		cout << "Wpisz markę samochodu " << i + 1 << " : ";
		cin >> samochody[i].marka;
		cout << "Wpisz przebieg samochodu " << i + 1 << " : ";
		cin >> samochody[i].przebieg;
		cout << "Wpisz cenę samochodu " << i + 1 << " : ";
		cin >> samochody[i].cena;
		cout << "Wpisz rocznik samochodu " << i + 1 << " : ";
		cin >> samochody[i].rocznik;
	}
	float nij = samochody[N].przebieg;
	int j = 0;
	for (int i = 0; i < N; i++) {
		if (samochody[i].przebieg < samochody[i - 1].przebieg) {
			nij = samochody[i].przebieg;
			j = i;
		}
	}

	cout << "Samochód z najniższym przebiegiem to: " << endl << samochody[j].marka << endl << samochody[j].rocznik << " r." << endl << nij << " km." << endl << samochody[j].cena << " zł.";

	getchar();
	getchar();
}