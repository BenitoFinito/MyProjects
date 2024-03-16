import java.util.Scanner;
import java.util.List;
import java.util.ArrayList;
import java.util.Collections;

import static java.lang.System.out;

public class Main {
    static Scanner in = new Scanner(System.in);
    public static void main(String[] args) {
        while(true) {
            int wybor = in.nextInt();
            if(lista(wybor) == 1) break;
        }
    }
    public static int lista(int wybor){
        List<String> l = new ArrayList<>();
        switch (wybor) {
            case 1 -> {
                out.print("Dodaj osobę:");
                l.add(in.next());
                return 0;
            }
            case 2 -> {
                out.println("Wyświetl listę:");
                l.forEach(System.out::println);
                return 0;
            }
            case 3 -> {
                out.print("Usuń osobę po indeksie:");

                return 0;
            }
            case 4 -> {
                out.print("Usuń osobę po nazwisku:");

                return 0;
            }
            default -> {
                return 1;
            }
        }
    }
}

