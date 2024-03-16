#include <iostream>
#include <time.h>
#include <string>
#include <chrono>
#include <thread>
/*klasa postac: nazwa, położenie, typ: protected
klasa wiedzmin: walczy mieczem, rzuca znaki, dziedziczy nazwe i położenie i chodzenie*/
using namespace std;

class Postac {
protected:
	int y = 0, x = 0;
public:
	string nazwa;

	void TworzenieWiedzmina() {
		cout << "Wybierz kogo chcesz: człowieka czy wiedźmina?\n";
		cin >> nazwa;
		cout << "Żartowałem, nie możesz wybrać :)\n";
		cout << "Podaj nazwę wiedźmina: \n";
		cin >> nazwa;
		srand(time(NULL));
		cout << "Twoje startowe położenie: \n";
		x = (rand() % 2000) - 1000;
		cout << "X: " << x << endl;
		y = (rand() % 2000) - 1000;
		cout << "Y: " << y << endl << endl;
	}
	void Chod() {
		int odp;
		for (;;) {
			cout << "\nW którym kierunku chcesz pójść?\n" <<
				"1:Północ \n2:Północny wschód \n3:Wschód \n4:Południowy wschód \n" <<
				"5:Południe \n6:Południowy zachód \n7:Zachód \n8:Północny zachód\n" << "Numer:";

			cin >> odp;
			if (cin.fail()) {
				cin.clear();
				cin.ignore(numeric_limits<streamsize>::max(), '\n');
				cout << "Spróbuj wpisać liczbę.\n";
				this_thread::sleep_for(chrono::seconds(1));
				system("cls");
				continue;
			}
			else {
				break;
			}
		}
		switch (odp) {
		case 1:
			if (y < 1000) {
				cout << "Idziesz na północ.\n";
				y += (rand() % 10) + 10;
				if (y > 1000) {
					y = 1000;
				}
			}
			else if (y >= 1000) {
				string a = "Nie możesz dalej iść w tą stronę.\n";
				throw a;
			}
			break;
		case 2:
			if (y < 1000 || x < 1000) {
				cout << "Idziesz na północny wschód.\n";
				y += (rand() % 5) + 5;
				x += (rand() % 5) + 5;
				if (y > 1000) {
					y = 1000;
				}
				if (x > 1000) {
					x = 1000;
				}
			}
			else if (y >= 1000 || x >= 1000) {
				string a = "Nie możesz dalej iść w tą stronę.\n";
				throw a;
			}
			break;
		case 3:
			if (x < 1000) {
				cout << "Idziesz na wschód.\n";
				x += (rand() % 10) + 10;
				if (x > 1000) {
					x = 1000;
				}
			}
			else if (x >= 1000) {
				string a = "Nie możesz dalej iść w tą stronę.\n";
				throw a;
			}
			break;
		case 4:
			if (y > -1000 || x < 1000) {
				cout << "Idziesz na południowy wschód.\n";
				y -= (rand() % 5) + 5;
				x += (rand() % 5) + 5;
				if (y < -1000) {
					y = -1000;
				}
				if (x > 1000) {
					x = 1000;
				}
			}
			else if (y <= -1000 || x >= 1000) {
				string a = "Nie możesz dalej iść w tą stronę.\n";
				throw a;
			}
			break;
		case 5:
			if (y > -1000) {
				cout << "Idziesz na południe.\n";
				y -= (rand() % 10) + 10;
				if (y < -1000) {
					y = -1000;
				}
			}
			else if (y <= -1000) {
				string a = "Nie możesz dalej iść w tą stronę.\n";
				throw a;
			}
			break;
		case 6:
			if (y > -1000 || x > -1000) {
				cout << "Idziesz na południowy zachód.\n";
				y -= (rand() % 5) + 5;
				x -= (rand() % 5) + 5;
				if (y < -1000) {
					y = -1000;
				}
				if (x < -1000) {
					x = -1000;
				}
			}
			else if (y <= -1000 || x <= -1000) {
				string a = "Nie możesz dalej iść w tą stronę.\n";
				throw a;
			}
			break;
		case 7:
			if (x > -1000) {
				cout << "Idziesz na zachód.\n";
				x -= (rand() % 10) + 10;
				if (x < -1000) {
					x = -1000;
				}
			}
			else if (x <= -1000) {
				string a = "Nie możesz dalej iść w tą stronę.\n";
				throw a;
			}
			break;
		case 8:
			if (y < 1000 || x > -1000) {
				cout << "Idziesz na północny zachód.\n";
				y += (rand() % 5) + 5;
				x -= (rand() % 5) + 5;
				if (y > 1000) {
					y = 1000;
				}
				if (x < -1000) {
					x = -1000;
				}
			}
			else if (y >= 1000 || x <= -1000) {
				string a = "Nie możesz dalej iść w tą stronę.\n";
				throw a;
			}
			break;
		default: string b = "Spróbuj jeszcze raz wybrać kierunek.\n";
			throw b;
			break;
		}
	}
	void InfoPolozenie();
};

