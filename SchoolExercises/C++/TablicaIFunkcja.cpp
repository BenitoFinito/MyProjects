#include <iostream>
#define N 10

using namespace std;

float minl( float t[], float roz) {
	float min;
	min = t[0];
	
	for (int i = 0; i < roz; i++) {
		if (t[i] < min) {
			min = t[i];
		}
	}
	return min;
}

float maxl(float t[], float roz) {
	float max;
	max = t[0];

	for (int i = 0; i < roz; i++) {
		if (t[i] > max) {
			max = t[i];
		}
	}
	return max;
}



int main()
{
	int i;
	float licz, t[N];
	float  suma, śrdl;
	setlocale(LC_CTYPE, "Polish");

	cout << "Podaj " << N <<" liczb: ";
	for (i = 0; i < N; i++) {
		cin >> t[i];
	}

	
	cout << "Największa z podanych liczb to: " << maxl(t,N) << ", a najmniejsza z podanych liczb to: " << minl(t,N) << endl;
	suma = maxl(t,N) + minl(t,N);
	śrdl = suma / 2;
	cout << "Średnia z tych liczb to: " << śrdl;

	getchar();
	getchar();
}
