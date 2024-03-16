#include <iostream>

using namespace std;

class Prostokąt {
private:
	float dlugosc;
	float szerokosc;
public:
	Prostokąt(float dlugosc, float szerokosc)
	{
		this->dlugosc = dlugosc;
		this->szerokosc = szerokosc;
	}

	float Pole() {
		return dlugosc * szerokosc;
	}
	float Obwod() {
		return (2 * dlugosc) + (2 * szerokosc);
	}

	void setDlugosc(float dlugosc);
	void setSzerokosc(float szerokosc);

	Prostokąt(const Prostokąt& kopia) {
		dlugosc = kopia.dlugosc;
		szerokosc = kopia.szerokosc;
	}

};

void Prostokąt::setDlugosc(float dlugosc) {
	this->dlugosc = dlugosc;
}
void Prostokąt::setSzerokosc(float szerokosc) {
	this->szerokosc = szerokosc;
}

int main()
{
	setlocale(LC_CTYPE, "Polish");
	float dl, sz;
	Prostokąt obiekt1(4,5);
	cout << "Obiekt1: \n";
	cout << "Pole: " << obiekt1.Pole() << endl;
	cout << "Obwód: " << obiekt1.Obwod() << endl << endl;

	Prostokąt obiekt2(obiekt1);

	cout << "Obiekt2: \n";
	cout << "Pole: " << obiekt2.Pole() << endl;
	cout << "Obwód: " << obiekt2.Obwod() << endl << endl;

	obiekt2.setDlugosc(10);
	obiekt2.setSzerokosc(20);

	cout << "Obiekty po ewentualnych zmianach wymiarów: \n" << endl;

	cout << "Obiekt1: \n";
	cout << "Pole: " << obiekt1.Pole() << endl;
	cout << "Obwód: " << obiekt1.Obwod() << endl << endl;

	cout << "Obiekt2: \n";
	cout << "Pole: " << obiekt2.Pole() << endl;
	cout << "Obwód: " << obiekt2.Obwod() << endl << endl;
}