#include <iostream>
#include <string>
#include <cstdlib>
#include <ctime>


using namespace std;

int * losowaneliczby(int random)
{
	int *tab = new int[random];
	for (int i = 0; i < random; i++)
	{
		*(tab + i) = (rand() % 100);

	}

	return tab;
}

int main()
{
	srand(time(NULL));
	int rand;
	setlocale(LC_CTYPE, "Polish");
	cout << "Ile wylosować liczb? : ";
	cin >> rand;

	int* b;
	
	b = new int[rand];

	b = losowaneliczby(rand);

	cout << "Wylosowane liczby: " << endl;
	for (int i = 0; i < rand; i++)
	{
		cout << b[i] << endl;
	}


}
/*uż wpisuje ile losować liczb
funkcja losuje liczby
new na tablice
wylosowane liczby do tablicy
funkcja zwraca wskaźnik
w mainie zawartość

*/