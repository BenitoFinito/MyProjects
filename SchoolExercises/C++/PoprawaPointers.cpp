#include <iostream>

using namespace std;

double *f1(int n) {
	double* tab;
	tab = new double[n];
	int i = 0;
	while (i < n)
	{
		tab[i] = i + 1;
		i++;
	}
	return tab;
}

int main()
{
	setlocale(LC_CTYPE, "Polish");
	int n, i = 0;

	cout << "Podaj rozmiar: "; //Prośba o podanie rozmiaru
	cin >> n;

	double * t = f1(n); //wywołanie funkcji

	cout << "Liczby: \n";
	while (i < n) //Pętla wypisująca zawartość tablicy która została utworzona w funkcji
	{

		cout << t[i] << "\n";
		i++;
	}
}