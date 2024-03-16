#include <iostream>

using namespace std;

void zmienIndeksy(int *t, int r) {
	int par, npar;
	for (int i = 0; i < r; i++) {
		if (i % 2 == 0) {
			par = t[i];
		}
		else {
			npar = t[i];
			t[i] = par;
			t[i - 1] = npar;
		}
	}
}

void wypisz(int *t, int r)
{
	for (int i = 0; i < r; i++)
	{
		cout << t[i] << endl;
	}
}

int main()
{
	int *t1, rozmiar, i;
	setlocale(LC_CTYPE, "Polish");
	cout << "Podaj rozmiar tablicy: ";
	cin >> rozmiar;

	t1 = new int[rozmiar];

	cout << "Podaj " << rozmiar << " liczb: " << endl;
	for (int i = 0; i < rozmiar; i++) {
		cin >> t1[i];
	}

	zmienIndeksy(t1,rozmiar);

	cout << "Liczby, które zostały zamienione miejscami: " << endl;
	wypisz(t1, rozmiar);

}