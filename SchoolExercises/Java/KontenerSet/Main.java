

import java.util.*;

/**
 * @author benio
 */
public class Main {
    public static void main(String[] args) {
        setString();
        strangeSet();
    }

    public static void setString() {
        Set<String> s = new HashSet<String>();

        s.add("Ginger");
        s.add("nGinGger");

        for (String str : s) {
            System.out.println(str);
        }

        System.out.println("Dodaję kolejnego Adama");
        s.add("Adam");

        s.forEach(System.out::println);

        System.out.println("Usuwam Adama");
        s.remove("Adam");
        s.forEach(System.out::println);

        System.out.println("Rozmiar s="+s.size());
        System.out.println("Usuwam wszystko");
        s.clear();
        System.out.println("Rozmiar s="+s.size());


    }

    public static void strangeSet() {
        Set mySet = new HashSet();
        mySet.add("AA");
        mySet.add("CC");
        mySet.add("AA");
        mySet.add("BB");
        mySet.add(1);
        mySet.add(new Osoba("Qba","Jacobs"));
        System.out.println("mySet: " + mySet);

        for ( var str : mySet) System.out.println(str);
    }

}