void Postac::InfoPolozenie() {
	cout << "Aktualne koordynaty:\n";
	cout << "X: " << x << endl << "Y: " << y << endl;
}

class Potwory {
	int dop = 0, hp = 0, ile = 0, i = 1;
public:
	void Ghul(int obr, int znk) {
		for (;;) {
			if (hp <= 0) {
				hp = ((rand() % 201) + 600);
			}
			hp = hp - obr;
			hp = hp - znk;
			if (hp <= 0) {
				string koniec = "\nPokonałeś Ghula\n";
				throw koniec;
			}
			else {
				for (;;) {
					cout << "\nGhul ma " << hp << " HP\n";
					cout << "Co robisz?\n";
					cout << "1:Atakujesz mieczem.\n2:Rzucasz znakiem.\n";

					cin >> dop;
					if (cin.fail()) {
						cin.clear();
						cin.ignore(numeric_limits<streamsize>::max(), '\n');
						cout << "Spróbuj wpisać liczbę.\n";
						this_thread::sleep_for(chrono::seconds(1));
						system("cls");
						continue;
					}
					else {
						break;
					}
				}
				throw dop;
			}
		}
	}
	void Kikimora(int obr, int znk) {
		for (;;) {
			if (hp <= 0) {
				hp = ((rand() % 601) + 1200);
			}
			hp = hp - obr;
			hp = hp - znk;
			if (hp <= 0) {
				string koniec = "\nPokonałeś Kikimorę\n";
				throw koniec;
			}
			else {
				for (;;) {
					cout << "\nKikimora ma " << hp << " HP\n";
					cout << "Co robisz?\n";
					cout << "1:Atakujesz mieczem.\n2:Rzucasz znakiem.\n";

					cin >> dop;
					if (cin.fail()) {
						cin.clear();
						cin.ignore(numeric_limits<streamsize>::max(), '\n');
						cout << "Spróbuj wpisać liczbę.\n";
						this_thread::sleep_for(chrono::seconds(1));
						system("cls");
						continue;
					}
					else {
						break;
					}
				}
				throw dop;
			}
		}
	}
	void Żul(int obr, int znk) {
		for (;;) {
			if (hp <= 0) {
				hp = (rand() % 501) + 100;
			}
			hp = hp - obr;
			hp = hp - znk;
			if (hp <= 0) {
				string koniec = "\nPokonałeś Żula i jego smród.\n";
				throw koniec;
			}
			else {
				for (;;) {
					cout << "\nOd żula ciągnie się " << hp << " µg/m3 smrodu co może świadczyć o jego HP \n";
					cout << "Co robisz?\n";
					cout << "1:Atakujesz mieczem.\n2:Rzucasz znakiem.\n";

					cin >> dop;
					if (cin.fail()) {
						cin.clear();
						cin.ignore(numeric_limits<streamsize>::max(), '\n');
						cout << "Spróbuj wpisać liczbę.\n";
						this_thread::sleep_for(chrono::seconds(1));
						system("cls");
						continue;
					}
					else {
						break;
					}
				}
				throw dop;
			}
		}

	}
	void Nekkery(int obr, int znk) {
		for (;;) {
			if (hp <= 0) {
				hp = (rand() % 101) + 200;
			}
			if (ile <= 0) {
				ile = (rand() % 2) + 3;
			}
			hp = hp - obr;
			hp = hp - znk;
			if (hp <= 0) {
				ile -= 1;
				i++;
				if (ile > 0) {
					hp = (rand() % 101) + 200;
				}
			}
			if (ile <= 0) {
				i = 1;
				string koniec = "\nPokonałeś Nekkery\n";
				throw koniec;
			}
			else {
				for (;;) {
					cout << "\n" << i << ". Nekker ma " << hp << " HP\n";
					cout << "Co robisz?\n";
					cout << "1:Atakujesz mieczem.\n2:Rzucasz znakiem.\n";

					cin >> dop;
					if (cin.fail()) {
						cin.clear();
						cin.ignore(numeric_limits<streamsize>::max(), '\n');
						cout << "Spróbuj wpisać liczbę.\n";
						this_thread::sleep_for(chrono::seconds(1));
						system("cls");
						continue;
					}
					else {
						break;
					}
				}
				throw dop;
			}
		}
	}
};

