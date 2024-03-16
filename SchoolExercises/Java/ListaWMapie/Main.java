//uzytkownik wybiera wartosci
//moc dodac kolejna wartosc
//1. wypisywac 2.pytac do jakiego klucza dodac 3. co dodac 4. usuwanie wartosci
import java.util.*;

public class Main {

    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        Map<String, List<String>> m = new HashMap<String, List<String>>();
        String word;
        word = "Adam";
        List<String> l1 = new ArrayList<>();
        l1.add("1234");
        l1.add("niebieski1");
        m.put(word, l1);


        word = "Wojtek";
        m.put(word,
                new ArrayList<String>() {{
                    add("Red");
                    add("Green");
                    add("Blue");
                }}
        );

        m.forEach((k,v)->{
            System.out.println("Klucz:" + k + " Wartość:" + v);
        });

        int br = 0;
        while(true) {
            if(br==1) break;
            System.out.println("\n1 - Wypisz mapę, 2 - Dodaj wartość do klucza, 3 - Usuń wartości z klucza, inne - zakończ");
            int x = in.nextInt();
            switch (x) {
                case 1:
                    m.forEach((k, v) -> {
                        System.out.println("Nazwisko:" + k + " Rok urodzenia:" + v);
                    });
                    break;
                case 2:
                    System.out.println("Do jakiego klucza dodać wartość?");
                    String klucz = in.next();
                    if (!m.containsKey(klucz)) {
                        System.out.println("Brak klucza o takiej nazwie.");
                        break;
                    }
                    System.out.println("Podaj wartość:");
                    String value = in.next();
                    m.get(klucz).add(value);
                    break;
                case 3:
                    System.out.println("z jakiego klucza usunąć wartość?");
                    klucz = in.next();
                    if (!m.containsKey(klucz)){
                        System.out.println("Brak klucza o takiej nazwie.");
                        break;
                    }
                    System.out.println("Usuń wartość:");
                    value = in.next();
                    break;
                default:
                    br = 1;
                    break;
            }
        }

    }

}
