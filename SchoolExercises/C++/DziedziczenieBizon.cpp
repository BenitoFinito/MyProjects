/*Klasa zwierze (abstrakcyjna):
- metoda jem (wirtualna)

Klasa człowiek (dziedziczy zwierze):
-definiuje jem (mięso)

Klasa bizon (dziedziczy zwierze):
-definiuje jem (trawa)

Każdy bizon i człowiek ma imie:
-10 bizonów
-10 ludzi
-10 wskaźników
*/
#include <iostream>

using namespace std;

class Zwierze {
	virtual void jem() = 0;
};

class Człowiek : public Zwierze {
	string imie;
public:
	void jem() {
		cout << "Jem kebsa z bizona.\n";
	}
	void n() {
		cin >> imie;
	}
};

class Bizon : public Zwierze {
	string nazwa;
public:
	void n() {
		cin >> nazwa;
	}
	void jem() {
		cout << "Jem trawkę.\n";
	}
};

int main() {
	setlocale(LC_CTYPE, "Polish");

	Bizon* bizon = new Bizon[10];
	Człowiek * czlowiek = new Człowiek[10];

	for (int i = 0; i < 10; i++) {
		cout << "Wpisz imie dla " << i + 1 << " bizona: \n";
		bizon[i].n();
		bizon[i].jem();
	}
	for (int i = 0; i < 10; i++) {
		cout << "Wpisz imie dla " << i + 1 << " człowieka: \n";
		czlowiek[i].n();
		czlowiek[i].jemd();
	}
}