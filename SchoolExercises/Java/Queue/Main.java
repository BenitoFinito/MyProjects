import java.util.LinkedList;
import java.util.Queue;
import java.util.Scanner;
public class Main {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        Queue<String> kju = new LinkedList<>();
        int brek = 1;
        int srebrny = 0;
        System.out.println("Wybierz:\n1. Dodaj do kolejki\n2. Wypisz kolejkę\n3. Pobierz i wypisz pierwszy element w kolejce\n4. Sprawdź czy jest w kolejce\n5. Wyjdź");

        while (brek != srebrny){
            int obior = in.nextInt();
            switch (obior) {
                case 1 -> {
                    System.out.println("Co chcesz dodać?");
                    String add = in.next();
                    kju.add(add);
                }
                case 2 -> {
                    System.out.println("Wypisuję kolejkę:");
                    kju.forEach(System.out::println);
                }
                case 3 -> System.out.println("Pierwszy obiekt w koljece:\n" + kju.remove());
                case 4 -> {
                    System.out.println("Co chcesz sprawdzić?");
                    String contain = in.next();
                    System.out.println("Czy istnieje " + contain + " ? " + (kju.contains(contain) ? "tak" : "nie"));
                }
                case 5 -> {
                    System.out.println("Wychodzę...");
                    srebrny = 1;
                }
                default -> System.out.println("Spróbuj jeszcze raz!");
            }
        }

    }
}