class kielba : public Postac {
public:
	int x = 0, y = 0;
	void getxy()
	{
		x = (rand() % 2000) - 1000;
		y = (rand() % 2000) - 1000;
		for (;;) {
			if (Postac::x != x && Postac::y != y) {
				break;
			}
			else {
				x = (rand() % 2000) - 1000;
				y = (rand() % 2000) - 1000;
			}
		}
	}
	void xy(){
		cout << "\nX: " << x;
		cout << "\nY: " << y;
	}
	
}kielba;

class Wiedzmin : public Postac, public Potwory {
public:
	int akcja = 0;
	int o = 0;
	int razufka = 1;
	void Akcja() {
		akcja = rand() % 10;
		if (akcja == 9 && razufka > 0) {
			cout << "Spotykasz trolla Marcina, który przekazuje ci informacje o możliwym położeniu niepowtarzalnej wszechmogącej grubej czarnej kiełbaski:\n";
			kielba.getxy();
			kielba.xy();
			razufka--;
		}
		else {

			switch (akcja) {
			case 0:
				cout << "\nSpotykasz Ghula, szykuj się do walki.\n";
				o = 1;
				throw o;
				break;
			case 1:
				cout << "\nW pobliżu nie ma zagrożenia.\n";
				this_thread::sleep_for(chrono::seconds(1));
				break;
			case 2:
				cout << "\nNa terenie czysto.\n";
				this_thread::sleep_for(chrono::seconds(1));
				break;
			case 3:
				cout << "\nSpotykasz Kikimorę, szykuj się do walki.\n";
				o = 2;
				throw o;
				break;
			case 4:
				cout << "\nNadal nic. Tylko ty, ziemia, powietrze...\n";
				this_thread::sleep_for(chrono::seconds(1));
				break;
			case 5:
				cout << "\nSpotykasz jakiegoś żula, który ci zanieczyścił powietrze swoim smrodem, szykuj się na mord.\n";
				o = 3;
				throw o;
				break;
			case 6:
				cout << "\nNadal samotnie kroczysz, żadnej duszy w pobliżu\n";
				this_thread::sleep_for(chrono::seconds(1));
				break;
			case 7:
				cout << "\nSpotykasz Nigge...ekhem Nekkery blisko ruin, szykuj się do walki.\n";
				o = 4;
				throw o;
				break;
			case 8:
				cout << "\nNie widać niczego, co mogłoby Ci zagrażać\n";
				this_thread::sleep_for(chrono::seconds(1));
				break;
			case 9:
				cout << "\nPusto... no nie ma... nie ma nikogo.\n";
				this_thread::sleep_for(chrono::seconds(1));
				break;
			default:
				cout << "Ewidentny błąd w kodzie.";
				system("Pause");
				break;
			}
		}
	}

	int Atak();
	int Znak();
};

int Wiedzmin::Atak() {
	int obrazenia = (rand() % 35) + 150;
	cout << "\nAtakujesz mieczem zadając " << obrazenia << " punktów obrażeń.";
	return obrazenia;
}

int Wiedzmin::Znak() {
	int znk = 0;
	for (;;) {
		cout << "Wybierz znak:\n" << "1.Igni\n2.Aard\n3.Aksji\n4.Yrden\n5.Quen\n";
		cin >> znk;

		if (cin.fail()) {
			cin.clear();
			cin.ignore(numeric_limits<streamsize>::max(), '\n');
			cout << "Spróbuj wpisać liczbę.\n";
			this_thread::sleep_for(chrono::seconds(1));
			system("cls");
			continue;
		}
		else {
			break;
		}
	}
	switch (znk) {
	case 1:
		break;
	case 2:
		break;
	case 3:
		break;
	case 4:
		break;
	case 5:
		break;
	default:
		string blad = "Spróbuj jeszcze raz wybrać znak.\n";
		throw blad;
	}
	return znk;
}

