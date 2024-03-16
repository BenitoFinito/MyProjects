#include <iostream>
#include <string>
#define N 2

using namespace std;

int main()
{
	setlocale(LC_CTYPE, "Polish");

	struct Towar {
		string nazwa;
		float cena;
   };
	
	
	struct Towar towary[N];

	for (int i = 0; i < N; i++)
	{
		cout << "Wpisz nazwę towaru " << i + 1 << " : ";
		cin >> towary[i].nazwa;
		cout << "Wpisz cenę towaru " << i + 1 << " : ";
		cin >> towary[i].cena;
	}
	float naj = towary[N].cena;
	int j;
	for (int i = 0; i < N; i++) {
		if (towary[i].cena > towary[i - 1].cena) {
			naj = towary[i].cena;
			j = i;
		}
	}

	cout << "Najdroższy towar to: " << endl << towary[j].nazwa << endl << naj;
	
}
