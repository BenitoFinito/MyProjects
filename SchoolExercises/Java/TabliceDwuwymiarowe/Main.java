//tablice dwuwymiarowe + sumujemy wszystkie w tablicy
import  java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        System.out.println("Podaj rozmiar tablicy dwuwymiarowej: ");
        var size1 = input.nextInt();
        var size2 = input.nextInt();
        input.nextLine();
        System.out.println("Rozmiar tablicy: [" + size1 + "][" + size2 +"]");
        int[][] array;
        array = new int[size1][size2];
        System.out.println("Wpisz liczby:");
        for(int i = 0; i < size1; i++) {
            for (int j = 0; j < size2; j++) {
                var number = input.nextInt();
                array[i][j] = number;
            }
        }
        input.nextLine();
        int suma = 0, max = 0, min = array[0][0];
        for(int i = 0; i < size1; i++){
            for(int j = 0; j < size2; j++){
                suma += array[i][j];
                if(array[i][j] > max){
                    max = array[i][j];
                }
                if(min > array[i][j]){
                    min = array[i][j];
                }
            }
        }
        System.out.println("Wynik:\n" + suma + "\nNajwiększa liczba:\n" + max + "\nNajmniejsza liczba:\n" + min);
    }
}