int main()
{
	setlocale(LC_CTYPE, "Polish");
	system("Color 0a");
	int omin = 1;
	Wiedzmin w;
	w.TworzenieWiedzmina();
	for (;;) {
		if (omin <= 0) {
			w.InfoPolozenie();
			/*if (kielba.getxy()) {

			}*/
		}
		else {
			omin--;
		}
		try {
			w.Chod();
		}
		catch (string c) {
			cout << c;
			continue;
		}
		try {
			w.Akcja();
		}
		catch (int o) {
			int obr = 0;
			int znk = 0;
			if (o == 1) {
				this_thread::sleep_for(chrono::seconds(2));
				system("cls");
				for (;;) {
					try {
						w.Ghul(obr, znk);
					}
					catch (int q) {
						if (q == 1) {
							obr = w.Atak();
						}
						else if (q == 2) {
							for (;;) {
								try {
									znk = w.Znak();
								}
								catch (string blad) {
									cout << blad;
									this_thread::sleep_for(chrono::seconds(1));
									system("cls");
									continue;
								}
								break;
							}
						}
						else {
							cout << "Spróbuj wybrać ponownie.\n";
							obr = 0;
							znk = 0;
							this_thread::sleep_for(chrono::seconds(1));
							system("cls");
							continue;
						}
					}
					catch (string kon) {
						cout << kon;
						break;
					}
					this_thread::sleep_for(chrono::seconds(1));
					system("cls");
				}
			}
			else if (o == 2) {
				this_thread::sleep_for(chrono::seconds(2));
				system("cls");
				for (;;) {
					try {
						w.Kikimora(obr, znk);
					}
					catch (int q) {
						if (q == 1) {
							obr = w.Atak();
						}
						else if (q == 2) {
							for (;;) {
								try {
									znk = w.Znak();
								}
								catch (string blad) {
									cout << blad;
									this_thread::sleep_for(chrono::seconds(1));
									system("cls");
									continue;
								}
								break;
							}
						}
						else {
							cout << "Spróbuj wybrać ponownie.\n";
							obr = 0;
							znk = 0;
							this_thread::sleep_for(chrono::seconds(1));
							system("cls");
							continue;
						}
					}
					catch (string kon) {
						cout << kon;
						break;
					}
					this_thread::sleep_for(chrono::seconds(1));
					system("cls");
				}
			}
			else if (o == 3) {
				this_thread::sleep_for(chrono::seconds(2));
				system("cls");
				for (;;) {
					try {
						w.Żul(obr, znk);
					}
					catch (int q) {
						if (q == 1) {
							obr = w.Atak();
						}
						else if (q == 2) {
							for (;;) {
								try {
									znk = w.Znak();
								}
								catch (string blad) {
									cout << blad;
									this_thread::sleep_for(chrono::seconds(1));
									system("cls");
									continue;
								}
								break;
							}
						}
						else {
							cout << "Spróbuj wybrać ponownie.\n";
							obr = 0;
							znk = 0;
							this_thread::sleep_for(chrono::seconds(1));
							system("cls");
							continue;
						}
					}
					catch (string kon) {
						cout << kon;
						break;
					}
					this_thread::sleep_for(chrono::seconds(1));
					system("cls");
				}
			}
			else if (o == 4) {
				this_thread::sleep_for(chrono::seconds(2));
				system("cls");
				for (;;) {
					try {
						w.Nekkery(obr, znk);
					}
					catch (int q) {
						if (q == 1) {
							obr = w.Atak();
						}
						else if (q == 2) {
							for (;;) {
								try {
									znk = w.Znak();
								}
								catch (string blad) {
									cout << blad;
									this_thread::sleep_for(chrono::seconds(1));
									system("cls");
									continue;
								}
								break;
							}
						}
						else {
							cout << "Spróbuj wybrać ponownie.\n";
							obr = 0;
							znk = 0;
							this_thread::sleep_for(chrono::seconds(1));
							system("cls");
							continue;
						}
					}
					catch (string kon) {
						cout << kon;
						break;
					}
					this_thread::sleep_for(chrono::seconds(1));
					system("cls");
				}
			}
		}
		this_thread::sleep_for(chrono::seconds(1));
		system("cls");
	}
}