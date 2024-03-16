#include <iostream>

using namespace std;

int main()
{
	double rozmiar;
	double* t;

	cout << "Podaj rozmiar tablicy: ";
	cin >> rozmiar;

	t = new double[rozmiar];

	cout << "Podaj liczby do tablicy: ";
	for (int i = 0; i < rozmiar; i++) {
		cin >> t[i];
	}

	for (int i = 0; i < rozmiar; i++) {
		cout << t[i] << endl;
	}

	for (int i = 0; i < rozmiar; i++) {
		cout << &t[i] << endl;
	}

	delete[] t;
	return 0;
}