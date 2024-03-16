#include <iostream>
using namespace std;

class Macierz {
private:
	float t[3][3];
	int rozmiar = 0;
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
	void wczytajDane() {
		int j = 0, i = 0;
		while (j < 3) {
			while (i < 3) {
				cin >> t[j][i];
				i++;
			}
			i = 0;
			j++;
		}
	}
	void wypisz() {
		int j = 0, i = 0;
		while (j < 3) {
			while (i < 3) {
				cout << t[j][i] << "	";
				i++;
			}
			i = 0;
			cout << "\n";
			j++;
		}
	}


friend Macierz *dodajMacierze(Macierz& m1, Macierz& m2) {
	int j = 0, i = 0;
	Macierz* m3 = new Macierz();
	while (j < 3) {
		while (i < 3) {
			m3->t[j][i] = m1.t[j][i] + m2.t[j][i];
			i++;
		}
		i = 0;
		j++;
	}
	return m3;
}

};





	int main()
	{
		system("color 0a");
		setlocale(LC_CTYPE, "Polish");

		Macierz* m1 = new Macierz(); Macierz* m2 = new Macierz();

		cout << "\nWpisz dane do macierzy 1: \n";
		m1->wczytajDane();
		cout << "\nWpisz dane do macierzy 2: \n";
		m2->wczytajDane();
		cout << "\nDane macierzy 1: \n";
		m1->wypisz();
		cout << "\nDane macierzy 2: \n";
		m2->wypisz();
		cout << "\nSuma macierzy 1 i 2: \n";
		Macierz *m3 = dodajMacierze(*m1, *m2);
		m3->wypisz();
		delete m1, m2, m3;
	}