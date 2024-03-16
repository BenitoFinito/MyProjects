import java.util.*;

public class Main {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        //Map<nazwisko, rok_urodzenia> map = new HashMap<>();
        Map<String, Integer> map = new HashMap<>();
        //mapy
        //wartosc rok urodzenia, nazwisko string
        //wczytywanie danych -5
        //dodawanie do mapy
        //wypisanie
        //wypisac osoby o szukanym nazwisku
        //i o roku
        //usuwanie wszystkich os. ur. po 2000 roku

        int br = 0;
        while(true) {
            if(br==1) break;
            System.out.println("\n1 - dodaj osoby, 2 - wypisz mape, 3 - pokaż rok osoby, inne - zakończ");
            int x = in.nextInt();
            switch (x) {
                case 1:
                    System.out.println("\nWpisz nazwisko:");
                    String nazw = in.next();
                    System.out.println("\nWpisz rok urodzenia:");
                    int rok = in.nextInt();
                    map.put(nazw, rok);
                    break;
                case 2:
                    map.forEach((k, v) -> {
                        System.out.println("Nazwisko:" + k + " Rok urodzenia:" + v);
                    });
                    break;
                case 3:
                    System.out.println("\nWpisz nazwisko:");
                    String szukany = in.next();
                    System.out.println(map.get(szukany));
                    break;
                default:
                    br = 1;
                    break;
            }
        }
        /*
            map.put("Kowalski", 1998);
            map.put("Nowak", 1975);
            map.put("Szymański", 2003);
            map.put("Szewski", 2012);
            map.put("Bug", 2006);

            //wypisanie zawartości mapy
            map.forEach((k, v) -> {
                System.out.println("Nazwisko:" + k + " Rok urodzenia:" + v);
            });

            System.out.println("\nDodaję kolejny klucz Ania z inną wartością");
            map.put("Szymański", 1999);
            //wypisanie zawartości mapy
            map.forEach((k, v) -> {
                System.out.println("Klucz:" + k + " Wartość:" + v);
            });

            ///////////////////////////////
            String szukany = "Szewski";

            System.out.println("\nWypisuję rok szukanego nazwiska");
            System.out.println(map.get(szukany));

            System.out.println("\nWypisuje szukane nazwiska");
            map.forEach((k, v) -> {
                if (k.compareToIgnoreCase(szukany) == 0) {
                    System.out.println("Klucz:" + k + " Wartość:" + v);
                }
            });

            for (String k : map.keySet()) {
                if (k.equals(szukany)) {
                    System.out.println(k);
                }
            }
            List<String> lista = new ArrayList<>();
            int i = 0;
            System.out.println("\n Poruszanie się po wartościach mapy");
            map.forEach((k, v) -> {
                if (v > 2000) {
                    lista.add(k);
                }
            });
            System.out.println("\nWypisanie mapy przed usunięciem");
            map.forEach((k, v) -> {
                System.out.println("Nazwisko:" + k + " Rok urodzenia:" + v);
            });
            for (String del : lista) {
                map.remove(del);
            }
            System.out.println("\nWypisanie mapy po usunięciu");
            map.forEach((k, v) -> {
                System.out.println("Nazwisko:" + k + " Rok urodzenia:" + v);
            });
        }*/
    }
}